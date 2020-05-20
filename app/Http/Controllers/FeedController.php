<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;

use Goutte\Client as GoutteClient;


use App\Feed; 

use App\Philly as Philly; 
use App\NewYork as NewYork;

use Carbon\Carbon; 

class FeedController extends Controller
{
    //

    public function showPhilly(){


      $collection = Philly::all()->sortByDesc("created_at");
      
      // $date = Carbon::createFromFormat('Y-m-d H:i:s', '2015-10-23 17:64:00', 'Europe/Amsterdam');

      $city = "Philadelphia"; 

      $source = "https://www.health.pa.gov/topics/disease/coronavirus/Pages/Cases.aspx"; 

      return view('layouts.cities', compact('source','city','collection')); 

    }


    public function showNYC(){


      $collection = NewYork::all()->sortByDesc("created_at");
      $city = "New York City"; 
      $source = "https://github.com/nychealth/coronavirus-data/blob/master/summary.csv"; 
      return view('layouts.cities', compact('source','city','collection'));
      
    }

    public function phillyScrapeData(){


        $client = new GoutteClient();
        

        $crawler = $client->request('GET', 'https://www.health.pa.gov/topics/disease/coronavirus/Pages/Cases.aspx');
        
        
		$filtered = $crawler->filterXPath('//*[@id="ctl00_PlaceHolderMain_PageContent__ControlWrapper_RichHtmlField"]/div/div[1]/table/tbody/tr[52]')->children()->each(function ($node) {
          return $node->text(); 
        });


    


	return view('layouts.phl',compact('filtered')); 

    }


    public function nycScrapeData(){



     	 $client = new GoutteClient();

        $crawler = $client->request('GET', 'https://github.com/nychealth/coronavirus-data/blob/master/summary.csv');
        
      

        $all = [];

        $cases = $crawler->filter('#LC1')->children()->each(function ($node) {
          return $node->text(); 
        });

         $hospitalized = $crawler->filter('#LC2')->children()->each(function ($node) {
          return $node->text(); 
        });


         $deaths = $crawler->filter('#LC3')->children()->each(function ($node) {
          return $node->text(); 
        });

        // this is now probable deaths, needs to be updated later. 
         $probable = $crawler->filter('#LC4')->children()->each(function ($node) {
          return $node->text(); 
        });



         // the label for each column gets put in the first position
         // if($cases[1])
         // $all[] = ['cases' => str_replace(':', '', $cases[2])]; // Replaces all colons with nothing.
        
  
        return view('layouts.nyc', compact('cases', 'hospitalized', 'deaths','probable')); 


    }

    public function index()
    {

        $query = 'US'; 


        $total_tests_data_today = $this->queryApi($query); 

      // verifying API was not down and returned data
      if(null !== $total_tests_data_today){

        $number_of_new_tests = $this->calculateNewTests($total_tests_data_today[0]["totalTestResults"]); 


        $selects = $this->generateDateSelectBox(); 

        
        return view('testshome', compact('total_tests_data_today', 'number_of_new_tests', 'selects'));

      }

      else 
        return view('layouts.404custom'); 
}


public function comparePage(){


  $this->validate(request(), [
			//edit these to coressponding user fields
     'state' => 'required', 
     'datepicker' => 'required'  
     
     

 ]);

$feed = new Feed(); 

$feed->original_day = $feed->parseDate(request('datepicker')); 




$feed->original_day_formatted = $feed->formatDate($feed->original_day); 

$feed->previous_day = $feed->parsePreviousDate($feed->original_day);

$feed->previous_day_formatted = $feed->formatDate($feed->previous_day); 

$feed->state = request('state'); 

$feed->state_query = $feed->generateStateQuery($feed->state); 

    		//compile the query string
$feed->query1 = $feed->compileQuery($feed->state_query, $feed->original_day); 

$feed->query2 = $feed->compileQuery($feed->state_query, $feed->previous_day); 

//run the queries to generate page data save them
$feed->page_data_day1 = $this->queryApi($feed->query1);
$feed->page_data_day2 = $this->queryApi($feed->query2);


// verifying API was not down and returned data
if(null !== $feed->page_data_day1 && null !== $feed->page_data_day2) {
 $feed->save();

      return redirect()->route('compare', $feed);
}
else 
  return view('layouts.404custom'); 
    	
}

public function show(Feed $feed){

	return view('layouts.days',compact('feed'));

}

public function calculateNewTests($today_number_of_tests){

    $total_tests_previous_day = $this->previousDaysTests();

    return $result = (int)$today_number_of_tests - (int)$total_tests_previous_day; 

}


public function previousDaysTests(){

    $previous_day_data = $this->getDailyTestsUS(); 

    // dd($previous_day_data);

    return $previous_day_data["totalTestResults"]; 



}

public function getDailyTestsUS(){

    $query = "USDAILY"; 

    $all_day_data = $this->queryApi($query); 

    $today = Carbon::now();
    $dt = new Carbon($today, 'America/New_York');
    $previous_day = $dt->subDay(); 
    $date_string = strtotime($previous_day); 
    
    $formatted_date_value = date('Ymd', $date_string);

    //find the data for the previous day
    $key = array_search($formatted_date_value, array_column($all_day_data,'date'));

    return $previous_day_data = $all_day_data[$key]; 


}


public function generateDateSelectBox(){

   $selects = []; 


        // $today = Carbon::today();

    $today = Carbon::now();
    
    $dt = new Carbon($today, 'America/New_York');

    $select_array = [];  

    // $date_string = strtotime($dt); 

    // $formatted_date_value = date('Ymd', $date_string);

    // $date_word = date("F j, Y", $date_string); 

    // $select_array = [$formatted_date_value, $date_word]; 

    // $selects[] = $select_array;           

   

   for ($i = 1; $i <= 15;$i++){

    $dt = new Carbon($today, 'America/New_York');
    $previous_day = $dt->subDay($i); 
    $date_string = strtotime($previous_day); 

    $formatted_date_value = date('Ymd', $date_string);

    $date_word = date("F j, Y", $date_string); 

    $select_array = [$formatted_date_value, $date_word]; 

    $selects[] = $select_array; 


}


return $selects; 


}


public function queryAPI($query){
  $client = new Client();

  $base_url = env('BASE_URL');
  
  
  $curlstring = $base_url; 
  if($query == 'US'){
      

      $curlstring.= 'us/current.json'; 

  }

  elseif ($query == 'USDAILY') {
    $curlstring.= 'us/daily.json'; 
}

else{
    $base_url = env('BASE_URL');
    
    
    $curlstring = $base_url; 

    $curlstring.= $query; 

}

$response = $client->get($curlstring);

if($response->getStatusCode() == 200){

  $data = $response->getBody()->getContents();
  
  $result = json_decode($data, true);

}
else 
 $result = null; 

return $result; 


}


}
