<?php

namespace App\Http\Controllers\CargoAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function save(Request $request)
    {
        if (Auth::check()) {
            return redirect(route('user.mainpage'));
        }
        $validateForms = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if (User::were('email', $validateForms['email'])->exists()) {
            return redirect(route('user.registration'))->withErrors([
                'email' => 'Пользователь с таким email уже зарегистрирован',
            ]);
        }
        $user = User::create($validateForms);
        if ($user) {
            Auth::login($user);

            return redirect(route('user.mainpage'));
        }

        return redirect(route('user.login'))->withErrors([
            'formError' => 'Произошла ошибка при регистрации пользователя',
        ]);
    }
}
