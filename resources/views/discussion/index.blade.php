@extends('layouts.app')

@section('content')
    <div id="background-body">
        <div class="container">
            <div class="row">

                @include('modules.left')

                <main class="posts-listing col-lg-7 border-frame">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    @if (Auth::guest())
                                        <a rel="nofollow " href="{{ url('login') }}" class=" d-flex">
                                            <div class="news-f-img">
                                                <img src="{{ asset('/images/default.png') }}" alt="User Image" class="img-fluid img-circle" width="60">
                                            </div>
                                            <div class="msg-body">
                                                <h3 class="h5 msg-nav-h3">What is your question?</h3>
                                                <p>{{ lang('Discuss Subtitle') }}</p>
                                            </div>
                                        </a>
                                    @else
                                        <a rel="nofollow " href="javascript:;" class="d-flex button-show">
                                            <div class="news-f-img">
                                                <img src="{{ Auth::user()->avatar }}" alt="User Image" class="img-fluid img-circle" data-toggle="tooltip" title="{{ Auth::user()->nickname ?: Auth::user()->name }}" width="60"></div>
                                            <div class="msg-body">
                                                <h3 class="h5 msg-nav-h3">What is your question?</h3>
                                                <p>{{ lang('Discuss Subtitle') }}</p>
                                            </div>
                                        </a>
                                        <div class="row create-post">
                                            <div class="col-md-12 optional {{ $errors->isEmpty() ? 'hide' : ''}}">
                                                <div class="clear"></div>
                                                <strong>Bố cục chuẩn: </strong>
                                                <form class="form" action="{{ url('discussion') }}" method="POST">
                                                    {{ csrf_field() }}
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 q-item">
                                                            <span class="text-red">*</span>
                                                            <textarea class="textarea form-control{{ $errors->has('title') ? ' is-invalid' : '' }} box__input textarea--autoHeight" rows="1" id="title" name="title" placeholder="Title your post">{{ old('title') }}</textarea>
                                                            @if ($errors->has('title'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{ $errors->first('title') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 q-item">
                                                            <span class="text-red">*</span>
                                                            <select class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }} select2" multiple="multiple" data-placeholder=" Tag your post" style="width: 100%;" name="tags[]">
                                                                @foreach($tags as $tag)
                                                                    <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('tags'))
                                                                <span class="invalid-feedback d-block">
                                                                    <strong>{{ $errors->first('tags') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12">
                                                            <textarea class="textarea form-control box__input textarea--autoHeight" rows="1" id="meta_description" name="meta_description"  placeholder="Description cô đọng giúp bài viết hay hơn (không bắt buộc)"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-12 q-item">
                                                            <span class="text-red">*</span>
                                                            <textarea class="box__input textarea--autoHeight form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" rows="2" name="content" placeholder="Write Conten here ....">{{ old('content') }}</textarea>
                                                            @if ($errors->has('content'))
                                                                <span class="invalid-feedback">
                                                                    <strong>{{ $errors->first('content') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-info btn-sm"><b>Publish</b></button>
                                                    <button type="button" class="btn btn-danger btn-sm button-hide">Close</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="clear"></div>
                            @forelse($discussions as $discussion)
                                <!-- Post -->
                                <div class="post card">
                                    <div class="card-body">
                                        <div class="user-block">
                                            <div class="post-footer d-flex align-items-center">
                                                <a href="/user/{{ $discussion->user->name }}" class="author d-flex align-items-center flex-wrap">
                                                    <div class="avatar"><img src="{{ asset($discussion->user->avatar) }}" alt="{{ $discussion->user->name }}" class="img-fluid"></div>
                                                    <div class="title"><span><b>{{ $discussion->user->name }}</b></span></div>
                                                </a>
                                                <div class="date"><b><i class="far fa-clock"></i> {{ $discussion->created_at->diffForHumans() }}</b></div>
                                                <div class="comments meta-last">
                                                    <a href="{{ url('discussion', ['id' => $discussion->id]) }}"><i class="far fa-comment-alt"> {{ $discussion->comments_count }}</i> {{ lang('Replies') }}
                                                    </a>
                                                </div>
                                            </div>
                                            @if(Auth::check() && Auth::user()->id == $discussion->user->id)
                                                <a href="javascript:;" class="float-right  btn-tool" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ url("discussion/{$discussion->id}/edit") }}">Edit</a>
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                </div>
                                            @else
                                                <a href="javascript:;" class="float-right btn-tool">&times;</a>
                                            @endif
                                        </div>
                                         <header class="post-header">
                                            <a href="{{ url('discussion', ['id' => $discussion->id]) }}"><h3 class="h4">{{ $discussion->title }}</h3></a>
                                            @if($discussion->meta_description)
                                                <p class="lead">{{ $discussion->meta_description}}</p>
                                            @endif
                                            @if(count($discussion->tags))
                                                <div class="post-tags">
                                                    @foreach($discussion->tags as $tag)
                                                        <a href="{{ url('tag', ['tag' => $tag->tag]) }}" class="tag">#{{ $tag->tag }}</a>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </header>
                                    </div>
                                    <!-- comment -->
                                    @if(Auth::guest())
                                        <a href="{{ url('login') }}" class="text-center" style="padding-bottom: 20px;">@lang('You must be logged to add a comment !')</a>
                                        <comment-home title="Post Comments" commentable-type="discussions" commentable-id="{{ $discussion->id }}" comment-number="{{ $discussion->comments_count }}" null-text=""></comment-home>
                                    @else
                                        <comment-home title="Bình luận" username="{{ Auth::user()->name }}" user-avatar="{{ Auth::user()->avatar }}" commentable-type="discussions" commentable-id="{{ $discussion->id }}" comment-number="{{ $discussion->comments_count }}" null-text="" can-comment></comment-home>
                                    @endif
                                </div>
                                <!-- /.post -->
                            @empty
                                <h3 class="text-center">{{ lang('Nothing') }}</h3>
                            @endforelse
                            {{ $discussions->links('pagination.default') }}
                        </div>
                    </div>
                </main>

                @include('modules.right')

            </div>
        </div>
    </div>
@endsection
