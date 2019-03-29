@extends('layouts.app')
@section('title', $article->title)
@section('styles')
<link rel="stylesheet" href="{{ asset(mix('css/detail-post.css')) }}">
<style>
    .author__more {
    position: absolute;
    left: 85%;
    top: 0;
    bottom: 0;
    width: 250px;
}
.trailing {
    width: inherit;
}

.box {
    position: fixed;
    bottom: 0;
    z-index: 2;
    width: inherit;
    background: #FFF;
    -webkit-box-shadow: 0 0 1px rgba(0,0,0,0.35);
    -moz-box-shadow: 0 0 1px rgba(0,0,0,0.35);
    box-shadow: 0 0 1px rgba(0,0,0,0.35);
    padding: 0 10px;
}
.author-subscribe {
    border-bottom: 1px solid #EEE;
    padding-bottom: 15px;
    margin-bottom: 10px;
}
.heading {
    font-size: 13px;
    line-height: 20px;
    padding: 0 15px 10px;
}
.author {
    padding: 8px 0 44px 45px;
    margin: 0 15px;
    background: #FFF;
    position: relative;
}
.author .avatar {
    width: 40px;
    height: 40px;
    display: block;
    border-radius: 50%;
    overflow: hidden;
    float: left;
    margin-left: -45px;
}
.author .avatar img {
    max-width: 100%;
    max-height: 100%;
}
 .author .title {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.author .title .display-name {
    font-family: SFD-Bold;
    color: #333;
    font-size: 14px;
    line-height: 18px;
}
.author .title .nickname {
    font-size: 13px;
    line-height: 16px;
    color: #999;
}

</style>
@endsection
@section('content')
<div class="article container body-white">
    <div class="row">
        <main class="col-lg-12">
            <div class="float-left action__social">
                <div class="links fixed-link">
                    <ul class="list-unstyled">
                        <li>
                            <vote></vote>
                            {{-- @if(Auth::guest())
                            <clap article-id="{{ $article->id }}" api="article" vote-count="{{ $article->countUpVoters() }}"></clap>
                            @else
                            <clap article-id="{{ $article->id }}" api="article" vote-count="" can-vote></clap>
                            @endif --}}
                        </li>
                        <li><a href="#"><i class="fas fa-bookmark"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="detail--post">
                <div class="container center-content__800px mt-4 mb-4">
                    <div class="row">
                        <div class="ml-3 w-60 d-flex align-items-center">
                            <a href="/user/{{ $article->user->name }}">
                                <img src="{{ $article->user->avatar }}" alt="{{ $article->user->name }}" class="avatar__60px align-middle">
                            </a>
                        </div>
                        <div class="col">
                            <div class="text-small text-small__black">
                                <a href="/user/{{ $article->user->name }}" class="author-name">
                                    {{ $article->user->name or 'No Name' }}
                                </a>
                            </div>
                            <div class="text-small text-light__grey truncate-line__2">
                                Software Developer and Medium fan.
                            </div>
                            <div class="text-small text-light__grey truncate-line__1">
                                <a href="#">
                                    {{ $article->published_at->diffForHumans() }}
                                </a>
                                <span>&middot;</span>
                                <a href="#">
                                    8 min read
                                </a>
                                <span>&middot;</span>
                                <a href="">
                                    <i class="far fa-eye"></i> {{ $article->getViews() }}
                                </a>
                                <span>&middot;</span>
                                <a href="">
                                    <i class="far fa-comment-alt"></i> {{ $article->comments_count }}
                                </a>
                            </div>
                            <div class="card__share">
                                <div class="card__social">
                                    <a class="share-icon edit" href="#"><span class="fas fa-pencil-alt"></span></a>
                                    <a class="share-icon delete" href="#"><span class="fas fa-trash-alt"></span></a>
                                    <a class="share-icon report" href="#"><span class="fas fa-flag"></span></a>
                                </div>
                                <a id="share" class="share-toggle action-toggle share-icon" href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container center-content__800px mb-4">
                    <h1>{{ $article->title }}</h1>
                    @if($article->category_id)
                        <a href="{{ url('category', ['name' => $article->category->name]) }}" class="topic--post"> {{ $article->category->name }}</a>
                    @endif
                    <div class="markdown ql-editor">
                        {!! $article->content['html'] !!}
                    </div>
                    <div class="mb__20"></div>
                    <div class="display__inline">
                        @if(count($article->tags))
                            <span class="post-tags">
                                @foreach($article->tags as $tag)
                                <a href="{{ url('tag', ['tag' => $tag->tag]) }}" class="tag">#{{ $tag->tag }}</a>
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
            <div class="float-right author__more">
                <div class="trailing">
                    <div class="box is-expose" id="popup-box">
                        <a class="box-close float-right" href="#">×</a><br>
                        <div class="author-subscribe">
                            <div class="author">
                                <a class="avatar" href="/nguoi-dung/Huskywannafly">
                                    <img alt="avatar" src="https://s3-ap-southeast-1.amazonaws.com/img.spiderum.com/sp-xs-avatar/e22f6990295011e7a999e7b5135b7d88.jpg">
                                </a>
                                <div class="title">
                                    <a class="display-name" href="/nguoi-dung/Huskywannafly">
                                        Huskywannafly
                                    </a>
                                    <div class="nickname">@Huskywannafly</div>
                                </div>
                                <div class="action">
                                    <a class="btn btn-round btn-default btn-follow" title="Theo dõi Huskywannafly">
                                        Theo dõi
                                    </a>
                                </div>
                            </div>
                        </div>
                        <suggested-post>
                            <div id="suggested-post">
                                <h3 class="heading">Bài đăng khác</h3>
                                <!---->
                                <ul class="list-article list-unstyled clearfix">
                                    <!---->
                                    <li class="item-article">
                                        <a class="block" fragment="suggested" href="/bai-dang/Tai-sao-khong-nen-doc-sach-self-help-6jw#suggested">
                                            <h6 class="title">Căn bệnh ung thư mang tên Self-help</h6>
                                        </a>
                                    </li>
                                    <li class="item-article">
                                        <a class="block" fragment="suggested" href="/bai-dang/Ve-Can-benh-ung-thu-mang-ten-Self-help-6k3#suggested">
                                            <h6 class="title">Về: "Căn bệnh ung thư mang tên Self-help"</h6>
                                        </a>
                                    </li>
                                    <li class="item-article">
                                        <a class="block" fragment="suggested" href="/bai-dang/Den-Spiderum-de-nghe-su-bat-dong-6km#suggested">
                                            <h6 class="title">Đến Spiderum để nghe ý kiến trái chiều</h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </suggested-post>
                        <!---->
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div class="pb__100"></div>
</div>
@endsection
