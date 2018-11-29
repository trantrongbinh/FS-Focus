@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ mix('css/author.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row mt-2" id="all-author">
            <div class="col-md-6 offset-md-3">
                <div class="widget search search-authors">
                    <form method="GET" id="form-search-author" action="" class="search-author">
                        <div class="form-group">
                            <input type="search" id="name" placeholder="What are you looking for?" class="form-control" data-action="grow" autocomplete="off" name="q" required>
                            <button id="submit" type="submit" class="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-11 list-authors" id="authors">
                @include('user.particals.authors')
            </div>
        </div>
        <br class="mb-5">
    </div>
@endsection

@section('scripts')
<script src="{{ mix('js/author.js') }}"></script>
@endsection
