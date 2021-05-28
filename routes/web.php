<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes(['register' => false]);



// Route::get('mail', 'PhillyController@getMail'); 


// Route::get('/', 'FeedController@index'); 

// Route::post('/store', 'FeedController@comparePage'); 

// Route::post('/previousday', 'FeedController@comparePage'); 

// Route::get('/dates', 'FeedController@generateDateSelectBox'); 

// Route::get('/compare/{feed}','FeedController@show')->name('compare');

// Route::get('/phlquick', 'FeedController@phillyScrapeData'); 

// Route::get('/nycquick', 'FeedController@nycScrapeData'); 

Route::get('/', function(){


	return redirect('https://covid.cdc.gov/covid-data-tracker/#datatracker-home'); 

}

Route::get('/phlquick', function(){


	return redirect('https://www.phila.gov/programs/coronavirus-disease-2019-covid-19/testing-and-data/#/'); 

}



);



Route::get('/nycquick', function(){


	return redirect('https://www1.nyc.gov/site/doh/covid/covid-19-data.page'); 

}



);


// Route::get('/phl', 'FeedController@showPhilly'); 

// Route::get('/nyc', 'FeedController@showNYC'); 

// Route::get('/testphl', 'PhillyController@getPHLCases'); 

