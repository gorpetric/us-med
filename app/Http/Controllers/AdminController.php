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
            'active',
            'admin',
        ];


        if($order){
            if(in_array($order, $allowedOrder)){
                if($order == 'created_at' || $order == 'active' || $order == 'admin'){
                    $users = User::orderBy($order, 'desc')->orderBy('last_name')->get();
                } else {
                    $users = User::orderBy($order)->orderBy('last_name')->get();
                }
            } else {
                return redirect()->back();
            }
        } else {
            $users = User::orderBy('last_name')->get();
        }
        return view('admin.members')->with('users', $users);
    }

    public function getEditMember($id)
    {
        if(!Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        $user = User::where('id', $id)->first();
        if(!$user || $user->isAdmin()){
            return redirect()->back();
        }

        return view('admin.editmember')->with('user', $user);
    }
    public function postEditMember($id, Request $request)
    {
        $user = User::where('id', $id)->first();
        if(!$user || $user->isAdmin()){
            return redirect()->back();
        }

        $this->validate($request, [
            'first_name' => 'required|max:20|min:2',
            'last_name' => 'required|max:30|min:2',
            'birthday' => 'required|date',
            'oib' => 'required|numeric',
            'faculty' => 'required',
            'course' => 'required',
            'year' => 'required|numeric',
        ]);

        User::where('id', $user->id)->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'birthday' => $request->input('birthday'),
            'oib' => $request->input('oib'),
            'faculty' => $request->input('faculty'),
            'course' => $request->input('course'),
            'year' => $request->input('year')
        ]);

        notify()->flash('Podaci člana uspješno uređeni!', 'success', [
            'timer' => 3500,
            'noConfirm' => true,
        ]);
        return redirect()->route('admin.members');
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

        notify()->flash('Uspješno obrisani član '.$user->getFullName().'!', 'success', [
            'timer' => 3500,
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

        notify()->flash('Stanje članstva za člana '.$user->getFullName().' uspješno promijenjeno!', 'success', [
            'timer' => 3500,
            'noConfirm' => true,
        ]);
        return redirect()->back();
    }

    public function getNewAdmin($id)
    {
        if(!Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        $user = User::where('id', $id)->first();
        if(!$user || $user->isAdmin()){
            return redirect()->back();
        }

        if($user->username && $user->password){
            $user->update([
                'admin' => 1
            ]);
            notify()->flash('Član '.$user->getFullName().' je novi administrator!', 'success', [
                'timer' => 3000,
                'noConfirm' => true,
            ]);
            return redirect()->route('admin.members');
        }

        return view('admin.newadmin')->with('user', $user);
    }
    public function postNewAdmin(Request $request, $id)
    {
        if(!Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        $this->validate($request, [
            'username' => 'required|alpha_dash|min:2|max:20|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = User::where('id', $id)->first();

        $user->update([
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
            'admin' => 1,
        ]);

        notify()->flash('Član '.$user->getFullName().' je novi administrator!', 'success', [
            'timer' => 3000,
            'noConfirm' => true,
        ]);
        return redirect()->route('admin.members');
    }

    public function getRemoveAdmin($id)
    {
        if(!Auth::user()->isMasterAdmin()){
            return redirect()->route('home');
        }

        $user = User::where('id', $id)->first();
        if(!$user || !$user->isAdmin() || $user->isMasterAdmin()){
            return redirect()->back();
        }

        $user->update([
            'admin' => 0
        ]);

        notify()->flash('Član '.$user->getFullName().' više nije administrator!', 'success', [
            'timer' => 3500,
            'noConfirm' => true,
        ]);
        return redirect()->back();
    }
}