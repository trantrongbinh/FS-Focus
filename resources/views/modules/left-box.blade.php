 <!-- Box Left-->
<aside class="col-lg-3 left-box">
    <!-- Widget [Search Bar Widget]-->
    <div class="widget search">
        <header>
            <h3 class="h6">Search the blog</h3>
        </header>
        <form method="get" action="{{ url('search') }}" class="search-form">
            <div class="form-group">
                <input type="search" placeholder="What are you looking for?"  class="form-control"  data-action="grow" autocomplete="off" name="q" required>
                <button type="submit" class="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- Widget [Latest Posts Widget]        -->
    <div class="widget latest-posts">
        <header>
            <h3 class="h6">Hot Posts</h3>
        </header>
        <div class="blog-posts">
            @foreach ($hot_post as $post)
                <a href="{{ url($post->slug) }}">
                    <div class="item d-flex align-items-center">
                        <div class="image"><img alt="{{ $post->slug }}" src="{{ $post->page_image }}" class="img-fluid"></div>
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
    <!-- Widget [Categories Widget]-->
    <div class="widget categories">
        <header>
            <h3 class="h6">Categories</h3>
        </header>
        @foreach ($categories as $category)
            <div class="item d-flex justify-content-between"><a href="{{ $category->path }}">{{ $category->name }}</a><span>12</span></div>
        @endforeach
    </div>
    <!-- Widget [Tags Cloud Widget]-->
    <div class="widget tags">
        <header>
            <h3 class="h6">Tags</h3>
        </header>
        <ul class="list-inline">
            @foreach ($tags as $tag)
                <li class="list-inline-item"><a href="#" class="tag">{{ $tag->tag }}</a></li>
            @endforeach
        </ul>
    </div>
</aside>