<div class="container">
    <div class="row" id="content">
        <!-- Box Left-->
        <aside class="col-lg-3 display-flex col-left">
            @include('modules.left')
        </aside>
        <main class="col-content posts-listing col-lg-7 border-frame">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if (Auth::guest())
                                <a rel="nofollow " href="{{ url('login') }}" class=" d-flex">
                                    <div class="news-f-img"><img src="{{ asset('/images/default.png') }}" alt="User Image" class="img-fluid img-circle" width="60"></div>
                                    <div class="msg-body margin-left__30">
                                        <h3 class="h5 msg-nav-h3"> Share an article or idea or discussion ...</h3>
                                        <p>{{ lang('Discuss Subtitle') }}</p>
                                    </div>
                                </a>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-11">
                                        <a href="{{ url('login') }}" class="btn btn-info btn-sm float-right margin-left__30"><i class="fas fa-user-edit"></i> Write an article</a>&nbsp
                                        <a href="{{ url('discussion') }}" class="btn btn-danger btn-sm float-right"><i class="fas fa-question-circle"></i> Discussion</a>
                                    </div>
                                </div>
                            @else
                                <a rel="nofollow " href="{{ url('article/new') }}" class="d-flex button-post">
                                    <div class="news-f-img">
                                        <img src="{{ Auth::user()->avatar }}" alt="User Image" class="img-fluid img-circle" data-toggle="tooltip" data-placement="bottom" title="{{ Auth::user()->nickname ?: Auth::user()->name }}" width="60">
                                    </div>
                                    <div class="msg-body margin-left__30">
                                        <h3 class="h5 msg-nav-h3"> Share an article or idea or discussion ...</h3>
                                        <p>{{ lang('Discuss Subtitle') }}</p>
                                    </div>
                                </a>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-11">
                                        <a href="{{ url('article/new') }}" class="btn btn-info btn-sm float-right margin-left__30"><i class="fas fa-user-edit"></i> Write an article</a>&nbsp
                                        <a href="{{ url('discussion') }}" class="btn btn-danger btn-sm float-right"><i class="fas fa-question-circle"></i> Discussion</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <div id="featured-posts">
                                <div class="box-popup">
                                    <img class="img-user__smal" src="{{ asset('/images/dot.png') }}">
                                    <span class="welcome">
                                        <strong>Welcome To The Website</strong>
                                    </span>
                                    <div class="user-ditels">
                                        <div class="images" style="float: left; width: 70px; height: 70px;">
                                            <img class="img-fluid" src="{{ asset('/images/group.jpg') }}" style="padding: 7px;">
                                        </div>
                                        <span class="user-full-ditels text-center">
                                            <h3 class="h6">FS-Focus</h3>
                                            <p><strong>Nothing is impossible!</strong></p>
                                        </span>
                                        <div class="social-icon">
                                            <a href="#"><i class="fab fa-facebook-square" data-toggle="tooltip" data-placement="bottom" title="Facebook"></i></a>
                                            <a href="#"><i class="fab fa-twitter" data-toggle="tooltip" data-placement="bottom" title="Twitter"></i></a>
                                            <a href="#"><i class="fab fa-google-plus" data-toggle="tooltip" data-placement="bottom" title="Google Plus"></i></a>
                                            <a href="#"><i class="fab fa-youtube" data-toggle="tooltip" data-placement="bottom" title="Youtube"></i></a>
                                            <a href="#"><i class="fab fa-github" data-toggle="tooltip" data-placement="bottom" title="Github"></i></a>
                                        </div>
                                    </div>
                                </div>

                                @forelse($articles as $article)
                                <!-- Post -->
                                <div class="card radius shadowDepth1">
                                    @if($article->page_image)
                                        <a href="{{ url($article->slug) }}" class="card__image background__cover" style="background-image: url({{ asset($article->page_image) }});">
                                        </a>
                                    @endif
                                    
                                    <div class="card__content card__padding">
                                        <div class="card__share">
                                            <div class="card__social">
                                                <a class="share-icon facebook" href="#"><span class="fab fa-facebook-square"></span></a>
                                                <a class="share-icon twitter" href="#"><span class="fab fa-twitter"></span></a>
                                                <a class="share-icon googleplus" href="#"><span class="fab fa-google-plus"></span></a>
                                            </div>
                                            <a id="share" class="share-toggle share-icon" href="#"></a>
                                        </div>
                                        <vote></vote>
                                        <div class="card__post">
                                            <div class="card__meta">
                                                <a href="{{ url('category', ['name' => $article->category->name]) }}" class="topic"> {{ $article->category->name }}</a>
                                                <time><i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }}</time>
                                                <span class="readingTime">5 min read</span>
                                            </div>
                                            <article class="card__article">
                                                <h3 class="h4"><a href="{{ url($article->slug) }}">{{ $article->title }}</a></h3>
                                                <p class="card__desc">{{ str_limit($article->meta_description, '200') }}</p>
                                            </article>

                                            @if(count($article->tags))
                                                <ul class="tags">
                                                    @foreach($article->tags as $tag)
                                                        <li><a href="{{ url('tag', ['tag' => $tag->tag]) }}" class="tag">{{ $tag->tag }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <div class="card__action">
                                        <div class="card__author">
                                            <img src="{{ asset($article->user->avatar) }}" alt="{{ $article->user->name }}">
                                            <div class="card__author-content">
                                                By <a href="/user/{{ $article->user->name }}">{{ $article->user->name }}</a>
                                            </div>
                                            <div class="float-right card__action-interactive">
                                                <a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> {{ $article->getViews() }}</a>
                                                <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> {{ $article->comments_count }}</a>
                                                <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a>
                                                <span>
                                                    <a href="javascript:;" class="btn-tool" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ url("article/{$article->id}/edit") }}">Edit</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- comment -->
                                    {{-- @if(Auth::guest())
                                        <a href="{{ url('login') }}" class="text-center">@lang('You must be logged to add a comment !')</a>
                                        <comment-home title="Post Comments" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" null-text=""></comment-home>
                                    @else
                                        <comment-home title="Bình luận" username="{{ Auth::user()->name }}" user-avatar="{{ Auth::user()->avatar }}" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" null-text="" can-comment></comment-home>
                                    @endif --}}
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
                    </div>
                </div>
            </div>
        </main>
        <!-- Box right-->
        <aside class="col-lg-2 display-flex col-right">
            @include('modules.right')
        </aside>
    </div>
</div>
