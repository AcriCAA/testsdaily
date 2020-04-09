@extends('layouts.app')

@section('content')



<div class="card-group">
  <div class="card">

    <div class="card-body">

      <h2 class="text-center display-4">{{$feed->state}}</h2>
      <h5 class="text-center">{{$feed->original_day_formatted}}</h5>
      <p class="text-center"><small >updated as of: 
      @if(!empty($feed->page_data_day1["dateChecked"]))
        {{$feed->page_data_day1["dateChecked"]}}
      @endif

      </small></p>


      @if(!empty(number_format($feed->page_data_day1["totalTestResultsIncrease"])))
      <h3 class="text-center">Tests Today</h3>

      <p class="lead text-center">{{number_format($feed->page_data_day1["totalTestResultsIncrease"])}}

         @if($feed->page_data_day1["totalTestResultsIncrease"] > $feed->page_data_day2["totalTestResultsIncrease"])
            <i class="fas fa-chevron-circle-up text-success"></i>
            @elseif($feed->page_data_day1["totalTestResultsIncrease"] < $feed->page_data_day2["totalTestResultsIncrease"])
            <i class="fas fa-chevron-circle-down text-danger"></i>
            @endif

      </p>


      @endif
    </div></div></div>


    <div class="card-group">
      <div class="card">

        <div class="card-body">
          @if(!empty($feed->page_data_day1["hospitalizedIncrease"]))

          <h4 class="text-center">hospitalized increase 
          </h4>                                                    

          <p class="text-center lead">
            {{number_format($feed->page_data_day1["hospitalizedIncrease"])}}

            @if($feed->page_data_day1["hospitalizedIncrease"] > $feed->page_data_day2["hospitalizedIncrease"])
            <i class="fas fa-chevron-circle-up text-danger"></i>
            @elseif($feed->page_data_day1["hospitalizedIncrease"] < $feed->page_data_day2["hospitalizedIncrease"])
            <i class="fas fa-chevron-circle-down text-success"></i>
            @endif
          </p>

          @endif

        </div>
      </div>

      <div class="card">

        <div class="card-body">

         @if(!empty($feed->page_data_day1["deathIncrease"]))

         <h4 class="text-center">death increase</h4>                                                    
         <p class="text-center lead">
          {{number_format($feed->page_data_day1["deathIncrease"])}}

          @if($feed->page_data_day1["deathIncrease"] > $feed->page_data_day2["deathIncrease"])
          <i class="fas fa-chevron-circle-up text-danger"></i>
          @elseif($feed->page_data_day1["deathIncrease"] < $feed->page_data_day2["deathIncrease"])
          <i class="fas fa-chevron-circle-down text-success"></i>
          @endif
        </p>

        @endif

      </div>
    </div>
  </div>


  @include('layouts.table')

  @include('layouts.prevday')

  @endsection