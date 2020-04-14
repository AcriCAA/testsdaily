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

       <tr>
        <td><a href="https://www.phila.gov/programs/coronavirus-disease-2019-covid-19/testing-and-data/" target="_blank">more data from phila.gov</a></td>
        <td></td>
        <td></td>
      </tr>

      


</tbody>
</table>

</div>
</div>
</div>


<div class="container">
  <div class="row mt-3">
    <div class="col">

<div class='tableauPlaceholder' id='viz1586691867541' style='position: relative'><noscript><a href='https:&#47;&#47;www.phila.gov&#47;programs&#47;coronavirus-disease-2019-covid-19&#47;testing-and-data&#47;'><img alt=' ' src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;CO&#47;COP-COVID-19&#47;Covid-19Split&#47;1_rss.png' style='border: none' /></a></noscript><object class='tableauViz'  style='display:none;'><param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> <param name='embed_code_version' value='3' /> <param name='site_root' value='' /><param name='name' value='COP-COVID-19&#47;Covid-19Split' /><param name='tabs' value='no' /><param name='toolbar' value='no' /><param name='static_image' value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;CO&#47;COP-COVID-19&#47;Covid-19Split&#47;1.png' /> <param name='animate_transition' value='yes' /><param name='display_static_image' value='yes' /><param name='display_spinner' value='yes' /><param name='display_overlay' value='yes' /><param name='display_count' value='yes' /></object></div>                <script type='text/javascript'>                    var divElement = document.getElementById('viz1586691867541');                    var vizElement = divElement.getElementsByTagName('object')[0];                    if ( divElement.offsetWidth > 800 ) { vizElement.style.width='780px';vizElement.style.height='800px';} else if ( divElement.offsetWidth > 500 ) { vizElement.style.width='780px';vizElement.style.height='800px';} else { vizElement.style.width='100%';vizElement.style.height=(divElement.offsetWidth*1.77)+'px';}                     var scriptElement = document.createElement('script');                    scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';                    vizElement.parentNode.insertBefore(scriptElement, vizElement);                </script>


</div></div></div>

  @endsection