<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Http\Controllers\PhillyController as PHL; 


class ProcessPhillyCases implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 1; 

    protected $phl; 
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
                $this->phl = new PHL(); 
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
         $this->phl::getPHLCases(); 

        \Log::info('ran job successfully');

    }
}
