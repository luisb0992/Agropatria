<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title',config('app.name'))</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!--principal-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
   
    <!-- bootstrap material-->

    <link rel="stylesheet" href="{{ asset('css/material/bootstrap-material-design.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material/bootstrap-material-design.css.map') }}">
    <link rel="stylesheet" href="{{ asset('css/material/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material/bootstrap-material-design.min.css.map') }}">
    <link rel="stylesheet" href="{{ asset('css/material/ripples.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material/ripples.css.map') }}">
    <link rel="stylesheet" href="{{ asset('css/material/ripples.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material/ripples.min.css.map') }}">
   
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">


  </head>
  <body class="white">
    
   <!--Contenido-->
     @yield('content') 
  <!--Fin Contenido-->
      
    <!-- jQuery 3.1.4 -->
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
    <script src="{{ asset('js/material/material.js') }}"></script>
    <script src="{{ asset('js/material/material.min.js') }}"></script>
    <script src="{{ asset('js/material/material.min.js.map') }}"></script>
    <script src="{{ asset('js/material/ripples.js') }}"></script>
    <script src="{{ asset('js/material/ripples.min.js') }}"></script>
    <script src="{{ asset('js/material/ripples.min.js.map') }}"></script>
    
    <script>$.material.init();</script>
    <script>
      $('#myButton').on('click', function () {
        var $btn = $(this).button('loading')
        // business logic...
        $btn.button('reset')
      })
    </script>
  </body>
</html>
