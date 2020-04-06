@extends('layouts.app')

@section('content')

	

   <div class="card-group">
  <div class="card">
   
    <div class="card-body">

      <h2 class="text-center display-4">{{$feed->state}}</h2>
  <h5 class="text-center">{{$feed->original_day_formatted}}</h5>
  <p class="text-center"><small >updated as of: {{$feed->page_data_day1["dateChecked"]}}</small></p>


  @if(!empty(number_format($feed->page_data_day1["totalTestResultsIncrease"])))
		<h3 class="text-center">Increased Number of Tests from Previous Day</h3>

    <p class="lead text-center">{{number_format($feed->page_data_day1["totalTestResultsIncrease"])}}</p>

    {{-- <hr class="my-1"> --}}

    @endif
</div></div></div>



      



    <div class="card-group">
  <div class="card">
   
    <div class="card-body">
          @if(!empty($feed->page_data_day1["hospitalizedIncrease"]))
      
   <h4 class="text-center">hospitalized increase 
        </h4>                                                    

           <p class="text-center lead">
        {{number_format($feed->page_data_day1["hospitalizedIncrease"])}}</p>



    @endif
    
    </div>
  </div>
  
  <div class="card">
   
    <div class="card-body">

       @if(!empty($feed->page_data_day1["hospitalizedIncrease"]))
      
   <h4 class="text-center">death increase 
        </h4>                                                    

           <p class="text-center lead">
        {{number_format($feed->page_data_day1["deathIncrease"])}}</p>



    @endif
      
    </div>
  </div>
</div>

{{--         deathIncrease --}}

        <!-- eg https://covidtracking.com/api/states/daily?state=NY&date=20200316 -->
    



@include('layouts.table')

@include('layouts.prevday')
 
@endsection



