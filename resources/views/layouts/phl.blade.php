@extends('layouts.app')

@section('content')



<div class="container">
  <h2>Results so far today</h2>
  @foreach($filtered_results_array_today as $r)
  
    

      <p>{{$r["test_result"]}}: {{$r["count"]}}
      <br>
      <small>date collected: {{$r["collection_date"]}}</small></p>

@endforeach
</div>

<div class="container">
  <h2>Results yesterday</h2>
  @foreach($filtered_results_array_yesterday as $r)
  
    

      <p>{{$r["test_result"]}}: {{$r["count"]}}
      <br>
      <small>date collected: {{$r["collection_date"]}}</small></p>

@endforeach
</div>


<div class="container">
   <p class="text-center">
                      <a href="/phl" class="btn btn-primary btn-block">Check Previous  Days</a>
                  </p>


</div>

  


  @endsection