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
    <link rel="stylesheet" href="{{ asset(mix('css/home.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/themes/' . config('blog.color_theme') . '.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/reset-pass.css')) }}">
    <!-- Scripts -->
    <script>
        window.Language = '{{ config('app.locale') }}';
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="lockscreen">
    <div id="app" class="lockscreen-wrapper">
        <div class="lockscreen-logo">
            <a href="/"><img src="{{ asset('/images/logo-blue.png') }}" alt="Logo"></a>
        </div>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="lockscreen-name">{{ lang('Reset Password') }}</div>
        <div class="lockscreen-item">
            <div class="lockscreen-image">
                <img src="{{ asset('/images/ava.png') }}" alt="User Image">
            </div>
            <form class="lockscreen-credentials" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <div class="input-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ lang('Input Email') }}" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" style="position: absolute; top: 40px; left: 10px;">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </form>
        </div>
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
    <script src="{{ asset(mix('js/home.js')) }}"></script>
    @if(config('blog.google.open'))
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o);
                m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', '{{ config('blog.google.id') }}', 'auto');
            ga('send', 'pageview');
        </script>
    @endif
</body>

</html>
