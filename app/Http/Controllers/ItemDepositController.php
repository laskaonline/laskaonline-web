<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemDepositRequest;
use App\Models\Deposit;
use App\Models\ItemDeposit;
use App\Models\ItemDepositApprove;
use Carbon\Carbon;
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
        $data['deposit_date']   = date('Y-m-d', strtotime($request->deposit_date));
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
                'deposit_date'  => $data['deposit_date'],
                'photo_visitor' => $data['photo_visitor'],
                'family_card'   => $data['family_card'],
                'state'         => '0',
            ]);

            $itemArray = collect($request->items)->map(function ($item) {
                $photo_path = Storage::putFile('item_deposit', $item['photo']);

                return [
                    'name' => $item['name'],
                    'amount' => $item['amount'],
                    'photo' => $photo_path
                ];
            });

            $item_deposit->items()->createMany($itemArray);

            // Create Transaction for Item Deposit
            $item_deposit->transaction()->create();

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

            $data = [
                'dataApproveItemDeposit'   => ItemDepositApprove::with('user')->where('item_deposit_id', $item_deposit->id)->orderBy('created_at', 'ASC')->get()
            ];

            return view('admin.detail_item_deposit', $data, compact('item_deposit'));
        }
        $data = [
            'dataApproveItemDeposit'   => ItemDepositApprove::with('user')->where('item_deposit_id', $item_deposit->id)->orderBy('created_at', 'ASC')->get()
        ];
        return view('user.detail-titip-barang', $data, compact('item_deposit'));
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

    public function filterByDate(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date   = $request->input('end_date');

        $filteredData = ItemDeposit::whereBetween('created_at', [
            Carbon::parse($start_date)->startOfDay(),
            Carbon::parse($end_date)->endOfDay(),
        ])->get();

        return view('admin.filter_item_deposit', ['data' => $filteredData]);
    }
}
