<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\APIStoreItemDepositRequest;
use App\Http\Requests\StoreItemDepositRequest;
use App\Models\ItemDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ItemDepositController extends Controller
{
    public function index(Request $request)
    {
        $limit  = $request->query('limit', 100);
        $page   = $request->query('page', 1);
        $sortBy = $request->string('sortBy', 'DESC');
        $hasApproval = $request->query('hasApproval', null);

        $item_deposits = ItemDeposit::with(['user', 'items', 'approvals.user'])
            ->when($request->user()->hasRole('visitor'), fn ($q) => $q->whereBelongsTo($request->user()))
            ->when($hasApproval, fn ($q) => $q->has('approvals'))
            ->orderBy('id', $sortBy)
            ->paginate(
                $perPage = $limit,
                $columns = ['*'],
                $pageName = 'page'
            )->withQueryString();


        return response()->json([
            'message' => 'success',
            'meta' => $this->resultMeta($item_deposits, true),
            'data' => $this->resultData($item_deposits),
        ]);
    }

    public function store(APIStoreItemDepositRequest $request)
    {
        $data['deposit_date'] = date('Y-m-d', strtotime($request->deposit_date));
        $data['photo_visitor'] = $request->file('photo_visitor')->store('item_deposit');
        $data['family_card'] = $request->file('family_card')->store('item_deposit');


        $item_deposit = DB::transaction(function () use ($request, $data) {
            $item_deposit = $request->user()->deposits()->create([
                'name_wbp'      => $request['name_wbp'],
                'room_block'    => $request['room_block'],
                'case'          => $request['case'],
                'relationship'  => $request['relationship'],
                'problem'       => $request['problem'],
                'deposit_date'  => $data['deposit_date'],
                'photo_visitor' => $data['photo_visitor'],
                'family_card'   => $data['family_card'],
                'state'         => '0',
            ]);

            // json_decode($request->items)->map(function ($item) use ($item_deposit) {
            //     $photo_path = Storage::putFile('item_deposit', $item['photo']);

            //     $item_deposit->items()->create([
            //         'name' => $item['name'],
            //         'amount' => $item['amount'],
            //         'photo' => $photo_path
            //     ]);
            // });

            // $itemArray = collect($request->items)->map(function ($item) {
            //     $photo_path = Storage::putFile('item_deposit', $item['photo']);

            //     return [
            //         'name' => $item['name'],
            //         'amount' => $item['amount'],
            //         'photo' => $photo_path
            //     ];
            // });

            // $item_deposit->items()->createMany($itemArray);

            // Create Transaction for Item Deposit
            $item_deposit->transaction()->create([
                'date' => now()
            ]);

            return $item_deposit;
        });

        return response()->json([
            'message' => 'success',
            'data'    => $item_deposit
        ]);
    }

    public function show(ItemDeposit $itemDeposit)
    {
        return response()->json([
            'status' => 'success',
            'data' => $itemDeposit->with(['user', 'items', 'approvals.user'])->find($itemDeposit->id)
        ]);
    }

    public function update(Request $request, ItemDeposit $itemDeposit)
    {
    }

    public function destroy(ItemDeposit $itemDeposit)
    {
    }
}
