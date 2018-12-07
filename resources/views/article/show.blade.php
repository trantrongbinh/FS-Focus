@extends('layouts.app')

@section('title', $article->title)

@section('content')
    <div class="article container body-white">
        <div class="row">
            <main class="post blog-post col-lg-10 offset-md-1" style="display: inline-block; padding: 1em;">
                <div class="row box-content">
                    <div class="col-md-10 offset-md-1">
                        <div class="container">
                            <div class="post-single" style="padding: 1em;">
                                <div style="padding: 0.5em">
                                    <div class="post-meta justify-content-between text-center">
                                        @if($article->category_id)
                                        <h4 class="h5">
                                            <p class="text-hero"><i class="fas fa-arrow-alt-circle-right text-gray-v1 font-size-10"></i> Category: <span><a href="{{ url('category', ['name' => $article->category->name]) }}" class="text-blue hero-link"> {{ $article->category->name }}</a></span></p>
                                        </h4>
                                        @endif
                                    </div>
                                    <h1>{{ $article->title }}&nbsp&nbsp<a href="#"><i class="far fa-bookmark"></i></a></h1>
                                </div>
                                <div class="display-inline">
                                    @if(count($article->tags))
                                        <span class="post-tags">
                                            @foreach($article->tags as $tag)
                                                <a href="{{ url('tag', ['tag' => $tag->tag]) }}"
                                                   class="tag">#{{ $tag->tag }}</a>
                                            @endforeach
                                        </span>
                                    @endif
                                    @if(config('blog.social_share.article_share'))
                                        <span class="float-right">
                                            <div class="social-share" data-title="{{ $article->title }}" data-description="{{ $article->title }}" {{ config('blog.social_share.sites') ? "data-sites=" . config('blog.social_share.sites') : '' }} {{ config('blog.social_share.mobile_sites') ? "data-mobile-sites=" . config('blog.social_share.mobile_sites') : '' }} initialized>
                                            </div>
                                        </span>
                                    @endif
                                </div>
                                <div class="post-footer d-flex align-items-center flex-column flex-sm-row font-size-12">
                                    <a href="/user/{{ $article->user->name }}" class="author d-flex align-items-center flex-wrap">
                                        <div class="avatar">
                                            <img src="{{ $article->user->avatar }}" alt="{{ $article->user->name }}" class="img-fluid">
                                        </div>
                                        <div class="title">
                                            <span><b>{{ $article->user->name or 'No Name' }}</b></span>
                                        </div>
                                    </a>
                                    <div class="d-flex align-items-center flex-wrap">
                                        <div class="date">
                                            <b><i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }}</b>
                                        </div>
                                        <div class="views">
                                            <b><i class="far fa-eye"></i> {{ $article->getViews() }}</b>
                                        </div>
                                        <div class="views">
                                            <b><i class="far fa-comment-alt"></i> {{ $article->comments_count }}</b>
                                        </div>
                                        <div class="comments meta-last">
                                            <b><i class="far fa-bookmark"></i> 999</b>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @if($article->page_image)
                                    <div class="text-center">
                                        <img src="{{ $article->page_image }}" alt="{{ $article->slug }}" onclick="window.open(this.src)" class="img-fluid">
                                    </div>
                                @endif
                                <div class="post-details">
                                    <div class="post-body font-size-18">
                                        <p class="lead">{{ $article->meta_description }}</p>
                                        <parse content="{{ $article->content['raw'] }}"></parse>
                                    </div>
                                    <br>
                                    @if($article->is_original)
                                    <div class="publishing alert alert-dismissible alert-info">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <p>"{!! config('blog.license') !!}" - Bkfa Team</p>
                                    </div>
                                    @endif
                                    <div class="display-inline">
                                        @if(count($article->tags))
                                            <span class="post-tags">
                                                @foreach($article->tags as $tag)
                                                    <a href="{{ url('tag', ['tag' => $tag->tag]) }}"
                                                       class="tag">#{{ $tag->tag }}</a>
                                                @endforeach
                                            </span>
                                        @endif
                                        @if(config('blog.social_share.article_share'))
                                            <span class="float-right">
                                                <div class="social-share" data-title="{{ $article->title }}" data-description="{{ $article->title }}" {{ config('blog.social_share.sites') ? "data-sites=" . config('blog.social_share.sites') : '' }} {{ config('blog.social_share.mobile_sites') ? "data-mobile-sites=" . config('blog.social_share.mobile_sites') : '' }} initialized>
                                                </div>
                                            </span>
                                        @endif
                                    </div>
                                    <br><br>
                                    <!-- comment -->
                                    @if(Auth::guest())
                                        <comment title="You must be logged to add a comment !" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" null-text="">
                                        </comment>
                                    @else
                                        <comment title="Bình luận" username="{{ Auth::user()->name }}" user-avatar="{{ Auth::user()->avatar }}" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" null-text="" can-comment>
                                        </comment>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1 fixed-link float-right">
                        <div class="links">
                            <ul class="list-unstyled">
                                <li>
                                    @if(Auth::guest())
                                        <clap article-id="{{ $article->id }}" api="article" vote-count="{{ $article->countUpVoters() }}"></clap>
                                    @else
                                        <clap article-id="{{ $article->id }}" api="article" vote-count="" can-vote></clap>
                                    @endif
                                </li>
                                <li><a href="#"><i class="fas fa-bookmark"></i></a></li>
                                <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-github"></i></a></li>
                                <li><a href="#"><i class="fab fa-stack-overflow"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Related Posts -->
                        @if(!$related['relatedCategory']->isEmpty())
                            <div class="related-posts">
                                <div class="container">
                                    <a href="#" class="read-next clear">
                                        <strong>Related <i class="fas fa-angle-double-right font-size-12"></i></strong>
                                    </a>
                                    @include('article.related', ['related' => $related['relatedCategory']])
                                </div> <hr>
                            </div>                      
                        @endif

                        @if(!$related['relatedAuthor']->isEmpty())
                            <div class="related-posts">
                                <div class="container">
                                    <a href="#" class="read-next clear">
                                        <strong>More from {{ $article->user->name }} <i class="fas fa-angle-double-right font-size-12"></i></strong>
                                    </a>
                                    @include('article.related', ['related' => $related['relatedAuthor']])
                                </div> <hr>
                            </div>
                        @endif
                        <div class="clear clear2"></div>
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
