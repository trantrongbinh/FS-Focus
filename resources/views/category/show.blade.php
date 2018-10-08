@extends('layouts.app')

@section('styles')
    <style>
        body {
            background: #ffffff;
        }

        .widget {
            border: none;
        }
    </style>
@endsection

@section('content')
    @component('particals.jumbotron')
        <h3>{{ $category->name }}</h3>

        <h6>{{ lang('Category Meta') }}</h6>
    @endcomponent

    <div class="container list">
        <div class="row">
            <main class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="post col-lg-8">
                        @forelse($articles as $article)
                            <div class="row d-flex align-items-stretch featured-posts">
                                <div class="text col-lg-8">
                                    <div class="text-inner d-flex align-items-center">
                                        <div class="content">
                                            <header class="post-header">
                                                <div class="category">
                                                    @foreach($article->tags as $tag)
                                                        <a href="{{ url('tag', ['tag' => $tag->tag]) }}">
                                                            <i class="fas fa-tag"></i>{{ $tag->tag }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                                <a href="{{ url($article->slug) }}">
                                                    <h3 class="h4">{{ $article->title }}</h3>
                                                </a>
                                            </header>
                                            <p><b>{{ $article->subtitle }} </b> {{ $article->meta_description }} <a
                                                        class="text-blue" href="{{ url($article->slug) }}">... more</a>
                                            </p>
                                            <footer class="post-footer d-flex align-items-center"
                                                    style="font-size: 0.8em;"><a href="#"
                                                                                 class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar img-sm"><img src="/img/avatar-1.jpg" alt="..."
                                                                                    class="img-fluid"></div>
                                                    <div class="title">
                                                        <span><b> {{ $article->user->name or 'null' }} </b></span></div>
                                                </a>
                                                <div class="date"><i
                                                            class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }}
                                                </div>
                                                <div class="comments"><i
                                                            class="fas fa-eye"></i> {{ $article->view_count }}</div>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                                <div class="image col-lg-4 text-right">
                                    @if($article->page_image)
                                        <a href="{{ url($article->slug) }}">
                                            <img alt="{{ $article->slug }}" src="{{ $article->page_image }}"
                                                 style="margin-right: 15px; margin-top: 10px;" class="img-fluid">
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="clear"></div>
                            <hr>
                        @empty
                            <h3 class="text-center">{{ lang('Nothing') }}</h3>
                        @endforelse
                    </div>
                    <!-- Box Left-->
                    <div class="col-lg-4">
                        <!-- Widget [Latest Posts Widget]        -->
                        <div class="widget latest-posts">
                            <header>
                                <h3 class="h6">Hot Posts</h3>
                            </header>
                            <div class="blog-posts">
                                @foreach ($hot_post as $post)
                                    <a href="{{ url($post->slug) }}">
                                        <div class="item d-flex align-items-center">
                                            <div class="image"><img alt="{{ $post->slug }}"
                                                                    src="{{ $post->page_image }}" class="img-fluid">
                                            </div>
                                            <div class="title"><strong>{{ $post->title }}</strong>
                                                <div class="d-flex align-items-center">
                                                    <div class="views"><i
                                                                class="far fa-eye"></i></i> {{ $post->view_count }}
                                                    </div>
                                                    <div class="comments"><i
                                                                class="far fa-comment-alt"></i> {{ $post->comments_count }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection