<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers, ThrottlesLogins;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath()
    {
        if (Auth::user()->hasAnyRole(['admin', 'superior'])) {
            return route('admin.dashboard');
        } else {
            return route('dashboard');
        }
    }

    public function username()
    {
        return 'phone';
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
