<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Response;
use App\Http\Requests;
use App\Contestimage;
use App\Creation;
use App\Vote;
use Auth;
use DB;

class WedstrijdController extends Controller
{
    public function index()
    {
        $creations      = Creation::where('isParticipating', true)->get();
        $contestimage   = Contestimage::where('isUsed', false)->first();

        return view('wedstrijd', ['creations' => $creations],['contestimage' => $contestimage]);
    }

    public function store(Request $request)
    {
        $creation_id = $request['creation_id'];

        if(Auth::user())
        {
            $user_id = Auth::user()->id;

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
        else 
        {
            $response = array(
                    'status'        => 'failed_nologin',
            );
                
            $request->session()->flash('status', '');

            return Response::json($response);
        }
    }

    public function sendUserVotes()
    {
        if(Auth::user())
        {
            $response = DB::table('votes')->where('user_id', '=', Auth::user()->id)->get();
        }
        else
        {
            $response = array(
                    'status'        => 'nologin',
            );
        }

        return Response::json($response);
    }

    public function download(Request $request)
    {
        $pathToFile = $request->file_url;
        $public_path = public_path();
        return response()->download($public_path . $pathToFile);
    }
}
