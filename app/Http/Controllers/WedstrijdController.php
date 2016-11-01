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
        $contestimage   = Contestimage::where('isUsed', false)->first();

        if($contestimage)
        {
            $creations      = Creation::where('isParticipating', true)->orderBy('created_at', 'desc')->paginate(10);
            return view('wedstrijd', ['creations' => $creations],['contestimage' => $contestimage]);
        }
        else
        {
            return redirect('/')->with('failedstatus', 'Deze wedstrijd is op dit moment niet actief.');
        }
    }

    public function store(Request $request)
    {
        $creation_id = $request['creation_id'];

        // Check of user ingelogd is
        if(Auth::user())
        {
            // Gebruiker is ingelogd
            $user_id = Auth::user()->id;

            $userHasVotedForThis = DB::table('votes')
                ->where('creation_id', '=', $creation_id)
                ->where('user_id', '=', $user_id)
                ->exists();

            $votecount = Vote::where('creation_id', '=', $creation_id)->count();

            if (!$userHasVotedForThis) 
            {
                // User heeft nog niet gestemd op deze creatie
                $vote = new Vote();

                $vote->user_id      = $user_id;
                $vote->creation_id  = $creation_id;

                $vote->save();

                $response = array(
                    'status'        => 'success',
                    'votecount'     => $votecount + 1,
                );

                return Response::json($response);
            } 
            else 
            {
                // User heeft al gestemd op deze creatie
                $response = array(
                    'status'        => 'failed',
                    'votecount'     => $votecount,
                );
                
                return Response::json($response);
            }
        }
        else 
        {
            // Als er een gebruiker niet ingelogd is
            $response = array(
                    'status'        => 'failed_nologin',
            );
                
            $request->session()->flash('warningstatus', 'Je moet ingelogd zijn om te kunnen stemmen.');

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
