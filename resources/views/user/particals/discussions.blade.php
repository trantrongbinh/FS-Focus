@forelse($discussions as $discussion)
    <!-- Post-->
    <div class="row d-flex post">
        <div class="text col-lg-12">
            <div class="text-inner d-flex align-items-center">
                <div class="content">
                    <header class="post-header">
                        <div class="category">
                            @if(count($discussion->tags))
                                @foreach($discussion->tags as $tag)
                                    <a href="{{ url('tag', ['tag' => $tag->tag]) }}"
                                       class="tag">#{{ $tag->tag }}</a>
                                @endforeach
                            @endif
                        </div>
                        <a href="{{ url('discussion', ['id' => $discussion->id]) }}"><h3 class="h4">{{ $discussion->title }}</h3></a>
                        @if($discussion->meta_description)<p>{{ $discussion->meta_description}}</p>@endif
                        <a href="javascript:;" class="float-right" data-toggle="dropdown"><i class="fas fa-ellipsis-h"></i></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item"
                               href="{{ url("discussion/{$discussion->id}/edit") }}">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </header>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrude consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                    <footer class="post-footer d-flex align-items-center">
                        <a href="#"class="author d-flex align-items-center flex-wrap">
                            <div class="avatar"><img src="{{ asset($discussion->user->avatar) ?? config('blog.default_avatar') }}" alt="Avatar" class="img-fluid"></div>
                            <div class="title"><span>{{ $discussion->user->name or 'null' }}</span></div>
                        </a>
                        <div class="date"><i class="far fa-clock"></i> {{ $discussion->created_at->diffForHumans() }}</div>
                        <div class="comments">
                            <a href="{{ url('discussion', ['id' => $discussion->id]) }}"><i class="far fa-comment-alt"> {{ $discussion->comments->count() }}</i> {{ lang('Replies') }} </a>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <hr>
@empty
    <h6 class="nothing">{{ lang('Nothing') }}</h6>
@endforelse

{{-- {{ $discussions->links('pagination.default') }} --}}

