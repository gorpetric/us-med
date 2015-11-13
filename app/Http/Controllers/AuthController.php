<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getLogin()
    {
    	return view('auth.login');
    }

    public function postLogin(Request $request)
    {
    	$this->validate($request, [
    		'username' => 'required',
    		'password' => 'required',
    	]);

    	if(!Auth::attempt($request->only(['username', 'password'])))
    	{
    		notify()->flash('Pogrešni korisnički podaci', 'error', [
                'timer' => 3000,
                'noConfirm' => true,
            ]);
            return redirect()->back();
    	}

        notify()->flash('Uspješna prijava', 'success', [
            'timer' => 2000,
            'noConfirm' => true,
        ]);
    	return redirect()->route('home');
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect()->route('home');
    }
}
