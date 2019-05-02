@forelse($related as $article)
    <li>
        <figure>
            <a class="background__cover" href="{{ url($article->slug) }}" style="background-image: url({{ $article->page_image }});"></a>
        </figure>
        <header>
            @if($article->category_id)
                <a href="{{ url('category', ['name' => $article->category->name]) }}" class="topic--post"> {{ $article->category->name }}</a>
            @endif
            <a href="{{ url($article->slug) }}">
                <h3>{{ str_limit($article->title, '45') }}</h3>
            </a>
            <div class="info--post">
               <img src="{{ $article->user->avatar }}" alt="{{ $article->user->name }}" class="img-fluid rounded-circle" style="height: 40px; width: 40px;">
                <div class="info--detail">
                   <a href="/user/{{ $article->user->name }}" class="name-author">
                        {{ $article->user->name }}
                    </a>
                    <div class="info-time">
                        <a href="javascript:;">{{ $article->published_at->diffForHumans() }}</a> 
                        <span style="color: #999">·</span> 
                        <a href="javascript:;">8 min read</a>
                    </div>
                </div>
            </div>
            <a href="#" class="bookmark--icon"><i class="far fa-bookmark"></i></a>
        </header>
    </li>
@empty
    <h6>Not thing</h6>
@endforelse
