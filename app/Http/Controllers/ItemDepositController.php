<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemDepositRequest;
use App\Models\Deposit;
use App\Models\ItemDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;

class ItemDepositController extends Controller
{
    public function index()
    {


        if (auth()->user()->hasRole('admin')) {
            $data = [
                'dataItemDeposit'   => ItemDeposit::all()
            ];
            return view('admin.item_deposit', $data);
        } else {
            $data = [
                'dataItemDeposit'   => ItemDeposit::where('created_by', Auth::id())->get()
            ];
            return view('user.titip-barang', $data);
        }
    }

    public function create()
    {
        return view('user.registrasi-titip-barang');
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

            return redirect()->route('item-deposit.show', ['id' => $item_deposit->id])->with('success', 'Create Success!');
        });
    }

    public function show($id)
    {
        $item_deposit = ItemDeposit::find($id);

        $data_item_deposit = [
            'id'                => $item_deposit->id,
            'name_wbp'          => $item_deposit->name_wbp,
            'room_block'        => $item_deposit->room_block,
            'case'              => $item_deposit->case,
            'relationship'      => $item_deposit->relationship,
            'date_deposit'      => $item_deposit->date_deposit,
            'problem'           => $item_deposit->problem,
            'photo_visitor'     => $item_deposit->photo_visitor,
            'family_card'       => $item_deposit->family_card,
        ];

        $data_deposit = [
            'dataDeposit'   => Deposit::where('depositable_id', $item_deposit->id)->get()
        ];



        return view('user.detail-titip-barang', $data_item_deposit, $data_deposit);
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
