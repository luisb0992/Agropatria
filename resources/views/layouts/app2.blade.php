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
    <link rel="stylesheet" href="{{asset('css/estilos-propios.css')}}">

     <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('plugins/jquery_datepicker/jquery-ui.css')}}">


  </head>
  <body class="gris-oscuro">
    
   <!--Contenido-->
     @yield('content') 
  <!--Fin Contenido-->
      
   <!-- jQuery 3.1.4 -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('plugins/jquery_datepicker/external/jquery/jquery.js')}}"></script>
    <script src="{{asset('plugins/jquery_datepicker/jquery-ui.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>

    <script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('js/funciones.js')}}"></script>
  
  </body>
</html>
