@extends('layouts.app')

@section('title', $article->title)

@section('styles')
    <style>
        body {
            background: #ffffff;
        }

        .box-content {
            position: relative;
        }

        .fixed-link {
            height: 500px;
            line-height: 50px;
            font-size: 20px;
            padding-left: 70px;
            position: -webkit-sticky;
            position: sticky;
            top: 180px;
        }
    </style>
@endsection

@section('content')
    <div class="article container">
        <div class="row">
            <main class="post blog-post col-lg-10 offset-md-1">
                <div class="row box-content">
                    <div class="col-md-1"></div>
                    <div class="col-md-9">
                        <div class="container">
                            <div class="post-single">
                                <div class="text-center">
                                    <div class="post-meta justify-content-between">
                                        @if($article->category_id)<h4 class="h5"><i class="fas fa-link text-blue"></i>
                                            <a href="#"> {{ $article->category->name }}</a></h4>@endif
                                    </div>
                                    <h1>{{ $article->title }}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                                    <div class="post-footer d-flex align-items-center flex-column flex-sm-row"
                                         style="font-size: 12px;">
                                        <a href="/user/{{ $article->user->name }}"
                                           class="author d-flex align-items-center flex-wrap">
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
                                            <div class="comments meta-last">
                                                <b><i class="far fa-comment-alt"></i> {{ $article->comments_count }}</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @if($article->page_image)
                                    <div class="text-center">
                                        <img src="{{ $article->page_image }}" alt="{{ $article->slug }}" class="img-fluid">
                                    </div>
                                @endif
                                <div class="post-details">
                                    <div class="post-body" style="font-size: 18px;">
                                        <h4>{{ $article->subtitle }}</h4>
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
                                    <div>
                                        <div class="post-tags" style="display: inline">
                                            @if(count($article->tags))
                                                @foreach($article->tags as $tag)
                                                    <a href="{{ url('tag', ['tag' => $tag->tag]) }}"
                                                       class="tag">#{{ $tag->tag }}</a>
                                                @endforeach
                                            @endif
                                        </div>
                                        @if(config('blog.social_share.article_share'))
                                            <div class="float-right">
                                                <div class="social-share" data-title="{{ $article->title }}" data-description="{{ $article->title }}" {{ config('blog.social_share.sites') ? "data-sites=" . config('blog.social_share.sites') : '' }} {{ config('blog.social_share.mobile_sites') ? "data-mobile-sites=" . config('blog.social_share.mobile_sites') : '' }} initialized>
                                                </div>
                                            </div>
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
                    <div class="col-md-2 link-right fixed-link">
                        <div class="links">
                            <ul class="list-unstyled">
                                <li>
                                    @if(!Auth::guest())
                                    <clap :item="{{ $article }}"></clap>
                                    @endif
                                </li>
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
                        @include('modules.related-post')
                        <div class="clear" style="margin-bottom: 100px; "></div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        hljs.initHighlightingOnLoad();

        // $(window).scroll(function() {
        //     if($(window).scrollTop() + $(window).height() > $(document).height() - 750) {
        //         //$('.link-right').removeClass('fixed-link');
        //     }
        // });
    </script>
@endsection
