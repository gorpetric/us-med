<?php

namespace App\Http\Controllers;

use Auth;
use App\Lead;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
    	$leads = Lead::all();
    	return view('lead.index')->with('leads', $leads);
    }
}
