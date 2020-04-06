<div class="container">
  <div class="row mt-3">
    <div class="col border">

      <h2 class="text-center p-3">Days Comparison</h2  >
      <table class="table table-striped">
        <thead>
          <tr>

            <th scope="col"class="text-right">{{$feed->original_day_formatted}}</th>
            <th scope="col" class="text-center"></th>
            <th scope="col" class="text-left">{{$feed->previous_day_formatted}}</th>
          </tr>
        </thead>
        <tbody>
  



      <tr>

        <td class="text-right">

         @if(!empty($feed->page_data_day1["hospitalizedIncrease"]))

         {{number_format($feed->page_data_day1["hospitalizedIncrease"])}}

         @endif

       </td>

       <td class="text-center">
        hospitalized increase
      </td>

      <td class="text-left">

       @if(!empty($feed->page_data_day2["hospitalizedIncrease"]))

       {{number_format($feed->page_data_day2["hospitalizedIncrease"])}}
       
       @endif

     </td>

   </tr>

   <tr>

    <td class="text-right">
      @if(!empty($feed->page_data_day1["negativeIncrease"]))
      {{number_format($feed->page_data_day1["negativeIncrease"])}}

      @endif        
    </td>

    <td class="text-center">
      negative increase
    </td>

    <td class="text-left">
     @if(!empty($feed->page_data_day2["negativeIncrease"]))
     {{number_format($feed->page_data_day2["negativeIncrease"])}}

     @endif

   </td>

 </tr>

 <tr>

  <td class="text-right">
   @if(!empty($feed->page_data_day1["positiveIncrease"]))
   {{number_format($feed->page_data_day1["positiveIncrease"])}}

   @endif              
 </td>

 <td class="text-center">
  positive increase
</td>

<td class="text-left">
  @if(!empty($feed->page_data_day2["positiveIncrease"]))
  {{number_format($feed->page_data_day2["positiveIncrease"])}}

  @endif  

</td>

</tr>


<tr>

  <td class="text-right">

    @if(!empty($feed->page_data_day1["hospitalized"]))
    {{number_format($feed->page_data_day1["hospitalized"])}}

    @endif

  </td>

  <td class="text-center">
    hospitalized cumulative
  </td>

  <td class="text-left">

    @if(!empty($feed->page_data_day2["hospitalized"]))
    {{number_format($feed->page_data_day2["hospitalized"])}}

    @endif

  </td>



</tr>
<tr>

  <td class="text-right">
   @if(!empty($feed->page_data_day1["total"]))
   {{number_format($feed->page_data_day1["total"])}}

   @endif

 </td>

 <td class="text-center">
  cumulative tests completed since testing began
</td>

<td class="text-left">
 @if(!empty($feed->page_data_day2["total"]))
 {{number_format($feed->page_data_day2["total"])}}

 @endif

</td>

</tr>

 {{--           <tr>
      
      <td class="text-right">
              
      </td>

      <td class="text-center">
        
      </td>

      <td class="text-left">
        

      </td>

    </tr> --}}


  </tbody>
</table>
</div>
</div>
</div