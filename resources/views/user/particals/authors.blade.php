<div class="row">
    @foreach($authors as $author)
        <div class="col-sm-6 col-md-3" id="list">
            <div class="panel panel-default panel-card">
                <div class="panel-heading"></div>
                <div class="panel-figure">
                    <img class="img-fluid rounded-circle" src="{{ $author->avatar }}" />
                </div>
                <div class="panel-body text-center">
                    <h5 class="panel-header h6" title="{{ $author->name }}">
                        <a href="/user/{{ $author->name }}">{{ str_limit($author->name, $limit = 17, $end = '...') }}</a>
                    </h5>
                    @isset($author->description)
                        <small>{{ $author->description }}</small>
                    @endisset
                </div>
                <div class="panel-thumbnails">
                    <span title="Followers" data-toggle="tooltip">
                        <i class="fas fa-user-plus" aria-hidden="true"></i> 100
                    </span>&nbsp;&nbsp;
                    <span title="Posts" data-toggle="tooltip">
                        <i class="fas fa-pencil-alt" aria-hidden="true"></i> {{ $author->articles_count }}
                    </span>
                </div>
                <div class="panel-thumbnails">
                    <a class="btn btn-info btn-twitter btn-sm" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="">
                        <i class="fab fa-github"></i>
                    </a>
                    <a class="btn btn-info btn-sm" rel="publisher" href="">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="">
                        <i class="fab fa-stack-overflow"></i>
                    </a>
                </div>
                <div class="text-center">
                    <button class="btn btn-success btn-sm btn-follow" role="button"><i class="fa fa-plus font-size_10"></i> Follow</button>
                </div>
            </div>
        </div>
    @endforeach
</div>

@if($authors instanceof \Illuminate\Pagination\LengthAwarePaginator )
<div class="paginate-authors">
    {{ $authors->links('pagination.default') }}
</div>
@endif
