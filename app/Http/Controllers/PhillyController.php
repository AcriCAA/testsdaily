<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Jobs\ProcessPhillyCases; 
use App\Philly; 
use Goutte\Client as GoutteClient;

use GuzzleHttp\Client;

use Carbon\Carbon; 

class PhillyController extends Controller
{
    //
	public static function getPHLCases(){



		//  $client = new GoutteClient();
  //       // $crawler = $client->request('GET', 'https://www.symfony.com/blog/');

  //       $crawler = $client->request('GET', 'https://www.health.pa.gov/topics/disease/coronavirus/Pages/Cases.aspx');
        
  //       //filter the data using the current table row id
		// $filtered = $crawler->filterXPath('//*[@id="ctl00_PlaceHolderMain_PageContent__ControlWrapper_RichHtmlField"]/div/div/table/tbody/tr[52]')->children()->each(function ($node) {
  //         return $node->text(); 
  //       });


$result = PhillyController::getPhillyNow(); 

// dd($result);   

$parsed_today_yesterday = PhillyController::parseTodayYesterday($result); 

$filtered_results_array_today = $parsed_today_yesterday["filtered_results_array_today"]; 

       $phl = new Philly(); 

       //this is positives
       if($filtered_results_array_today["test_result"] == "positive")
        $phl->cases = $filtered_results_array_today["count"]; 
       else 
        $phl->cases = 'no results'; 
      

        if($filtered_results_array_today["test_result"] == "negative")
        $phl->negatives = $filtered_results_array_today["count"]; 
       //this is negatives; 
      else 
       $phl->negatives = 'no results'; 

       //this is deaths
       $phl->deaths = 'no data'; 

       $phl->date = $filtered_results_array_today["
       collection_date"];

       $phl->save(); 




}


public static function getPhillyNow(){

  $result = NULL; 

    $client = new Client();

 $curlstring = 'https://phl.carto.com/api/v2/sql?q=SELECT collection_date,count,test_result FROM covid_cases_by_date WHERE collection_date >= current_date - 7';

 // 'https://phl.carto.com/api/v2/sql?q=SELECT result_date,%20test_result%20,count%20FROM%20covid_cases_by_date WHERE result_date = current_date - 3';
 

$response = $client->get($curlstring);

if($response->getStatusCode() == 200){

  $data = $response->getBody()->getContents();
  
  $result = json_decode($data, true);

}

 
return $result; 

}

public static function parseTodayYesterday($result){

    $today = Carbon::now();
    $dt = new Carbon($today, 'America/New_York');

  $today_string = $dt->toDateString(); 

  $yesterday_string = $dt->subDay()->toDateString(); 

  // dd($yesterday_string); 

  $filtered_results_array_today = []; 
  $filtered_results_array_yesterday = [];   

  foreach($result["rows"] as $r){

    // echo '<pre>'; 
    // echo $r["collection_date"]; 
    // echo '</pre>'; 

    $date_to_check = PhillyController::parseCollectionDate($r["collection_date"]); 

    //collect today's results
    if($date_to_check == $today_string){


      $filtered_results_array_today[] = $r; 

    }

    // collect yesterday's results
    if($date_to_check  == $yesterday_string){

        $filtered_results_array_yesterday[] = $r; 

    }

  }

  return compact('filtered_results_array_yesterday','filtered_results_array_today'); 



}

public static function parseCollectionDate($collection_date)

{



 $collection_date_array = explode("T", $collection_date); 

 return $collection_date_array[0]; 

}




}
