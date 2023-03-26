<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemDepositRequest;
use App\Models\Deposit;
use App\Models\ItemDeposit;
use Exception;
use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ItemDepositController extends Controller
{
    public function index()
    {


        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {
            $data = [
                'dataItemDeposit'   => ItemDeposit::orderBy('created_at', 'desc')->get()
            ];
            return view('admin.item_deposit', $data);
        } else {
            $data = [
                'dataItemDeposit'   => ItemDeposit::where('created_by', Auth::id())->orderBy('created_at', 'desc')->get()
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
        // $request->dd();

        $data['date_deposit']   = date('Y-m-d', strtotime($request->date_deposit));
        $data['photo_visitor']  = $request->file('photo_visitor')->store('photo_visitor');
        $data['family_card']    = $request->file('family_card')->store('family_card');

        DB::beginTransaction();

        try {
            $item_deposit       = auth()->user()->deposits()->create([
                'name_wbp'      => $request['name_wbp'],
                'room_block'    => $request['room_block'],
                'case'          => $request['case'],
                'relationship'  => $request['relationship'],
                'problem'       => $request['problem'],
                'date_deposit'  => $data['date_deposit'],
                'photo_visitor' => $data['photo_visitor'],
                'family_card'   => $data['family_card'],
                'state'         => '0',
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

            DB::commit();

            return redirect()->route('item-deposit.show', ['item_deposit' => $item_deposit])->with('success', 'Penitipan Barang berhasil didaftarkan');
        } catch (Throwable $th) {
            DB::rollBack();

            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function show(ItemDeposit $item_deposit)
    {
        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {
            return view('admin.detail_item_deposit', compact('item_deposit'));
        }
        return view('user.detail-titip-barang', compact('item_deposit'));
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
