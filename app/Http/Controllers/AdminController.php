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

    	dd("Validacija prošla! Unos trenutno onemogućen.");
    }
}
