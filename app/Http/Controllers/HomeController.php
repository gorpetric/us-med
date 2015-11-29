<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use App\News;
use App\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$news = News::orderBy('created_at', 'desc')->take(4)->get();
    	$projects = Project::orderBy('created_at', 'desc')->take(4)->get();
        return view('home')->with([
        	'news' => $news,
        	'projects' => $projects,
        ]);
    }

    public function getVodstvo()
    {
    	return view('pages.vodstvo');
    }

    public function getPovijest()
    {
    	return view('pages.povijest');
    }

    public function getStatut()
    {
    	return view('pages.statut');
    }

    public function getKontakt()
    {
    	return view('pages.kontakt');
    }

    public function getPartners()
    {
        return view('pages.partners');
    }

    public function getBecomeMember()
    {
        return view('pages.becomemember');
    }

    public function postBecomeMember(Request $request)
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

        dd("Validation OK!");
    }
}
