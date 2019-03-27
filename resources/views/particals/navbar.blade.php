<nav class="navbar navbar-expand-lg fixed-top">
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
                    <div class="brand-text brand-big hidden-lg-down"><img src="{{ asset('/images/logo-white.png') }}" alt="Logo" class="img-fluid"></div>
                    <div class="brand-text brand-small"><img src="{{ asset('/images/logo-icon.png') }}" alt="Logo" class="img-fluid">
                    </div>
                </a>
                {{-- <a href="#">
                    <form action="" class="form-lang" method="post">
                        <select name="locale">
                            <option value="en">English</option>
                            <option value="vi">Viet Nam</option>
                        </select>
                        {{ csrf_field() }}
                    </form>
                </a> --}}
            </div>
        </div>
        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
            @if (Auth::guest())
                <!-- Write post-->
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link" href="{{ url('login') }}" data-toggle="tooltip" title="Write an article"><i class="fas fa-user-edit"></i></a>
                </li>
            @else
                <!-- Write post-->
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link" href="{{ url('article/new') }}" data-toggle="tooltip" title="Write an article"><i class="fas fa-user-edit"></i></a>
                </li>
            @endif
                <!-- questions-->
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link" href="{{ url('discussion') }}" data-toggle="tooltip" title="Discussion"><i class="fas fa-question-circle"></i></a>
                </li>
                <!-- Search-->
                <li class="nav-item d-flex align-items-center">
                    <a id="search" class="nav-link" href="#"><i class="fas fa-search"></i></a>
                </li>
            <!-- Authentication Links -->
            @if (Auth::guest())
                <!-- Log in-->
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link login" href="{{ url('login') }}"></i> {{ lang('Login') }}</a>
                </li>
                <!-- Sign up-->
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link btn btn-info btn-sm text-white" href="{{ url('register') }}">{{ lang('Register') }}</a>
                </li>
            @else
                <!-- Notifications-->
                <li class="nav-item notification">
                    <a id="notifications" class="nav-link" rel="nofollow" href="{{ url('user/notification') }}">
                        <i class="fa fa-bell"></i>
                        <span class="new" @if (Auth::user()->unreadNotifications->count() > 0) style='display: block' @endif >
                            <span class="noti-numb-bg"></span><span class="badge text-danger"><i class="fas fa-circle"></i></span>
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="profile" class="nav-link logout" data-target="#" href="#" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <img src="{{ Auth::user()->avatar }}" alt="..." class="img-fluid rounded-circle" data-toggle="tooltip" title="{{ Auth::user()->nickname ?: Auth::user()->name }}"  style="height: 30px; width: 30px;">
                    </a>
                    <ul aria-labelledby="profile" class="dropdown-menu profile">
                        <li>
                            <a rel="nofollow" href="{{ url('user', ['name' => Auth::user()->name]) }}"
                               class="dropdown-item d-flex">
                                <div class="msg-profile avatar">
                                    <img src="{{ Auth::user()->avatar }}" alt="..." class="img-fluid rounded-circle" style="height: 50px; width: 50px;">
                                </div>
                                <div class="msg-body">
                                    <h3 class="h5">{{ Auth::user()->name }}</h3><span>{{ Auth::user()->email }}</span>
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
                                    <div class="notification-content"><i class="fa fa-cog"></i>{{ lang('Settings') }}
                                    </div>
                                </div>
                            </a>
                            <hr>
                        </li>
                        <li>
                            <a rel="nofollow" href="{{ url('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                <li class="nav-item d-flex align-items-center toggle-right">
                    <a id="menu-toggle-right" class="nav-link" href="#"><i class="fa fa-bars"></i></a>
                </li>
                <nav id="sidebar-wrapper-home">
                    <div class="sidebar-nav">
                        <div id="menu-close"><span class="fa fa-times"></span></div>
                        <div class="tab" role="tabpanel">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item ">
                                    <a class="nav-link active" href="#live" role="tab" data-toggle="tab"><i class="fas fa-newspaper"></i> Hot</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#trend" role="tab" data-toggle="tab"><i class="fas fa-globe"></i> Authors</a>
                                </li>
                            </ul>
                            <div class="tab-content tabs">
                                <div role="tabpanel" class="tab-pane fade show active" id="live">
                                    <div class="row">
                                        <aside class="col-lg-12">

                                        </aside>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="trend">
                                    <div class="row">
                                        <aside class="col-lg-12">

                                        </aside>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            @endif
        </ul>
    </div>
</nav>
