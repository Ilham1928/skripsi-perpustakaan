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
<body class="login-page" style="background-color:rgb(0 0 0 / 58%); max-width:600px; margin:15% auto;">
    <div class="login-box">
        <div class="card" style="background:rgba(190, 190, 190, 0.5)">
            <div class="heder" style="padding-top:2px;">
                @if($errors->any())
                    <h4 class="text-red text-center">{{$errors->first()}}</h4>
                @endif
            </div>
            <div class="body" style="padding:40px;">
                <form action="{{ url('register') }}" id="sign_in" method="POST">
                    @csrf
                    <div class="logo">
                        <a href="javascript:void(0);">Perpustakaan Online</a><br>
                        <small class="text-sm">Diwajibkan Mendaftar Menggunakan NISN</small>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <label class="text-white text-sm">Nama Siswa &nbsp;</label>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control"
                                name="name" autocomplete="off" value="{{ request()->old('name') ?? '' }}"
                            />
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <label class="text-white text-sm">Kelas
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control"
                                name="class" autocomplete="off" value="{{ request()->old('class') ?? '' }}"
                            />
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <label class="text-white text-sm">NISN
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                        </span>
                        <div class="form-line">
                            <input type="number" class="form-control"
                                name="nisn" autocomplete="off" value="{{ request()->old('nisn') ?? '' }}"
                            />
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <label class="text-white text-sm">Password
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </label>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control"
                                name="password" autocomplete="off" value="{{ request()->old('password') ?? '' }}"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5" style="margin-left:160px;">
                            <button class="btn btn-block bg-primary waves-effect" type="submit">Daftar</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-12 align-right">
                            <a href="{{ url('login') }}" class="text-white font-weight-bold">Masuk / Sign In</a>
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
