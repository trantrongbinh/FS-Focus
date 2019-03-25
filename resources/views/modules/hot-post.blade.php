<div class="blog-posts">
    @foreach ($hotPosts as $post)
        <div class="item d-flex align-items-center">
            <a href="/user/{{ $post->user->name }}">
                <div class="image">
                    <img class="img-fluid img-circle img-md" alt="{{ $post->user->name }}" src="{{ asset($post->user->avatar) }}" class="img-fluid">
                    <p></p>
                </div>
            </a>
            <div class="title">
                <a class="title--post" href="{{ url($post->slug) }}">
                    <strong class="">{{ str_limit($post->title, config('blog.str_limit.title_post')) }}</strong>
                </a>
                <a href="/user/{{ $post->user->name }}" class="author">{{ $post->user->name }}</a>
                <div class="d-flex align-items-center">
                    <div class="views"><i class="far fa-eye"></i> {{ $post->getViews() }}</div>
                    <div class="comments"><i class="far fa-comment-alt"></i> {{ $post->comments_count }}</div>
                    <div class="time"><i class="far fa-clock"></i> {{ $post->published_at->diffForHumans() }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>
