@extends('layouts.app')

@section('content')
    @component('particals.jumbotron')
        <h3>{{ $category->name }}</h3>

        <h6>{{ lang('Category Meta') }}</h6>
    @endcomponent

    <div class="container">
        <div class="row">
            <main class="col-md-11" style="margin: 0 auto;">
                <div class="row">
                    <div class="post col-lg-8">
                        @forelse($articles as $article)
                            <div class="row d-flex align-items-stretch featured-posts post-ttb">
                                <div class="text {{ ($article->page_image)?'col-lg-8':'col-lg-12' }}">
                                    <div class="text-inner d-flex align-items-center">
                                        <div class="content">
                                            <header class="post-header">
                                                <a href="{{ url($article->slug) }}">
                                                    <h3 class="h4">{{ $article->title }}</h3>
                                                </a>
                                            </header>
                                            @if(count($article->tags))
                                                <div class="category">
                                                    @foreach($article->tags as $tag)
                                                        <a class="text-blue" href="{{ url('tag', ['tag' => $tag->tag]) }}">
                                                            #{{ $tag->tag }} &nbsp
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endif
                                            <p>{{ str_limit($article->meta_description, '200') }}</p>
                                            <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar img-sm">
                                                        <img src="{{ asset('/img/avatar-1.jpg') }}" alt="..." class="img-fluid">
                                                    </div>
                                                    <div class="title">
                                                        <span>
                                                            <b> {{ $article->user->name or 'null' }} </b>
                                                        </span>
                                                    </div>
                                                </a>
                                                <div class="date"><i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }}
                                                </div>
                                                <div class="comments meta-last"><i class="fas fa-eye"></i> {{ $article->getViews() }}</div>
                                            </footer>
                                        </div>
                                    </div>
                                </div>
                                @if($article->page_image)
                                    <div class="image col-lg-4 text-right">
                                        <a href="{{ url($article->slug) }}">
                                            <img alt="{{ $article->slug }}" src="{{ asset($article->page_image) }}" style="margin-right: 15px; margin-top: 10px;" class="img-fluid">
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <h3 class="text-center">{{ lang('Nothing') }}</h3>
                        @endforelse
                    </div>
                    <!-- Box Left-->
                    <div class="col-lg-4 display-flex">
                        <div id="right" class="is-topPosition">
                            <div  class="right">
                                <!-- Widget [Latest Posts Widget] -->
                                <div class="widget latest-posts border-0">
                                    <header class="text-header">
                                        <h3 class="h6">Hot Posts</h3>
                                    </header>
                                    @include('modules.hot-post')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
