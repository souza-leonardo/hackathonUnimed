<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/lib/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/helper.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link href="{{asset('css/lib/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/help.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .alert{
            color: #fff;
        }
    </style>

    @yield('css')


</head>
<body class="fix-header fix-sidebar">
    <div id="app">
        <div class="preloader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
            </svg>
        </div>
        <!-- Main wrapper  -->
        <div id="main-wrapper">
            <!-- header header  -->
            <div class="header">
                <nav class="navbar top-navbar navbar-expand-md navbar-light">
                    <!-- Logo -->
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <!-- Logo icon -->
                            <b style="color: #056f18;"><i class="fa fa-heartbeat"></i></b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span><span style="color: #056f18;">Grupo</span> Haka</span>
                        </a>
                    </div>
                    <!-- End Logo -->
                    <div class="navbar-collapse">
                        <!-- toggle and nav items -->
                        <ul class="navbar-nav mr-auto mt-md-0">
                            <!-- This is  -->
                            <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                            <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        </ul>
                        <!-- Usuario profile and search -->
                        <ul class="navbar-nav my-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{\Auth::user()->nome}}  <span class="fa fa-gears"></span></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="dropdown-user">
                                        <li><a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Sair
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- End header header -->
            <!-- Left Sidebar  -->
            <div class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-devider"></li>
                            <li>
                            @if(\Auth::user()->tipo_usuario == 1)
                            <li> <a href="{{ route('medicos.cadastroAgenda') }}" aria-expanded="false"><i class="fa fa-calendar"></i><span class="hide-menu">Cadastrar Horários</span></a>
                            </li>
                                <li>
                                    <a href="{{ route('medicos.listarConsulta') }}" aria-expanded="false"><i class="fa fa-stethoscope"></i><span class="hide-menu">Consultas Agendadas</span></a>
                                </li>
                            @endif
                            @if(\Auth::user()->tipo_usuario == 2)
                                <li> <a href="{{ route('pacientes.agendar') }}" aria-expanded="false"><i class="fa fa-hospital-o"></i><span class="hide-menu">Agendar Consulta</span></a>
                                </li>
                                @php $consulta = \App\Models\Consulta::where('status', "E")->where('paciente_id', \Auth::user()->id)->first(); @endphp
                                @if($consulta)
                                    <li> <a href="{{ route('pacientes.agendarEspecialista') }}" aria-expanded="false"><i class="fa fa-hospital-o"></i><span class="hide-menu">Agendar Consulta Especialista</span></a>
                                @endif
                            @endif

                            @if(\Auth::user()->tipo_usuario == 3)
                                <li><a href="{{ route('procedimentos.abertos') }}" aria-expanded="false"><i class="fa fa-th-list"></i><span class="hide-menu">Procedimentos em Aberto</span></a></li>
                            @endif
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </div>
            <!-- End Left Sidebar  -->
            <!-- Page wrapper  -->
            <div class="page-wrapper">
                <!-- Container fluid  -->
                <div class="container-fluid">
                    <!-- Start Page Content -->
                    @if (Session::has('warning'))
                        <div class="alert alert-warning" style="color: black;">{{ Session::get('warning') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger" style="color: black;">{{Session::get('error')}}</div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success" style="color: black;">{{ Session::get('success') }}</div>
                    @endif

                    @yield('content')
                </div>
            </div>
            <!-- footer -->
            {{--<footer class="footer"> © 2018 All rights reserved.</footer>--}}
        </div>
    </div>

    <!-- Modal Help -->
    <div class="modal fade" id="modalHelp" tabindex="-1" role="dialog" aria-labelledby="modalHelp" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content" style="background-color: #c5f1ff; color: #1c68a5;">
                <div class="modal-header">
                    <h4 class="modal-title" style="color: #1c68a5;"><b>Ajuda</b></h4>
                </div>
                <div class="modal-body" id="bodyHelp">
                    @yield('help')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-info btn-sm" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}

    <script src="{{asset('js/lib/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('js/lib/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('js/lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{asset('js/jquery.slimscroll.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('js/lib/metismenu/metismenu.min.js')}}"></script>
    <!--stickey kit -->
    <script src="{{asset('js/lib/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    {{--<script src="{{asset('js/jquery.maskedinput-1.1.4.pack.js')}}"></script>--}}
    <script src="{{asset('js/jquery.mask.js')}}"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <script src="{{asset('js/mascara.js')}}"></script>
    <script src="{{asset('js/lib/toastr/toastr.min.js')}}"></script>

    @stack('scripts')

    <script>
        Number.prototype.formatReal = function() {
            places = 2;
            symbol = "R$";
            thousand = ".";
            decimal = ",";
            var number = this,
                negative = number < 0 ? "-" : "",
                i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + "",
                j = (j = i.length) > 3 ? j % 3 : 0;
            return symbol + " " + negative + (j ? i.substr(0, j) + thousand : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : "");
        };
        $(".alert").fadeTo(3000, 500).slideUp(500, function(){
            $(".alert").alert('close');
        });
    </script>

</body>
</html>
