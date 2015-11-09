<?php

namespace App\Http\Controllers;

use Auth;
use App\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
    	$projects = Project::orderBy('created_at', 'desc')->get();
    	return view('projects.index')->with('projects', $projects);
    }

    public function getProject($slug)
    {
    	$project = Project::where('slug', $slug)->first();
    	
    	if(!$project){
    		return redirect()->route('home');
    	}
    	return view('projects.project')->with('project', $project);
    }

    public function getNewProject()
    {
        if(!Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        return view('projects.new');
    }
    public function postNewProject(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required',
            'slug' => 'required|unique:projects|alpha_dash',
            'image' => 'image',
            'body' => 'required',
    	]);

    	if($request->hasFile('image')){
            $image = md5(Carbon::now()) . '.' . $request->file('image')->guessClientExtension();
            $request->file('image')->move('img/projects', $image);
        } else {
            $image = null;
        }

        Auth::user()->projects()->create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'slug' => $request->input('slug'),
            'image' => $image,
        ]);

        return redirect()->route('projects.index')->with('info', 'Uspješna objava novog projekta!');
    }

    public function getEdit($slug)
    {
        $project = Project::where('slug', $slug)->first();

        if(!$project){
            return redirect()->route('home');
        }

        if(!Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        return view('projects.edit')->with('project', $project);
    }
    public function postEdit($slug, Request $request)
    {
    	$project = Project::where('slug', $slug)->first();

    	if(!$project){
    		return redirect()->route('home');
    	}

    	$this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        Project::where('id', $project->id)->update([
        	'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);

        return redirect()->back()->with('info', 'Projekt uspješno uređen!');
    }
}
