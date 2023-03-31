<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWartelsuspasRequest;
use App\Models\Wartelsuspas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WartelsuspasController extends Controller
{
    public function index()
    {
        $data = [
            'dataWartelsuspas'   => Wartelsuspas::orderBy('created_at', 'desc')->get()
        ];
        return view('admin.wartelsuspas', $data);
    }

    public function create()
    {
        return view('admin.add_wartelsuspas');
    }

    public function store(StoreWartelsuspasRequest $request)
    {
        $name_wbp           = $request->name_wbp;
        $bin_wbp            = $request->bin_wbp;
        $block_and_room     = $request->block_and_room;
        $destination_phone  = $request->destination_phone;
        $relationship       = $request->relationship;
        $address            = $request->address;
        $information        = $request->information;
        $create_by          = auth()->user()->id;

        $data = new Wartelsuspas();
        $data->name_wbp             = $name_wbp;
        $data->bin_wbp              = $bin_wbp;
        $data->block_and_room       = $block_and_room;
        $data->destination_phone    = $destination_phone;
        $data->relationship         = $relationship;
        $data->address              = $address;
        $data->information          = $information;
        $data->created_by           = $create_by;

        $data->save();

        return redirect()->route('admin.wartelsuspas.index')->with('message', 'Wartelsuspas berhasil dibuat');
    }

    public function show(Wartelsuspas $wartelsuspas)
    {
        if (Auth()->user()->hasAnyRole(['admin', 'superior'])) {
            $wartelSuspasData = Wartelsuspas::with('user')->find($wartelsuspas->id);
            $userData = $wartelSuspasData->user;
            return view('admin.detail_wartelsuspas', ['wartelSuspasData' => $wartelSuspasData, 'userData' => $userData]);
        }
    }

    public function edit(Wartelsuspas $wartelsuspas)
    {
    }

    public function update(Request $request, Wartelsuspas $wartelsuspas)
    {
    }

    public function destroy(Wartelsuspas $wartelsuspas)
    {
    }

    public function filterByDate(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date   = $request->input('end_date');

        $filteredData = Wartelsuspas::whereBetween('created_at', [
            Carbon::parse($start_date)->startOfDay(),
            Carbon::parse($end_date)->endOfDay(),
        ])->get();

        return view('admin.filter_wartelsuspas', ['data' => $filteredData]);
    }
}
