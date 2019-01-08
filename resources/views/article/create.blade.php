<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="language" content="english">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ config('blog.meta.keywords') }}">
    <meta name="description" content="{{ config('blog.meta.description') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/images/favicon.ico') }}">
    <title>@yield('title', config('app.name'))</title>
    <link rel="stylesheet" href="{{ asset(mix('css/home.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/quill.css')) }}">
    <style type="text/css">
    /*** Home ***/
    #laptop-container {
        box-shadow: 0 0 40px 2px rgba(28, 31, 47, 0.1);
        font-size: 1.5rem;
        padding: 0 10px;
        width: 105%;
    }

    #demo-container {
        background-color: #fff;
        opacity: 0.85;
        overflow: hidden;
        width: 100%;
    }

    #carousel-container #full-wrapper {
        font-size: 1.5rem;
        width: 100%;
    }

    #demo-container .ql-snow {
        border: none;
    }

    #demo-container #full-container .ql-toolbar.ql-snow {
        padding: 10px 0;
    }

    #demo-container #full-container {
        display: flex;
        flex-flow: column;
        height: 100%;
    }

    #demo-container #full-container .editor {
        flex: 2;
        overflow: hidden;
    }

    #full-wrapper {
        display: inline-block;
        float: left;
        height: 600px;
        width: 33.33%;
    }

    #full-wrapper .ql-toolbar {
        border-bottom: 1px solid #ccc;
    }

    #full-wrapper .ql-editor {
        padding: 5% 8% 25px !important;
    }

    /*** Home Demo ***/
    #demo-container .ql-editor h1,
    #demo-container .ql-editor h2,
    #demo-container .ql-editor h3,
    #demo-container .ql-editor h4,
    #demo-container .ql-editor h5,
    #demo-container .ql-editor h6,
    #demo-container .ql-editor,
    #demo-container .ql-toolbar {
        font-family: 'Sailec Light', sans-serif;
    }

    #demo-container .ql-toolbar .ql-picker-label {
        font-size: 15px;
    }

    #demo-container .ql-snow .ql-header.ql-picker {
        width: 115px;
    }

    #demo-container .ql-snow .ql-font.ql-picker {
        width: 132px;
    }

    #demo-container .ql-snow .ql-picker.ql-font .ql-picker-label:not([data-label])::before {
        content: 'Sailec Light';
    }

    #demo-container .ql-snow .ql-font .ql-picker-item[data-value='sofia']::before,
    #demo-container .ql-snow .ql-font .ql-picker-label[data-value='sofia']:not([data-label])::before,
    #demo-container .ql-font-sofia {
        content: 'Sofia Pro';
        font-family: 'Sofia Pro', sans-serif;
    }

    #demo-container .ql-snow .ql-font .ql-picker-item[data-value='slabo']::before,
    #demo-container .ql-snow .ql-font .ql-picker-label[data-value='slabo']:not([data-label])::before,
    #demo-container .ql-font-slabo {
        content: 'Slabo 13px';
        font-family: 'Slabo 13px', sans-serif;
    }

    #demo-container .ql-snow .ql-font .ql-picker-item[data-value='roboto']::before,
    #demo-container .ql-snow .ql-font .ql-picker-label[data-value='roboto']:not([data-label])::before,
    #demo-container .ql-font-roboto {
        content: 'Roboto Slab';
        font-family: 'Roboto Slab', serif;
    }

    #demo-container .ql-snow .ql-font .ql-picker-item[data-value='inconsolata']::before,
    #demo-container .ql-snow .ql-font .ql-picker-label[data-value='inconsolata']:not([data-label])::before,
    #demo-container .ql-font-inconsolata {
        content: 'Inconsolata';
        font-family: 'Inconsolata', monospace;
    }

    #demo-container .ql-snow .ql-font .ql-picker-item[data-value='ubuntu']::before,
    #demo-container .ql-snow .ql-font .ql-picker-label[data-value='ubuntu']:not([data-label])::before,
    #demo-container .ql-font-ubuntu {
        content: 'Ubuntu Mono';
        font-family: 'Ubuntu Mono', monospace;
    }

    #demo-container .ql-editor {
        font-size: 1.5em;
    }

    #demo-container .ql-editor li {
        margin-bottom: 0;
    }

    #demo-container .ql-editor pre {
        font-size: 0.8em;
    }

    /*** Responsive Rules ***/
    @media (max-width: 1023px) {
        #laptop-container {
            padding: 0px 22px;
        }
    }

    @media (max-width: 767px) {
        #demo-container {
            padding-left: 0;
            padding-right: 0;
        }

        #demo-container .ql-editor {
            font-size: 1rem;
            padding: 10px;
        }

        #demo-container .ql-editor {
            font-size: 1rem;
            padding: 20px;
        }

        #full-wrapper {
            height: 495px;
        }

        #full-container .toolbar .ql-font,
        #full-container .toolbar .ql-formats:nth-child(3),
        #full-container .toolbar .ql-formats:nth-child(5) {
            display: none;
        }

        #laptop-container {
            bottom: -135px;
        }
    }

    @media (max-width: 550px) {
        #full-wrapper {
            height: 475px;
        }

        #full-container .toolbar .ql-formats:nth-child(4),
        #full-container .toolbar .ql-formats:nth-child(6) {
            display: none;
        }
    }

    @media (max-width: 400px) {
        #laptop-container {
            width: 90%;
        }
    }
    </style>
    <!-- Scripts -->
    <script>
        window.Language = '{{ config('app.locale') }}';
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script>
        window.heap=window.heap||[],heap.load=function(e,t){window.heap.appid=e,window.heap.config=t=t||{};var r=t.forceSSL||"https:"===document.location.protocol,a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=(r?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+e+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(e){return function(){heap.push([e].concat(Array.prototype.slice.call(arguments,0)))}},p=["addEventProperties","addUserProperties","clearEventProperties","identify","removeEventProperty","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
        heap.load("1135832181");
    </script>
</head>

<body style="background: none;">
    @if (Auth::guest())
    @else
    <div id="app">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header">
                        <a href="{{ url('/') }}" class="navbar-brand">
                                <div class="brand-text brand-big hidden-lg-down"><img src="/images/logo-white.png" alt="Logo" class="img-fluid"></div>
                                <div class="brand-text brand-small"><img src="/images/logo-icon.png" alt="Logo" class="img-fluid"></div>
                            </a>
                    </div>
                </div>
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <li class="nav-item d-flex align-items-center" style="margin-right: 10px">
                        <a class="nav-link btn btn-primary btn-sm" href="#" data-toggle="modal" data-target="#draftModal"></i><b>Drafts (0)</b></a>
                        <div class="modal fade" id="draftModal" style="color: #000">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Your drafts (0)</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">You do not have any articles.</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link btn btn-info btn-sm text-white" href="#" data-toggle="modal" data-target="#createCategoryModal"><b>Create Your Category</b></a>
                        <div class="modal fade" id="createCategoryModal" style="color: #000" data-backdrop="false">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create Your Category</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form class="form" action="{{ url('category/create') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Your Category: </label>
                                                <div class="col-sm-10 q-item">
                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" value="" id="name" name="name" placeholder="Category your post">
                                                    @if ($errors->has('name'))
                                                    <span class="invalid-feedback">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-info btn-sm"><b>Create</b>
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm button-hide" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
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
                                <form-image></form-image>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-sm-6 offset-md-3 single-select">
                                        @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                        @endif
                                        <select class="select2 js-states form-control" data-placeholder="You can select one Category or no" name="category_id">
                                            <option></option>
                                            @if(!$categories['yourCategory']->isEmpty())
                                            <optgroup label="Your Category">
                                                @foreach($categories['yourCategory'] as $category)
                                                <option value="{{$category->id}}" @if(session('category_id') && session('category_id')==$category->id) selected @endif>{{$category->name}}</option>
                                                @endforeach
                                                @endif
                                            </optgroup>
                                            <optgroup label="Public">
                                                @foreach($categories['public'] as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </optgroup>
                                            @if(!$categories['other']->isEmpty())
                                            <optgroup label="Other">
                                                @foreach($categories['other'] as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </optgroup>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class=" form-group row">
                                    <div class="col-sm-8 offset-md-2">
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
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea class="textarea form-control box__input textarea--autoHeight" placeholder="Mô tả bài viết ..." rows="1" id="meta_description" name="meta_description"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div id="laptop-container">
                                    <div id="demo-container">
                                        <div id="carousel-container">
                                            <div id="full-wrapper">
                                                <div id="full-container">
                                                    <div class="editor"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 col-form-label">is_draft</div>
                            <div class="col-sm-3">
                                <div class="togglebutton" style="margin-top: 6px">
                                    <label>
                                        <input type="checkbox" name="is_draft">
                                        <span class="toggle"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-3 col-form-label">is_original</div>
                            <div class="col-sm-3">
                                <div class="togglebutton" style="margin-top: 6px">
                                    <label>
                                        <input type="checkbox" name="is_original">
                                        <span class="toggle"></span>
                                    </label>
                                </div>
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
    <script src="{{ asset(mix('js/home.js')) }}"></script>
    <script src="{{ asset(mix('js/java-highlight-custom.js')) }}"></script>
    <script src="{{ asset(mix('js/quill.js')) }}"></script>
    <script>
        $('#name').keyup(function() {
            $('#slug').val(voca.slugify($(this).val()))
        })
    </script>
    @if(!$errors->isEmpty())
    <script>
    $("#createCategoryModal").modal({ show: true });
    </script>
    @endif
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
    @endif
</body>

</html>