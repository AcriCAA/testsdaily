<div class="container">
  

 

 <div class="row mt-3">

    <div class="col mx-5">

        <form method="POST" action="/previousday">


                        {{-- include csrf field in all of our forms for authentication --}}
                        {{ csrf_field() }}

                <div class="form-group">


                    <select name="state" style="display:none">
                        <option selected="selected" value="{{$feed->state}}"></option>
                    </select>


                    <select name="datepicker"  style="display:none"><option selected="selected" value="{{$feed->previous_day}}"></option></select>

                    <p>
                      <button type="submit" class="btn btn-primary btn-block">Check Previous Two Days</button>
                  </p>
              </div> 

          </form>

        
    </div>
     
 </div> <!-- close row -->

   <div class="row">
    <div class="col">
       <p class="text-center"><small><a href="https://covidtracking.com/api/v1/states/{{$feed->state}}/{{$feed->original_day}}">source data</a></small></p>
    </div>
  </div>

</div> {{-- container --}}