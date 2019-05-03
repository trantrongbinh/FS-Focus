<div class="col-md-4">
    <div class="profile-info-left">
        <div class="text-center">
            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="avatar img-circle">
            <h2>{{ $user->name }}</h2>
        </div>
        <div class="action-buttons">
            <div class="row">
                <div class="col-sm-6 offset-md-3 text-center">
                    @if(Auth::check())
                        @can('update', $user)
                            <a href="{{ url('user/profile') }}" class="btn btn-success btn-block"><i class="fa fa-plus-round"></i> {{ lang('Edit Profile') }}</a>
                        @endif
                        @if(Auth::id() != $user->id)
                            <a href="javascript:void(0)" class="btn btn-{{ Auth::user()->isFollowing($user->id) ? 'warning' : 'danger' }} btn-block" onclick="event.preventDefault(); document.getElementById('follow-form').submit();">
                                {{ Auth::user()->isFollowing($user->id) ? lang('Following') : lang('Follow') }}
                            </a>

                            <form id="follow-form" action="{{ url('user/follow', [$user->id]) }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="section">
            <h3>About Me</h3>
            <p>
                {{ $user->description or lang('Nothing') }}
            </p>
            <div class="panel-thumbnails">
                <a href="" class="btn btn-info btn-twitter btn-sm">
                    <i class="fab fa-twitter"></i>
                </a>
                <a rel="publisher" href="" class="btn btn-danger btn-sm">
                    <i class="fab fa-github"></i>
                </a>
                <a rel="publisher" href="" class="btn btn-info btn-sm">
                    <i class="fab fa-facebook-square"></i>
                </a>
                <a rel="publisher" href="" class="btn btn-warning btn-sm">
                    <i class="fab fa-stack-overflow"></i>
                </a>
            </div>
        </div>
        <div class="section">
            <h3>Statistics</h3>
            <p><span class="badge badge-secondary">{{ $user->followings()->count() }}</span> Following</p>
            <p><span class="badge badge-secondary">124</span> Followers</p>
            <p><span class="badge badge-secondary">{{ $user->discussions->count() }}</span> {{ lang('Discussion Num') }}</p>
            <p><span class="badge badge-secondary">{{ $user->comments->count() }}</span> {{ lang('Comment Num') }}</p>
        </div>
        <div class="section">
            <h3>Social</h3>
            <ul class="list-unstyled list-social">
                @if($user->github_name)
                    <li><a target="_blank" href="https://github.com/{{ $user->github_name }}" data-toggle="tooltip" data-placement="top"
                           title="{{ $user->name }}'s Github"><i class="fab fa-github"></i> {{ $user->github_name }} </a></li>
                @endif
                @if($user->website)
                    <li><a target="_blank" href="{{ $user->website }}" data-toggle="tooltip" data-placement="top" title="{{ $user->name }}'s Website"><i class="fas fa-globe"></i> My Website</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>


{{-- <div class="user jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 text-center">
                <img class="avatar rounded-circle" src="{{ asset($user->avatar) }}">
            </div>
            <div class="col-sm-5 content">
                <div class="header">
                    {{ $user->nickname or $user->name }}
                </div>
                <div class="description">
                    {{ $user->description or lang('Nothing') }}
                </div>
                @if(Auth::check())
                    <div class="actions">
                        @can('update', $user)
                            <a href="{{ url('user/profile') }}"
                               class="btn btn-info btn-sm">{{ lang('Edit Profile') }}</a>
                        @endif
                        @if(Auth::id() != $user->id)
                            <a href="javascript:void(0)"
                               class="btn btn-{{ Auth::user()->isFollowing($user->id) ? 'warning' : 'danger' }} btn-sm"
                               onclick="event.preventDefault();
                                         document.getElementById('follow-form').submit();">
                                {{ Auth::user()->isFollowing($user->id) ? lang('Following') : lang('Follow') }}
                            </a>

                            <form id="follow-form" action="{{ url('user/follow', [$user->id]) }}" method="POST"
                                  style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        @endif
                    </div>
                @endif
                <div class="footer">
                    @if($user->github_name)
                        <a class="btn btn-sm btn-primary" target="_blank"
                           href="https://github.com/{{ $user->github_name }}" data-toggle="tooltip" data-placement="top"
                           title="{{ $user->name }}'s Github">
                            <i class="fab fa-github"></i>
                        </a>
                    @endif
                    @if($user->website)
                        <a class="btn btn-sm btn-primary" target="_blank" href="{{ $user->website }}"
                           data-toggle="tooltip" data-placement="top" title="{{ $user->name }}'s Website">
                            <i class="fas fa-globe"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-sm-5 user-follow">
                <div class="row">
                    <div class="col-sm-4">
                        <a href="{{ url("user/{$user->name}/following") }}"
                           class="counter">{{ $user->followings()->count() }}</a>
                        <a href="{{ url("user/{$user->name}/following") }}" class="text">{{ lang('Following Num') }}</a>
                    </div>
                    <div class="col-sm-4">
                        <a href="{{ url("user/{$user->name}/discussions") }}"
                           class="counter">{{ $user->discussions->count() }}</a>
                        <a href="{{ url("user/{$user->name}/discussions") }}"
                           class="text">{{ lang('Discussion Num') }}</a>
                    </div>
                    <div class="col-sm-4">
                        <a href="{{ url("user/{$user->name}/comments") }}"
                           class="counter">{{ $user->comments->count() }}</a>
                        <a href="{{ url("user/{$user->name}/comments") }}" class="text">{{ lang('Comment Num') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 --}}