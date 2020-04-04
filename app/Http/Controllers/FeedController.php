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

    	//run the queries to generate page but json encode them because you are gooing to save them

// $feed->page_data_day1 = serialize(json_encode($this->queryApi($feed->query1))); 
// $feed->page_data_day2 = serialize(json_encode($this->queryApi($feed->query2))); 

$feed->page_data_day1 = $this->queryApi($feed->query1); 
$feed->page_data_day2 = $this->queryApi($feed->query2); 

    	

$feed->save();

return redirect()->route('compare', $feed);
    	
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
