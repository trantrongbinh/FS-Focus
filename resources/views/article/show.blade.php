@extends('layouts.app')

@section('title', $article->title)

@section('styles')
<style>
    body{
        background: #ffffff;
    }
</style>
@endsection

@section('content')
<div class="article container">
    <div class="row">
        <main class="post blog-post col-lg-10 offset-md-1">
            <div class="row">
                <div class="col-md-11">
                    <div class="container">
                        <div class="post-single">
                            <div class="text-center">
                                <div class="post-meta justify-content-between">
                                    @if($article->category_id)<h4 class="h5"><i class="fas fa-link text-blue"></i> <a href="#"> {{ $article->category->name }}</a></h4>@endif
                                </div>
                                <h1>{{ $article->title }}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                                <div class="post-footer d-flex align-items-center flex-column flex-sm-row" style="font-size: 12px;">
                                    <a href="/user/{{ $article->user->name }}" class="author d-flex align-items-center flex-wrap">
                                        <div class="avatar"><img src="{{ $article->user->avatar }}" alt="{{ $article->user->name }}" class="img-fluid"></div>
                                        <div class="title"><span><b>{{ $article->user->name or 'No Name' }}</b></span></div>
                                    </a>
                                    <div class="d-flex align-items-center flex-wrap">
                                        <div class="date"><b><i class="far fa-clock"></i> {{ $article->published_at->diffForHumans() }}</b></div>
                                        <div class="views"><b><i class="far fa-eye"></i> {{ $article->view_count }}</b></div>
                                        <div class="comments meta-last"><b><i class="far fa-comment-alt"></i> {{ $article->comments_count }}</b></div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            @if($article->page_image)
                                <div class="text-center"><img src="{{ $article->page_image }}" alt="{{ $article->slug }}" class="img-fluid"></div>
                            @endif
                            <div class="post-details">

                                <div class="post-body" style="font-size: 18px;">
                                    <h4>{{ $article->subtitle }}</h4>
                                    <p class="lead">{{ $article->meta_description }}</p>
                                    <parse content="{{ $article->content['raw'] }}"></parse>
                                </div>
                                <br>
                               {{--  @if($article->is_original) --}}
                                <div class="publishing alert alert-dismissible alert-info">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {!! config('blog.license') !!}
                                </div>
                               {{--  @endif --}}
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
                                <br>
                                <!-- comment -->
                                @if(Auth::guest())
                                    <comment title="Post Comments" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" null-text=""></comment>
                                @else
                                    <comment title="Bình luận" username="{{ Auth::user()->name }}" user-avatar="{{ Auth::user()->avatar }}" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" null-text="" can-comment></comment>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1">
                    <ul>
                        <li style="position: fixed; top: 300px;">
                            <button class="claps_button">
                                <svg class="svgIcon-use" width="33" height="33" viewBox="0 0 33 33"><path d="M28.86 17.342l-3.64-6.402c-.292-.433-.712-.729-1.163-.8a1.124 1.124 0 0 0-.889.213c-.63.488-.742 1.181-.33 2.061l1.222 2.587 1.4 2.46c2.234 4.085 1.511 8.007-2.145 11.663-.26.26-.526.49-.797.707 1.42-.084 2.881-.683 4.292-2.094 3.822-3.823 3.565-7.876 2.05-10.395zm-6.252 11.075c3.352-3.35 3.998-6.775 1.978-10.469l-3.378-5.945c-.292-.432-.712-.728-1.163-.8a1.122 1.122 0 0 0-.89.213c-.63.49-.742 1.182-.33 2.061l1.72 3.638a.502.502 0 0 1-.806.568l-8.91-8.91a1.335 1.335 0 0 0-1.887 1.886l5.292 5.292a.5.5 0 0 1-.707.707l-5.292-5.292-1.492-1.492c-.503-.503-1.382-.505-1.887 0a1.337 1.337 0 0 0 0 1.886l1.493 1.492 5.292 5.292a.499.499 0 0 1-.353.854.5.5 0 0 1-.354-.147L5.642 13.96a1.338 1.338 0 0 0-1.887 0 1.338 1.338 0 0 0 0 1.887l2.23 2.228 3.322 3.324a.499.499 0 0 1-.353.853.502.502 0 0 1-.354-.146l-3.323-3.324a1.333 1.333 0 0 0-1.886 0 1.325 1.325 0 0 0-.39.943c0 .356.138.691.39.943l6.396 6.397c3.528 3.53 8.86 5.313 12.821 1.353zM12.73 9.26l5.68 5.68-.49-1.037c-.518-1.107-.426-2.13.224-2.89l-3.303-3.304a1.337 1.337 0 0 0-1.886 0 1.326 1.326 0 0 0-.39.944c0 .217.067.42.165.607zm14.787 19.184c-1.599 1.6-3.417 2.392-5.353 2.392-.349 0-.7-.03-1.058-.082a7.922 7.922 0 0 1-3.667.887c-3.049 0-6.115-1.626-8.359-3.87l-6.396-6.397A2.315 2.315 0 0 1 2 19.724a2.327 2.327 0 0 1 1.923-2.296l-.875-.875a2.339 2.339 0 0 1 0-3.3 2.33 2.33 0 0 1 1.24-.647l-.139-.139c-.91-.91-.91-2.39 0-3.3.884-.884 2.421-.882 3.301 0l.138.14a2.335 2.335 0 0 1 3.948-1.24l.093.092c.091-.423.291-.828.62-1.157a2.336 2.336 0 0 1 3.3 0l3.384 3.386a2.167 2.167 0 0 1 1.271-.173c.534.086 1.03.354 1.441.765.11-.549.415-1.034.911-1.418a2.12 2.12 0 0 1 1.661-.41c.727.117 1.385.565 1.853 1.262l3.652 6.423c1.704 2.832 2.025 7.377-2.205 11.607zM13.217.484l-1.917.882 2.37 2.837-.454-3.719zm8.487.877l-1.928-.86-.44 3.697 2.368-2.837zM16.5 3.293L15.478-.005h2.044L16.5 3.293z" fill-rule="evenodd"></path></svg>
                            </button>
                            <button class="claps"></button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div  class="col-md-12">
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

        var claps_button = document.querySelector(".claps_button");
        var claps = document.querySelector(".claps");
        claps_button.addEventListener("click", clap);

        claps.innerText = "+" + (localStorage.getItem("claps") ? localStorage.getItem("claps") : 0);

        let count = Number(localStorage.getItem("claps")) ? Number(localStorage.getItem("claps")) : 0;

        function clap(e) {
             //console.log(e.detail);
            count = count + 1;
            localStorage.setItem("claps", count);
            claps.innerText = "+" + count;
            claps_button.classList.toggle("is_clicked");
            setTimeout(() => claps_button.classList.remove("is_clicked"), 1000);
        }

    </script>
@endsection
