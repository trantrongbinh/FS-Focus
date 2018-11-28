<!-- Box Left-->
<aside class="col-lg-3 left-box">
    <!-- Widget [Search Bar Widget]-->
    <div class="widget search">
        <header>
            <h3 class="h6">Search the blog</h3>
        </header>
        <form method="get" action="{{ url('search') }}" class="search-form">
            <div class="form-group">
                <input type="search" placeholder="What are you looking for?" class="form-control" data-action="grow" autocomplete="off" name="q" required>
                <button type="submit" class="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- Widget [Latest Posts Widget]-->
    <div class="widget latest-posts">
        <header>
            <h3 class="h6">Hot Posts</h3>
        </header>
        
        @include('modules.hot-post')
    </div>
    <!-- Widget [Categories Widget]-->
    <div class="widget categories">
        @if (Auth::guest())
        @else
            @if(!$categories['yourCategory']->isEmpty())
                <h3 class="h6">Your Categories</h3>
                @foreach ($categories['yourCategory'] as $category)
                    <div class="item d-flex justify-content-between" data-toggle="tooltip" data-placement="top" title="{{ $category->articles_count }} bài viết ">
                        <a href="{{ url('category', ['name' => $category->name]) }}">@if($category->articles_count == 0)<i class="fas fa-exclamation-triangle text-yellow"></i>@else <i class="fas fa-check text-green"></i> @endif {{ $category->name }}</a><span>{{ $category->articles_count }}</span>
                    </div>
                @endforeach
                <hr>
            @endif
        @endif
        <h3 class="h6">Public Categories</h3>
        @foreach ($categories['public'] as $category)
            @if($category->articles_count != 0)
                <div class="item d-flex justify-content-between" data-toggle="tooltip" data-placement="top" title="{{ $category->articles_count }} bài viết ">
                    <a href="{{ url('category', ['name' => $category->name]) }}">{{ $category->name }}</a><span>{{ $category->articles_count }}</span>
                </div>
            @endif
        @endforeach
        @if(!$categories['other']->isEmpty())
            <hr>
            <h3 class="h6">Other Categories</h3>
            @foreach ($categories['other'] as $category)
                @if($category->articles_count != 0)
                    <div class="item d-flex justify-content-between" data-toggle="tooltip" data-placement="top" title="{{ $category->articles_count }} bài viết ">
                        <a href="{{ url('category', ['name' => $category->name]) }}">{{ $category->name }}</a><span>{{ $category->articles_count }}</span>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
    <!-- Widget [Tags Cloud Widget]-->
    <div class="widget tags">
        <header>
            <h3 class="h6">Tags</h3>
        </header>
        <ul class="list-inline">
            @foreach ($tags as $tag)
                <li class="list-inline-item"><a href="{{ url('tag', ['tag' => $tag->tag]) }}" class="tag">{{ $tag->tag }}</a></li>
            @endforeach
        </ul>
    </div>
</aside>
