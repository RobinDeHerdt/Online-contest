<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contestimage;

class WedstrijdfotoController extends Controller
{
    public function index()
    {
    	$contestimages = Contestimage::all();

    	return view('wedstrijdfotos', ['contestimages' => $contestimages]);
    }

    public function create()
    {
    	return view('createwedstrijdfotos');
    }

    public function store(Request $request)
    {
    	$path = $request->image->store('img/contests', 'upload');

    	$contestimage = new Contestimage();
    	$contestimage->image_url 	= $path;
    	$contestimage->isUsed 		= false; 
    	$contestimage->save();

    	return redirect('/administrator/wedstrijdfotos');
    }
}
