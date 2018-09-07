@extends('layouts.app')

@section('title', $article->title)

@section('content')
<div class="article container-fluid">
    <div class="row">
        <main class="post blog-post col-lg-10 offset-md-1">
            <div class="container">
                <div class="post-single">
                    <div class="text-center">
                        <div class="post-meta justify-content-between">
                            <div class="category"><a href="#">{{ $article->category->name }}</a></div>
                        </div>
                        <h1>{{ $article->title }}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                        <h3 class="h4" style="color: #9F9F9F;">{{ $article->subtitle }}</h3>
                        <div class="post-footer d-flex align-items-center flex-column flex-sm-row">
                            <a href="/user/{{ $article->user->name }}" class="author d-flex align-items-center flex-wrap">
                                <div class="avatar"><img src="{{ $article->user->avatar }}" alt="{{ $article->user->name }}" class="img-fluid"></div>
                                <div class="title"><span>J{{ $article->user->name or 'No Name' }}</span></div>
                            </a>
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="date"><i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }}</div>
                                <div class="views"><i class="far fa-eye"></i> 500</div>
                                <div class="comments meta-last"><i class="far fa-comment-alt"></i>12</div>
                            </div>
                        </div>
                    </div>
                    <br>
                    @if($article->page_image)
                        <div class="post-thumbnail"><img src="{{ $article->page_image }}" alt="{{ $article->slug }}" class="img-fluid"></div>
                    @endif
                    <div class="post-details">
                        <div class="post-body">
                            <p class="lead">{{ $article->meta_description }}</p>
                            <parse content="{{ $article->content['raw'] }}"></parse>
                        </div>
                        <br>
                        @if($article->is_original)
                        <div class="publishing alert alert-dismissible alert-info">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {!! config('blog.license') !!}
                        </div>
                        @endif
                        <br>
                        <div class="post-tags">
                            @if(count($article->tags))
                                @foreach($article->tags as $tag)
                                    <a href="{{ url('tag', ['tag' => $tag->tag]) }}" class="tag">#{{ $tag->tag }}</a>
                                @endforeach
                            @endif
                        </div>
                        @if(config('blog.social_share.article_share'))
                        <div class="footing float-right" style="margin-top: -40px;">
                            <div class="social-share"
                            data-title="{{ $article->title }}"
                            data-description="{{ $article->title }}"
                            {{ config('blog.social_share.sites') ? "data-sites=" . config('blog.social_share.sites') : '' }}
                            {{ config('blog.social_share.mobile_sites') ? "data-mobile-sites=" . config('blog.social_share.mobile_sites') : '' }}
                            initialized>
                        </div>
                    </div>
                    @endif
                    <!-- Latest Posts -->
                    <div class="latest-posts">
                        <div class="container">
                            <a href="#" class="read-next">
                                <strong>Read Next <i class="fa fa-angle-right"></i></strong>
                            </a>
                            <div class="row d-flex align-items-stretch featured-posts">
                                <div class="text col-lg-7">
                                    <div class="text-inner d-flex align-items-center">
                                        <div class="content">
                                            <header class="post-header">
                                                <div class="category"><a href="#">Business</a><a href="#">Technology</a></div>
                                                    <a href="post.html">
                                                        <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3>
                                                    </a>
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
                                <div class="image col-lg-5 text-right"><img src="img/featured-pic-1.jpeg" alt="..."  style="margin-right: 15px;"></div>
                            </div>
                            <div class="row">
                                <div class="post col-md-4">
                                    <div class="post-thumbnail"><a href="post.html"><img src="img/blog-1.jpg" alt="..." class="img-fluid"></a></div>
                                    <div class="post-details">
                                        <div class="post-meta d-flex justify-content-between">
                                            <div class="date">20 May | 2016</div>
                                            <div class="category"><a href="#">Business</a></div>
                                        </div>
                                        <a href="post.html">
                                            <h3 class="h4">Ways to remember your important ideas</h3>
                                        </a>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <footer class="post-footer d-flex align-items-center">
                                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="{{ $article->user->avatar }}" alt="tran trong binh" class="img-fluid"></div>
                                                <div class="title"><span>{{ $article->user->name or 'No Name' }}</span></div>
                                            </a>
                                            <div class="date"><i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }} </div>
                                            <div class="comments meta-last"><i class="far fa-comment-alt"></i>{{ $article->view_count }}</div>
                                        </footer>
                                    </div>
                                </div>
                                <div class="post col-md-4">
                                    <div class="post-thumbnail"><a href="post.html"><img src="img/blog-2.jpg" alt="..." class="img-fluid"></a></div>
                                    <div class="post-details">
                                        <div class="post-meta d-flex justify-content-between">
                                            <div class="date">20 May | 2016</div>
                                            <div class="category"><a href="#">Technology</a></div>
                                        </div>
                                        <a href="post.html">
                                            <h3 class="h4">Diversity in Engineering: Effect on Questions</h3>
                                        </a>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <footer class="post-footer d-flex align-items-center">
                                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="{{ $article->user->avatar }}" alt="tran trong binh" class="img-fluid"></div>
                                                <div class="title"><span>{{ $article->user->name or 'No Name' }}</span></div>
                                            </a>
                                            <div class="date"><i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }} </div>
                                            <div class="comments meta-last"><i class="far fa-comment-alt"></i>{{ $article->view_count }}</div>
                                        </footer>
                                    </div>
                                </div>
                                <div class="post col-md-4">
                                    <div class="post-thumbnail"><a href="post.html"><img src="img/blog-3.jpg" alt="..." class="img-fluid"></a></div>
                                    <div class="post-details">
                                        <div class="post-meta d-flex justify-content-between">
                                            <div class="date">20 May | 2016</div>
                                            <div class="category"><a href="#">Financial</a></div>
                                        </div>
                                        <a href="post.html">
                                            <h3 class="h4">Alberto Savoia Can Teach You About Interior</h3>
                                        </a>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.</p>
                                        <footer class="post-footer d-flex align-items-center">
                                            <a href="#" class="author d-flex align-items-center flex-wrap">
                                                <div class="avatar"><img src="{{ $article->user->avatar }}" alt="tran trong binh" class="img-fluid"></div>
                                                <div class="title"><span>{{ $article->user->name or 'No Name' }}</span></div>
                                            </a>
                                            <div class="date"><i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }} </div>
                                            <div class="comments meta-last"><i class="far fa-comment-alt"></i>{{ $article->view_count }}</div>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- comment -->
                    @if(Auth::guest())
                        <comment title="Post Comments" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}"></comment>
                    @else
                        <comment title="Bình luận" username="{{ Auth::user()->name }}" user-avatar="{{ Auth::user()->avatar }}" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" can-comment></comment>
                    @endif
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@endsection
