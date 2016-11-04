<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\DailyExcel;
use App\Mailrecipient;
use Excel;
use DB;

class DailyMailJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'do:dailymail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail daily';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $creations = DB::table('creations')
                ->leftJoin('users', 'creations.user_id', '=', 'users.id')
                ->select('users.first_name', 'users.last_name','users.date_of_birth', 'users.email', 'users.street_number', 'users.postalcode', 'users.city', 'users.ip_adress', 'creations.description', 'creations.image_url', 'creations.image_url', 'creations.created_at')
                ->get();

        foreach ($creations as $creation) {
            $data[] = (array)$creation;
        }

        Excel::create('deelnemers', function($excel)  use($data){
                $excel->setTitle('deelnemerslijst');
                $excel->sheet('Deelnemers', function($sheet)  use($data){
                    $sheet->fromArray($data);
                });
        })->store('xlsx');

        echo "Excel exported\n";

        $mailadress = Mailrecipient::find(1);

        \Mail::to($mailadress->email)->send(new DailyExcel());

        echo "Excel Mail sent to " . $mailadress . "\n";
    }
}
