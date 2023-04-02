<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\GuestBook;
use App\Models\ItemDeposit;
use App\Models\Wartelsuspas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {

            // Query Data
            $data_appointment       = Appointment::where('visit_date', Carbon::now()->toDateString())->orderBy('created_at', 'desc')->get();
            $data_item_deposit      = ItemDeposit::where('deposit_date', Carbon::now()->toDateString())->orderBy('created_at', 'desc')->get();

            // Count Data All
            $count_appointment      = Appointment::get()->count();
            $count_item_deposit     = ItemDeposit::get()->count();
            $count_wartelsuspas     = Wartelsuspas::get()->count();
            $count_guest_book       = GuestBook::get()->count();

            // Count Data by Date
            $count_date_appointment      = Appointment::where('visit_date', Carbon::now()->toDateString())->get()->count();
            $count_date_item_deposit     = ItemDeposit::where('deposit_date', Carbon::now()->toDateString())->get()->count();
            $count_date_wartelsuspas     = Wartelsuspas::whereDate('created_at', '>=', now()->toDateString())->get()->count();
            $count_date_guest_book       = GuestBook::whereDate('created_at', '>=', now()->toDateString())->get()->count();

            return view('admin.dashboard', compact(
                'count_appointment',
                'count_item_deposit',
                'count_wartelsuspas',
                'count_guest_book',

                'count_date_appointment',
                'count_date_item_deposit',
                'count_date_wartelsuspas',
                'count_date_guest_book',

                'data_appointment',
                'data_item_deposit',
            ));
        }
        // Query Data
        $data_item_deposit      = ItemDeposit::where('deposit_date', Carbon::now()->toDateString())->where('created_by', Auth::id())->orderBy('created_at', 'desc')->get();
        $data_appointment       = Appointment::where('visit_date', Carbon::now()->toDateString())->where('created_by', Auth::id())->orderBy('created_at', 'desc')->get();

        // Count Data
        $count_item_deposit     = ItemDeposit::where('created_by', Auth::id())->get()->count();
        $count_appointment      = Appointment::where('created_by', Auth::id())->get()->count();

        return view('user.dashboard', compact('count_item_deposit', 'count_appointment', 'data_item_deposit', 'data_appointment'));
    }
}
