<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;


class AuthController extends Controller
{
    //
    public function login()
    {
       if (!\Auth::check()) {
         return view('auth.login');
       } else {
         return redirect(route('customers'));
       }
       
    }

    public function login_process(LoginRequest $request)
    {
        $data = $request->validated();

        if (\Auth::attempt($data)) {
            return redirect()->route('customers');
        } else {
           return redirect()->route('login')->withErrors(['login_error' => 'Login error !!!']);
        }
    }

    public function logout()
    {
        \Auth::logout();
        return redirect()->route('login');
    }

}
