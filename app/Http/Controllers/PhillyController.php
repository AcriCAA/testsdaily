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


       $phl = new Philly(); 

       $phl->cases = $filtered[1]; 
       $phl->deaths = $filtered[2]; 

       $phl->date = $phl->setDate(); 

       $phl->save(); 


	}


}
