<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contestimage;

class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contestimage = Contestimage::where('isUsed', false)->first();
        
        return view('home', ['contestimage' => $contestimage]);
    }
}
