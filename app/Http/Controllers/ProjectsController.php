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
            'image' => 'required|image',
            'body' => 'required',
    	]);

    	if($request->hasFile('image')){
            $image = md5(Carbon::now()) . '.' . $request->file('image')->guessClientExtension();
            $request->file('image')->move('img/projects', $image);
        } else {
            $image = null;
        }

        $slugInit = str_slug($request->input('title'));
        $slugDB = Project::where('slug', $slugInit)->first();
        if($slugDB || $slugInit == 'novi'){
            $slug = $slugInit . '-' . uniqid();
        } else {
            $slug = $slugInit;
        }

        Auth::user()->projects()->create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'slug' => $slug,
            'image' => $image,
        ]);

        notify()->flash('Uspješna objava novog projekta', 'success', [
            'timer' => 2500,
            'noConfirm' => true,
        ]);
        return redirect()->route('projects.index');
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

        notify()->flash('Projekt uspješno uređen', 'success', [
            'timer' => 2000,
            'noConfirm' => true,
        ]);
        return redirect()->back();
    }

    public function getDelete($slug)
    {
        $currentProject = Project::where('slug', $slug)->first();
        if(!$currentProject || !Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        unlink(public_path('img/projects/' . $currentProject->image));
        $currentProject->delete();

        notify()->flash('Projekt uspješno obrisan', 'success', [
            'timer' => 2000,
            'noConfirm' => true,
        ]);
        return redirect()->route('projects.index');
    }
}