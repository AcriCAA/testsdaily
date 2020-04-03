@extends('layouts.app')

@section('content')

	<h2 class="text-center">{{$feed->state}}</h2>
	<h5 class="text-center">{{$feed->original_day}}</h5>
		<h3 class="text-center">totalTestResultsIncrease: {{$feed->page_data_day1["totalTestResultsIncrease"]}}</h3>
      
   <h4 class="text-center">hospitalizedIncrease: 
      	{{$feed->page_data_day1["hospitalizedIncrease"]}}</h4>

	<div class="card-group">
  <div class="card">
    
    <div class="card-body">
      <h5 class="card-title">Selected Date: {{$feed->original_day}}</h5>
      
      

      <p class="card-text">Total Tests: {{$feed->page_data_day1["total"]}}</p>
      <p class="card-text">postive: {{$feed->page_data_day1["positive"]}}</p>
      <p class="card-text">negative: {{$feed->page_data_day1["negative"]}}</p>
      <p class="card-text">pending: {{$feed->page_data_day1["pending"]}}</p>
      <p class="card-text">hospitalized: {{$feed->page_data_day1["hospitalized"]}}</p>
    <!--   <p class="card-text">hospitalizedIncrease: 
      	{{$feed->page_data_day1["hospitalizedIncrease"]}}</p> -->
      	<p class="card-text">negativeIncrease: {{$feed->page_data_day1["negativeIncrease"]}}</p>
      	<p class="card-text">positiveIncrease: {{$feed->page_data_day1["positiveIncrease"]}}</p>
      	<p class="card-text">totalTestResultsIncrease: {{$feed->page_data_day1["totalTestResultsIncrease"]}}</p>

    </div>
  </div>
  <div class="card">
    
    <div class="card-body">
      <h5 class="card-title">Selected Date: {{$feed->previous_day}}</h5>
      
      

      <p class="card-text">Total Tests: {{$feed->page_data_day2["total"]}}</p>
      <p class="card-text">postive: {{$feed->page_data_day2["positive"]}}</p>
      <p class="card-text">negative: {{$feed->page_data_day2["negative"]}}</p>
      <p class="card-text">pending: {{$feed->page_data_day2["pending"]}}</p>
      <p class="card-text">hospitalized: {{$feed->page_data_day2["hospitalized"]}}</p>
    <!--   <p class="card-text">hospitalizedIncrease: 
      	{{$feed->page_data_day2["hospitalizedIncrease"]}}</p> -->
      	<p class="card-text">negativeIncrease: {{$feed->page_data_day2["negativeIncrease"]}}</p>
      	<p class="card-text">positiveIncrease: {{$feed->page_data_day2["positiveIncrease"]}}</p>
      	<p class="card-text">totalTestResultsIncrease: {{$feed->page_data_day2["totalTestResultsIncrease"]}}</p>
    </div>
  </div>
  
</div>

@endsection