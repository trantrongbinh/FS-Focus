@extends('layouts.app')

@section('title', $discussion->title)

@section('content')
    <div class="discuss-show container" style="padding: 30px;">
        <div class="row">
            <main class="post blog-post col-lg-10 offset-md-1">
                <div class="row">
                    <div class="post blog-post col-lg-8">
                        <div class="post-single">
                            <h1 class="h2">{{ $discussion->title }}<a href="javascript:;"><i class="fa fa-bookmark-o"></i></a></h1>
                            <div class="post-footer d-flex align-items-center flex-column flex-sm-row" style="font-size: 12px;">
                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="{{ $discussion->user->avatar }}" alt="{{ $discussion->user->name }}" class="img-fluid"></div>
                                    <div class="title"><span><b>{{ $discussion->user->name or 'No Name' }}</b></span></div>
                                </a>
                                <div class="d-flex align-items-center flex-wrap">
                                    <div class="date"><i class="far fa-clock"><b></i> {{ lang('Published At') }} : {{ $discussion->created_at }}</b>&nbsp;&nbsp;&nbsp;&nbsp;</div>
                                    <div class="comments meta-last"><b><i class="far fa-comment-alt"></i>{{ lang('Replies Num') }} : {{ $discussion->comments->count() }}</b></div>
                                    @if(Auth::check() && Auth::user()->id == $discussion->user->id)
                                        <a href="{{ url("discussion/{$discussion->id}/edit") }}" class="edit-discuss btn btn-info btn-sm float-right" style="margin-left: 20px;"> <i class="fas fa-pencil-alt" style="padding: 0; margin-left: 20px;"></i> {{ lang('Edit Problem') }}</a>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="post-details">
                                <div class="discuss-body">
                                    <parse content="{{ json_decode($discussion->content)->raw }}"></parse>
                                </div>
                                <div class="post-tags">
                                    @if(count($discussion->tags))
                                        @foreach($discussion->tags as $tag)
                                            <a href="{{ url('tag', ['tag' => $tag->tag]) }}" class="tag">#{{ $tag->tag }}</a>
                                        @endforeach
                                    @endif
                                </div>
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
                                null-text="" comment-number="{{ $discussion->comments_count }}">
                            </comment>
                        @else
                            <comment username="{{ Auth::user()->name }}"
                                user-avatar="{{ Auth::user()->avatar }}"
                                commentable-type="discussions"
                                commentable-id="{{ $discussion->id }}"
                                null-text="" comment-number="{{ $discussion->comments_count }}"
                                can-comment>
                            </comment>
                        @endif
                    </div>
                    <!-- Box Left-->
                    <div class="col-lg-4">
                        <div class="widget latest-posts" style="border: none; background: none;">
                            <header>
                                <h3 class="h5">Related Questions</h3><hr>
                            </header>
                            <div class="blog-posts">
                                @foreach ($hot_post as $post)
                                    <a href="{{ url($post->slug) }}">
                                        <div class="item d-flex align-items-center">
                                            <h6><strong>{{ $post->title }}</strong></h6>
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

@section('scripts')
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@endsection