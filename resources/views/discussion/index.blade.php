@extends('layouts.app')

@section('content')
    <div class="discussion container">
        <div class="row">
            
            @include('modules.left-box')

            <main class="posts-listing col-md-7" style="margin-top: 5px;">
                <div class="" style="display: inline-block;">
                        
                <div class="card-body">
                    <div class=" row  card">
                        <div class="card-body">
                            @if (Auth::guest())
                                <a rel="nofollow " href="{{ url('login') }}" class=" d-flex">
                                    <div class="news-f-img"> <img src="/images/default.png" alt="User Image" class="img-fluid img-circle"  width="60"></div>
                                    <div class="msg-body" style="margin-left: 30px; ">
                                        <h3 class="h5 msg-nav-h3">What is your question?</h3>
                                        <small>{{ lang('Discuss Subtitle') }}</small>
                                    </div>
                                </a>
                            @else
                                <a rel="nofollow " href="javascript:;" class=" d-flex" data-toggle="modal" data-target="#questionModal">
                                    <div class="news-f-img"> <img src="{{ Auth::user()->avatar }}" alt="User Image" class="img-fluid img-circle" data-toggle="tooltip" title="{{ Auth::user()->nickname ?: Auth::user()->name }}" width="60"></div>
                                    <div class="msg-body" style="margin-left: 30px; ">
                                        <h3 class="h5 msg-nav-h3">What is your question?</h3>
                                        <small>{{ lang('Discuss Subtitle') }}</small>
                                    </div>
                                </a>
                                <div class="modal fade" id="questionModal">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card card-info card-outline">
                                                        <div class="card-header">
                                                            <h3 class="card-title">
                                                                <i class="fa fa-paper-plane"></i>
                                                                <small>Thank for send your question !!!</small>
                                                             </h3>
                                                            <!-- tools box -->
                                                            <div class="card-tools">
                                                                <a class="float-right btn-tool close" href="javascript:;" data-dismiss="modal">&times;</a>
                                                            </div>
                                                            <!-- /. tools -->
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <form class="form" action="{{ url('discussion') }}" method="POST">
                                                            {{ csrf_field() }}
                                                            <div class="card-body">
                                                                <div class="form-group row">
                                                                    <label for="title" class="col-sm-2 col-form-label">{{ lang('Discuss Title') }}</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" id="title" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}">

                                                                        @if ($errors->has('title'))
                                                                            <span class="invalid-feedback">
                                                                                <strong>{{ $errors->first('title') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">{{ lang('Discuss Tag') }}</label>
                                                                    <div class="col-sm-10">
                                                                        <select class="form-control tags select{{ $errors->has('tags') ? ' is-invalid' : '' }}" multiple="multiple" name="tags[]" style="width: 100%">
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
                                                                    <label for="content" class="col-sm-2 col-form-label">{{ lang('Discuss Content') }}</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" rows="7" name="content">{{ old('content') }}</textarea>

                                                                        @if ($errors->has('content'))
                                                                            <span class="invalid-feedback">
                                                                                <strong>{{ $errors->first('content') }}</strong>
                                                                            </span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="content" class="col-sm-2 col-form-label"><i class="fas fa-user"></i></label>
                                                                    <div class="col-sm-10">
                                                                        <p class="text-sm mb-0"><span class="fa fa-hand-o-right"></span><b> How to quickly get a good answer:</b>
                                                                        <i>Keep your question short and to the point. Check for grammar or spelling errors. Phrase it like a question</i></p>
                                                                    </div>
                                                                </div>                                                    
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-outline-primary btn-sm" onClick="this.form.submit(); this.disabled=true;">{{ lang('Create Discussion') }}</button>
                                                                <button type="button" class="btn btn-outline-danger btn-sm" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                                <!-- /.col-->
                                            </div>
                                            <!-- ./row -->
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="clear"></div>

                    @if ($errors->has('title') || $errors->has('tags') || $errors->has('content'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Error!</strong> Check data again.
                        </div>
                    @endif

                    @forelse($discussions as $discussion)
                    <!-- Post-->
                    <div class="row d-flex post card">
                        <div class="text col-lg-12 card-body">
                            <div class="text-inner d-flex align-items-center">
                                <div class="content">
                                    <header class="post-header">
                                        @if(Auth::check() && Auth::user()->id == $discussion->user->id)
                                            <a href="javascript:;" class="float-right" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ url("discussion/{$discussion->id}/edit") }}">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        @else
                                            <a href="javascript:;" class="float-right">&times;</a>
                                        @endif
                                        <div class="category">
                                            @if(count($discussion->tags))
                                                @foreach($discussion->tags as $tag)
                                                    <a href="{{ url('tag', ['tag' => $tag->tag]) }}" class="tag">#{{ $tag->tag }}</a>
                                                @endforeach
                                            @endif
                                        </div>
                                        <a href="{{ url('discussion', ['id' => $discussion->id]) }}"><h3 class="h4">{{ $discussion->title }}</h3></a>
                                    </header>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                    <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                        <div class="avatar"><img src="{{ $discussion->user->avatar ?? config('blog.default_avatar') }}" alt="Avatar" class="img-fluid"></div>
                                        <div class="title"><span> {{ $discussion->user->name or 'null' }} </span></div></a>
                                        <div class="date"><i class="far fa-clock"></i> {{ $discussion->created_at->diffForHumans() }}</div>
                                        <div class="comments"><a href="{{ url('discussion', ['id' => $discussion->id]) }}"><i class="far fa-comment-alt"> {{ $discussion->comments->count() }}</i> {{ lang('Replies') }}</a></div>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <h3 class="text-center">{{ lang('Nothing') }}</h3>
                    @endforelse

                    {{ $discussions->links('pagination.default') }}
                </div>
            </main>

            @include('modules.right-box')

        </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    $('.select').select2();
</script>
@endsection

