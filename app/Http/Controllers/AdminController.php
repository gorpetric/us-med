<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
    	if(!Auth::user()->isAdmin()){
    		return redirect()->route('home');
    	}

    	return view('admin.index');
    }

    public function getNewMember()
    {
    	if(!Auth::user()->isAdmin()){
    		return redirect()->route('home');
    	}

    	return view('admin.newmember');
    }
    public function postNewMember(Request $request)
    {
    	$this->validate($request, [
    		'first_name' => 'required|max:20|min:2',
    		'last_name' => 'required|max:30|min:2',
    		'birthday' => 'required|date',
    		'oib' => 'required|numeric',
    		'faculty' => 'required',
    		'course' => 'required',
    		'year' => 'required|numeric',
    		'email' => 'required|email',
    	]);

    	User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'birthday' => $request->input('birthday'),
            'oib' => $request->input('oib'),
            'faculty' => $request->input('faculty'),
            'course' => $request->input('course'),
            'year' => $request->input('year'),
            'email' => $request->input('email'),
            'inserted_by_admin' => 1
        ]);

        notify()->flash('Novi član uspješno kreirani!', 'success', [
            'timer' => 2500,
            'noConfirm' => true,
        ]);
        return redirect()->route('admin.index');
    }

    public function getMembers()
    {
        if(!Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        $users = User::orderBy('last_name')->get();
        return view('admin.members')->with('users', $users);
    }
}