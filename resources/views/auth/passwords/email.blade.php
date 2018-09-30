<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ config('blog.meta.keywords') }}">
    <meta name="description" content="{{ config('blog.meta.description') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ config('blog.default_icon') }}">
    <title>@yield('title', config('app.name'))</title>
    <link rel="stylesheet" href="{{ mix('css/home.css') }}">
    <link rel="stylesheet" href="{{ mix('css/themes/' . config('blog.color_theme') . '.css') }}">
    <style>
    .lockscreen {
        background: #e9ecef;
    }

    .lockscreen-logo {
        font-size: 35px;
        text-align: center;
        margin-bottom: 25px;
        font-weight: 300;
    }

    .lockscreen-logo a {
        color: #444;
    }

    .lockscreen-wrapper {
        max-width: 400px;
        margin: 0 auto;
        margin-top: 10%;
    }
    /* User name [optional] */

    .lockscreen .lockscreen-name {
        text-align: center;
        font-weight: 600;
    }
    /* Will contain the image and the sign in form */

    .lockscreen-item {
        border-radius: 4px;
        padding: 0;
        background: #ffffff;
        position: relative;
        margin: 10px auto 30px auto;
        width: 290px;
    }
    /* User image */

    .lockscreen-image {
        border-radius: 50%;
        position: absolute;
        left: -10px;
        top: -25px;
        background: #ffffff;
        padding: 5px;
        z-index: 10;
    }

    .lockscreen-image>img {
        border-radius: 50%;
        width: 70px;
        height: 70px;
    }
    /* Contains the password input and the login button */

    .lockscreen-credentials {
        margin-left: 70px;
    }

    .lockscreen-credentials .form-control {
        border: 0;
    }

    .lockscreen-credentials .btn {
        background-color: #ffffff;
        border: 0;
        padding: 0 10px;
    }

    .lockscreen-footer {
        margin-top: 10px;
    }
    </style>
    <!-- Scripts -->
    <script>
    window.Language = '{{ config('
    app.locale ') }}';

    window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
    </script>
    @yield('styles')
</head>

<body class="lockscreen">
    <div class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="/"><img src="/images/logo-blue.png" alt="Logo"></a>
        </div>
        <!-- User name -->
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="lockscreen-name">{{ lang('Reset Password') }}</div>
        <!-- START LOCK SCREEN ITEM -->
        <div class="lockscreen-item">
            <!-- lockscreen image -->
            <div class="lockscreen-image">
                <img src="/images/ava.png" alt="User Image">
            </div>
            <!-- /.lockscreen-image -->
            <!-- lockscreen credentials (contains the form) -->
            <form class="lockscreen-credentials" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <div class="input-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ lang('Input Email') }}" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span> 
                    @endif
                </div>
            </form>
            <!-- /.lockscreen credentials -->
        </div>
        <!-- /.lockscreen-item -->
        <div class="help-block text-center">
            Enter your {{ lang('Email') }}
        </div>
        <div class="text-center">
            <a href="{{ url('/login') }}"> Sign in with accound user</a>
        </div>
        <div class="lockscreen-footer text-center">
            Copyright &copy; 2018 <b><a href="/" class="text-black">FS-Focus</a></b>
            <br> All rights reserved
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ mix('js/home.js') }}"></script>
    @yield('scripts')
    <script>
    $(function() {
        $("[data-toggle='tooltip']").tooltip();
    });
    </script>
    @if(config('blog.google.open'))
    <script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', '{{ config('
        blog.google.id ') }}', 'auto');
    ga('send', 'pageview');
    </script>
    @endif
</body>

</html>