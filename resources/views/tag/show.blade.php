@extends('layouts.app')

@section('styles')
<style>
    .post-list__groups {
        padding: 0;
        margin: 0
    }

    .post-list__group {
        position: relative;
        padding-left: 45px;
        list-style: none
    }

    .post-list__group:last-child:before {
        content: "";
        position: absolute;
        z-index: 6;
        bottom: 0;
        left: 0;
        margin-left: 6.5px;
        width: 13px;
        height: 0;
        border-bottom: solid 2px #bfc1c3
    }

    .post-list__group:last-child .post-list__number:last-child:after {
        height: -webkit-calc(100% - 15px);
        height: calc(100% - 15px)
    }

    .post-list__number {
        position: relative
    }

    .post-list__number:after {
        content: "";
        position: absolute;
        z-index: 2;
        width: 0;
        height: 100%;
        border-left: solid 1px #bfc1c3;
        background: #fff;
        left: -45px;
        margin-left: 12px;
        top: 15px
    }

    .post-list__circle {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        position: absolute;
        z-index: 5;
        top: 15px;
        width: 26px;
        height: 26px;
        color: #0b0c0c;
        background: #fff;
        border-radius: 100px;
        text-align: center
    }

    .post-list__circle--number {
        font-family: "nta", Arial, sans-serif;
        font-weight: bold;
        text-transform: none;
        font-size: 14px;
        line-height: 23px;
        left: 0;
        border: solid 1px #bfc1c3
    }

    .post-list__header {
        padding: 15px 0;
        border-top: solid 1px #dee0e2
    }

    .post-list__title {
        font-family: "nta", Arial, sans-serif;
        font-weight: bold;
        text-transform: none;
        font-size: 14px;
        line-height: 1.4;
        margin: 0
    }

    .post-list-related {
        margin-bottom: 15px
    }

    .post-list-related__heading,
    .post-list-related__links {
        font-family: "nta", Arial, sans-serif;
        font-weight: 700;
        text-transform: none;
        font-size: 16px;
        line-height: 1.25;
        margin: 0;
        padding: 0
    }

    .visually-hidden,
    .visuallyhidden {
        position: absolute;
        left: -9999em;
        top: auto;
        width: 1px;
        height: 1px;
        overflow: hidden;
    }

    .related-container {
        padding: 30px 10px;
    }
