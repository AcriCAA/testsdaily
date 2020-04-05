@extends('layouts.app')

@section('content')

	<h2 class="text-center">{{$feed->state}}</h2>
	<h5 class="text-center">{{$feed->original_day_formatted}}</h5>
  <p class="text-center"><small >updated as of: {{$feed->page_data_day1["dateChecked"]}}</small></p>
		<h3 class="text-center">Increased Number of Tests from Previous Day: {{number_format($feed->page_data_day1["totalTestResultsIncrease"])}}</h3>
      
   <h4 class="text-center">hospitalized increase: 
      	{{number_format($feed->page_data_day1["hospitalizedIncrease"])}}</h4>

        <!-- eg https://covidtracking.com/api/states/daily?state=NY&date=20200316 -->
      <p class="text-center"><small><a href="https://covidtracking.com/api/states/daily?state={{$feed->state}}&date={{$feed->original_day}}">source</a></small></p>

	<div class="card-group">
  <div class="card">
    
    <div class="card-body">
      <h3 class="card-title">{{$feed->original_day_formatted}}</h3>
      
      


    
    
   

    @if(!empty($feed->page_data_day1["positive"]))
      <p class="card-text">postive: {{number_format($feed->page_data_day1["positive"])}}</p>
      <hr class="my-1">
    @endif

    @if(!empty($feed->page_data_day1["negative"]))
      <p class="card-text">negative: {{number_format($feed->page_data_day1["negative"])}}</p>
      <hr class="my-1">
    @endif
     
    @if(!empty($feed->page_data_day1["hospitalized"]))
      <p class="card-text">hospitalized: {{number_format($feed->page_data_day1["hospitalized"])}}</p>
      <hr class="my-1">
    @endif

    @if(!empty($feed->page_data_day1["hospitalizedIncrease"]))
    <p class="card-text">hospitalized increase: 
      	{{number_format($feed->page_data_day1["hospitalizedIncrease"])}}</p>
        <hr class="my-1">
    @endif

      @if(!empty($feed->page_data_day1["negativeIncrease"]))
      	<p class="card-text">negative increase: {{number_format($feed->page_data_day1["negativeIncrease"])}}</p>
        <hr class="my-1">
      @endif


      @if(!empty($feed->page_data_day1["positiveIncrease"]))
      	<p class="card-text">positive increase: {{number_format($feed->page_data_day1["positiveIncrease"])}}</p>
        <hr class="my-1">
      @endif

       @if(!empty($feed->page_data_day1["total"]))
     <p class="card-text">cumulative tests completed since testing began: {{number_format($feed->page_data_day1["total"])}}</p>
      
    @endif
        
      	
    </div>
  </div>
  <div class="card">
    
    <div class="card-body">
      <h3 class="card-title">{{$feed->previous_day_formatted}}</h3>
      
      

     

      @if(!empty($feed->page_data_day2["positive"]))
      <p class="card-text">postive: {{number_format($feed->page_data_day2["positive"])}}</p>
      <hr class="my-1">
      @endif

      @if(!empty($feed->page_data_day2["negative"]))
      <p class="card-text">negative: {{number_format($feed->page_data_day2["negative"])}}</p>
      <hr class="my-1">
      @endif

    @if(!empty($feed->page_data_day2["hospitalizedIncrease"]))
      <p class="card-text">hospitalized: {{number_format($feed->page_data_day2["hospitalized"])}}</p>
      <hr class="my-1">
    @endif

    @if(!empty($feed->page_data_day2["hospitalizedIncrease"]))
      <p class="card-text">hospitalized increase: 
      	{{number_format($feed->page_data_day2["hospitalizedIncrease"])}}</p>
        <hr class="my-1">
      @endif

    @if(!empty($feed->page_data_day2["negativeIncrease"]))
      	<p class="card-text">negative increase: {{number_format($feed->page_data_day2["negativeIncrease"])}}</p>
        <hr class="my-1">
    @endif

    @if(!empty($feed->page_data_day2["positiveIncrease"]))
      	<p class="card-text">positive increase: {{number_format($feed->page_data_day2["positiveIncrease"])}}</p>
        <hr class="my-1">
    @endif

     @if(!empty($feed->page_data_day2["total"]))
      <p class="card-text">cumulative tests since testing began: {{number_format($feed->page_data_day2["total"])}}</p>
      
      @endif


      	
    </div>
  </div>
  
</div>

@endsection