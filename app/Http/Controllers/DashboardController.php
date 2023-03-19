<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\ItemDeposit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {

            return view('admin.dashboard');
        }
        // Query Data
        $data_item_deposit      = ItemDeposit::where('date_deposit', Carbon::now()->toDateString())->where('created_by', Auth::id())->orderBy('created_at', 'desc')->get();
        $data_appointment       = Appointment::where('visit_date', Carbon::now()->toDateString())->where('created_by', Auth::id())->orderBy('created_at', 'desc')->get();

        // Count Data
        $count_item_deposit     = ItemDeposit::where('created_by', Auth::id())->orderBy('created_at', 'desc')->get()->count();
        $count_appointment      = Appointment::where('created_by', Auth::id())->orderBy('created_at', 'desc')->get()->count();

        return view('user.dashboard', compact('count_item_deposit', 'count_appointment', 'data_item_deposit', 'data_appointment'));
    }
}
