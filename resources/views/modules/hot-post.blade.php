<div class="blog-posts">
    @foreach ($hotPosts as $post)
        <a href="{{ url($post->slug) }}">
            <div class="item d-flex align-items-center">
                @if ($post->page_image)
                    <div class="image"><img alt="{{ $post->slug }}" src="{{ asset($post->page_image) }}" class="img-fluid"></div>
                @endif
                <div class="title">
                    <strong class="text-equidistant">{{ str_limit($post->title, '50') }}</strong>
                    <div class="d-flex align-items-center">
                        <div class="views"><i class="far fa-eye"></i></i> {{ $post->getViews() }}</div>
                        <div class="comments"><i class="far fa-comment-alt"></i> {{ $post->comments_count }}</div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>