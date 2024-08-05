<?php

namespace App\Http\Controllers\CargoAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function save(StoreRegistrationRequest $request)
    {
        if (Auth::check()) {
            return redirect(route('user.mainpage'));
        }
        $validateForms = $request->validated();
        if (User::where('email', $validateForms['email'])->exists()) {
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
