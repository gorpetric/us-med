<?php

namespace App\Http\Controllers;

use Auth;
use App\Album;
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

    public function postInsertImages($id, Request $request)
    {
    	$album = Album::where('id', $id)->first();
    	if(!$album){
    		return redirect()->route('home');
    	}
    	$this->validate($request, [
    		'file' => 'required|image'
    	]);

    	$name = uniqid() . '.' . $request->file('file')->guessClientExtension();

    	$request->file('file')->move('img/gallery', $name);

    	$image = $album->images()->create([
    		'name' => $name,
    	]);

    	return $image;
    }
}
