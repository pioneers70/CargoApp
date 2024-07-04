<?php

namespace App\Http\Controllers;

use App\Models\User;

class MainPageController extends Controller
{
    public function index()
    {
        $users = User::with('operations')->get();

        return view('mainpage.index', compact('users'));
    }
}
