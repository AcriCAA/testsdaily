@extends('layouts.app')

@section('content')



<div class="container">
  <h2>PA Mail in Count</h2>
  
<p><small>source: <a href="{{$source}}" target="_blank">{{$source}}</a></small></p>
  


   <p>Ballots Cast: {{number_format($result["ballots_cast"])}}</p>
  <p>Ballots Counted: {{number_format($result["ballots_counted"])}}</p>
  <p>Ballots Remaining: {{number_format($result["ballots_remaining"])}}</p>
  <p>Percent: {{$result["percent_remaining"]}}</p>

  @endsection