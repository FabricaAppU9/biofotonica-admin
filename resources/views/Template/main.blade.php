<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>LasConf Web App</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:600,700" rel="stylesheet">
        <!-- Bootstrap Core CSS -->
        <link href="{{url('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="{{url('assets/vendor/metisMenu/metisMenu.min.css')}}" rel="stylesheet">
        <!-- CSS Select + Search -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
        <!-- Custom CSS -->
        <link href="{{url('assets/css/custom.css')}}" rel="stylesheet">
        <link href="{{url('assets/css/sb-admin-2.css')}}" rel="stylesheet">
        <!-- Custom Fonts -->
        <link href="{{url('assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{url('assets/css/reset.css')}}">  


        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <!--js do bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
  
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href=""><STRONG>BIO</strong>-<small>FOTONICA!</small></a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Sair </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        </ul>
                    </li>
                </ul>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav in" id="side-menu">
                            <li>
                                <a href="{{route('index')}}"><i class="fa fa fa-industry fa-fw"></i> Pagina Inicial</a>
                            </li>
                            @if(Auth::user()->isAdmin())
                                <li>
                                    <a href="{{route('admin')}}"><i class="fa fa-wrench fa-fw"></i> Gerenciar Usuarios</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="page-wrapper">

                @yield('content')

            </div>
        </div>


        <!--JS Select + Search -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

        <!-- Custom Theme JavaScript -->

        @yield('scripts')
    </body>

</html>
