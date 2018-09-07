<nav class="navbar navbar-expand-lg fixed-top" style="position: fixed; top: 0; right: 0; left: 0; z-index: 1030;">
    <div class="search-box">
        <button class="dismiss"><i class="fa fa-times"></i></button>
        <form id="searchForm" action="{{ url('search') }}" role="search" method="get">
            <input type="search" class="form-control"  data-action="grow" autocomplete="off" name="q" placeholder="{{ lang('Search') }}" required>
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
            <!-- Write post-->
            <li class="nav-item d-flex align-items-center"><a class="nav-link" href="#"><i class="fas fa-user-edit"></i></a></li>
             <!-- questions-->
            <li class="nav-item d-flex align-items-center"><a class="nav-link" href="{{ url('discussion') }}"><i class="fas fa-question-circle"></i></a></li>
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
                            <span class="noti-numb-bg"></span><span class="badge text-danger"><i class="fas fa-circle"></i></span>
                        </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="profile" class="nav-link logout" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ Auth::user()->avatar }}" alt="..." class="img-fluid rounded-circle" data-toggle="tooltip" title="{{ Auth::user()->nickname ?: Auth::user()->name }}" style="height: 30px; width: 30px;">
                    </a>
                    <ul aria-labelledby="profile" class="dropdown-menu profile">
                        <li>
                            <a rel="nofollow" href="{{ url('user', ['name' => Auth::user()->name]) }}" class="dropdown-item d-flex">
                                <div class="msg-profile avatar"> <img src="{{ Auth::user()->avatar }}" alt="..." class="img-fluid rounded-circle" style="height: 50px; width: 50px;"></div>
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
                            <a rel="nofollow" href="{{ url('user', ['name' => Auth::user()->name]) }}" class="dropdown-item">
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
                <li class="nav-item d-flex align-items-center"><a id="menu-toggle-right" class="nav-link" href="#"><i class="fa fa-bars"></i></a></li>
                <nav id="sidebar-wrapper-home">
                    <div class="sidebar-nav">
                        <div id="menu-close"><span class="fa fa-times"></span></div>
                        <div class="tab" role="tabpanel">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item ">
                                    <a class="nav-link active" href="#live" role="tab" data-toggle="tab"><i class="fa fa-globe"></i> Friends</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#trend" role="tab" data-toggle="tab"><i class="fa fa-rocket"></i> Hot Trending</a>
                                </li>
                            </ul>
                            <div class="tab-content tabs">
                                <div role="tabpanel" class="tab-pane fade show active" id="live">
                                    <h3>Content</h3>
                                   <!--  <div class="content newsf-list">
                                        <ul class="list-unstyled">
                                            <li class="border border-primary">
                                                <a rel="nofollow " href="#" class=" d-flex">
                                                    <div class="news-f-img"> <img src="images/ava.png" alt="..." class="img-fluid rounded-circle"></div>
                                                    <div class="msg-body">
                                                        <h6 class="h5 msg-nav-h6">New Innovation world</h6>
                                                        <small>Tech soft is great innovation for...</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="border border-success">
                                                <a rel="nofollow" href="#" class=" d-flex">
                                                    <div class="news-f-img"> <img src="images/ava.png" alt="..." class="img-fluid rounded-circle"></div>
                                                    <div class="msg-body">
                                                        <h6 class="h5 msg-nav-h6">Modified hand-cart</h6>
                                                        <small>The idea is to incorporate easy...</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="border border-info">
                                                <a rel="nofollow" href="#" class=" d-flex">
                                                    <div class="news-f-img"> <img src="images/ava.png" alt="..." class="img-fluid rounded-circle"></div>
                                                    <div class="msg-body">
                                                        <h6 class="h5 msg-nav-h6">Low cost Modern printer</h6>
                                                        <small>A dot matrix printer modified at...</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="border border-primary">
                                                <a rel="nofollow" href="#" class=" d-flex">
                                                    <div class="news-f-img"> <img src="images/ava.png" alt="..." class="img-fluid rounded-circle"></div>
                                                    <div class="msg-body">
                                                        <h6 class="h5 msg-nav-h6">Low cost Modern printer</h6>
                                                        <small>A dot matrix printer modified at...</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="border border-success">
                                                <a rel="nofollow" href="#" class=" d-flex">
                                                    <div class="news-f-img"> <img src="images/ava.png" alt="..." class="img-fluid rounded-circle"></div>
                                                    <div class="msg-body">
                                                        <h6 class="h5 msg-nav-h6">Low cost Modern printer</h6>
                                                        <small>A dot matrix printer modified at...</small>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="border border-info">
                                                <a rel="nofollow" href="#" class=" d-flex">
                                                    <div class="news-f-img"> <img src="images/ava.png" alt="..." class="img-fluid rounded-circle"></div>
                                                    <div class="msg-body">
                                                        <h6 class="h5 msg-nav-h6">Low cost Modern printer</h6>
                                                        <small>A dot matrix printer modified at...</small>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="trend">
                                    <div class="card card-c2" style="box-shadow: 0 0 0;">
                                        <!-- <div class="header">
                                            <h3 class="title">Trending Items</h3>
                                            <p class="category">Last Campaign Performance</p>
                                        </div>
                                        <div class="content">
                                            <canvas class="ct-chart" id="myChart4" height="250"></canvas>
                                            <div class="footer">
                                                <div class="legend">
                                                    <i class="fa fa-circle text-info"></i> Open
                                                    <i class="fa fa-circle text-danger"></i> Bounce
                                                    <i class="fa fa-circle text-warning"></i> Unsubscribe
                                                </div>
                                                <hr>
                                                <div class="stats">
                                                    <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                </nav>
            @endif
        </ul>
    </div>
</nav>