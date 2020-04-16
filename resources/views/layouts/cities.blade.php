@extends('layouts.app')

@section('content')



<div class="container">
  <div class="row mt-3">
    <div class="col border">
      <h2 class="text-center pt-3">{{$city}}</h2>
      <p class="text-center pb-3"><small><a href="{{$source}}" target="_blank">source</a></small></p>

      <h3>Daily data</h3>

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


<div class="row">
  
  <div class="col">

    <h3 class="mt-3">More Data</h3>
    
    @if($city == "New York")
      <p>More information available <a href="https://www1.nyc.gov/site/doh/covid/covid-19-data.page" target="_blank">here on NYC.gov</a></p>
    @elseif($city == "Philadelphia")

      <p>More data is available <a href="https://www.phila.gov/programs/coronavirus-disease-2019-covid-19/testing-and-data/" target="_blank">here from phila.gov</a></p>

      <h3>Daily Chart Data from Phila.gov</h3>

      <div class='tableauPlaceholder' id='viz1586691867541' style='position: relative'><noscript><a href='https:&#47;&#47;www.phila.gov&#47;programs&#47;coronavirus-disease-2019-covid-19&#47;testing-and-data&#47;'><img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;CO&#47;COP-COVID-19&#47;Covid-19Split&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='COP-COVID-19&#47;Covid-19Split' /><param name='tabs' value='no' /><param name='toolbar' value='no' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;CO&#47;COP-COVID-19&#47;Covid-19Split&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1586691867541');                    var vizElement = divElement.getElementsByTagName('object')[0];                    if ( divElement.offsetWidth > 800 ) { vizElement.style.width='780px';vizElement.style.height='800px';} else if ( divElement.offsetWidth > 500 ) { vizElement.style.width='780px';vizElement.style.height='800px';} else { vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*1.77)+'px';}                     var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script>


</div>



    @endif

  </div>  
</div>
</div>



  @endsection