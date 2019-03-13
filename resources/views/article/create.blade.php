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
    <link rel="stylesheet" href="{{ asset(mix('css/quill-custom.css')) }}">

    <style type="text/css">
    #editor-container {
        font-size: 1.5rem;
        padding: 0 10px;
        width: 100%;
    }

    #editor-container {
        background-color: #fff;
        overflow: hidden;
        border-bottom: 1px solid #d8d8d8;
    }

    #full-editor {
        display: flex;
        flex-flow: column;
        font-size: 1.5rem;
        width: 100%;
        min-height: 700px;
    }

    #full-editor .editor {
        font-size: 18px;
    }

    #full-editor .ql-snow {
        border: none;
    }

    #full-editor .ql-toolbar.ql-snow {
        background: #fff;
        padding: 5px 0;
    }

    #full-editor .ql-toolbar {
        border-bottom: 1px solid #ccc;
    }
    
    .sticky {
        position: fixed;
        top: 0;
        z-index: 2000;
    }

    </style>
    <script>
        window.Language = '{{ config('app.locale') }}';
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
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
                <div class="col-md-12 create-post">
                    <form class="form" action="{{ url('article/new') }}" method="POST">
                        {{ csrf_field() }}
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
                        <div class="form-group row" id="content">
                            <div class="col-sm-12">
                                <div id="editor-container">
                                    <div id="full-editor">
                                        <div class="editor"></div>
                                        <textarea class="hidden" id="content-html" name="content"></textarea>
                                    </div>
                                    <div id="counter" class="float-right font-size-12"></div>
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
        (function() {
            $('#name').keyup(function() {
                $('#slug').val(voca.slugify($(this).val()))
            })
        })();
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
