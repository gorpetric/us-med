<?php

namespace App\Http\Controllers;

use Auth;
use App\Lead;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
    	$leads = Lead::all();
    	return view('lead.index')->with('leads', $leads);
    }

    public function getDelete($id)
    {
    	$lead = Lead::where('id', $id)->first();
    	if(!Auth::user()->isAdmin() || !$lead){
    		return redirect()->route('home');
    	}
    	if($lead->president || $lead->substitute || $lead->secretary){
    		return redirect()->route('lead.index');	
    	}

    	unlink(public_path('img/udruga/vodstvo/' . $lead->image));
    	$lead->delete();

    	notify()->flash('Uspješno obrisani član vodstva!', 'success', [
            'timer' => 2500,
            'noConfirm' => true,
        ]);
        return redirect()->route('lead.index');
    }

    public function getEdit($id)
    {
    	$lead = Lead::where('id', $id)->first();
    	if(!Auth::user()->isAdmin() || !$lead){
    		return redirect()->route('home');
    	}

    	return view('lead.edit')->with('lead', $lead);
    }
    public function postEdit(Request $request, $id)
    {
    	$lead = Lead::where('id', $id)->first();
    	if(!$lead){
    		return redirect()->route('home');
    	}

    	$this->validate($request, [
    		'first_name' => 'required|alpha|max:20|min:2',
    		'last_name' => 'required|alpha|max:30|min:2',
    		'description' => 'required',
    		'image' => 'image',
    		'facebook' => 'url',
    		'youtube' => 'url',
    		'instagram' => 'url',
    		'twitter' => 'url',
    		'linkedin' => 'url',
    	]);

    	if($request->hasFile('image')){
    		unlink(public_path('img/udruga/vodstvo/' . $lead->image));
            $image = md5(Carbon::now()) . '.' . $request->file('image')->guessClientExtension();
            $request->file('image')->move('img/udruga/vodstvo', $image);
        } else {
            $image = $lead->image;
        }

        $fb = $request->input('facebook') ?: null;
        $yt = $request->input('youtube') ?: null;
        $ig = $request->input('instagram') ?: null;
        $tw = $request->input('twitter') ?: null;
        $li = $request->input('linkedin') ?: null;

        $lead->update([
        	'first_name' => $request->input('first_name'),
    		'last_name' => $request->input('last_name'),
    		'description' => $request->input('description'),
    		'image' => $image,
    		'facebook' => $fb,
    		'youtube' => $yt,
    		'instagram' => $ig,
    		'twitter' => $tw,
    		'linkedin' => $li,
        ]);

        notify()->flash('Uspješno uređeni član vodstva!', 'success', [
            'timer' => 2500,
            'noConfirm' => true,
        ]);
        return redirect()->back();
    }

    public function getNew()
    {
    	if(!Auth::user()->isAdmin()){
    		return redirect()->route('home');
    	}
    	return view('lead.new');
    }
    public function postNew(Request $request)
    {
    	$this->validate($request, [
    		'first_name' => 'required|alpha|max:20|min:2',
    		'last_name' => 'required|alpha|max:30|min:2',
    		'description' => 'required',
    		'image' => 'required|image',
    		'facebook' => 'url',
    		'youtube' => 'url',
    		'instagram' => 'url',
    		'twitter' => 'url',
    		'linkedin' => 'url',
    	]);

    	$image = md5(Carbon::now()) . '.' . $request->file('image')->guessClientExtension();
        $request->file('image')->move('img/udruga/vodstvo', $image);

    	$fb = $request->input('facebook') ?: null;
        $yt = $request->input('youtube') ?: null;
        $ig = $request->input('instagram') ?: null;
        $tw = $request->input('twitter') ?: null;
        $li = $request->input('linkedin') ?: null;

        Lead::create([
        	'first_name' => $request->input('first_name'),
    		'last_name' => $request->input('last_name'),
    		'description' => $request->input('description'),
    		'image' => $image,
    		'facebook' => $fb,
    		'youtube' => $yt,
    		'instagram' => $ig,
    		'twitter' => $tw,
    		'linkedin' => $li,
        ]);

        notify()->flash('Uspješno kreirani novi član vodstva!', 'success', [
            'timer' => 2500,
            'noConfirm' => true,
        ]);
        return redirect()->route('lead.index');
    }
}
