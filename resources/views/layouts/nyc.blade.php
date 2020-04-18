@extends('layouts.app')

@section('content')



<div class="container">
  <div class="row mt-3">
    <div class="col border">
      <h2 class="text-center p-3">NYC Quick View</h2>


      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            
            <!-- <th scope="col" >Date</th> -->
            <th scope="col">{{$all[0][1]}}</th>
            <th scope="col">Deaths</th>
            
            
          </tr>
        </thead>
        <tbody>

          <tr>
         <!--     <td>
            {{$all[2][2]}}
          </td> -->
           <td>
            {{number_format($all[0][2])}}
          </td>            

           <td>
            {{number_format($all[1][2])}}
          </td>
           

         

       </tr>

      


</tbody>
</table>


                    <p class="text-center">
                      <a href="/nyc" class="btn btn-primary btn-block">Check Previous  Days</a>
                  </p>

</div>
</div>
</div>



  @endsection