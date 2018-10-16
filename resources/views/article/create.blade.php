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
    <!-- Scripts -->
    <script>
        window.Language = '{{ config('app.locale') }}';

        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body style="background: none;">
<div id="app">
    <nav class="navbar navbar-expand-lg">
        <div class="search-box">
            <button class="dismiss"><i class="fa fa-times"></i></button>
            <form id="searchForm" action="{{ url('search') }}" role="search" method="get">
                <input type="search" class="form-control" data-action="grow" autocomplete="off" name="q" placeholder="{{ lang('Search') }}" required>
            </form>
        </div>
        <div class="container">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <div class="brand-text brand-big hidden-lg-down"><img src="/images/logo-white.png" alt="Logo" class="img-fluid"></div>
                        <div class="brand-text brand-small"><img src="/images/logo-icon.png" alt="Logo" class="img-fluid"></div>
                    </a>
                    <a href="#">
                        <form action="" class="form-lang" method="post">
                            <select name="locale">
                                <option value="en">English</option>
                                <option value="vi">Viet Nam</option>
                            </select>
                            {{ csrf_field() }}
                        </form>
                    </a>
                    <a href="#">Contact</a>
                </div>
            </div>
            <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
            @if (Auth::guest())
                <!-- Write post-->
                <li class="nav-item d-flex align-items-center"><a class="nav-link" href="{{ url('login') }}" data-toggle="tooltip" title="Write an article"><i class="fas fa-user-edit"></i></a></li>
            @else
                <!-- Write post-->
                <li class="nav-item d-flex align-items-center"><a class="nav-link" href="{{ url('article/new') }}" data-toggle="tooltip" title="Write an article"><i class="fas fa-user-edit"></i></a></li>
            @endif
            <!-- questions-->
            <li class="nav-item d-flex align-items-center"><a class="nav-link" href="{{ url('discussion') }}" data-toggle="tooltip" title="Discussion"><i class="fas fa-question-circle"></i></a></li>
            <!-- Search-->
            <li class="nav-item d-flex align-items-center"><a id="search" class="nav-link" href="#"><i class="fas fa-search"></i></a></li>
            <!-- Authentication Links -->
            @if (Auth::guest())
                <!-- Log in-->
                <li class="nav-item d-flex align-items-center"><a class="nav-link" href="{{ url('login') }}"></i> {{ lang('Login') }}</a></li>
                <!-- Sign up-->
                <li class="nav-item d-flex align-items-center"><a class="nav-link btn btn-info btn-sm text-white" href="{{ url('register') }}">{{ lang('Register') }}</a></li>
            @else
                <!-- Notifications-->
                    <li class="nav-item notification">
                        <a id="notifications" class="nav-link" rel="nofollow" href="{{ url('user/notification') }}">
                            <i class="fa fa-bell"></i>
                            <span class="new" @if (Auth::user()->unreadNotifications->count() > 0)
                            style='display: block'
                            @endif >
                            <span class="noti-numb-bg"></span><span class="badge text-danger"><i class="fas fa-circle"></i></span></span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="profile" class="nav-link logout" data-target="#" href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img src="{{ Auth::user()->avatar }}" alt="..." class="img-fluid rounded-circle" data-toggle="tooltip" title="{{ Auth::user()->nickname ?: Auth::user()->name }}" style="height: 30px; width: 30px;">
                        </a>
                        <ul aria-labelledby="profile" class="dropdown-menu profile">
                            <li>
                                <a rel="nofollow" href="{{ url('user', ['name' => Auth::user()->name]) }}"
                                   class="dropdown-item d-flex">
                                    <div class="msg-profile avatar">
                                        <img src="{{ Auth::user()->avatar }}" alt="..." class="img-fluid rounded-circle" style="height: 50px; width: 50px;">
                                    </div>
                                    <div class="msg-body">
                                        <h3 class="h5">{{ Auth::user()->name }}</h3>
                                        <span>{{ Auth::user()->email }}</span>
                                    </div>
                                </a>
                                <hr>
                            </li>
                            @if(Auth::user()->is_admin)
                                <li><a href="{{ url('dashboard') }}"><i class="fas fa-tachometer-alt"></i>{{ lang('Dashboard') }}</a></li>
                            @endif
                            <li>
                                <a rel="nofollow" href="{{ url('user', ['name' => Auth::user()->name]) }}"
                                   class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-user"></i>My Profile</div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a rel="nofollow" href="{{ url('setting') }}" class="dropdown-item">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-cog"></i>{{ lang('Settings') }}</div>
                                    </div>
                                </a>
                                <hr>
                            </li>
                            <li>
                                <a rel="nofollow" href="{{ url('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                    <div class="notification">
                                        <div class="notification-content"><i class="fa fa-power-off"></i>Logout</div>
                                    </div>
                                </a>
                                <form id="logout-form" action="{{ url('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
    <div class="container">
        <main class="article row">
            <div class="col-md-10 offset-md-1 create-post">
                <form class="form" action="{{ url('article/new') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <form-content></form-content>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 offset-md-4">
                            <button type="button" class="btn btn-light btn-sm button-toggle">Show bố cục chuẩn</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-12 single-select">
                                    <select class="select2 js-states form-control" data-placeholder="You can select one Category or no" name="category_id">
                                        <option></option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" form-group row">
                                <div class="col-sm-12">
                                    @if ($errors->has('tags'))
                                        <span class="invalid-feedback d-block">
                                                    <strong>{{ $errors->first('tags') }}</strong>
                                                </span>
                                    @endif
                                    <select class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }} select2" multiple="multiple" data-placeholder=" Tag your post" style="width: 100%;" name="tags[]">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback d-block">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                            @endif
                            <textarea class="textarea form-control box__input textarea--autoHeight" placeholder="TITLE YOUR POST" rows="1" id="title" name="title"></textarea>
                        </div>
                    </div>
                    <div class="form-group row optional hide">
                        <div class="col-sm-12">
                            <textarea class="textarea form-control box__input textarea--autoHeight" placeholder="Lời mở đầu ..." rows="1"  id="subtitle" name="subtitle" ></textarea>
                        </div>
                    </div>
                     <div class="form-group row optional hide">
                        <div class="col-sm-12">
                            <textarea class="textarea form-control box__input textarea--autoHeight" placeholder="Mô tả bài viết giúp người đọc dễ dàng lắm bắt ..." rows="3"  id="meta_description" name="meta_description"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-sm float-right"><b>Publish</b></button>
                </form>
                <div style="margin-bottom: 200px;"></div>
            </div>
        </main>
    </div>
</div>

@include('particals.footer')

<!-- Scripts -->
<script src="{{ mix('js/home.js') }}"></script>
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

        ga('create', '{{ config('blog.google.id') }}', 'auto');
        ga('send', 'pageview');
    </script>
@endif
</body>
</html>
