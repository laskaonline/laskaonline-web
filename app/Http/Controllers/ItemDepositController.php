<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\ItemDeposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ItemDepositController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            return view('admin.item_deposit');
        } else {
            return view('user.titip-barang');
        }
    }

    public function create()
    {
        return view('user.registrasi-titip-barang');
    }

    public function store(Request $request)
    {
        // $request->dd();

        $request->validate([
            'name_wbp'          => 'required|string',
            'room_block'        => 'required|string',
            'case'              => 'required|string',
            'relationship'      => 'required|string',
            'date_deposit'      => 'required|date',
            'problem'           => 'required|string',
            'photo_visitor'     => 'required|image',
            'family_card'       => 'required|image',
            'items'             => 'required|array',
            'items.*.name'      => 'required|string',
            'items.*.amount'    => 'required|integer|gt:0',
            'items.*.photo'     => 'required|image',
        ]);

        $data['date_deposit']   = date('Y-m-d', strtotime($request->date_deposit));
        $data['photo_visitor']  = $request->file('photo_visitor')->store('item_deposit');
        $data['family_card']    = $request->file('family_card')->store('item_deposit');

        $item_deposit = ItemDeposit::create([
            'name_wbp'          => $request['name_wbp'],
            'room_block'        => $request['room_block'],
            'case'              => $request['case'],
            'relationship'      => $request['relationship'],
            'date_deposit'      => $data['date_deposit'],
            'problem'           => $request['problem'],
            'photo_visitor'     => $data['photo_visitor'],
            'family_card'       => $data['family_card'],
            'state'             => '0',
            'created_by'        => Auth::id(),
        ]);

        $deposit = new Deposit();
        $deposit->name      = $request['name'];
        $deposit->amount    = $request['amount'];
        $deposit->photo     = $request['photo'];

        $item_deposit->items()->createMany($request['items']);

        return redirect()->route('item-deposit.index')->with('success', 'Create Success!');
    }

    public function show($id)
    {
        return view('user.detail-titip-barang');
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
