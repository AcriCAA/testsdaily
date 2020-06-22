<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Jobs\ProcessPhillyCases; 
use App\Philly; 
use Goutte\Client as GoutteClient;

use GuzzleHttp\Client;

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

       $phl = new Philly(); 

       //this is positives
       $phl->cases = $result['rows'][1]['count']; 

       //this is negatives; 
       $phl->negatives = $result['rows'][0]['count']; 

       //this is deaths
       $phl->deaths = 'no data'; 

       $phl->date = $result['rows'][0]['result_date'];

       $phl->save(); 




}


public static function getPhillyNow(){

  $result = NULL; 

    $client = new Client();

 $curlstring = 'https://phl.carto.com/api/v2/sql?q=SELECT%20*%20FROM%20covid_cases_by_date WHERE result_date = current_date - 3';
 

$response = $client->get($curlstring);

if($response->getStatusCode() == 200){

  $data = $response->getBody()->getContents();
  
  $result = json_decode($data, true);

}


return $result; 

}



}
