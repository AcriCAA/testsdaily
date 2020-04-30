<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon; 

class Feed extends Model
{
    //
	protected $fillable = ['datepicker', 'state']; 

    // automatically deserialize stored json date upon retrieval
	protected $casts = [
		'page_data_day1' => 'array',
		'page_data_day2' => 'array',
	];



	public function parseDate($date_from_form){

		
		$datestring = strtotime($date_from_form); 
		
		return $datestring = date('Ymd', $datestring);

		
	}

	public function formatDate($date){

		$datestring = strtotime($date);

		return date("F j, Y", $datestring);
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


	public function generateStateQuery($state){

    		//day and state comes from form submission
		
		return $query = "states/".$state; 
		
		

	}

	public function compileQuery($statequery, $day){

	return $query = $statequery.'/'.$day.'.json';		

		// return $query = $statequery.'/'.$day.'.json';

	}

}
