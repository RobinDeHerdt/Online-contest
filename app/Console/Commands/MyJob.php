<?php

namespace App\Console\Commands;
use Illuminate\Mail\Mailable;
use Illuminate\Console\Command;

use Excel;
use App\User;
use App\Winner;
use App\Creation;
use App\Contestimage;
use App\Mail\ContestResults;

class MyJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'do:nextweek';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'MyJob';

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
        echo "Starting job\n";

        if(Creation::where('isParticipating', true)->count())
        {
            // http://stackoverflow.com/questions/24208502/laravel-orderby-relationship-count
            // Tel alle stemmen bij de creaties die nu deelnemen, sorteer ze dan en output 1 winnaar
            $orderedCreations = Creation::with('votes')->where('isParticipating', true)->get()->sortBy(function($creation)
            {
                return $creation->votes->count();
            }, SORT_REGULAR, true);

            $mostVotedCreation = $orderedCreations->first();

            $winner = new Winner();
            $winner->creation_id = $mostVotedCreation->id;
            $winner->save();

            $user = $mostVotedCreation->user()->first();

            echo "Winner picked\n";

            Excel::create('deelnemers', function($excel) {
                $excel->setTitle('deelnemerslijst');
                $excel->sheet('Deelnemers', function($sheet) {
                    $sheet->fromModel(User::all());
                });
            })->store('xlsx');

            echo "Excel exported\n";

            \Mail::to("robindh95@gmail.com")->send(new ContestResults($winner, $user));

            echo "Email with results sent\n";

            foreach ($orderedCreations as $creation) {
                $creation->isParticipating = false;
                $creation->save();
            }

            echo "Soft deleted creations for this cycle\n";
        }

        $contestimage = Contestimage::where('isUsed', false)->first();
        $contestimage->isUsed = true;
        $contestimage->save();
        echo "Set new contest image\n";

        echo "Job done\n";
    }
}
