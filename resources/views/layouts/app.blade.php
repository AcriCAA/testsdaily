<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://kit.fontawesome.com/ecf7066307.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

        <footer class="text-white bg-secondary">
      <div class="container bg-secondary">


        <p class="float-right mt-1 p-3 text-white">
          <a href="#"><i class="fas fa-2x fa-angle-double-up text-white"></i></a>
        </p>
<div class="row">
        
              <p class="px-3">Tests Daily was created by the team at <a href="https://agstrategic.design">AG Strategic Design</a> .</p>

              <p class="px-3">This site would not be possible without the data collected by the <a href="https://covidtracking.com" target="_blank">Covid Tracking project</a>. Data from the site is gathered using their <a href="https://covidtracking.com/api" target="_blank">API</a>.</p>
</div>
<div class="row mt-3 p-3">
    

    
    <div class="col"><p class="text-center"><a href="https://agstrategic.design"><img src="https://static1.squarespace.com/static/5637dd4fe4b0fdf09da27c13/t/5a99e9cc8165f55874ff3a6c/1536621140361/?format=1500w" alt="AG Strategic Design" height=150 /></a></p></div>
    
</div>

      </div>
    </footer>
</body>
</html>
