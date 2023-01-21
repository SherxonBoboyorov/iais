<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect('/');
        }

        return false;
    }
}
