<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Creation;


class AdminController extends Controller
{
    public function index()
    {
    	$creations  			= Creation::paginate(15);
    	$softDeletedCreations 	= Creation::onlyTrashed()->get();

    	return view('adminmodule', ['creations' => $creations], ['softDeletedCreations' => $softDeletedCreations]);
    }

    public function destroy($id)
    {
    	$creation = Creation::find($id);
    	$creation->delete();

    	return back();
    }

    public function restore($id)
    {
    	$creation = Creation::onlyTrashed()->where('id', $id);
    	$creation->restore();

    	return back();
    }
}
