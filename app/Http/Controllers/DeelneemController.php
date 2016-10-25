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
    	$user_id = Auth::user()->id;
    	$creation = new Creation();
   
  		if (Creation::where('user_id', '=', $user_id)->exists())
  		{
  			$usercreations = Creation::where('user_id', '=', $user_id)->get();

  			// Get current date + periods and check if user has already submitted this period
  			
  			dd('there is already a record with your name on it' . $usercreations);
  		}
  		else 
  		{
  			$path = $request->image->store('img/creaties', 'upload');

	    	$creation->description  = $request->title;
	    	$creation->image_url 	= $path;
	    	$creation->user_id 		= $user_id;

	 		$creation->save();

	    	return redirect('wedstrijd');
  		} 	
    }
}
