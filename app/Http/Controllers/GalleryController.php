<?php

namespace App\Http\Controllers;

use Auth;
use App\Album;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
    	$albums = Album::orderBy('created_at', 'desc')->get();
    	return view('gallery.index')->with('albums', $albums);
    }

    public function postNewAlbum(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|unique:albums|min:3|max:50'
    	]);

    	Auth::user()->albums()->create([
    		'title' => $request->input('title'),
    	]);

    	return redirect()->back()->with('info', 'Uspješno kreiranje novog albuma.');
    }

    public function getAlbum($id)
    {
    	$album = Album::where('id', $id)->first();
    	if(!$album){
    		return redirect()->route('home');
    	}
    	return view('gallery.album')->with('album', $album);
    }
}
