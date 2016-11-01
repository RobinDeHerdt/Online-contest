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
      $this->validate($request, [
        'title'         => 'required|max:255',
        'image'         => 'required|image',
      ]);

      $user_id = Auth::user()->id;
    	$creation = new Creation();
        
      $usercreations = Creation::where('user_id', '=', $user_id)->get();

      if($usercreations->where('isParticipating', true)->count())
      {
  			 $request->session()->flash('failedstatus', 'Je hebt deze week al meegedaan aan deze wedstrijd.');

         return redirect('wedstrijd');
  		}
  		else 
  		{
        $user = User::find($user_id);
        $user->ip_adress      = request()->ip();
        $user->save();

  			$path = $request->image->store('img/creaties', 'upload');

	    	$creation->description  = $request->title;
	    	$creation->image_url 	  = $path;
	    	$creation->user_id 		  = $user_id;

	 	    $creation->save();

        $request->session()->flash('status', 'Je creatie werd geupload!');

	    	return redirect('wedstrijd');
  		} 	
    }
}
