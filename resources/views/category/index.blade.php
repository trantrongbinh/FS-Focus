@extends('layouts.app')
@section('styles')
@endsection
@section('content')
@component('particals.jumbotron')
<h3>{{ lang('Categories') }}</h3>
<h6>{{ lang('Categories Meta') }}</h6>
@endcomponent
{{-- <div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <ul class="list-group">
                @forelse($categories as $category)
                <li class="list-group-item">
                    <span class="badge badge-secondary float-right">{{ $category->articles->count() }}</span>
                    <a href="{{ url('category', ['name' => $category->name]) }}">{{ $category->name }}</a>
                </li>
                @empty
                <li class="list-group-item">{{ lang('Nothing') }}</li>
                @endforelse
            </ul>
        </div>
    </div>
</div> --}}

<div class="container">
        <div class="card-deck" style="padding: 50px; color: #000;">
          <div class="card bg-primary" style='background-image: url("https://cdn-images-1.medium.com/fit/c/280/180/1*Cbj_BcK5ePD4Mc4TK4sfvQ@2x.jpeg"); background-position: 50% 50% !important; background-origin: border-box!important; background-size: cover!important;'>
            <div class="card-body text-center">
              <h2 class="card-title">John Doe</h2>
                <a href="#" class="btn btn-primary">Follow</a>
            </div>
          </div>
          
          <div class="card bg-warning">
            <div class="card-body text-center">
              <p class="card-text">Some text inside the second card</p>
            </div>
          </div>
          <div class="card bg-success">
            <div class="card-body text-center">
              <p class="card-text">Some text inside the third card</p>
            </div>
          </div>
          <div class="card bg-danger">
            <div class="card-body text-center">
              <p class="card-text">Some text inside the fourth card</p>
            </div>
          </div> 
        </div>
</div>
<div class="pb__100"></div>
@endsection