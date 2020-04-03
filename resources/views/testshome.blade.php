@extends('layouts.app')

@section('content')
<div class="container">



    <div class="row justify-content-center">
        <div class="col">

            <h1 class="text-center">United States COVID Tests Today</h1>
            <p class="text-center"><small >{{$total_tests_data_today[0]["lastModified"]}}</small></p>

            <h2 class="text-center">{{number_format($number_of_new_tests)}} new tests today</h2>

            <h2 class="text-center">{{number_format($total_tests_data_today[0]["totalTestResults"])}} total</h2>

            
            


            <p>This site allows you to view a side-by-side comparison of the daily change in the number of corona virus tests, infections and hospitalizations.</p>

            <p>This site would not be possible without the data collected by the <a href="https://covidtracking.com" target="_blank">Covid Tracking project</a>. Data from the site is gathered using their <a href="https://covidtracking.com/api" target="_blank">API</a>.</p>

        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col">



            <h2>Comparison by State</h2>
            <form method="POST" action="/compare">


                {{-- include csrf field in all of our forms for authentication --}}
                {{ csrf_field() }}

                <div class="form-group">

                    <fieldset>


                        <div>


                            {{-- Have to convert from string to unix using strtotime and then to SQL time --}}
                      {{--   <input type="datepicker" id="datepicker" name="datepicker"

                        min="2020-03-04" max="2200-12-31"   
                        required /> --}}

                        <legend>Select comparison</legend>
                        <fieldset>
                            <label>Compare 
                                <select name="datepicker">
                                    @foreach($selects as $select)
                                    <option value="{{$select[0]}}">{{$select[1]}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </fieldset>

                        <fieldset>

                            <label>
                                to previous day's data in:      

                            <select name="state">
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option selected="selected" value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
                            </select>  
                        </label></fieldset></div>

                        <div class="form-group">
                            <p>
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </p>
                      </div> 

                  </form>

              </div>
          </div>
      </div>



      @endsection
