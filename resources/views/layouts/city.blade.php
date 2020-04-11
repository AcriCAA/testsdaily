@extends('layouts.app')

@section('content')



<div class="container">
  <div class="row mt-3">
    <div class="col border">
      <h2 class="text-center p-3">City Quick View</h2>


      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col" >City</th>
            <th scope="col">Cases</th>
            <th scope="col">Deaths</th>
            
          </tr>
        </thead>
        <tbody>

          <tr>

           <td>
            {{$filtered[0]}}
          </td>            

           <td>
            {{$filtered[1]}}
          </td>
            <td>
            {{$filtered[2]}}
          </td>

         

       </tr>

      


</tbody>
</table>

</div>
</div>
</div>

  @endsection