@extends('layouts.app')

@section('content')



<div class="container">
  <div class="row mt-3">
    <div class="col border">
      <h2 class="text-center pt-3">{{$city}}</h2>
      <p class="text-center pb-3"><small><a href="{{$source}}" target="_blank">source</a></small></p>


      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col" >Date</th>
            <th scope="col">Cases</th>
            <th scope="col">Deaths</th>
            
          </tr>
        </thead>
        <tbody>

@foreach($collection as $data)
          <tr>

           <td>
            {{$data->created_at}}
          </td>            
          <td>
            {{number_format($data->cases)}}
          </td>
          <td>
            {{number_format($data->deaths)}}
          </td>   

        </tr>

  @endforeach



</tbody>
</table>

</div>
</div>
</div>

  @endsection