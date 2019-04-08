@extends('layouts.app')

@section('title', $discussion->title)

@section('styles')
    <link rel="stylesheet" href="{{ asset(mix('css/detail-post.css')) }}">
    <style>
    .detail--post {
        margin-left: -100px;
    }

    .related__more {
        margin-left: -50px;
        position: absolute;
        left: 82%;
        top: 0;
        bottom: 0;
        width: 270px;
    }

    .box {
        position: sticky;
        top: 180px;
        width: inherit;
    }

    .box .list-unstyled li {
        margin-top: -10px;
    }

    .box .list-unstyled li a {
        font-size: 1em !important;
    }

    .top-story-number {
        margin-top: 10px;
        background-color: #fff;
        float: left;
        vertical-align: middle;
    }

    .top-story-number:hover {
        color: #5fba57;
        border-color: #5fba57;
    }

    .content-related {
        float: right;
        width: 80%;
    }

    .in-circle{
        border: 1px solid #ddd;
        color: #888;
        border-radius: 50%;
        display: inline-block;
        line-height: 20px;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        width: 20px;
        height: 20px;
        transition: all 0.3s ease;
    }


    .fixed-plugin {
        position: fixed;
        top: 200px;
        right: 0;
        width: 50px;
        background: rgba(0, 0, 0, .3);
        z-index: 1031;
        border-radius: 8px 0 0 8px;
        text-align: center;
    }

    .fixed-plugin .fa-cog {
        color: #FFFFFF;
        padding: 10px;
        border-radius: 0 0 6px 6px;
        width: auto;
    }

    .fixed-plugin .dropdown-menu {
        right: 80px !important;
        left: auto !important;
        width: 280px;
        border-radius: 10px;
        padding: 0 10px;
    }

    .fixed-plugin .dropdown .dropdown-menu {
        -webkit-transform: translateY(-15%);
        -moz-transform: translateY(-15%);
        -o-transform: translateY(-15%);
        -ms-transform: translateY(-15%);
        transform: translateY(-15%);
        top: -20px !important;
        opacity: 0;
        right: 0;
        transform-origin: 0 0 !important;
    }

    .fixed-plugin .dropdown.open .dropdown-menu {
        opacity: 1;
        -webkit-transform: translateY(-13%) !important;
        -moz-transform: translateY(-13%) !important;
        -o-transform: translateY(-13%) !important;
        -ms-transform: translateY(-13%) !important;
        transform: translateY(-13%) !important;
        transform-origin: 0 0 !important;
    }

    .fixed-plugin .dropdown-menu:before,
    .fixed-plugin .dropdown-menu:after {
        content: "";
        display: inline-block;
        position: absolute;
        top: 70px;
        width: 16px;
        transform: translateY(-50%);
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);

    }

    .fixed-plugin .dropdown-menu:before {
        border-bottom: 16px solid rgba(0, 0, 0, 0);
        border-left: 16px solid rgba(0, 0, 0, 0.2);
        border-top: 16px solid rgba(0, 0, 0, 0);
        right: -17px;
    }

    .fixed-plugin .dropdown-menu:after {
        border-bottom: 16px solid rgba(0, 0, 0, 0);
        border-left: 16px solid #FFFFFF;
        border-top: 16px solid rgba(0, 0, 0, 0);
        right: -16px;
    }

    .fixed-plugin {
        top: 210px;
    }

    .ql-toolbar.ql-snow {
        padding: 2.5% 0%;
        border: none !important;
    }

    .ql-container.ql-snow {
        padding: 0 2% 25px;
        border: none !important;
    }

    .ql-editor {
        font-size: 18px;
        font-weight: 400;
        margin: 0 0 20px;
        font-style: normal;
        line-height: 1.58;
        letter-spacing: -.003em;
    }

    .ql-editor.ql-blank::before {
        font-size: 16px !important;
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
                                <clap article-id="{{ $discussion->id }}" api="article" vote-count="{{ $discussion->countUpVoters() }}"></clap>
                                @else
                                <clap article-id="{{ $discussion->id }}" api="article" vote-count="" can-vote></clap>
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
                                <a href="/user/{{ $discussion->user->name }}">
                                    <img src="{{ $discussion->user->avatar }}" alt="{{ $discussion->user->name }}" class="avatar__60px align-middle">
                                </a>
                            </div>
                            <div class="col">
                                <div class="text-small text-small__black">
                                    <a href="/user/{{ $discussion->user->name }}" class="author-name">
                                        {{ $discussion->user->name or 'No Name' }}
                                    </a>
                                </div>
                                <div class="text-small text-light__grey truncate-line__2">
                                    Software Developer and Medium fan.
                                </div>
                                <div class="text-small text-light__grey truncate-line__1">
                                    <a href="#">
                                        {{ $discussion->created_at->diffForHumans() }}
                                    </a>
                                    <span>&middot;</span>
                                    <a href="#">
                                        8 min read
                                    </a>
                                    <span>&middot;</span>
                                    <a href="">
                                        <i class="far fa-eye"></i> {{ $discussion->getViews() }}
                                    </a>
                                    <span>&middot;</span>
                                    <a href="">
                                        <i class="far fa-comment-alt"></i> {{ $discussion->comments_count }}
                                    </a>
                                </div>
                                <div class="card__share">
                                    <div class="card__social">
                                        @if(Auth::check() && Auth::user()->id == $discussion->user->id)
                                            <a class="share-icon edit" href="{{ url("discussion/{$discussion->id}/edit") }}"><span class="fas fa-pencil-alt"></span></a>
                                        @endif
                                            <a class="share-icon delete" href="#"><span class="fas fa-trash-alt"></span></a>
                                            <a class="share-icon report" href="#"><span class="fas fa-flag"></span></a>
                                    </div>
                                    <a id="share" class="share-toggle action-toggle share-icon" href="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container center-content__740px mb-4">
                        <h1>{{ $discussion->title }}</h1>
                        <div class="markdown ql-editor">
                            {!! json_decode($discussion->content)->html !!}
                        </div>
                        <div class="mb__20"></div>
                        <div class="display__inline">
                            @if(count($discussion->tags))
                            <span class="post-tags">
                                @foreach($discussion->tags as $tag)
                                <a href="{{ url('tag', ['tag' => $tag->tag]) }}" class="tag">{{ $tag->tag }}</a>
                                @endforeach
                            </span>
                            @endif
                            @if(config('blog.social_share.article_share'))
                            <span class="float-right">
                                <div class="social-share" data-title="{{ $discussion->title }}" data-description="{{ $discussion->title }}" {{ config('blog.social_share.sites') ? "data-sites=" . config('blog.social_share.sites') : '' }} {{ config('blog.social_share.mobile_sites') ? "data-mobile-sites=" . config('blog.social_share.mobile_sites') : '' }} initialized>
                                </div>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="float-right related__more">
                    <div class="latest box">
                        <div class="widget links" style="border: none;">
                            <header>
                                <h3 class="h6">Related</h3>
                            </header>
                            <ul class="list-unstyled">
                                <li>
                                    <a href="#">
                                        <span class="top-story-number in-circle">1</span>
                                        <p class="content-related">How to kill a process on a port on ubuntu</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="top-story-number in-circle">2</span>
                                        <p class="content-related">Errno 98 (Address already in use) Python Opencv</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="top-story-number in-circle">3</span>
                                        <p class="content-related">How to kill a process on a port on ubuntu</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="top-story-number in-circle">4</span>
                                        <p class="content-related">Errno 98 (Address already in use) Python Opencv</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="top-story-number in-circle">5</span>
                                        <p class="content-related">How to kill a process on a port on ubuntu</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="fixed-plugin">
                    <div class="dropdown show-dropdown open">
                        <a href="#" data-toggle="dropdown">
                            <i class="fa fa-cog fa-2x"> </i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header-title" style="min-height: 200px;"> Sidebar Filters</li>
                        </ul>
                    </div>
                </div>
            </main>
        </div>
    </div>
    @if(Auth::guest())
        <comment title="You must be logged to add a comment !" commentable-type="discussions" commentable-id="{{ $discussion->id }}" comment-number="{{ $discussion->comments_count }}" null-text=""></comment>
    @else
        <comment title="Bình luận" username="{{ Auth::user()->name }}" user-avatar="{{ Auth::user()->avatar }}" commentable-type="discussions" commentable-id="{{ $discussion->id }}" comment-number="{{ $discussion->comments_count }}" null-text="" can-comment></comment>
    @endif
@endsection

