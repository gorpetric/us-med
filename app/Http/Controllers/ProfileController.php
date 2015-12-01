<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
    	return view('profile.index');
    }

    public function getEdit()
    {
    	return view('profile.edit');
    }
    public function postEdit(Request $request)
    {
    	$this->validate($request, [
			'first_name' => 'required|alpha|max:20|min:2',
			'last_name' => 'required|alpha|max:30|min:2',
            'birthday' => 'required|date',
            'oib' => 'required|numeric',
            'faculty' => 'required',
            'course' => 'required',
            'year' => 'required|numeric',
		]);

		Auth::user()->update([
			'first_name' => $request->input('first_name'),
			'last_name' => $request->input('last_name'),
            'birthday' => $request->input('birthday'),
            'oib' => $request->input('oib'),
            'faculty' => $request->input('faculty'),
            'course' => $request->input('course'),
            'year' => $request->input('year'),
		]);

		notify()->flash('Račun uspješno uređen', 'success', [
            'timer' => 2000,
            'noConfirm' => true,
        ]);
		return redirect()->route('profile.index');
    }

    public function getChangePwd()
    {
    	return view('profile.changepwd');
    }
    public function postChangePwd(Request $request)
    {
    	$this->validate($request, [
    		'old_pwd' => 'required',
    		'new_pwd' => 'required|min:8',
    		'new_pwd_repeat' => 'required|same:new_pwd',
    	]);

    	if(!password_verify($request->input('old_pwd'), Auth::user()->password)){
    		notify()->flash('Pogrešna stara lozinka', 'error', [
            	'timer' => 2000,
            	'noConfirm' => true,
        	]);
    		return redirect()->back();
    	}

    	Auth::user()->update([
    		'password' => bcrypt($request->input('new_pwd')),
    	]);

    	notify()->flash('Uspješna promjena lozinke', 'success', [
            'timer' => 2000,
            'noConfirm' => true,
        ]);
		return redirect()->route('profile.index');
    }
}
