<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Philly extends Model
{
    //

    public function setDate(){
    $now = Carbon::now('America/New_York')->toDateTimeString();
  	return $this->date = $now; 
    }
}
