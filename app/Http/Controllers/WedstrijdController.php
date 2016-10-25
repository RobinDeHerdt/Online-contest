<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


use Response;
use App\Http\Requests;
use App\Creation;
use App\Vote;
use Auth;
// use App\Input;

class WedstrijdController extends Controller
{
    public function index()
    {
    	$creations  = Creation::all();
        $votes = Vote::all();

        return view('wedstrijd', ['creations' => $creations],['votes' => $votes]);
    }

    public function store(Request $request)
    {
        $creation_id = $request['creation_id'];

        //$votes = Creation::find($creation_id);
        
        $vote = new Vote();

        $vote->user_id      = Auth::user()->id;
        $vote->creation_id  = $creation_id;

        $vote->save();
    }
}
