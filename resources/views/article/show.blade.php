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
                    <!-- comment -->
                    @if(Auth::guest())
                        <comment title="Post Comments" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" null-text=""></comment>
                    @else
                        <comment title="Bình luận" username="{{ Auth::user()->name }}" user-avatar="{{ Auth::user()->avatar }}" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" null-text="" can-comment></comment>
                    @endif
                    <!-- Related Posts -->
                    @include('modules.related-post')
                    <div class="clear" style="margin-bottom: 100px; "></div>
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
