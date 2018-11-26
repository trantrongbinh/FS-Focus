@extends('layouts.app')

@section('styles')
<style>
/*=============================================
					CARD-1
===============================================*/
#card-1 {
	padding-top: 70px;
	margin-bottom: 200px;
}

#card-1 .panel.panel-card {
    position: relative;
    max-width: 250px;
    border: none;
    overflow: hidden;
    margin: 0 auto;
}

#card-1 .panel.panel-card .panel-heading {
    position: relative;
    z-index: 2;
    height: 70px;
    border-bottom-color: #fff;
    overflow: hidden;
    -webkit-transition: height 600ms ease-in-out;
    transition: height 600ms ease-in-out;
}

#card-1 .panel.panel-card .panel-figure {
    position: absolute;
    top: auto;
    left: 50%;
    z-index: 3;
    width: 70px;
    height: 70px;
    background-color: #fff;
    border-radius: 50%;
    opacity: 1;
    -webkit-box-shadow: 0 0 0 3px #fff;
    box-shadow: 0 0 0 3px #fff;
    -webkit-transform: translate3d(-50%, -50%, 0);
    transform: translate3d(-50%, -50%, 0);
    -webkit-transition: opacity 400ms ease-in-out;
    transition: opacity 400ms ease-in-out;
}

#card-1 .panel.panel-card .panel-body {
    padding-top: 40px;
    -webkit-transition: padding 400ms ease-in-out;
    transition: padding 400ms ease-in-out;
}

#card-1  .panel-thumbnails {
    padding: 0 15px 10px;
    text-align: center;
}

.paginate-authors {
    margin: 50px auto;
}

.list-authors {
    margin: 0px auto;
}

.search-authors {
    border: none;
}

.btn-follow {
    padding: 0 5px 0 5px;
}

</style>
@endsection

@section('content')
    <div class="container">
        <div class="row mt-2" id="card-1">
            <div class="col-md-6 offset-md-3">
                <div class="widget search search-authors">
                    <form method="get" action="{{ url('search') }}" class="search-author">
                        <div class="form-group">
                            <input type="search" placeholder="What are you looking for?" class="form-control" data-action="grow" autocomplete="off" name="q" required>
                            <button type="submit" class="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-11 list-authors">
                <div class="row">
                    @foreach($authors as $author)
                        <div class="col-sm-6 col-md-3">
                            <div class="panel panel-default panel-card">
                                <div class="panel-heading"></div>
                                <div class="panel-figure">
                                    <img class="img-fluid rounded-circle" src="{{ $author->avatar }}" />
                                </div>
                                <div class="panel-body text-center">
                                    <h5 class="panel-header h6" title="{{ $author->name }}"><a href="/user/{{ $author->name }}">{{ str_limit($author->name, $limit = 17, $end = '...') }}</a></h5>
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
                                {{-- <div class="panel-thumbnails">
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
                                </div> --}}
                                <div class="text-center">
                                    <button class="btn btn-success btn-sm btn-follow" role="button"><i class="fa fa-plus font-size-10"></i> Follow</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <div class="paginate-authors">
                {{ $authors->links('pagination.default') }}
            </div>
        </div>
        <br class="mb-5">
    </div>
@endsection
