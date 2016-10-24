<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class WedstrijdController extends Controller
{
    public function index()
    {


        return view('wedstrijd');
    }
}
