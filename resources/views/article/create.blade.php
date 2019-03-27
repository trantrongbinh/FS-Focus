@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset(mix('css/create-article.css')) }}">
@endsection

@section('content')
<div class="container">
    <main class="article row">
        <div class="col-md-12 create-post">
            <div class="clear"></div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <article-create user-id="{{ Auth::id() }}"></article-create>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

@section('scripts')
@endsection
