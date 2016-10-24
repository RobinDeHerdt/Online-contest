<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Creation;
use App\User;

class DeelneemController extends Controller
{
    public function index()
    {
    	
    	
        return view('deelnemen');
    }

    public function store(Request $request)
    {
    	$creation = new Creation();

    	$path = $request->image->store('img', 'public');

    	$creation->description  = $request->title;
    	$creation->image_url 	= $path;
    	$creation->user_id 		= Auth::user()->id;

 		$creation->save();

    	return redirect('wedstrijd');
    }
}
