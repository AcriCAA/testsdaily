<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Jobs\ProcessPhillyCases; 
use App\Philly; 
use Goutte\Client as GoutteClient;

class PhillyController extends Controller
{
    //
	public static function getPHLCases(){



		 $client = new GoutteClient();
        // $crawler = $client->request('GET', 'https://www.symfony.com/blog/');

        $crawler = $client->request('GET', 'https://www.health.pa.gov/topics/disease/coronavirus/Pages/Cases.aspx');
        
        //filter the data using the current table row id
		$filtered = $crawler->filterXPath('//*[@id="ctl00_PlaceHolderMain_PageContent__ControlWrapper_RichHtmlField"]/div/div/table/tbody/tr[52]')->children()->each(function ($node) {
          return $node->text(); 
        });


    dd($filtered);


       $phl = new Philly(); 


       //this is positives
       $phl->cases = $filtered[1]; 

       //this is negatives; 
       // $filtered[2]; 

       //this is deaths
       $phl->deaths = $filtered[3]; 

       $phl->date = $phl->setDate(); 

       $phl->save(); 


	}


}
