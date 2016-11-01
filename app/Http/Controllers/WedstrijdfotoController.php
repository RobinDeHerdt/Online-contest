<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contestimage;

class WedstrijdfotoController extends Controller
{
    public function index()
    {
    	$contestimages  = Contestimage::all();
        $activeImage    = Contestimage::where('isUsed', false)->first(); 

    	return view('wedstrijdfotos', ['contestimages' => $contestimages, 'activeImage' => $activeImage]);
    }

    public function create()
    {
    	return view('createwedstrijdfotos');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'required|image',
        ]);

    	$path = $request->image->store('img/contests', 'upload');

    	$contestimage = new Contestimage();
    	$contestimage->image_url 	= $path;
    	$contestimage->isUsed 		= false; 
    	$contestimage->save();

        $request->session()->flash('status', 'De foto werd succesvol geupload.');

    	return redirect('/administrator/wedstrijdfotos');
    }

    public function destroy($id)
    {
    	$contestimage = Contestimage::find($id);
    	$contestimage->delete();

    	return back();
    }
}
