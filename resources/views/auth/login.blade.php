<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Entrar - Invicta Engenharia') }}</title>

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/favicon.png')}}">

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/lib/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{asset('css/helper.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .login-form label{
            text-transform: none;
        }
        .container-fluid{
            height: 100vh;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }
        .row{
            width: 100%;
        }
    </style>

</head>
<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-content card" style="margin-top: 1em; margin-bottom: -1px;">
                        <div class="login-form" style="margin-top: -50px;">
                            <div class="text-center">
                                <img src="{{asset('images/logoUnimed.png')}}" alt="" class="mx-auto d-block" width="60%">
                            </div>
                            <form method="POST" action="{{route('login')}}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label>Username</label>
                                    <input name="username" type="username" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" placeholder="username" value="{{old('username')}}">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('username')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input name="password" type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="Senha">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{$errors->first('password')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                    <label class="custom-control-label" for="customCheck1">Lembrar-me</label>
                                </div>
                                <button type="submit" class="btn btn-flat m-b-30 m-t-30" style="background: #056f18; color: white;">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Wrapper -->
<!-- All Jquery -->
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

</body>

</html>