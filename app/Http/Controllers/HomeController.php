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
        $contestimage = Contestimage::where('isUsed', false)->first();

        if($contestimage)
        {
            // Wanneer de wedstrijd gewoon doorgaat
            $contestIsLive = true;

            $current_date   = date("Y-m-d");
            $next_wednesday = date('Y-m-d', strtotime("next wednesday", strtotime($current_date)));
        } 
        else
        {
            // Wanneer de wedstrijd beindigd wordt.
            $contestIsLive = false;
        }

        $allWinners = Winner::all();

        if($allWinners->count())
        {
            // Er zijn winnaars
            $isThereAWinner = true;

            return view('home', [
                'allWinners'        => $allWinners,
                'contestImage'      => $contestimage,
                'isThereAWinner'    => $isThereAWinner,
                'contestIsLive'     => $contestIsLive,
                'next_wednesday'    => $next_wednesday,
            ]);
        }
        else
        {
            // Er zijn nog geen winnaars
            $isThereAWinner = false;

            return view('home', [
                'contestImage'      => $contestimage,
                'isThereAWinner'    => $isThereAWinner,
                'contestIsLive'     => $contestIsLive,
                'next_wednesday'    => $next_wednesday,
            ]);
        }
    }
}
