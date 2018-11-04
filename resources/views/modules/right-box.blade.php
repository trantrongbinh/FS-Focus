<aside class="col-lg-2">
    <!-- Widget [Authors Widget]-->
    <div class="widget teams">
        <header>
            <h3 class="h6">Hot Author</h3>
             <span class="top-v1 badge-info navbar-badge" style="z-index: 100;"><a href="/user/all-auther">All Author</a></span>
        </header>
        <div class="blog-posts">
            @foreach($users as $user)
                <a href="/user/{{ $user->name }}">
                    <div class="item d-flex align-items-center">
                        <div class="image">
                            <img class="img-fluid img-circle img-sm" src="{{ $user->avatar }}" alt="User Image">
                        </div>
                        <div class="title"><strong>{{ $user->name }}</strong>
                            <div class="d-flex align-items-center">
                                <div class="views" data-toggle="tooltip" data-placement="bottom" title="Followers"><i class="fas fa-user-plus"></i> 50</div>
                                <div class="comments" data-toggle="tooltip" data-placement="bottom" title="Posts"><i class="fas fa-pencil-alt"></i> 12</div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <!-- Widget [Teams Widget]        -->
    <div class="widget teams">
        <header>
            <h3 class="h6">Teams</h3>
            <span class="top-v1 badge-info navbar-badge" style="z-index: 100;"><a href="#">All Team</a></span>
        </header>
        <div class="blog-posts">
            <a href="#">
                <div class="item d-flex align-items-center">
                    <div class="image">
                        <img class="img-fluid img-sm" src="img/user3-128x128.jpg" alt="User Image">
                    </div>
                    <div class="title"><strong>BKFA Team </strong>
                        <div class="d-flex align-items-center">
                            <div class="views" data-toggle="tooltip" data-placement="bottom" title="Members"><i class="fas fa-user-friends"></i> 10</div>
                            <div class="comments" data-toggle="tooltip" data-placement="bottom" title="Posts"><i class="fas fa-pencil-alt"></i> 12</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="item d-flex align-items-center">
                    <div class="image">
                        <img class="img-fluid img-sm" src="img/small-thumbnail-2.jpg" alt="..." class="img-fluid">
                    </div>
                    <div class="title"><strong>Teach Hot</strong>
                        <div class="d-flex align-items-center">
                            <div class="views"><i class="icon-eye"></i> 500</div>
                            <div class="comments"><i class="icon-comment"></i>12</div>
                        </div>
                    </div>
                    <div class="push popover__content">
                        <p class="popover__message">Teach Hot</p>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="item d-flex align-items-center">
                    <div class="image">
                        <img class="img-fluid img-sm" src="img/small-thumbnail-3.jpg" alt="..." class="img-fluid">
                    </div>
                    <div class="title"><strong>CTTN 4.0</strong>
                        <div class="d-flex align-items-center">
                            <div class="views"><i class="icon-eye"></i> 500</div>
                            <div class="comments"><i class="icon-comment"></i>12</div>
                        </div>
                    </div>
                    <div class="push popover__content">
                        <p class="popover__message">CTTN 4.0</p>
                    </div>
                </div>
            </a>
            <div class="item d-flex border-bottom"></div>
            <a href="#">
                <div class="item d-flex align-items-center">
                    <div class="image">
                        <img class="img-fluid img-sm" src="/images/team-default.png" alt="User Image">
                    </div>
                    <div class="title"><strong>BKFA Team </strong>
                        <div class="d-flex align-items-center">
                            <div class="views"><i class="fas fa-user-friends"></i> 10</div>
                            <div class="comments"><i class="fas fa-pencil-alt"></i> 12</div>
                        </div>
                    </div>
                </div>
            </a>
            @if (Auth::guest())
                <div class="border-top text-center">
                    <a href="{{ url('login') }}" class="text-info create-button"><strong><i class="fas fa-users-cog"></i> Create Team</strong></a>
                </div>
            @else
                <div class="border-top text-center">
                    <a href="javascript:;" class="text-info button-toggle-team create-button"><strong><i class="fas fa-users-cog"></i> Create Team</strong></a>
                    <div class="optional-team  {{ $errors->isEmpty() ? 'hide' : ''}}">
                        <form action="{{ url('team') }}" method="POST">
                            {{ csrf_field() }}
                            <textarea class="textarea form-control box__input textarea--autoHeight" placeholder="Your Team" rows="1" name="name"></textarea>
                            <div class="clear"></div>
                            <button type="submit" class="btn btn-outline-info btn-sm full-width"><i class="fas fa-check text-dark"></i></button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Link -->
    <div class="widget links">
        <header>
            <h3 class="h6">Link</h3>
        </header>
        <ul class="list-unstyled">
            @if(config('blog.footer.facebook.open'))
                <li><a href="{{ config('blog.footer.facebook.url') }}" target="_blank"><i class="fab fa-facebook-square"></i> Facebook</a></li>
            @endif
            <li><a href="#" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
            @if(config('blog.footer.github.open'))
                <li><a href="{{ config('blog.footer.github.url') }}" target="_blank"><i class="fab fa-github"></i> Github</a></li>
            @endif
            <li><a href="#" target="_blank"><i class="fab fa-stack-overflow"></i> Stack Overflow</a></li>
        </ul>
    </div>
</aside>
