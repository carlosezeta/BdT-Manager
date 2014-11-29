<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Carlos R. ezetahosting.com">

    <title>
		@section('title')
            BdT Pont del Dimoni
		@show
    </title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Social Buttons -->
    <link href="{{ asset('css/bootstrap-social.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('css/plugins/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome-4.1.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <!--<link href="{{ asset('css/icomoon.css') }}" rel="stylesheet">-->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    @section('styles')
    @show

</head>

<body>
    <!-- Admin Navigation -->
    @if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
    <nav class="navbar navbar-inverse navbar-static-top admin hidden-xs" role="navigation" style="margin-bottom: 0">
        <a class="navbar-brand" href="{{ URL::route('home') }}">Administración</a>
        <ul class="nav navbar-nav">

                <li {{ (Request::is('users*') ? 'class="active"' : '') }}><a href="{{ URL::action('Sentinel\UserController@index') }}">Usuarios</a></li>
                <li {{ (Request::is('groups*') ? 'class="active"' : '') }}><a href="{{ URL::action('Sentinel\GroupController@index') }}">Grupos</a></li>
                <li {{ (Request::is('categorias*') ? 'class="active"' : '') }}><a href="{{ URL::action('CategoriaController@index') }}">Categorías</a></li>
                <li {{ (Request::is('noticias*') ? 'class="active"' : '') }}><a href="{{ URL::action('NoticiasController@index') }}">Noticias</a></li>
                <li {{ (Request::is('ofertas*') ? 'class="active"' : '') }}><a href="/ofertas">Ofertas</a></li>
                <li {{ (Request::is('demandas*') ? 'class="active"' : '') }}><a href="/demandas">Demandas</a></li>
                <li {{ (Request::is('propuestas*') ? 'class="active"' : '') }}><a href="{{ URL::action('PropuestasController@index') }}">Propuestas</a></li>
                <li {{ (Request::is('talleres*') ? 'class="active"' : '') }}><a href="{{ URL::action('TallersController@index') }}">Talleres</a></li>
                <li {{ (Request::is('tareas*') ? 'class="active"' : '') }}><a href="{{ URL::action('TareasController@index') }}">Tareas</a></li>
        </ul>
    </nav>
    @endif
    <div id="wrapper">


        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top nav-header" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ URL::route('home') }}">
                    {{ HTML::image('imgs/logo.png', 'logo', array('class' => 'logo')) }}
                    {{ HTML::image('imgs/header.jpg', 'header', array('class' => 'header hidden-xs hidden-sm')) }}</a>
            </div>
            <!-- /.navbar-header -->




            <ul class="nav navbar-top-links navbar-right hidden-xs">
                @section('top-right')
                    @if (Sentry::check())
                    <strong>Saldo: <span class="horas-{{ (Sentry::getUser()->horas>1) ? 'positivas' : 'negativas' }}">{{ Sentry::getUser()->horas.' horas' }}</span></strong>
                    @endif
                @show

                @if (Sentry::check())
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/socis/{{ Session::get('userId') }}"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::route('Sentinel\logout') }}"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
                @else
				<li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="{{ URL::route('Sentinel\login') }}">Acceder</a></li>
				<li {{ (Request::is('users/create') ? 'class="active"' : '') }}><a href="{{ URL::route('Sentinel\register') }}">Registrarse</a></li>
                @endif
            </ul>
            <!-- /.navbar-top-links -->


        	@include('site.sidebar')

		</nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">

				<!-- Notifications -->
				@include('Sentinel::layouts/notifications')
				<!-- ./ notifications -->

                <div class="row">
                    <div class="col-lg-12">
{{--
                        @if (Session::has('message'))
                            <div class="flash alert">
                                <p>{{ Session::get('message') }}</p>
                            </div>
                        @endif
 --}}
                        @yield('content')

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->


    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('js/plugins/metisMenu/metisMenu.min.js') }}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>

	<!-- Thanks to Zizaco for the Restfulizer script.  http://zizaco.net  -->
    <script src="{{ asset('packages/rydurham/sentinel/js/restfulizer.js') }}"></script>

    @section('scripts')
    @show

</body>

</html>
