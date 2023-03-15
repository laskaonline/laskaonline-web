<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function __invoke()
    {
        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {
            return view('admin.dashboard');
        }

        return view('user.dashboard');
    }
}
