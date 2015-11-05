<?php

namespace App\Http\Controllers;

use Auth;
use App\News;
use App\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
    	$news = News::orderBy('created_at', 'desc')->get();
    	return view('news.index')->with('news', $news);
    }
}