</style>
@endsection
@section('content')

    @component('particals.jumbotron') 
        <h3>{{ $tag->tag }}</h3>
        <h6>{{ lang('Tag Meta') }}</h6>
    @endcomponent

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <main style="max-width: 1032px; width: 100%; margin: -45px auto; box-sizing: border-box; -webkit-box-pack: justify; justify-content: space-between;">
                    <div class="row">
                        <div class="post col-lg-8">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#menu1">{{ lang('For Articles') }} ( {{ $articles->count() }} )</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu2">{{ lang('For Discussions') }} ( {{ $discussions->count() }} )</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane container active" id="menu1">
                                    @forelse($articles as $article)
                                        <div class="row d-flex align-items-stretch featured-posts post-list">
                                            <div class="text {{ ($article->page_image)?'col-lg-8':'col-lg-12' }}">
                                                <div class="text-inner d-flex align-items-center">
                                                    <div class="content">
                                                        <header class="post-header">
                                                            <a class="topic" href="{{ url('category', ['name' => $article->category->name]) }}" style="font-weight: 700 !important;--x-height-multiplier: 0.342 !important;--baseline-multiplier: 0.22 !important;font-size: 15px!important;line-height: 20px!important;;-webkit-transform: translateY(1.8px);transform: translateY(1.8px);letter-spacing: .03em !important;color: rgba(0, 0, 0, 0.54);fill: rgba(0, 0, 0, 0.54);">{{ $article->category->name }}</a>
                                                            <br>
                                                            <a href="{{ url($article->slug) }}">
                                                                <h3 class="h4 ">{{ $article->title }}</h3>
                                                            </a>
                                                        </header>
                                                        @if(count($article->tags))
                                                        <div class="tag--v2">
                                                            <ul>
                                                                @foreach($article->tags as $tag)
                                                                <li><a href="{{ url('tag', ['tag' => $tag->tag]) }}">{{ $tag->tag }}</a><span>20</span></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        @endif
                                                        <p class="">{{ str_limit($article->meta_description, '200') }}</p>
                                                        <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                                            <a href="/user/{{ $article->user->name }}" class="author d-flex align-items-center flex-wrap">
                                                                <div class="avatar img-sm">
                                                                    <img src="{{ $article->user->avatar }}" alt="..." class="img-fluid">
                                                                </div>
                                                                <div class="title">
                                                                    <span>
                                                                        <b> {{ $article->user->name or 'null' }} </b>
                                                                    </span>
                                                                </div>
                                                            </a>&nbsp&nbsp&nbsp
                                                            <div class="date">
                                                                <i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }}
                                                            </div>
                                                            <span class="dot">&middot;</span>
                                                            <span class="readingTime">5 min read</span>
                                                        </footer>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($article->page_image)
                                            <div class="image col-lg-4 text-right">
                                                <a href="{{ url($article->slug) }}" style="height: 200px; width: 100%; background-image: url('{{ $article->page_image }}'); background-position: 50% 50% !important; background-position: center!important; background-origin: border-box!important; background-size: cover!important;"></a>
                                            </div>
                                            @endif
                                        </div>
                                    @empty
                                        <h4 class="text-center h5 nothing">{{ lang('Nothing') }}</h4>
                                    @endforelse
                                </div>
                                <div class="tab-pane container fade" id="menu2">
                                    @forelse($discussions as $discussion)
                                        <div class="row d-flex align-items-stretch featured-posts post-list">
                                            <div class="text col-lg-12">
                                                <div class="text-inner d-flex align-items-center">
                                                    <div class="content">
                                                        <header class="post-header">
                                                            <a href="{{ url('discussion', ['id' => $discussion->id]) }}">
                                                                <h3 class="h4 ">{{ $discussion->title }}</h3>
                                                            </a>
                                                        </header>
                                                        @if(count($discussion->tags))
                                                            <div class="tag--v2">
                                                                <ul>
                                                                    @foreach($discussion->tags as $tag)
                                                                    <li><a href="{{ url('tag', ['tag' => $tag->tag]) }}">{{ $tag->tag }}</a><span>20</span></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                        
                                                        <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                                            <a href="/user/{{ $discussion->user->name }}" class="author d-flex align-items-center flex-wrap">
                                                                <div class="avatar img-sm">
                                                                    <img src="{{ $discussion->user->avatar }}" alt="..." class="img-fluid">
                                                                </div>
                                                                <div class="title">
                                                                    <span>
                                                                        <b> {{ $discussion->user->name or 'null' }} </b>
                                                                    </span>
                                                                </div>
                                                            </a>&nbsp&nbsp&nbsp
                                                            <div class="date">
                                                                <i class="far fa-clock"></i> {{ $discussion->created_at->diffForHumans() }}
                                                            </div>
                                                            <span class="dot">&middot;</span>
                                                            <span class="readingTime">5 min read</span>
                                                        </footer>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <h4 class="text-center h5 nothing">{{ lang('Nothing') }}</h4>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <!-- Box Left-->
                        <div class="col-lg-4 display-flex">
                            <div id="right" class="is-topPosition">
                                <div class="right">
                                    <div class="related-container">
                                        <nav>
                                            <div class="post-list-related">
                                                <h2 class="post-list-related__heading">
                                                    <span class="post-list-related__pretitle">Popular in</span>
                                                    <a href="/learn-to-drive-a-car" class="post-list-related__link">
                                                        {{ $tag->tag }}
                                                    </a>
                                                </h2>
                                            </div>
                                            <ol class="post-list__groups">
                                                <li class="post-list__group ">
                                                    <span class="post-list__circle post-list__circle--number">
                                                        <span class="post-list__circle-inner">
                                                            <span class="post-list__circle-background">
                                                                <span class="visuallyhidden">Number</span> 1
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <div class="post-list__number">
                                                        <div class="post-list__header">
                                                            <h3 class="post-list__title"><a href="#">Tự động deploy Laravel project lên server với Laravel Envoy Github Webhooks - phần 1</a></h3>
                                                            <span class="readingTime" style="color: rgba(0, 0, 0, 0.54); font-size: 13px; line-height: 20px; font-weight: 400;"> 9 min read</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="post-list__group ">
                                                    <span class="post-list__circle post-list__circle--number">
                                                        <span class="post-list__circle-inner">
                                                            <span class="post-list__circle-background">
                                                                <span class="visuallyhidden">Number</span> 2
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <div class="post-list__number">
                                                        <div class="post-list__header">
                                                            <h3 class="post-list__title"><a href="#">Tìm hiểu sails js</a></h3>
                                                            <span class="readingTime" style="color: rgba(0, 0, 0, 0.54); font-size: 13px; line-height: 20px; font-weight: 400;"> 5 min read</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="post-list__group ">
                                                    <span class="post-list__circle post-list__circle--number">
                                                        <span class="post-list__circle-inner">
                                                            <span class="post-list__circle-background">
                                                                <span class="visuallyhidden">Number</span> 3
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <div class="post-list__number">
                                                        <div class="post-list__header">
                                                            <h3 class="post-list__title"><a href="#">Tại sao Laravel là framework tốt nhất 2018?</a></h3>
                                                            <span class="readingTime" style="color: rgba(0, 0, 0, 0.54); font-size: 13px; line-height: 20px; font-weight: 400;"> 89 min read</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="post-list__group ">
                                                    <span class="post-list__circle post-list__circle--number">
                                                        <span class="post-list__circle-inner">
                                                            <span class="post-list__circle-background">
                                                                <span class="visuallyhidden">Number</span> 4
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <div class="post-list__number">
                                                        <div class="post-list__header">
                                                            <h3 class="post-list__title"><a href="#">Web Component - Write own Elements ? Why not ?</a></h3>
                                                            <span class="readingTime" style="color: rgba(0, 0, 0, 0.54); font-size: 13px; line-height: 20px; font-weight: 400;"> 9 min read</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="post-list__group ">
                                                    <span class="post-list__circle post-list__circle--number">
                                                        <span class="post-list__circle-inner">
                                                            <span class="post-list__circle-background">
                                                                <span class="visuallyhidden">Number</span> 5
                                                            </span>
                                                        </span>
                                                    </span>
                                                    <div class="post-list__number">
                                                        <div class="post-list__header">
                                                            <h3 class="post-list__title"><a href="#">Giảm tần suất gọi hàm với Throttle và Debounce trong Javascript</a></h3>
                                                            <span class="readingTime" style="color: rgba(0, 0, 0, 0.54); font-size: 13px; line-height: 20px; font-weight: 400;"> 6 min read</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                    <div class="related-container">
                                        <nav>
                                            <div class="post-list-related">
                                                <h2 class="post-list-related__heading">
                                                    <span class="post-list-related__pretitle">Tag noi bat</span>
                                                </h2>
                                            </div>
                                            <div class="tag--v0">
                                                <ul>
                                                    <li><a href="#">Tinh Yeu</a></li> 
                                                    <li><a href="#">Khoa Hoc Cong Nghe</a></li> 
                                                    <li><a href="#">Giao Duc</a></li> 
                                                    <li><a href="#">Lap Trinh</a></li> 
                                                    <li><a href="#">Giai Tri</a></li> 
                                                    <li><a href="#">Van Hoa</a></li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <div class="pb__100"></div>
    <div class="pb__150"></div>
@endsection
