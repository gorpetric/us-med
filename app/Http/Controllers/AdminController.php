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
    		'email' => 'required|email|unique:users',
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

    public function getMembers($order = null)
    {
        if(!Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        $allowedOrder = [
            'created_at',
            'first_name',
            'last_name',
            'birthday',
            'year',
            'active'
        ];


        if($order){
            if(in_array($order, $allowedOrder)){
                if($order == 'created_at' || $order == 'active'){
                    $users = User::orderBy($order, 'desc')->get();
                } else {
                    $users = User::orderBy($order)->get();
                }
            } else {
                return redirect()->back();
            }
        } else {
            $users = User::orderBy('last_name')->get();
        }
        return view('admin.members')->with('users', $users);
    }

    public function getDeleteMember($id)
    {
        if(!Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        $user = User::where('id', $id)->first();
        if(!$user || $user->isAdmin()){
            return redirect()->back();
        }

        $user->delete();

        notify()->flash('Uspješno obrisani korisnik!', 'success', [
            'timer' => 2500,
            'noConfirm' => true,
        ]);
        return redirect()->back();
    }

    public function getChangeActive($id)
    {
        if(!Auth::user()->isAdmin()){
            return redirect()->route('home');
        }
        
        $user = User::where('id', $id)->first();
        if(!$user || $user->isAdmin()){
            return redirect()->back();
        }

        if($user->active){
            $user->update([
                'active' => 0
            ]);
        } else {
            $user->update([
                'active' => 1
            ]);
        }

        notify()->flash('Stanje članstva uspješno promijenjeno!', 'success', [
            'timer' => 2500,
            'noConfirm' => true,
        ]);
        return redirect()->back();
    }

    public function getAdmins($order = null)
    {
        if(!Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        $allowedOrder = [
            'created_at',
            'first_name',
            'last_name',
            'username',
        ];

        if($order){
            if(in_array($order, $allowedOrder)){
                if($order == 'created_at'){
                    $users = User::where('admin', 1)->where('master_admin', 0)->orderBy($order, 'desc')->get();
                } else {
                    $users = User::where('admin', 1)->where('master_admin', 0)->orderBy($order)->get();
                }
            } else {
                return redirect()->back();
            }
        } else {
            $users = User::where('admin', 1)->where('master_admin', 0)->orderBy('last_name')->get();
        }

        return view('admin.admins')->with('users', $users);
    }

    public function getNewAdmin()
    {
        if(!Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        $users = User::where('admin', 0)->orderBy('last_name')->get();

        return view('admin.newadmin')->with('users', $users);
    }
    public function postNewAdmin(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required_with:last_name|max:20|min:2',
            'last_name' => 'required_with:first_name|max:30|min:2',
            'username' => 'required|alpha_dash|unique:users',
            'password' => 'required|min:8',
            'member' => 'numeric',
        ]);

        if($request->has('first_name') && $request->has('last_name')){
            if($request->has('member')){
                return redirect()->back();
            } else {
                // Insert new admin user
                User::create([
                    'username' => $request->input('username'),
                    'password' => bcrypt($request->input('password')),
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'admin' => 1,
                ]);

                notify()->flash('Uspješno kreirani novi administrator!', 'success', [
                    'timer' => 2500,
                    'noConfirm' => true,
                ]);
                return redirect()->route('admin.admins');
            }
        }
        else if($request->has('member')){
            if($request->has('first_name') || $request->has('last_name')){
                return redirect()->back();
            } else {
                // Update exsisting user to admin
                $user = User::where('id', $request->input('member'))->first();
                if(!$user){
                    return redirect()->back();
                }
                $user->update([
                    'username' => $request->input('username'),
                    'password' => bcrypt($request->input('password')),
                    'admin' => 1,
                ]);

                notify()->flash('Uspješno kreirani novi administrator!', 'success', [
                    'timer' => 2500,
                    'noConfirm' => true,
                ]);
                return redirect()->route('admin.admins');
            }
        }
        else {
            return redirect()->back();
        }
    }
}