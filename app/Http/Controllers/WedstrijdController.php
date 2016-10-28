<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


use Response;
use App\Http\Requests;
use App\Creation;
use App\Vote;
use Auth;
use DB;

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
        $user_id = Auth::user()->id;
        $creation_id = $request['creation_id'];

        $result = DB::table('votes')
            ->where('creation_id', '=', $creation_id)
            ->where('user_id', '=', Auth::user()->id)
            ->exists();

        if (!$result) 
        {
            $vote = new Vote();

            $vote->user_id      = $user_id;
            $vote->creation_id  = $creation_id;

            $vote->save();

            $votecount = Vote::where('creation_id', '=', $creation_id)->count();

            $response = array(
                'status'        => 'success',
                'votecount'     => $votecount,
            );

            return Response::json($response);
        } 
        else 
        {
            $votecount = Vote::where('creation_id', '=', $creation_id)->count();

            $response = array(
                'status'        => 'failed',
                'votecount'     => $votecount,
            );
            
            return Response::json($response);
        }
    }

    public function sendUserVotes()
    {
        $response = DB::table('votes')->where('user_id', '=', Auth::user()->id)->get();

        return Response::json($response);
    }

    public function download(Request $request)
    {
        $pathToFile = $request->file_url;
        $public_path = public_path();
        return response()->download($public_path . $pathToFile);
    }
}
