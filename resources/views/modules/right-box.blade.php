<aside class="col-lg-2">
    <!-- Widget [Latest Posts Widget]        -->
    <div class="widget teams">
        <header>
            <h3 class="h6">Teams</h3>
        </header>
        <div class="blog-posts">
            <a href="#">
                <div class="item d-flex align-items-center">
                    <div class="image"><img class="img-fluid img-sm" src="img/user3-128x128.jpg" alt="User Image"></div>
                    <div class="title"><strong>BKFA Team </strong>
                        <div class="d-flex align-items-center">
                            <div class="views"><i class="fas fa-user-friends"></i> 10</div>
                            <div class="comments"><i class="fas fa-pencil-alt"></i> 12</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="item d-flex align-items-center">
                    <div class="image"><img class="img-fluid img-sm" src="img/small-thumbnail-2.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><strong>Teach Hot</strong>
                        <div class="d-flex align-items-center">
                            <div class="views"><i class="icon-eye"></i> 500</div>
                            <div class="comments"><i class="icon-comment"></i>12</div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="item d-flex align-items-center">
                    <div class="image"><img class="img-fluid img-sm" src="img/small-thumbnail-3.jpg" alt="..." class="img-fluid"></div>
                    <div class="title"><strong>CTTN 4.0</strong>
                        <div class="d-flex align-items-center">
                            <div class="views"><i class="icon-eye"></i> 500</div>
                            <div class="comments"><i class="icon-comment"></i>12</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- Widget [Categories Widget]-->
    <div class="widget teams">
        <header>
            <h3 class="h6">Hot Author</h3>
        </header>
        <div class="blog-posts">
            @foreach($users as $user)
                <a href="/user/{{ $user->name }}">
                    <div class="item d-flex align-items-center">
                        <div class="image"><img class="img-fluid img-circle img-sm" src="{{ $user->avatar }}" alt="User Image"></div>
                        <div class="title"><strong>{{ $user->name }}</strong>
                            <div class="d-flex align-items-center">
                                <div class="views"><i class="fas fa-user-plus"></i> 50</div>
                                <div class="comments"><i class="fas fa-pencil-alt"></i> 12</div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    <!-- Link -->
    <div class="widget links">
        <header>
            <h3 class="h6">Link</h3>
        </header>
        <ul class="list-unstyled">
            <li><a href="#"><i class="fab fa-facebook-square"></i> Facebook</a></li> 
            <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li> 
            <li><a href="#"><i class="fab fa-github"></i> Github</a></li> 
            <li><a href="#"><i class="fab fa-stack-overflow"></i> Stack Overflow</a></li>
        </ul>
    </div>
</aside>