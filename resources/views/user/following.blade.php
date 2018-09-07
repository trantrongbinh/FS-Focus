@extends('layouts.app')

@section('content')
    @include('user.particals.info')

    <div class="container">
        <main class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card card-default">
                    <div class="card-header">{{ lang('Your Followings') }} ( {{ $followings->count() }} )</div>
                    <div class="panel-body">
                        <ul class="list-group">
                            @forelse($followings as $following)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <a href="{{ url('user', ['name' => $following->name]) }}">
                                                <img class="aimg-circle img-fluid" src="{{ $following->avatar }}">
                                            </a>
                                        </div>
                                        <div class=" col-md-10">
                                            <div>
                                                <a href="{{ url('user', ['name' => $following->name]) }}">{{ $following->nickname or $following->name }}</a>
                                                <div class="mic-info">
                                                    Email: <a href="javascript:;">{{ $following->email }}</a>
                                                </div>
                                            </div>
                                            <div class="comment-text">
                                                We would like to congratulate John on his achievement...
                                            </div>
                                            <a  href="javascript:void(0)" style="color: #fff;" 
                                                class="btn btn-{{ Auth::user()->isFollowing($following->id) ? 'warning' : 'danger' }} btn-sm"
                                                onclick="event.preventDefault();
                                                         document.getElementById('follow-form').submit();">
                                                {{ Auth::user()->isFollowing($following->id) ? lang('Following') : lang('Follow') }}
                                            </a>
                                            <form id="follow-form" action="{{ url('user/follow', [$following->id]) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                @empty
                                <li class="nothing">{{ lang('Nothing') }}</li>
                            @endforelse
                        </ul>
                    </div>
                    
                </div>
            </div>
        </main>
    </div>
@endsection