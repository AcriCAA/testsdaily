<div class="container">
  <div class="row mt-3">
    <div class="col border">
      <h2 class="text-center p-3">Days Comparison</h2>


      <table class="table table-striped">
        <thead class="thead-dark">
          <!-- new row -->
          <tr>
            <th scope="col"class="text-right">{{$feed->original_day_formatted}}</th>
            <th scope="col" class="text-center"></th>
            <th scope="col" class="text-left">{{$feed->previous_day_formatted}}</th>
          </tr>
        </thead>
        <tbody>

          <!-- new row -->
          <tr>

            <td class="text-right">

             @if(!empty($feed->page_data_day1["hospitalizedIncrease"]))

             {{number_format($feed->page_data_day1["hospitalizedIncrease"])}}

             @if($feed->page_data_day1["hospitalizedIncrease"] > $feed->page_data_day2["hospitalizedIncrease"])
             <i class="fas fa-chevron-circle-up text-danger"></i>
             @elseif($feed->page_data_day1["hospitalizedIncrease"] < $feed->page_data_day2["hospitalizedIncrease"])
             <i class="fas fa-chevron-circle-down text-success"></i>
             @endif

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

       <!-- new row -->
       <tr>

        <td class="text-right">
          @if(!empty($feed->page_data_day1["negativeIncrease"]))
          {{number_format($feed->page_data_day1["negativeIncrease"])}}


          @if($feed->page_data_day1["negativeIncrease"] > $feed->page_data_day2["negativeIncrease"])
          <i class="fas fa-chevron-circle-up text-success"></i>
          @elseif($feed->page_data_day1["negativeIncrease"] < $feed->page_data_day2["negativeIncrease"])
          <i class="fas fa-chevron-circle-down text-danger"></i>
          @endif     


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

     <!-- new row -->
     <tr>

      <td class="text-right">
       @if(!empty($feed->page_data_day1["positiveIncrease"]))
       {{number_format($feed->page_data_day1["positiveIncrease"])}}

       @if($feed->page_data_day1["positiveIncrease"] > $feed->page_data_day2["positiveIncrease"])
       <i class="fas fa-chevron-circle-up text-danger"></i>
       @elseif($feed->page_data_day1["positiveIncrease"] < $feed->page_data_day2["positiveIncrease"])
       <i class="fas fa-chevron-circle-down text-success"></i>
       @endif     


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


  <!-- new row -->
  <tr>

    <td class="text-right">

      @if(!empty($feed->page_data_day1["hospitalizedCurrently"]))
      {{number_format($feed->page_data_day1["hospitalizedCurrently"])}}

      @if($feed->page_data_day1["hospitalized"] > $feed->page_data_day1["hospitalizedCurrently"])
      <i class="fas fa-chevron-circle-up text-danger"></i>
      @elseif($feed->page_data_day1["hospitalized"] < $feed->page_data_day1["hospitalizedCurrently"])
      <i class="fas fa-chevron-circle-down text-success"></i>
      @endif

      @endif

    </td>

    <td class="text-center">
      hospitalized cumulative
    </td>

    <td class="text-left">
 @if(!empty($feed->page_data_day2["hospitalizedCurrently"]))
      {{number_format($feed->page_data_day2["hospitalizedCurrently"])}}

      @if($feed->page_data_day1["hospitalized"] > $feed->page_data_day2["hospitalizedCurrently"])
      <i class="fas fa-chevron-circle-up text-danger"></i>
      @elseif($feed->page_data_day1["hospitalized"] < $feed->page_data_day2["hospitalizedCurrently"])
      <i class="fas fa-chevron-circle-down text-success"></i>
      @endif

      @endif

    </td>



  </tr>

  <!-- new row -->
  <tr>

    <td class="text-right">
     @if(!empty($feed->page_data_day1["positive"]))
     {{number_format($feed->page_data_day1["positive"])}}

     @if($feed->page_data_day1["positive"] > $feed->page_data_day2["positive"])
     <i class="fas fa-chevron-circle-up text-danger"></i>
     @elseif($feed->page_data_day1["positive"] < $feed->page_data_day2["positive"])
     <i class="fas fa-chevron-circle-down text-success"></i>
     @endif     


     @endif

   </td>

   <td class="text-center">
    cumulative positives since testing began
  </td>

  <td class="text-left">
   @if(!empty($feed->page_data_day2["positive"]))
   {{number_format($feed->page_data_day2["positive"])}}

   @endif

 </td>

</tr>


<!-- new row -->
<tr>

  <td class="text-right">
   @if(!empty($feed->page_data_day1["negative"]))
   {{number_format($feed->page_data_day1["negative"])}}

   @if($feed->page_data_day1["negative"] > $feed->page_data_day2["negative"])
   <i class="fas fa-chevron-circle-up text-success"></i>
   @elseif($feed->page_data_day1["negative"] < $feed->page_data_day2["negative"])
   <i class="fas fa-chevron-circle-down text-danger"></i>
   @endif     


   @endif

 </td>

 <td class="text-center">
  cumulative negatives since testing began
</td>

<td class="text-left">
 @if(!empty($feed->page_data_day2["negative"]))
 {{number_format($feed->page_data_day2["negative"])}}

 @endif

</td>

</tr>


<!-- new row -->
<tr>

  <td class="text-right">
   @if(!empty($feed->page_data_day1["death"]))
   {{number_format($feed->page_data_day1["death"])}}

   @if($feed->page_data_day1["death"] > $feed->page_data_day2["death"])
   <i class="fas fa-chevron-circle-up text-danger"></i>
   @elseif($feed->page_data_day1["death"] < $feed->page_data_day2["death"])
   <i class="fas fa-chevron-circle-down text-success"></i>
   @endif     


   @endif

 </td>

 <td class="text-center">
  cumulative deaths since testing began
</td>

<td class="text-left">
 @if(!empty($feed->page_data_day2["death"]))
 {{number_format($feed->page_data_day2["death"])}}

 @endif

</td>

</tr>




<tr class="table-success">

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



</tbody>
</table>

</div>
</div>
</div>