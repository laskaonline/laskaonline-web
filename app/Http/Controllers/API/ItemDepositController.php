<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemDepositRequest;
use App\Models\ItemDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ItemDepositController extends Controller
{
    public function index()
    {
        $item_deposits = ItemDeposit::with(['items', 'approvals'])
            ->when(auth()->user()->hasRole('visitor'), fn ($q) => $q->whereBelongsTo(auth()->user()))
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'data' => $item_deposits,
            'message' => 'success'
        ]);
    }

    public function store(StoreItemDepositRequest $request)
    {
        $data['date_deposit'] = date('Y-m-d', strtotime($request->date_deposit));
        $data['photo_visitor'] = $request->file('photo_visitor')->store('item-deposit');
        $data['family_card'] = $request->file('family_card')->store('item-deposit');

        DB::transaction(function () use ($request, $data) {
            $item_deposit = auth()->user()->deposits()->create([
                'name_wbp' => $request['name_wbp'],
                'room_block' => $request['room_block'],
                'case' => $request['case'],
                'relationship' => $request['relationship'],
                'problem' => $request['problem'],
                'date_deposit' => $data['date_deposit'],
                'photo_visitor' => $data['photo_visitor'],
                'family_card' => $data['family_card'],
                'state' => '0',
            ]);

            $itemArray = collect($request->items)->map(function ($item) {
                $photo_path = Storage::putFile('item-deposit', $item['photo']);

                return [
                    'name' => $item['name'],
                    'amount' => $item['amount'],
                    'photo' => $photo_path
                ];
            });

            $item_deposit->items()->createMany($itemArray);
            return response()->json([
                'data' => $item_deposit->load(['items', 'approvals']),
                'message' => 'success'
            ]);
        });
    }

    public function show(ItemDeposit $itemDeposit)
    {
    }

    public function update(Request $request, ItemDeposit $itemDeposit)
    {
    }

    public function destroy(ItemDeposit $itemDeposit)
    {
    }
}
