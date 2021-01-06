<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | {{ $title ?? '' }}</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/node-waves/waves.css') }}"rel="stylesheet" />
    <link href="{{ asset('plugins/animate-css/animate.css') }}"rel="stylesheet" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style media="screen">
        body {
            background: url('{{ asset("background.svg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
        }
        .text-white { color: #fff !important; }
        .text-red { color: red !important; }
        .text-md { font-size: 30px !important; }
        .text-sm { font-size: 15px !important; }
        .input-group input[type="text"], .input-group .form-control { padding: 6px 12px !important; }
    </style>
</head>
<body class="login-page" style="background-color:rgb(0 0 0 / 58%); max-width:500px; margin:15% auto;">
    <div class="login-box">
        <div class="card" style="background:rgba(190, 190, 190, 0.5)">
            <div class="heder" style="padding-top:2px;">
                @if($errors->any())
                    <h4 class="text-red text-center">{{$errors->first()}}</h4>
                @endif
            </div>
            <div class="body">
                <form action="{{ url('login') }}" id="sign_in" method="POST">
                    @csrf
                    <div class="logo">
                        <a href="javascript:void(0);">Perpustakaan Online</a>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons text-md">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control"
                                name="account" placeholder="NISN" autocomplete="off"
                                value="{{ request()->old('account') ?? '' }}"
                            />
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons text-md">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-primary waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-12 align-right">
                            <a href="sign-up.html" class="text-white font-weight-bold">Sign Up?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<footer>
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('plugins/node-waves/waves.js') }}"></script>
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/pages/examples/sign-in.js') }}"></script>
</footer>
</html>
