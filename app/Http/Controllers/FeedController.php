<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Client;


use App\Feed; 
use Carbon\Carbon; 

class FeedController extends Controller
{
    //

    public function index()
    {

        $query = 'US'; 

        

        $total_tests_data_today = $this->queryApi($query); 

        $number_of_new_tests = $this->calculateNewTests($total_tests_data_today[0]["totalTestResults"]); 



        $selects = $this->generateDateSelectBox(); 


        
        return view('testshome', compact('total_tests_data_today', 'number_of_new_tests', 'selects'));
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

public function formatDate($date){

   $datestring = strtotime($date);

   return date("F j, Y", $datestring);
}

public function comparePage(){


  $this->validate(request(), [
			//edit these to coressponding user fields
     'state' => 'required', 
     'datepicker' => 'required'  
     
     

 ]);

$feed = new Feed(); 

$feed->original_day = $this->parseDate(request('datepicker')); 




$feed->original_day_formatted = $this->formatDate($feed->original_day); 

$feed->previous_day = $this->parsePreviousDate($feed->original_day);

$feed->previous_day_formatted = $this->formatDate($feed->previous_day); 

$feed->state = request('state'); 

$feed->state_query = $this->generateStateQuery($feed->state); 

    		//compile the query string
$feed->query1 = $this->compileQuery($feed->state_query, $feed->original_day); 

$feed->query2 = $this->compileQuery($feed->state_query, $feed->previous_day); 

    	//run the queries to generate page
$feed->page_data_day1 = $this->queryApi($feed->query1); 
$feed->page_data_day2 = $this->queryApi($feed->query2); 
    	// dd($feed); 
return view('layouts.days',compact('feed')); 

}

public function compilePageData(){

   $date1_from_form = '2020-03-31 11:08 AM';
   $date2_from_form = '2020-03-30 11:08 AM';

   $state_from_form = 'PA'; 

   $day1 = $this->parseDate($date1_from_form); 
   $day2 = $this->parseDate($date2_from_form); 

   $state = $state_from_form; 

   $state_query = $this->generateStateQuery($state); 

    	//compile the query string
   $query1 = $this->compileQuery($state_query, $day1); 

   $query2 = $this->compileQuery($state_query, $day2); 

    	//run the queries to generate page
   $page_data_day1 = $this->queryApi($query1); 
   $page_data_day2 = $this->queryApi($query2); 
   

}


public function generateStateQuery($state){

    		//day and state comes from form submission
   
   return $query = "states/daily?state=".$state; 
   
   

}


public function parseDate($date_from_form){

  //  
	$datestring = strtotime($date_from_form); 
	
	return $datestring = date('Ymd', $datestring);

  
}

public function parsePreviousDate($date_from_form){

  //  
	$datestring = strtotime($date_from_form); 
	
	$dt = new Carbon($datestring, 'America/New_York');

	$previous = $dt->subDay(); 

	$previous_date_string = strtotime($previous); 
	
	return $datestring = date('Ymd', $previous_date_string);

	// $timelogged_timestamp = Carbon::parse($date_from_form, 'UTC');

 
}


public function compileQuery($statequery, $day){

   return $query = $statequery."&date=".$day;

}


public function queryAPI($query){
  $client = new Client();

  $base_url = env('BASE_URL');
  
  
  $curlstring = $base_url; 
  if($query == 'US'){
      

      $curlstring.= 'us'; 

  }

  elseif ($query == 'USDAILY') {
    $curlstring.= 'us/daily'; 
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
