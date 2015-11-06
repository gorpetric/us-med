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

    public function getStory($slug)
    {
    	$story = News::where('slug', $slug)->get();
    	
    	if(!$story->count()){
    		return redirect()->route('home');
    	}
    	$story=$story[0];
    	return view('news.story')->with('story', $story);
    }

    public function getNewStory()
    {
        if(!Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        return view('news.new');
    }
    public function postNewStory(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
        ]);
        dd($request);
    }
}
