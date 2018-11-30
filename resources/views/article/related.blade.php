<div class="row">
    @forelse($related as $article)
        <div class="post col-md-4">
            @if ($article->page_image)
                <div class="post-thumbnail min-height-240"><a href="{{ url($article->slug) }}"><img src="{{ $article->page_image }}" alt="..." class="img-fluid"></a></div>
            @endif
            <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                    <div class="date meta-last"><strong>{{ $article->published_at->toFormattedDateString() }}</strong></div>
                </div>
                <a href="{{ url($article->slug) }}">
                    <h3 class="h4">{{ str_limit($article->title, '45') }}</h3>
                </a>
                <p class="text-muted">
                    <parse content="{{ str_limit($article->content['raw'], '150') }}"></parse>
                </p>
                <footer class="post-footer d-flex align-items-center">
                    <a href="/user/{{ $article->user->name }}" class="author d-flex align-items-center flex-wrap">
                        <div class="avatar"><img src="{{ $article->user->avatar }}" alt="tran trong binh" class="img-fluid"></div>
                        <div class="title"><span>{{ $article->user->name or 'No Name' }}</span></div>
                    </a>
                    <div class="comments"><i class="far fa-comment-alt"></i> {{ $article->comments->count() }}
                    </div>
                    <div class="comments meta-last"><i class="far fa-eye"></i>{{ $article->getViews() }}
                    </div>
                </footer>
            </div>
        </div>
    @empty
    @endforelse
</div>
