<?php

namespace App\Http\Controllers;

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
}
