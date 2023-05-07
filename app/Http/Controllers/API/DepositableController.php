<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Models\Appointment;
use App\Models\ItemDeposit;
use Illuminate\Http\Request;

class DepositableController extends Controller
{
    function __invoke(StoreItemRequest $request)
    {
        if ($request->depositable_type == 'App\Models\ItemDeposit') {
            $data = $this->storeItemOfItemDeposit($request);
        } else if ($request->depositable_type == 'App\Models\Appointment') {
            $data = $this->storeItemOfAppointment($request);
        }

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }

    private function storeItemOfItemDeposit(Request $request)
    {
        $itemDeposit = ItemDeposit::find($request->depositable_id);
        return $itemDeposit->items()->create([
            'name'   => $request->name,
            'amount' => $request->amount,
            'photo'  => $request->file('photo')->store('item_deposit')
        ]);
    }

    private function storeItemOfAppointment(Request $request)
    {
        $appointment = Appointment::find($request->depositable_id);
        return $appointment->items()->create([
            'name'   => $request->name,
            'amount' => $request->amount,
            'photo'  => $request->file('photo')->store('item_deposit')
        ]);
    }
}
