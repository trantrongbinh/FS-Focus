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
    <style type="text/css">
        .select2 {
            width: 100% !important;
        }
    </style>
    <!-- Scripts -->
    <script>
        window.Language = '{{ config('app.locale') }}';

        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-lg">
        <div class="search-box">
            <button class="dismiss"><i class="fa fa-times"></i></button>
            <form id="searchForm" action="{{ url('search') }}" role="search" method="get">
                <input type="search" class="form-control" data-action="grow" autocomplete="off" name="q"
                       placeholder="{{ lang('Search') }}" required>
            </form>
        </div>
        <div class="container">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <div class="brand-text brand-big hidden-lg-down"><img src="/images/logo-white.png" alt="Logo"
                                                                              class="img-fluid"></div>
                        <div class="brand-text brand-small"><img src="/images/logo-icon.png" alt="Logo"
                                                                 class="img-fluid"></div>
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
                    <li class="nav-item d-flex align-items-center"><a class="nav-link" href="{{ url('login') }}"
                                                                      data-toggle="tooltip" title="Write an article"><i
                                    class="fas fa-user-edit"></i></a></li>
            @else
                <!-- Write post-->
                    <li class="nav-item d-flex align-items-center"><a class="nav-link" href="{{ url('article/new') }}"
                                                                      data-toggle="tooltip" title="Write an article"><i
                                    class="fas fa-user-edit"></i></a></li>
            @endif
            <!-- questions-->
                <li class="nav-item d-flex align-items-center"><a class="nav-link" href="{{ url('discussion') }}"
                                                                  data-toggle="tooltip" title="Discussion"><i
                                class="fas fa-question-circle"></i></a></li>
                <!-- Search-->
                <li class="nav-item d-flex align-items-center"><a id="search" class="nav-link" href="#"><i
                                class="fas fa-search"></i></a></li>
                <!-- Authentication Links -->
            @if (Auth::guest())
                <!-- Log in-->
                    <li class="nav-item d-flex align-items-center"><a class="nav-link"
                                                                      href="{{ url('login') }}"></i> {{ lang('Login') }}</a>
                    </li>
                    <!-- Sign up-->
                    <li class="nav-item d-flex align-items-center"><a class="nav-link btn btn-info btn-sm text-white"
                                                                      href="{{ url('register') }}">{{ lang('Register') }}</a>
                    </li>
            @else
                <!-- Notifications-->
                    <li class="nav-item notification">
                        <a id="notifications" class="nav-link" rel="nofollow" href="{{ url('user/notification') }}">
                            <i class="fa fa-bell"></i>
                            <span class="new" @if (Auth::user()->unreadNotifications->count() > 0)
                            style='display: block'
                                    @endif >
                                        <span class="noti-numb-bg"></span><span class="badge text-danger"><i
                                            class="fas fa-circle"></i></span>
                                    </span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="profile" class="nav-link logout" data-target="#" href="#" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <img src="{{ Auth::user()->avatar }}" alt="..." class="img-fluid rounded-circle"
                                 data-toggle="tooltip" title="{{ Auth::user()->nickname ?: Auth::user()->name }}"
                                 style="height: 30px; width: 30px;">
                        </a>
                        <ul aria-labelledby="profile" class="dropdown-menu profile">
                            <li>
                                <a rel="nofollow" href="{{ url('user', ['name' => Auth::user()->name]) }}"
                                   class="dropdown-item d-flex">
                                    <div class="msg-profile avatar"><img src="{{ Auth::user()->avatar }}" alt="..."
                                                                         class="img-fluid rounded-circle"
                                                                         style="height: 50px; width: 50px;"></div>
                                    <div class="msg-body">
                                        <h3 class="h5">{{ Auth::user()->name }}</h3>
                                        <span>{{ Auth::user()->email }}</span>
                                    </div>
                                </a>
                                <hr>
                            </li>
                            @if(Auth::user()->is_admin)
                                <li><a href="{{ url('dashboard') }}"><i
                                                class="fas fa-tachometer-alt"></i>{{ lang('Dashboard') }}</a></li>
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
                                        <div class="notification-content"><i
                                                    class="fa fa-cog"></i>{{ lang('Settings') }}</div>
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
            <div class="col-md-12">
                <div class="form-group row">
                    <label for="title" class="col-sm-1 col-form-label"></label>
                    <div class="col-sm-11">
                        <div class="alert alert-primary alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <p>Các thẻ có <code>*</code> là bắt buộc. Khi bạn lựa chọn <code>is Draft?</code> thi bai
                                cua ban chi la ban nhap khi chua viet xong, mac dinh bai viet la ban chinh khi khong lua
                                chon <code>is Draft?</code> va <code>Is Original?</code>. Ngoai ra bai viet co the kem
                                theo anh chu de hoac khong!</p>
                            <p>Phan noi dung co the <code>keo tha</code> anh vao hoac <code>page link</code> anh vao
                                form</p>
                            <p>Cam on ban da viet bai chia se cho cong dong, rat mong nhan duoc nhieu su chia se, y
                                kien, phan hoi tu ban. Chuc ban co mot ngay lam viec hieu qua !!!</p>
                        </div>
                    </div>
                </div>
                <form class="form" action="{{ url("article/{$article->id}/edit") }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Category</label>
                                <div class="col-sm-10">
                                    <select class="custom-select" name="category_id">
                                        <option value={{null}}>No Category (You can select one Category or no)</option>
                                        @foreach($categories as $category)
                                            @if($category->id === $article->category_id))
                                            <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" form-group row">
                                <label class="col-sm-2 col-form-label">Tag <code
                                            style="font-size: 20px;">*</code></label>
                                <div class="col-sm-10">
                                    @if ($errors->has('tags'))
                                        <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('tags') }}</strong>
                                                </span>
                                    @endif
                                    <select class="select{{ $errors->has('tags') ? ' is-invalid' : '' }}"
                                            multiple="multiple" name="tags[]" style="width: 100%">
                                        @foreach($tags as $tag)
                                            @if(in_array($tag->id, $selectTags))
                                                <option value="{{ $tag->id }}" selected>{{ $tag->tag }}</option>
                                            @else
                                                <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-1 col-form-label">Title <code style="font-size: 20px;">*</code></label>
                        <div class="col-sm-11">
                            @if ($errors->has('title'))
                                <span class="invalid-feedback">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                            @endif
                            <input type="text" id="title" name="title"
                                   class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                   value="{{ $article->title }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subtitle" class="col-sm-1 col-form-label">Subtitle</label>
                        <div class="col-sm-11">
                            <input type="text" id="subtitle" name="subtitle" class="form-control"
                                   value="{{ $article->subtitle }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-1 col-form-label"></label>
                        <div class="col-sm-11">
                            @if ($errors->has('content'))
                                <div class="alert alert-danger alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{ $errors->first('content') }}</strong> Check content again.
                                </div>
                            @endif
                        </div>
                    </div>
                    <form-content content="{{ $article->content['raw'] }}"
                                  url_image="{{ $article->page_image }}"></form-content>
                    <div class="form-group row">
                        <label for="meta_description" class="col-sm-1 col-form-label">Meta Description</label>
                        <div class="col-sm-11">
                            <textarea id="meta_description" name="meta_description"
                                      class="form-control">{{ $article->meta_description }}</textarea>
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

<script>
    $(function () {
        $("[data-toggle='tooltip']").tooltip();
    });

    $(document).ready(function () {
        $('.select').select2();
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

        ga('create', '{{ config('blog.google.id') }}', 'auto');
        ga('send', 'pageview');
    </script>
@endif
<script>
    // back to top
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#goTop').fadeIn();
        } else {
            $('#goTop').fadeOut();
        }
    });
    $('#goTop').click(function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

    $(document).ready(function () {

        'use strict';

        // ------------------------------------------------------- //
        // Search Box
        // ------------------------------------------------------ //
        $('#search').on('click', function (e) {
            e.preventDefault();
            $('.search-box').fadeIn();
        });
        $('.dismiss').on('click', function () {
            $('.search-box').fadeOut();
        });

        // ------------------------------------------------------- //
        // Adding fade effect to dropdowns
        // ------------------------------------------------------ //
        $('.dropdown').on('show.bs.dropdown', function () {
            $(this).find('.dropdown-menu').first().stop(true, true).fadeIn();
        });
        $('.dropdown').on('hide.bs.dropdown', function () {
            $(this).find('.dropdown-menu').first().stop(true, true).fadeOut();
        });
    });
</script>
</body>
</html>
