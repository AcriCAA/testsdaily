@extends('layouts.app')

@section('content')
<div class="container">


    <div class="jumbotron">
      <h1 class="display-4">United States COVID Tests</h1>


      <hr class="my-4">



            <div class="row mt-3">
                    <div class="col">

                      <h2>Sorry, there was an ERROR retrieving the data</h2>
                     <p>The data source - the <a href="https://covidtracking.com/api" target="_blank">Covid Tracking project API</a> - may be currently down or receiving too many requests at the moment. Please try again later.</p>
                 </div>
             </div>

</div>

                     @endsection

                 






