<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemDepositRequest;
use App\Models\Deposit;
use App\Models\ItemDeposit;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemDepositController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => auth()->user()->deposits()->with(['items', 'approvals'])->get(),
            'message' => 'success'
        ]);
    }

    public function store(StoreItemDepositRequest $request)
    {
        $data['date_deposit'] = date('Y-m-d', strtotime($request->date_deposit));
        $data['photo_visitor'] = $request->file('photo_visitor')->store('item_deposit');
        $data['family_card'] = $request->file('family_card')->store('item_deposit');

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

            $item_deposit->items()->createMany($request['items']);

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
