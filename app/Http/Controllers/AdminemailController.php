<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mailrecipient;

class AdminemailController extends Controller
{
    public function index()
    {
    	$admin_email = Mailrecipient::find(1);

    	return view('admin_email', ['admin_email' => $admin_email]);
    }

    public function store(Request $request)
    {
    	$admin_email = Mailrecipient::find(1);

    	$admin_email->email = $request->email;
    	$admin_email->save();

    	$request->session()->flash('status', 'Het emailadres van de wedstrijdverantwoordelijke werd succesvol bijgewerkt.');

    	return back();
    }
}
