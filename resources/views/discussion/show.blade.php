@extends('layouts.app')

@section('title', $discussion->title)

@section('content')
    <div class="discuss-show container">
        <main class="row">
            <div class="post blog-post col-lg-9">
                <div class="post-single">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="post-tags">
                            @if(count($discussion->tags))
                                @foreach($discussion->tags as $tag)
                                    <a href="{{ url('tag', ['tag' => $tag->tag]) }}" class="tag">#{{ $tag->tag }}</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <h2 class="h3">{{ $discussion->title }}<a href="javascript:;"><i class="fa fa-bookmark-o"></i></a></h2>
                    <div class="post-footer d-flex align-items-center flex-column flex-sm-row">
                        <a href="#" class="author d-flex align-items-center flex-wrap">
                            <div class="avatar"><img src="{{ $discussion->user->avatar }}" alt="{{ $discussion->user->name }}" class="img-fluid"></div>
                            <div class="title"><span>{{ $discussion->user->name or 'No Name' }}</span></div>
                        </a>
                        <div class="d-flex align-items-center flex-wrap">
                            <div class="date"><i class="far fa-clock"></i> {{ lang('Published At') }} : {{ $discussion->created_at }}&nbsp;&nbsp;&nbsp;&nbsp;</div>
                            <div class="views"><i class="far fa-eye"></i> 500</div>
                            <div class="comments meta-last"><i class="far fa-comment-alt"></i>{{ lang('Replies Num') }} : {{ $discussion->comments->count() }}</div>
                            @if(Auth::check() && Auth::user()->id == $discussion->user->id)
                                <a href="{{ url("discussion/{$discussion->id}/edit") }}" class="edit-discuss btn btn-outline-info btn-sm float-right" style="margin-left: 20px;"> <i class="fas fa-pencil-alt" style="padding: 0; margin-left: 20px;"></i> {{ lang('Edit Problem') }}</a>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="post-details">
                        <div class="post-body">
                            <parse content="{{ json_decode($discussion->content)->raw }}"></parse>
                        </div>
                        <br>
                        @if(config('blog.social_share.discussion_share'))
                            <div class="footing float-right" style="margin-top: -40px;">
                                <div class="social-share" data-title="{{ $discussion->title }}" data-description="{{ $discussion->title }}" {{ config('blog.social_share.sites') ? "data-sites=" . config('blog.social_share.sites') : '' }} {{ config('blog.social_share.mobile_sites') ? "data-mobile-sites=" . config('blog.social_share.mobile_sites') : '' }} initialized></div>
                            </div>
                        @endif
                    </div>
                </div>
                 <!-- comment -->
                @if(Auth::guest())
                    <comment commentable-type="discussions"
                             commentable-id="{{ $discussion->id }}"
                             null-text="" comment-number="{{ $discussion->comments_count }}"></comment>
                @else
                    <comment username="{{ Auth::user()->name }}"
                             user-avatar="{{ Auth::user()->avatar }}"
                             commentable-type="discussions"
                             commentable-id="{{ $discussion->id }}"
                             null-text="" comment-number="{{ $discussion->comments_count }}"
                             can-comment></comment>
                @endif
            </div>
            <!-- Box Left-->
            <div class="col-lg-3" style="margin-top: 50px;">
                <div class="widget latest-posts" style="border: none; background: none;">
                    <header>
                        <h3 class="h6">Related Questions</h3><hr>
                    </header>
                    <div class="blog-posts">
                        @foreach ($hot_post as $post)
                            <a href="{{ url($post->slug) }}">
                                <div class="item d-flex align-items-center">
                                    <div class="title"><strong>{{ $post->title }}</strong>
                                        <div class="d-flex align-items-center">
                                            <div class="views"><i class="far fa-eye"></i></i> {{ $post->view_count }}</div>
                                            <div class="comments"><i class="far fa-comment-alt"></i> 12</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection

@section('scripts')
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@endsection