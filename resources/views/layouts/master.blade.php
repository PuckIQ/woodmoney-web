<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>PuckIQ @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
    <link href="{{ asset('css/css/fixes/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/custom.css')}}" rel="stylesheet">
    @yield('stylesheets')
  </head>

  <body>
    @include('components.nav')    

    @yield('content')
        
    <!-- /container -->
    <!-- Core JavaScript
    ================================================== -->
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="{{ asset('js/fixes/ie10-viewport-bug-workaround.js')}}"></script>
    @yield('javascript')
  </body>
</html>
