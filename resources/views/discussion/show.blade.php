@extends('layouts.app')

@section('title', $discussion->title)

@section('content')
    <div class="discuss-show container" style="padding: 30px;">
        <div class="row">
            <main class="post blog-post col-lg-12">
                <div class="row">
                    <div class="col-lg-2 link-right fixed-link">
                        <div class="links">
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-github"></i></a></li>
                                <li><a href="#"><i class="fab fa-stack-overflow"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="post blog-post col-lg-7">
                        <div class="post-single">
                            <h1 class="h2 text-equidistant">{{ $discussion->title }}<a href="javascript:;"><i class="fa fa-bookmark-o"></i></a>
                            </h1>
                            <div class="post-footer d-flex align-items-center flex-column flex-sm-row font-size-12">
                                <a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar">
                                        <img src="{{ asset($discussion->user->avatar) }}" alt="{{ $discussion->user->name }}" class="img-fluid">
                                    </div>
                                    <div class="title"><span><b>{{ $discussion->user->name or 'No Name' }}</b></span></div>
                                </a>
                                <div class="d-flex align-items-center flex-wrap">
                                    <div class="date"><i class="far fa-clock"></i>
                                        <b>
                                        {{ lang('Published At') }}: {{ $discussion->created_at }}</b>&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="comments meta-last"><b>
                                        <i class="far fa-comment-alt"></i>{{ lang('Replies Num') }}: {{ $discussion->comments->count() }}</b></div>
                                    @if(Auth::check() && Auth::user()->id == $discussion->user->id)
                                        <a href="{{ url("discussion/{$discussion->id}/edit") }}" class="edit-discuss btn btn-info btn-sm float-right" style="margin-left: 20px;"> 
                                            <i class="fas fa-pencil-alt" style="padding: 0; margin-left: 20px;"></i> {{ lang('Edit Problem') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div class="post-details">
                                <div class="post-body font-size-18 text-equidistant">
                                    {{-- <p class="lead">{{ $discussion->meta_description }}</p> --}}
                                    <div class="markdown">{!! json_decode($discussion->content)->html !!}</div>
                                </div>
                                <div class="display-inline">
                                    @if(count($discussion->tags))
                                        <span class="post-tags">
                                            @foreach($discussion->tags as $tag)
                                                <a href="{{ url('tag', ['tag' => $tag->tag]) }}" class="tag">#{{ $tag->tag }}</a>
                                            @endforeach
                                        </span>
                                    @endif

                                    @if(config('blog.social_share.discussion_share'))
                                        <span class="footing float-right">
                                            <div class="social-share" data-title="{{ $discussion->title }}" data-description="{{ $discussion->title }}" {{ config('blog.social_share.sites') ? "data-sites=" . config('blog.social_share.sites') : '' }} {{ config('blog.social_share.mobile_sites') ? "data-mobile-sites=" . config('blog.social_share.mobile_sites') : '' }} initialized></div>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <!-- comment -->
                        @if(Auth::guest())
                            <a href="{{ url('login') }}" class="text-center" style="padding-bottom: 20px;">@lang('You must be logged to add a comment !')</a>
                            <comment title="Post Comments" commentable-type="discussions" commentable-id="{{ $discussion->id }}" null-text="" comment-number="{{ $discussion->comments_count }}"></comment>
                        @else
                            <comment title="Bình luận" username="{{ Auth::user()->name }}" user-avatar="{{ Auth::user()->avatar }}" commentable-type="discussions" commentable-id="{{ $discussion->id }}" null-text="" comment-number="{{ $discussion->comments_count }}" can-comment></comment>
                        @endif
                    </div>
                    <!-- Box Left-->
                    <div class="col-lg-3 latest">
                        <div class="widget links" style="border: none;">
                            <header>
                                <h3 class="h6">Related</h3>
                            </header>
                            <ul class="list-unstyled">
                                @forelse($related as $discussion)
                                <li>
                                    <a href="/discussion/{{ $discussion->id }}">
                                        <i class="fab fa-facebook-square"></i>
                                        {{ $discussion->title }}
                                    </a>
                                </li>
                                @empty
                                <h5 class="text-center">{{ lang('Nothing') }}</h5>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

