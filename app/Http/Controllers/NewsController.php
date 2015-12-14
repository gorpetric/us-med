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
            'image' => 'required|image',
            'body' => 'required',
        ]);

        if($request->hasFile('image')){
            $image = md5(Carbon::now()) . '.' . $request->file('image')->guessClientExtension();
            $request->file('image')->move('img/news', $image);
        } else {
            $image = null;
        }

        $slugInit = str_slug($request->input('title'));
        $slugDB = News::where('slug', $slugInit)->first();
        if($slugDB || $slugInit == 'nova'){
            $slug = $slugInit . '-' . uniqid();
        } else {
            $slug = $slugInit;
        }
        
        Auth::user()->news()->create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'slug' => $slug,
            'image' => $image,
        ]);

        notify()->flash('Uspješna objava nove vijesti', 'success', [
            'timer' => 2500,
            'noConfirm' => true,
        ]);
        return redirect()->route('news.index');
    }

    public function getEdit($slug)
    {
        $story = News::where('slug', $slug)->first();

        if(!$story){
            return redirect()->route('home');
        }

        if(!Auth::user()->isAdmin()){
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
            'image' => 'image',
        ]);

        if($request->hasFile('image')){
            unlink(public_path('img/news/' . $story->image));
            $image = md5(Carbon::now()) . '.' . $request->file('image')->guessClientExtension();
            $request->file('image')->move('img/news', $image);
        } else {
            $image = $story->image;
        }

        News::where('id', $story->id)->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'image' => $image,
        ]);

        notify()->flash('Vijest uspješno uređena', 'success', [
            'timer' => 2000,
            'noConfirm' => true,
        ]);
        return redirect()->back();
    }

    public function getDelete($slug)
    {
        $currentStory = News::where('slug', $slug)->first();
        if(!$currentStory || !Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        unlink(public_path('img/news/' . $currentStory->image));
        $currentStory->delete();

        notify()->flash('Vijest uspješno obrisana', 'success', [
            'timer' => 2000,
            'noConfirm' => true,
        ]);
        return redirect()->route('news.index');
    }
}
