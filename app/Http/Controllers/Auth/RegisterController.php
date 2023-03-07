<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected string $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $request
     * @return Validator
     */
    protected function validator(array $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'no_ktp' => ['required', 'string', 'between:16,17'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'starts_with:08,+62'],
            'password' => ['required', 'confirmed', Password::min(8)->uncompromised(3)],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Request $request
     * @return User
     */
    protected function create(Request $request)
    {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'no_ktp' => $request['no_ktp'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),
        ]);
    }

    protected function registered(Request $request, $user)
    {
        $user->assignRole('visitor');

        return redirect($this->redirectPath());
    }
}
