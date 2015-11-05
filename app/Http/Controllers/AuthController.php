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
    		return redirect()->back()->with('info', 'Pogrešni korisnički podaci!');
    	}

    	return redirect()->route('home')->with('info', 'Uspješna prijava!');
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect()->route('home');
    }
}
