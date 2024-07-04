<?php

namespace App\Http\Controllers\CargoAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        if (Auth::check()) {
            return redirect()->intended(route('user.mainpage'));
        }

        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            return redirect()->intended(route('user.mainpage'));
        }

        return redirect(route('user.login'))->withErrors([
            'email' => 'Не удалось авторизоваться ']);
    }
}
