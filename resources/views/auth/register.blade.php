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

<body>
<div id="app" class="register-box">
    <div class="register-logo">
        <a href="/"><img src="{{ asset('/images/logo-blue.png') }}" alt="Logo"></a>
    </div>
    <div class="card">
        <div class="card-body register-card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="social-auth-links text-center">
                        <p>- With -</p>
                        <a href="#" class="btn btn-block btn-primary">
                            <i class="fab fa-facebook-square"></i>
                            Sign in using Facebook
                        </a>
                        <a href="#" class="btn btn-block btn-danger">
                            <i class="fab fa-google-plus"></i>
                            Sign in using Google+
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <p class="login-box-msg">Register a new membership</p>
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="form-group has-feedback">
                            <input id="name" type="text"
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                   value="{{ old('name') }}" placeholder="{{ lang('Input Name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                            <span class="fa fa-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                   value="{{ old('email') }}" placeholder="{{ lang('Input Email') }}" required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <span class="fa fa-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input id="password" type="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   name="password" placeholder="{{ lang('Input Password') }}" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <span class="fa fa-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input id="password-confirm" type="password"
                                   class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                   name="password_confirmation" placeholder="{{ lang('Input Confirm Password') }}"
                                   required>
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                            <span class="fa fa-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox"> I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit"
                                        class="btn btn-primary btn-block btn-flat">{{ lang('Register') }}</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <a href="{{ url('/login') }}" class="text-center">{{ lang('Has Account') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
<!-- Scripts -->
<script src="{{ asset(mix('js/home.js')) }}"></script>
@yield('scripts')
<script>
    $(function () {
        $("[data-toggle='tooltip']").tooltip();
    });
</script>
@if(config('blog.google.open'))
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
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