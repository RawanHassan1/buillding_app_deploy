<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CustomAuthController extends Controller
{
    //
    public function login()
    {
        $user = User::first(2);

        Auth::login($user);

        return redirect('/services');
    }

    public function Customlogin($id)
    {
        $user = User::find($id);
        if(! $user)
        {
            Auth::logout();
            return redirect('login');

        }

        Auth::login($user);

        return redirect('/services');
    }
}
