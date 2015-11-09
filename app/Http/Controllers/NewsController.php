<?php

namespace App\Http\Controllers;

use Auth;
use App\News;
use App\User;
use Carbon\Carbon;
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
    	$story = News::where('slug', $slug)->first();
    	
    	if(!$story){
    		return redirect()->route('home');
    	}

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
            'slug' => 'required|unique:news|alpha_dash',
            'image' => 'image',
            'body' => 'required',
        ]);

        if($request->hasFile('image')){
            $image = md5(Carbon::now()) . '.' . $request->file('image')->guessClientExtension();
            $request->file('image')->move('img/news', $image);
        } else {
            $image = null;
        }
        
        Auth::user()->news()->create([
            'title' => $request->input('title'),
            'body' => $this->scriptEscape($request->input('body')),
            'slug' => $request->input('slug'),
            'image' => $image,
        ]);

        return redirect()->route('news.index')->with('info', 'Uspješna objava nove vijesti!');
    }

    public function getEdit($slug)
    {
        $story = News::where('slug', $slug)->first();

        if(!$story){
            return redirect()->route('home');
        }

        if(Auth::user()->id !== $story->user_id){
            return redirect()->route('home');
        }

        return view('news.edit')->with('story', $story);
    }

    public function postEdit($slug, Request $request)
    {
        $story = News::where('slug', $slug)->first();
        if(!$story){
            return redirect()->route('home');
        }

        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        Auth::user()->news()->where('id', $story->id)->update([
            'title' => $request->input('title'),
            'body' => $this->scriptEscape($request->input('body')),
        ]);

        return redirect()->back()->with('info', 'Vijest uspješno uređena!');
    }

    private function scriptEscape($input)
    {
        return $input;
        //return preg_replace('#<script(.*?)>(.*?)</script>#is', "```\n" . '$2' . "\n```", $input);
    }
}
