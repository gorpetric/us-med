<?php

namespace App\Http\Controllers;

use Auth;
use App\Album;
use Illuminate\Http\Request;
use Image;

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

        notify()->flash('Uspješno kreiranje novog albuma', 'success', [
            'noConfirm' => true,
            'timer' => 2000,
        ]);
    	return redirect()->back();
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

    	Image::make('img/gallery/'.$name)->resize(200, 200)->save('img/gallery/thumbs/' . $name, 60);

    	$image = $album->images()->create([
    		'name' => $name,
    	]);

    	return $image;
    }

    public function getDelete($id)
    {
        $currentAlbum = Album::where('id', $id)->first();
        if(!$currentAlbum || !Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        $images = $currentAlbum->images;
        foreach ($images as $image) {
            unlink(public_path('img/gallery/' . $image->name));
            unlink(public_path('img/gallery/thumbs/' . $image->name));
            $image->delete();
        }
        $currentAlbum->delete();

        notify()->flash('Album uspješno obrisan', 'success', [
            'timer' => 2000,
            'noConfirm' => true,
        ]);
        return redirect()->route('gallery.index');
    }
}
