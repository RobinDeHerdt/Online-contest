<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contestimage;
use App\Winner;

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
        $contestimage   = Contestimage::where('isUsed', false)->first();
        $winner         = Winner::orderBy('id', 'asc')->first();

        $winningcreation   = $winner->creation()->first();
        $winninguser       = $winningcreation->user()->first();

        return view('home', ['contestimage' => $contestimage,'winningcreation' => $winningcreation,'winninguser' => $winninguser]);
    }
}
