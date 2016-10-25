<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Creation;

class WedstrijdController extends Controller
{
    public function index()
    {
    	$creations  = Creation::all();

        return view('wedstrijd')->with('creations', $creations);
    }
}
