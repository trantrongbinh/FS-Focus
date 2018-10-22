{{-- @extends('layouts.app')

@section('content')
    @include('user.particals.info')
    <div class="container">
        <main class="row">
             <div class="col-lg-3 left-box">
                <!-- Widget [Categories Widget]-->
                    <div class="widget categories">
                        <header>
                            <h3 class="h6">Categories</h3>
                        </header>
                        @foreach ($categories as $category)
                            <div class="item d-flex justify-content-between" data-toggle="tooltip" data-placement="top"
                                 title="{{ $category->articles_count }} bài viết "><a
                                        href="{{ url('category', ['name' => $category->name]) }}">{{ $category->name }}</a><span>{{ $category->articles_count }}</span>
                            </div>
                        @endforeach
                    </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Recent Article</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Recent Discussions</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Recent Comments</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">
                                    <div class="user-block">
                                        <div class="post-footer d-flex align-items-center">
                                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                                                <div class="title"><span>John Doe</span></div>
                                            </a>
                                            <div class="date"><i class="far fa-clock"></i> 2 months ago</div>
                                            <div class="comments meta-last"><i class="far fa-comment-alt"></i>12</div>
                                        </div>
                                        <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some
                                        people hate it and argue for its demise, but others ignore the hate as they create awesome
                                        tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.
                                    <p>
                                    <p>
                                        <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Share</a>
                                        <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i> Like</a>
                                        <span class="float-right">
                                                  <a href="#" class="link-black text-sm">
                                                    <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                    </p>
                                    <div class="card-footer card-comments">
                                        <div class="card-comment">
                                            <!-- User image -->
                                            <div class="post-footer d-flex align-items-center">
                                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="img/user5-128x128.jpg" alt="..."
                                                                             class="img-fluid img-circle img-sm"></div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                <div class="date"><i class="far fa-clock"></i> 2 months ago</div>
                                                <div class="comments meta-last"><i class="far fa-comment-alt"></i>12</div>
                                            </div>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="comment-text">
                                                <!-- /.username -->
                                                <p>It is a long established fact that a reader will be distracted by the readable
                                                    content of a page when looking at its layout.</p>
                                            </div>
                                            <!-- /.comment-text -->
                                        </div>
                                        <!-- /.card-comment -->
                                        <div class="card-comment">
                                            <!-- User image -->
                                            <div class="post-footer d-flex align-items-center">
                                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="img/user5-128x128.jpg" alt="..."
                                                                             class="img-fluid img-circle img-sm"></div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                <div class="date"><i class="far fa-clock"></i> 2 months ago</div>
                                                <div class="comments meta-last"><i class="far fa-comment-alt"></i>12</div>
                                            </div>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="comment-text">
                                                <!-- /.username -->
                                                <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution
                                                    of letters, as opposed to using 'Content here, content here', making it look
                                                    like readable English.</p>
                                            </div>
                                            <!-- /.comment-text -->
                                        </div>
                                        <!-- form comment   -->
                                        <form action="#" method="post">
                                            <img class="img-fluid img-circle img-sm" src="img/user4-128x128.jpg" alt="Alt Text">
                                            <!-- .img-push is used to add margin to elements next to floating images -->
                                            <div class="img-push">
                                                <input type="text" class="form-control form-control-sm"
                                                       placeholder="Press enter to post comment">
                                            </div>
                                        </form>
                                        <!-- /.card-comment -->
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.post -->
                                <hr>
                                <!-- Post -->
                                <div class="post clearfix">
                                    <div class="user-block">
                                        <div class="post-footer d-flex align-items-center">
                                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                                                <div class="title"><span>John Doe</span></div>
                                            </a>
                                            <div class="date"><i class="far fa-clock"></i> 2 months ago</div>
                                            <div class="comments meta-last"><i class="far fa-comment-alt"></i>12</div>
                                        </div>
                                        <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                    </div>
                                    <!-- /.user-block -->
                                    <p class="text-muted">
                                        Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some
                                        people hate it and argue for its demise, but others ignore the hate as they create awesome
                                        tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.
                                    </p>
                                    <p>
                                        <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Share</a>
                                        <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i> Like</a>
                                        <span class="float-right">
                                                  <a href="#" class="link-black text-sm">
                                                    <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                    </p>
                                    <div class="card-footer card-comments">
                                        <div class="card-comment">
                                            <!-- User image -->
                                            <div class="post-footer d-flex align-items-center">
                                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="img/user5-128x128.jpg" alt="..."
                                                                             class="img-fluid img-circle img-sm"></div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                <div class="date"><i class="far fa-clock"></i> 2 months ago</div>
                                                <div class="comments meta-last"><i class="far fa-comment-alt"></i>12</div>
                                            </div>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="comment-text">
                                                <!-- /.username -->
                                                <p>It is a long established fact that a reader will be distracted by the readable
                                                    content of a page when looking at its layout.</p>
                                            </div>
                                            <!-- /.comment-text -->
                                        </div>
                                        <!-- /.card-comment -->
                                        <div class="card-comment">
                                            <!-- User image -->
                                            <div class="post-footer d-flex align-items-center">
                                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="img/user5-128x128.jpg" alt="..."
                                                                             class="img-fluid img-circle img-sm"></div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                <div class="date"><i class="far fa-clock"></i> 2 months ago</div>
                                                <div class="comments meta-last"><i class="far fa-comment-alt"></i>12</div>
                                            </div>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="comment-text">
                                                <!-- /.username -->
                                                <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution
                                                    of letters, as opposed to using 'Content here, content here', making it look
                                                    like readable English.</p>
                                            </div>
                                            <!-- /.comment-text -->
                                        </div>
                                        <!-- form comment   -->
                                        <form action="#" method="post">
                                            <img class="img-fluid img-circle img-sm" src="img/user4-128x128.jpg" alt="Alt Text">
                                            <!-- .img-push is used to add margin to elements next to floating images -->
                                            <div class="img-push">
                                                <input type="text" class="form-control form-control-sm"
                                                       placeholder="Press enter to post comment">
                                            </div>
                                        </form>
                                        <!-- /.card-comment -->
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.post -->
                                <hr>
                                <!-- Post -->
                                <div class="post">
                                    <div class="user-block">
                                        <div class="post-footer d-flex align-items-center">
                                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                                                <div class="title"><span>John Doe</span></div>
                                            </a>
                                            <div class="date"><i class="far fa-clock"></i> 2 months ago</div>
                                            <div class="comments meta-last"><i class="far fa-comment-alt"></i>12</div>
                                        </div>
                                        <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                    </div>
                                    <!-- /.user-block -->
                                    <p class="text-muted">
                                        Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some
                                        people hate it and argue for its demise, but others ignore the hate as they create awesome
                                        tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.
                                    </p>
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <img class="img-fluid" src="img/photo1.png" alt="Photo">
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-3" src="img/photo2.png" alt="Photo">
                                                    <img class="img-fluid" src="img/photo3.jpg" alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                    <img class="img-fluid mb-3" src="img/photo4.jpg" alt="Photo">
                                                    <img class="img-fluid" src="img/photo1.png" alt="Photo">
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <p>
                                        <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Share</a>
                                        <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i> Like</a>
                                        <span class="float-right">
                                                  <a href="#" class="link-black text-sm">
                                                    <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                    </p>
                                    <div class="card-footer card-comments">
                                        <!-- form comment   -->
                                        <form action="#" method="post">
                                            <img class="img-fluid img-circle img-sm" src="img/user4-128x128.jpg" alt="Alt Text">
                                            <!-- .img-push is used to add margin to elements next to floating images -->
                                            <div class="img-push">
                                                <input type="text" class="form-control form-control-sm"
                                                       placeholder="Press enter to post comment">
                                            </div>
                                        </form>
                                        <!-- /.card-comment -->
                                    </div>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.post -->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <div class="row">
                                    <!-- post -->
                                    <div class="post col-xl-6">
                                        <div class="post-thumbnail"><a href="post.html"><img src="img/blog-post-1.jpeg" alt="..."
                                                                                             class="img-fluid"></a></div>
                                        <div class="post-details">
                                            <div class="post-meta d-flex justify-content-between">
                                                <div class="date meta-last">20 May | 2016</div>
                                                <div class="category"><a href="#">Business</a></div>
                                            </div>
                                            <a href="post.html">
                                                <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3>
                                            </a>
                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore.</p>
                                            <footer class="post-footer d-flex align-items-center">
                                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid">
                                                    </div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                                <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                                            </footer>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post col-xl-6">
                                        <div class="post-thumbnail"><a href="post.html"><img src="img/blog-post-1.jpeg" alt="..."
                                                                                             class="img-fluid"></a></div>
                                        <div class="post-details">
                                            <div class="post-meta d-flex justify-content-between">
                                                <div class="date meta-last">20 May | 2016</div>
                                                <div class="category"><a href="#">Business</a></div>
                                            </div>
                                            <a href="post.html">
                                                <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3>
                                            </a>
                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore.</p>
                                            <footer class="post-footer d-flex align-items-center">
                                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid">
                                                    </div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                                <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                                            </footer>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post col-xl-6">
                                        <div class="post-thumbnail"><a href="post.html"><img src="img/blog-post-1.jpeg" alt="..."
                                                                                             class="img-fluid"></a></div>
                                        <div class="post-details">
                                            <div class="post-meta d-flex justify-content-between">
                                                <div class="date meta-last">20 May | 2016</div>
                                                <div class="category"><a href="#">Business</a></div>
                                            </div>
                                            <a href="post.html">
                                                <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3>
                                            </a>
                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore.</p>
                                            <footer class="post-footer d-flex align-items-center">
                                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid">
                                                    </div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                                <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                                            </footer>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post col-xl-6">
                                        <div class="post-thumbnail"><a href="post.html"><img src="img/blog-post-1.jpeg" alt="..."
                                                                                             class="img-fluid"></a></div>
                                        <div class="post-details">
                                            <div class="post-meta d-flex justify-content-between">
                                                <div class="date meta-last">20 May | 2016</div>
                                                <div class="category"><a href="#">Business</a></div>
                                            </div>
                                            <a href="post.html">
                                                <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3>
                                            </a>
                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore.</p>
                                            <footer class="post-footer d-flex align-items-center">
                                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid">
                                                    </div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                                <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                                            </footer>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post col-xl-6">
                                        <div class="post-thumbnail"><a href="post.html"><img src="img/blog-post-1.jpeg" alt="..."
                                                                                             class="img-fluid"></a></div>
                                        <div class="post-details">
                                            <div class="post-meta d-flex justify-content-between">
                                                <div class="date meta-last">20 May | 2016</div>
                                                <div class="category"><a href="#">Business</a></div>
                                            </div>
                                            <a href="post.html">
                                                <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3>
                                            </a>
                                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore.</p>
                                            <footer class="post-footer d-flex align-items-center">
                                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid">
                                                    </div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                                <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="settings">
                                <!-- Post-->
                                <div class="row d-flex post">
                                    <div class="text col-lg-12">
                                        <div class="text-inner d-flex align-items-center">
                                            <div class="content">
                                                <header class="post-header">
                                                    <div class="category"><a href="#">Business</a><a href="#">Technology</a></div>
                                                    <a href="post.html"><h3 class="h4">Alberto Savoia Can Teach You About
                                                        Interior</h3></a>
                                                    <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                </header>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                    nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                                <footer class="post-footer d-flex align-items-center"><a href="#"
                                                                                                         class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid">
                                                    </div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                    <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                                    <div class="comments"><i class="icon-comment"></i>12</div>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- Post-->
                                <div class="row d-flex post">
                                    <div class="text col-lg-12">
                                        <div class="text-inner d-flex align-items-center">
                                            <div class="content">
                                                <header class="post-header">
                                                    <div class="category"><a href="#">Business</a><a href="#">Technology</a></div>
                                                    <a href="post.html"><h3 class="h4">Alberto Savoia Can Teach You About
                                                        Interior</h3></a>
                                                    <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                </header>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                    nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                                <footer class="post-footer d-flex align-items-center"><a href="#"
                                                                                                         class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid">
                                                    </div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                    <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                                    <div class="comments"><i class="icon-comment"></i>12</div>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- Post-->
                                <div class="row d-flex post">
                                    <div class="text col-lg-12">
                                        <div class="text-inner d-flex align-items-center">
                                            <div class="content">
                                                <header class="post-header">
                                                    <div class="category"><a href="#">Business</a><a href="#">Technology</a></div>
                                                    <a href="post.html"><h3 class="h4">Alberto Savoia Can Teach You About
                                                        Interior</h3></a>
                                                    <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                </header>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                    nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                                <footer class="post-footer d-flex align-items-center"><a href="#"
                                                                                                         class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid">
                                                    </div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                    <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                                    <div class="comments"><i class="icon-comment"></i>12</div>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!-- Post-->
                                <div class="row d-flex post">
                                    <div class="text col-lg-12">
                                        <div class="text-inner d-flex align-items-center">
                                            <div class="content">
                                                <header class="post-header">
                                                    <div class="category"><a href="#">Business</a><a href="#">Technology</a></div>
                                                    <a href="post.html"><h3 class="h4">Alberto Savoia Can Teach You About
                                                        Interior</h3></a>
                                                    <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                </header>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                    nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                                <footer class="post-footer d-flex align-items-center"><a href="#"
                                                                                                         class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid">
                                                    </div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                    <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                                    <div class="comments"><i class="icon-comment"></i>12</div>
                                                </footer>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">{{ lang('Recent Discussions') }}</div>

                    @include('user.particals.discussions')

                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-default">
                    <div class="card-header">{{ lang('Recent Comments') }}</div>

                    @include('user.particals.comments')

                </div>
            </div>
        </main>
    </div>
@endsection
 --}}
@extends('layouts.app')

@section('content')
    @include('user.particals.info')
    <div class="container">
        <main class="row">
             <div class="col-lg-3 left-box">
                <!-- Widget [Categories Widget]-->
                    <div class="widget categories">
                        <header>
                            <h3 class="h6">Categories</h3>
                        </header>
                        @foreach ($categories as $category)
                            <div class="item d-flex justify-content-between" data-toggle="tooltip" data-placement="top"
                                 title="{{ $category->articles_count }} bài viết "><a
                                        href="{{ url('category', ['name' => $category->name]) }}">{{ $category->name }}</a><span>{{ $category->articles_count }}</span>
                            </div>
                        @endforeach
                    </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#recent-articles" data-toggle="tab">Recent Articles</a></li>
                            <li class="nav-item"><a class="nav-link" href="#recent-discussions" data-toggle="tab">{{ lang('Recent Discussions') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#recent-comments" data-toggle="tab">{{ lang('Recent Comments') }}</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="recent-articles">
                                
                                @include('user.particals.articles')

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane posts-listing" id="recent-discussions">

                                @include('user.particals.discussions')

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="recent-comments">
                               
                                @include('user.particals.comments')

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </main>
    </div>
@endsection