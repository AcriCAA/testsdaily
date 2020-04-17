<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon; 

class NewYork extends Model
{
    //


	public function setDate(){
    $now = Carbon::now('America/New_York')->toDateTimeString();
  	return $this->date = $now; 
    }
}
