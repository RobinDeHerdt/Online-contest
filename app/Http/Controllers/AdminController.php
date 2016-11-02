<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Creation;
use App\Winner;
use Storage;

class AdminController extends Controller
{
    public function index()
    {
        // Display max 15 deelnemers op 1 pagina
    	$creations  			= Creation::paginate(15);
        $winners                = Winner::all();
    	$softDeletedCreations 	= Creation::onlyTrashed()->get();

    	return view('adminmodule', [
            'creations' => $creations, 
            'softDeletedCreations' => $softDeletedCreations,
            'winners' => $winners,
        ]);
    }

    public function destroy($id)
    {
    	$creation  = Creation::find($id);
        $creation->delete();

        // Check of de te verwijderen creatie ooit gewonnen heeft, zo ja -> delete van winnaarstabel
        $winner    = Winner::where('creation_id', $id);

        if($winner)
        {
            $winner->delete();
        }

    	return back();
    }

    public function restore($id)
    {
    	$creation = Creation::onlyTrashed()->where('id', $id);
    	$creation->restore();

        // Check of de te restoren creatie ooit gewonnen heeft, zo ja -> restore in winnaarstabel
        $winner = Winner::onlyTrashed()->where('creation_id', $id);

        if ($winner)
        {
            $winner->restore();
        }

    	return back();
    }
}
