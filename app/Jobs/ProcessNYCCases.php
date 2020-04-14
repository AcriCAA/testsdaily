<?php

namespace App\Jobs;


use App\NewYork; 
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Http\Controllers\NewYorkController as NYC; 



class ProcessNYCCases implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $tries = 1; 

    protected $nyc;
     
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->nyc = new NYC(); 
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      

        $this->nyc::getNYCCases(); 

        \Log::info('ran job successfully');



    }

}
