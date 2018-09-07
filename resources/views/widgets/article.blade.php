<div class="container">
    <div class="row">
       
        @include('modules.left-box')

        <main class="posts-listing col-lg-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-2">
                        <ul class="nav nav-pills" style="margin: 0 auto;">
                            <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab"> Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab"> Posts</a></li>
                            <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab"> Questions</a></li>
                        </ul>
                        <div class="clear"></div>
                        <div class="" style="display: inline-block;">
                            @if (Auth::guest())
                                    <img src="/images/default.png" alt="..." class="img-fluid img-circle" data-toggle="tooltip" data-placement="bottom" title="Avatar" style="height: 50px; width: 50px; margin-left: 5px; margin-right: 10px; float: left;"><span class="add-question card" style="border: 2px solid #ECECEC; padding-bottom: 30px;  -moz-border-radius: 5px; -webkit-border-radius: 5px;"><a href="{{ url('login') }}" data-toggle="modal" data-target="#questionModal"><span class="description" style="padding: 10px;"><strong> What is your question?</strong></span></a></span>
                            @else
                                <img src="{{ Auth::user()->avatar }}" alt="..."  class="img-fluid rounded-circle" data-toggle="tooltip" data-placement="bottom" title="{{ Auth::user()->nickname ?: Auth::user()->name }}" style="height: 50px; width: 50px; margin-left: 5px; margin-right: 10px; float: left;"><span class="add-question card" style="border: 2px solid #ECECEC; padding-bottom: 30px;  -moz-border-radius: 5px; -webkit-border-radius: 5px;"><a href="{{ url('login') }}" data-toggle="modal" data-target="#questionModal"><span class="description" style="padding: 10px;"><strong> What is your question?</strong></span></a></span>
                            @endif
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <div id="list-article">
                                @forelse($articles as $article)
                                <!-- Post -->
                                <div class="post card">
                                    <div class="card-body">
                                        <div class="user-block">
                                            <div class="post-footer d-flex align-items-center">
                                                <a href="/user/{{ $article->user->name }}" class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="{{ $article->user->avatar }}" alt="{{ $article->user->name }}" class="img-fluid"></div>
                                                    <div class="title"><span>John Doe</span></div>
                                                </a>
                                                <div class="date"><i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }}</div>
                                                <div class="comments meta-last"><i class="far fa-comment-alt"></i>12</div>
                                            </div>
                                            <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                        </div>
                                        <!-- /.user-block -->
                                        <a href="{{ url($article->slug) }}" style="margin-top: 10px;">
                                            <h3 class="h4">{{ $article->title }}</h3>
                                        </a>
                                        <div class="meta">
                                            <span class="cinema">{{ $article->subtitle }}</span>
                                        </div>
                                        <div class="description">
                                            {{ $article->meta_description }}
                                            @if(strlen($article->content['raw'] ) < 2000)
                                                <a href="javascript:void(0)"  id="read-more{{$article->id}}" onclick="readMore()">... more</a>
                                            @else
                                                <a href="{{ url($article->slug) }}">... more</a>
                                            @endif
                                        </div>
                                        @if($article->page_image)
                                            <div class="row mb-3" style="margin-top: 10px;">
                                                <div class="col-sm-12">
                                                    <a href="{{ url($article->slug) }}">
                                                        <img class="img-fluid" alt="{{ $article->slug }}" src="{{ $article->page_image }}" data-holder-rendered="true">
                                                    </a>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        @endif
                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="fa fa-share mr-1"></i> Share</a>
                                            <a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up mr-1"></i> Like</a>
                                            <span class="float-right">
                                                  <a href="#" class="link-black text-sm">
                                                    <i class="fa fa-comments-o mr-1"></i> Comments (5)
                                                </a>
                                            </span>
                                        </p>
                                    </div>
                                    <!-- comment -->
                                    @if(Auth::guest())
                                    <comment-home title="Post Comments" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}"></comment-home>
                                    @else
                                    <comment-home title="Bình luận" username="{{ Auth::user()->name }}" user-avatar="{{ Auth::user()->avatar }}" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" can-comment></comment-home>
                                    @endif
                                </div>
                                <!-- /.post -->
                                @empty
                                    <h3 class="text-center">{{ lang('Nothing') }}</h3>
                                @endforelse
                            </div>
                            <!-- Pagination -->
                                {{ $articles->links('pagination.default') }}
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane card" id="timeline">
                            <div class="row card-body">
                                <!-- post -->
                                <div class="post col-xl-6">
                                    <div class="post-thumbnail"><a href="post.html"><img src="img/blog-post-1.jpeg" alt="..." class="img-fluid"></a></div>
                                    <div class="post-details">
                                        <div class="post-meta d-flex justify-content-between">
                                            <div class="date meta-last">20 May | 2016</div>
                                            <div class="category"><a href="#">Business</a></div>
                                        </div>
                                        <a href="post.html">
                                            <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3>
                                        </a>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <footer class="post-footer d-flex align-items-center">
                                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                                                <div class="title"><span>John Doe</span></div>
                                            </a>
                                            <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                            <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                                        </footer>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post col-xl-6">
                                    <div class="post-thumbnail"><a href="post.html"><img src="img/blog-post-1.jpeg" alt="..." class="img-fluid"></a></div>
                                    <div class="post-details">
                                        <div class="post-meta d-flex justify-content-between">
                                            <div class="date meta-last">20 May | 2016</div>
                                            <div class="category"><a href="#">Business</a></div>
                                        </div>
                                        <a href="post.html">
                                            <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3>
                                        </a>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <footer class="post-footer d-flex align-items-center">
                                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                                                <div class="title"><span>John Doe</span></div>
                                            </a>
                                            <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                            <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                                        </footer>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post col-xl-6">
                                    <div class="post-thumbnail"><a href="post.html"><img src="img/blog-post-1.jpeg" alt="..." class="img-fluid"></a></div>
                                    <div class="post-details">
                                        <div class="post-meta d-flex justify-content-between">
                                            <div class="date meta-last">20 May | 2016</div>
                                            <div class="category"><a href="#">Business</a></div>
                                        </div>
                                        <a href="post.html">
                                            <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3>
                                        </a>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <footer class="post-footer d-flex align-items-center">
                                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                                                <div class="title"><span>John Doe</span></div>
                                            </a>
                                            <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                            <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                                        </footer>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post col-xl-6">
                                    <div class="post-thumbnail"><a href="post.html"><img src="img/blog-post-1.jpeg" alt="..." class="img-fluid"></a></div>
                                    <div class="post-details">
                                        <div class="post-meta d-flex justify-content-between">
                                            <div class="date meta-last">20 May | 2016</div>
                                            <div class="category"><a href="#">Business</a></div>
                                        </div>
                                        <a href="post.html">
                                            <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3>
                                        </a>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <footer class="post-footer d-flex align-items-center">
                                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
                                                <div class="title"><span>John Doe</span></div>
                                            </a>
                                            <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                            <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                                        </footer>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post col-xl-6">
                                    <div class="post-thumbnail"><a href="post.html"><img src="img/blog-post-1.jpeg" alt="..." class="img-fluid"></a></div>
                                    <div class="post-details">
                                        <div class="post-meta d-flex justify-content-between">
                                            <div class="date meta-last">20 May | 2016</div>
                                            <div class="category"><a href="#">Business</a></div>
                                        </div>
                                        <a href="post.html">
                                            <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3>
                                        </a>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <footer class="post-footer d-flex align-items-center">
                                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
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
                        <div class="tab-pane card-body" id="settings">
                            <div style="margin-top: -20px; "></div>
                            <!-- Post-->
                            <div class="row  d-flex post card">
                                <div class="text col-lg-12 card-body">
                                    <div class="text-inner d-flex align-items-center">
                                        <div class="content">
                                            <header class="post-header">
                                                <div class="category"><a href="#">Business</a><a href="#">Technology</a></div>
                                                <a href="post.html"><h3 class="h4">Alberto Savoia Can Teach You About Interior</h3></a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                            </header>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                            <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                                                <div class="title"><span>John Doe</span></div></a>
                                                <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                                <div class="comments"><i class="icon-comment"></i>12</div>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Post-->
                            <div class="row d-flex post card">
                                <div class="text col-lg-12  card-body">
                                    <div class="text-inner d-flex align-items-center">
                                        <div class="content">
                                            <header class="post-header">
                                                <div class="category"><a href="#">Business</a><a href="#">Technology</a></div>
                                                <a href="post.html"><h3 class="h4">Alberto Savoia Can Teach You About Interior</h3></a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                            </header>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                            <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                                                <div class="title"><span>John Doe</span></div></a>
                                                <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                                <div class="comments"><i class="icon-comment"></i>12</div>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Post-->
                            <div class="row d-flex post card">
                                <div class="text col-lg-12  card-body">
                                    <div class="text-inner d-flex align-items-center">
                                        <div class="content">
                                            <header class="post-header">
                                                <div class="category"><a href="#">Business</a><a href="#">Technology</a></div>
                                                <a href="post.html"><h3 class="h4">Alberto Savoia Can Teach You About Interior</h3></a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                            </header>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                            <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                                                <div class="title"><span>John Doe</span></div></a>
                                                <div class="date"><i class="icon-clock"></i> 2 months ago</div>
                                                <div class="comments"><i class="icon-comment"></i>12</div>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Post-->
                            <div class="row d-flex post card">
                                <div class="text col-lg-12  card-body">
                                    <div class="text-inner d-flex align-items-center">
                                        <div class="content">
                                            <header class="post-header">
                                                <div class="category"><a href="#">Business</a><a href="#">Technology</a></div>
                                                <a href="post.html"><h3 class="h4">Alberto Savoia Can Teach You About Interior</h3></a>
                                                <a href="#" class="float-right btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                            </header>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                            <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid"></div>
                                                <div class="title"><span>John Doe</span></div></a>
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
                </div>
            </div>
        </main>
        
        @include('modules.right-box')

    </div>
</div>