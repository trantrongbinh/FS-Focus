<div class="container">
    <div class="row">
       
        @include('modules.left-box')

        <main class="posts-listing col-lg-7">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if (Auth::guest())
                                <a rel="nofollow " href="{{ url('login') }}" class=" d-flex">
                                    <div class="news-f-img"> <img src="/images/default.png" alt="User Image" class="img-fluid img-circle"  width="60"></div>
                                    <div class="msg-body" style="margin-left: 30px;">
                                        <h3 class="h5 msg-nav-h3"> Share an article or idea or discussion ...</h3>
                                        <small>{{ lang('Discuss Subtitle') }}</small>
                                    </div>
                                </a>
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-11">
                                        <a href="{{ url('login') }}" class="btn btn-outline-secondary btn-sm" style="margin-left: 30px;"><i class="fas fa-user-edit"></i> Write an article</a> &nbsp
                                        <a href="{{ url('discussion') }}" class="btn btn-danger btn-sm"><i class="fas fa-question-circle"></i> Discussion</a>
                                        <a href="{{ url('login') }}" class="btn btn-info btn-sm float-right"><i class="fas fa-edit"></i> Post</a>
                                    </div>
                                </div>
                            @else
                                <a rel="nofollow " href="javascript:;" class="d-flex button-post">
                                    <div class="news-f-img"> <img src="{{ Auth::user()->avatar }}" alt="User Image" class="img-fluid img-circle" data-toggle="tooltip" title="{{ Auth::user()->nickname ?: Auth::user()->name }}" width="60"></div>
                                    <div class="msg-body" style="margin-left: 30px; ">
                                        <h3 class="h5 msg-nav-h3"> Share an article or idea or discussion ...</h3>
                                        <small>{{ lang('Discuss Subtitle') }}</small>
                                    </div>
                                </a>
                                <div class="row">
                                    <div class="col-md-12 form-post hide" style="padding: 30px;">
                                        <form class="form" action="{{ url('article/new') }}" method="POST">
                                            {{ csrf_field() }}
                                             <div class="form-group row">
                                                <div class="col-sm-12">
                                                    @if ($errors->has('title'))
                                                        <span class="invalid-feedback d-block">
                                                            <strong>{{ $errors->first('title') }}</strong>
                                                        </span>
                                                    @endif
                                                    <input type="text" id="title" name="title" class="form-control" placeholder="Title">
                                                </div>
                                            </div>
                                            <form-post></form-post>
                                            <button type="submit" class="btn btn-info btn-sm" style="margin: auto;"> <b>Publish</b></button>
                                        </form>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-11">
                                        <a href="{{ url('article/new') }}" class="btn btn-outline-secondary btn-sm" style="margin-left: 30px;"><i class="fas fa-user-edit"></i> Write an article</a> &nbsp
                                        <a href="{{ url('discussion') }}" class="btn btn-danger btn-sm"><i class="fas fa-question-circle"></i> Discussion</a>
                                        <a href="javascript:;" class="btn btn-info btn-sm float-right button-post"><i class="fas fa-edit"></i> Post</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <div id="featured-posts">
                                @forelse($articles as $article)
                                <!-- Post -->
                                <div class="post card">
                                    <div class="card-body">
                                        <div class="user-block">
                                            <div class="post-footer d-flex align-items-center">
                                                <a href="/user/{{ $article->user->name }}" class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="{{ $article->user->avatar }}" alt="{{ $article->user->name }}" class="img-fluid"></div>
                                                    <div class="title"><span><b>{{ $article->user->name }}</b></span></div>
                                                </a>
                                                <div class="date"><b><i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }}</b></div>
                                                <div class="comments meta-last"><b><i class="far fa-comment-alt"></i>{{ $article->comments_count }}</b></div>
                                            </div>
                                            @if(Auth::check() && Auth::user()->id == $article->user->id)
                                                <a href="javascript:;" class="float-right  btn-tool" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ url("article/{$article->id}/edit") }}">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            @else
                                                <a href="javascript:;" class="float-right btn-tool">&times;</a>
                                            @endif
                                        </div>
                                        <!-- /.user-block -->
                                        <a href="{{ url($article->slug) }}" style="margin-top: 10px;">
                                            <h3 class="h4">{{ $article->title }}</h3>
                                        </a>
                                        @if($article->subtitle)
                                            <div class="meta">
                                                <span class="cinema">{{ $article->subtitle }}</span>
                                            </div>
                                        @endif
                                        <div class="description">
                                            {{ $article->meta_description }}                                         
                                            <a class="text-blue" href="{{ url($article->slug) }}">... more</a>
                                        </div>
                                        @if($article->page_image)
                                            <div class="row mb-3" style="margin-top: 10px;">
                                                <div class="col-sm-12 text-center">
                                                    <a href="{{ url($article->slug) }}">
                                                        <img class="img-fluid" alt="{{ $article->slug }}" src="{{ $article->page_image }}" data-holder-rendered="true">
                                                    </a>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                        @endif
                                        <p>
                                            <a href="#" class="link-black text-sm mr-2"><i class="far fa-star mr-1"></i> Rate (2)</a>
                                            <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like (100)</a>
                                            <span class="float-right">
                                                  <a href="#" class="link-black text-sm">
                                                    <i class="far fa-comments mr-1"></i> Comments ({{ $article->comments_count }})
                                                </a>
                                            </span>
                                        </p>
                                    </div>
                                    <!-- comment -->
                                    @if(Auth::guest())
                                    <comment-home title="Post Comments" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" null-text=""></comment-home>
                                    @else
                                    <comment-home title="Bình luận" username="{{ Auth::user()->name }}" user-avatar="{{ Auth::user()->avatar }}" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" null-text="" can-comment></comment-home>
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
                    </div>
                </div>
            </div>
        </main>
        
        @include('modules.right-box')

    </div>
</div>