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
            window.User = {!! Auth::user() !!}
            window.Language = '{{ config('app.locale') }}';

            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>
        
        @yield('styles')
        <style>
            .profile--author {
                position: relative;

            }

            .profile--author__left figcaption {
                z-index: 3000;
                position: absolute;
                width: 300px;
                height: 156px;
                border: 1px solid #5f5e5e;
                color: #fff;
                display: inline-block;
                margin-right: 4%;
                border-radius: 5px;
                right: 102%;
                top: -20px;
            }

            .profile--author__top figcaption {
                z-index: 3000;
                position: absolute;
                width: 220px;
                height: 230px;
                background-color: #333333;
                color: #fff;
                padding: 25px;
                display: inline-block;
                margin-right: 4%;
                border-radius: 5px;
                left: -20px;
                top: -250px;
            }

            .profile--author__left figcaption:after {
                content: '';
                position: absolute;
                left: 100%;
                top: 30px;
                width: 50px;
                height: 0;
                border-style: solid;
                border-width: 10px 0 10px 10px;
                border-color: transparent transparent transparent #333333;

            }

            .profile--author__top figcaption:after {
                border-width: 10px 10px 0 10px;
                border-color: #333333 transparent transparent transparent;
                content: '';
                position: absolute;
                right: 45%;
                top: 100%;
                width: 0;
                height: 0;
                border-style: solid;
            }

            .author-profile--popup {
                margin: auto;
                width: 100%;
                background: #fdfdfd;
                border-radius: .3em;
            }

            .author-profile--popup .username {
                margin: auto;
                margin-top: -100px;
                margin-left: 5.80em;
                color: #658585;
                font-size: 1.53em;
                font-weight: bold;
            }

            .author-profile--popup .bio {
                margin: auto;
                margin-top: -5px;
                margin-left: 10.43em;
                color: #e76043;
                font-size: .87em;
            }

            .author-profile--popup>.description {
                text-align: center;
                margin: auto;
                margin-left: 100px;
                width: 14em;
                color: #4d4e4e;
                font-size: .87em;
            }

            .author-profile--popup>img.avatar {
                margin-left: 12px;
                margin-top: 5px;
                height: 70px;
                width: 70px;
                border-radius: 18em;
            }

            .author-profile--popup ul.data {
                margin: 10px auto;
                height: 46px;
                background: #4eb6b6;
                text-align: center;
                border-radius: 0 0 .3em .3em;
            }

            .author-profile--popup li {
                padding: 2px 19px;
                width: 37.5%;
                display: table-cell;
                text-align: center;
            }

            .author-profile--popup span {
                color: #fff;
                white-space: nowrap;
                font-size: 1.1em;
                font-weight: bold;
            }

            .author-profile--popup p {
                margin-top: -10px;
            }

            .btn--follow {
                margin-top: 5px;
                padding: 0;
                border-radius: 5px !important;
                width: 70px;
                margin-left: 13px;
                color: #4da9ea !important;
            }

            .btn--follow:hover {
                color: #fff !important;
            }
        </style>
    </head>
    <body>
        <div id="app">
            @include('particals.navbar')
            <div class="main">
                @yield('content')
            </div>
        </div>

        @include('particals.footer')

        <!-- Scripts -->
        <script src="{{ asset(mix('js/home.js')) }}"></script>
        @yield('scripts')
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
        <script>
            $('figure.profile--author').on({
                mouseover: function () {
                    $(this).children('.profile--info').removeClass('hidden');
                },
                mouseout: function () {
                    $(this).children('.profile--info').addClass('hidden');
                }
            });
        </script>
    </body>
</html>
