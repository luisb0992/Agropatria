<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title',config('app.name'))</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Datapicker -->
    
    <!--principal-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/estilos-propios.css')}}">
    
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
   
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
   
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/glyphicons.css')}}">
    
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('plugins/jquery_datepicker/jquery-ui.css')}}">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/highcharts.css')}}">
    <link rel="shortcut icon" href="{{asset('img/unnamed.png')}}">
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">

  </head>

  <style type="text/css">
    .view-subtitle{
      color: #d22a2a;
      font-weight: 600;
      font-size: 17px;
    }

    .perfil{
      position: relative;
      background: #fff;
      border: 1px solid #f4f4f4;
      padding: 20px;
      margin: 10px 25px;
    }

    .separador{ 
       border: 0.3px solid #dd4b39; 
       border-radius: 200px /8px; 
       height: 0px; 
       text-align: center; 
     }
      .navbar{
        margin-top: 0px;
        margin-bottom: 0px;
        padding: 0px;
      }

  </style>
  <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{url('/dashboard')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>VR</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Venezolana de Riego</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user" aria-hidden="true"></i>
                  <span class="hidden-xs">
                  @if(Auth::check())
                    {{ Auth::user()->name }} {{ Auth::user()->ape }}
                  @endif  
                  </span>
                </a>
                <ul class="dropdown-menu">

                  <!-- User image -->
                  <li class="div-padding">
                    <p class="text-left text-capitalize">
                    @if(Auth::check())
                        @if((Auth::user()->perfil_id)==1)
                          <p>
                            <label for="">E-mail</label><br>
                            <span>{{ Auth::user()->email }}</span>
                          </p>
                          <p>
                            <label for="">Perfil</label><br>
                            <span class="text-primary">Administrador</span>
                          </p>
                          
                        @elseif((Auth::user()->perfil_id)==2)
                          <p>
                            <label for="">E-mail</label><br>
                            <span>{{ Auth::user()->email }}</span>
                          </p>
                          <p>
                            <label for="">Perfil</label><br>
                            <span class="text-warning">Usuario</span>
                          </p>
                        @endif
                    @endif  
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                  @if(Auth::check())
                   @if((Auth::user()->perfil_id)==1)
                    <div class="pull-left">
                      <a href="{{ url('users/'.Auth::user()->id.'/edit') }}" class="btn btn-warning"><span class="white-text">EDITAR</span></a>
                    </div>
                   @endif 
                  @endif 
                     <div class="pull-right">
                     <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" 
                        class="btn btn-danger">
                           Salir
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         {{ csrf_field() }}
                     </form>
                     </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      @if(Auth::check())
      @if(Auth::user()->status == 1)
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            @if(Auth::user()->perfil_id==2)
              <li><a href="{{url('/departamentos')}}"><i class="glyphicon glyphicon-duplicate"></i> DEPARTAMENTOS</a></li>
              <li><a href="{{url('/categorias')}}"><i class="glyphicon glyphicon-th-list"></i> CATEGORIAS</a></li>
              <li><a href="{{url('/productos')}}"><i class="fa fa-list-alt"></i> BIENES</a></li> 
            @endif
            @if(Auth::user()->perfil_id==1)
              <li><a href="{{url('/users')}}"><i class="fa fa-users"></i> USUARIOS</a></li>
              <li><a href="{{url('/inventario')}}"><i class="fa fa-list-alt"></i> INVENTARIO</a></li>
              <!-- <li><a href="{{url('/estadisticas')}}"><i class="fa fa-pie-chart"></i> ESTADISTICAS</a></li> -->
              <li><a href="{{url('/bitacora')}}"><i class="fa fa-database"></i> BITACORA</a></li>
            @endif
  
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      @endif
      @endif
       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Venezolana de Riego C.A.</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                             @yield('content') 
                              <!--Fin Contenido-->
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer text-center">
        <strong>Copyright &copy; {{date("Y")}} Venezolana de Riego C.A.</strong> All rights reserved.
      </footer>

      
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
   
    @yield('script')
  </body>
</html>

