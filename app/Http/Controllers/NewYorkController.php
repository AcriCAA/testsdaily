<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jobs\ProcessNYCCases; 
use App\NewYork; 
use Goutte\Client as GoutteClient;

class NewYorkController extends Controller
{
    //
	 public static function getNYCCases(){
        $client = new GoutteClient();
        // $crawler = $client->request('GET', 'https://www.symfony.com/blog/');

        $crawler = $client->request('GET', 'https://github.com/nychealth/coronavirus-data/blob/master/summary.csv');
        
        //filter the data using the current table row id
        // $filtered = $crawler->filterXPath('/html/body/div[4]/div/main/div[2]/div/div[3]/div[2]/div[2]/table')->children()->each(function ($node) {
  //         return $node->text(); 
  //       });

        $all = [];

        $case_array = $crawler->filter('#LC1')->children()->each(function ($node) {
          return $node->text(); 
        });


         $death_array = $crawler->filter('#LC3')->children()->each(function ($node) {
          return $node->text(); 
        });

         $nyc = new NewYork(); 

         $nyc->cases = $case_array[2]; 

         $nyc->deaths = $death_array[2]; 

         $nyc->date = $nyc->setDate(); 

         $nyc->save(); 

    }

}
