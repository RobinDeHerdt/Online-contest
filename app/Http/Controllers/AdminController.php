<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mailrecipient;
use App\Creation;
use App\Winner;
use App\User;
use Storage;
use Excel;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        // Display max 15 deelnemers op 1 pagina
    	$creations  			= Creation::paginate(15);
        $winners                = Winner::all();
    	$softDeletedCreations 	= Creation::onlyTrashed()->get();
        $admin_email            = Mailrecipient::find(1);

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

    public function downloadExcel()
    {
        $creations = DB::table('creations')
                ->leftJoin('users', 'creations.user_id', '=', 'users.id')
                ->select('users.first_name', 'users.last_name','users.date_of_birth', 'users.email', 'users.street_number', 'users.postalcode', 'users.city', 'users.ip_adress', 'creations.description', 'creations.image_url', 'creations.image_url', 'creations.created_at')
                ->get();

        foreach ($creations as $creation) {
            $data[] = (array)$creation;
        }

        Excel::create('deelnemers_test', function($excel) use($data){
                $excel->setTitle('deelnemerslijst');

                $excel->sheet('Deelnemers', function($sheet) use($data){
                    $sheet->fromArray($data);
                });
        })->download('xlsx');
    }
}
