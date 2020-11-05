@extends('layouts.app')

@section('content')



<div class="container">
  <h2>PA Mail in Count</h2>
  
<p><small>source: <a href="{{$source}}" target="_blank">{{$source}}</a></small></p>
  


   <p>Ballots Cast: {{number_format($result["ballots_cast"])}}</p>
  <p>Ballots Counted: {{number_format($result["ballots_counted"])}}</p>
  <p>Ballots Remaining: {{number_format($result["ballots_remaining"])}}</p>
  <p>Percent Remaining: {{$result["percent_remaining"]}}</p>


  <hr>

  <h2>Key County Ballot counts remaining</h2>
<p>Philadelphia: {{number_format($phl)}}</p>
<p>Allegheny (Pitts): {{number_format($pitt)}}</p>
<p>Chester: {{number_format($chester)}}</p>
<p>Montgomery: {{number_format($mont)}}</p>
<p>Delaware: {{number_format($del)}}</p>
<p>Sum of all other remaining county ballots: {{number_format($other)}}</p>


  @endsection