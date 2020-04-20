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
            <th scope="col">Cases</th>
            <th scope="col">Hospitalized</th>
            <th scope="col">Deaths</th>
            
            <th scope="col">Probable Cases</th>

            
            
          </tr>
        </thead>
        <tbody>

          <tr>
    
          {{-- since the api has been changing the source data table a lot these if statements verifying the label scraped from source table matched my table header --}}
         <td>
          @if(strcasecmp(preg_replace("#[[:punct:]]#", "",$cases[1]),'cases') == 0)
            {{number_format($cases[2])}}
            @endif
          </td>
           
           <td>
            @if(strcasecmp(preg_replace("#[[:punct:]]#", "",$hospitalized[1]),'hospitalized') == 0)
            {{number_format($hospitalized[2])}}
            @endif
          </td>
          <td>
            @if(strcasecmp(preg_replace("#[[:punct:]]#", "",$deaths[1]),'confirmed') == 0)
            {{number_format($deaths[2])}}
            @endif
          </td>            

           <td>
            @if(strcasecmp(preg_replace("#[[:punct:]]#", "",$probable[1]),'probable') == 0)
            {{number_format($probable[2])}}
            @endif
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