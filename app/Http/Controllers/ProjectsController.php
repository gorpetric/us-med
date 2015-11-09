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
    	
    	if(!$project->count()){
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
    public function postNewProject()
    {
    	dd("Posted!");
    }

    public function getEdit($slug)
    {
        $project = Project::where('slug', $slug)->first();

        if(!$project->count()){
            return redirect()->route('home');
        }

        if(!Auth::user()->isAdmin()){
            return redirect()->route('home');
        }

        return view('projects.edit')->with('project', $project);
    }
    public function postEdit()
    {
    	dd("Posted!");
    }
}
