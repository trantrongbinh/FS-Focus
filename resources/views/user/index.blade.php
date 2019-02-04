@extends('layouts.app')

@section('content')
    @include('user.particals.info')
    <div class="container">
        <main class="row">
            <div class="col-lg-3 left-box">
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
                    <hr>
                    @if(!$categories['other']->isEmpty())
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
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#recent-articles" data-toggle="tab">Recent Articles</a></li>
                            <li class="nav-item"><a class="nav-link" href="#recent-discussions" data-toggle="tab">{{ lang('Recent Discussions') }}</a></li>
                            <li class="nav-item"><a class="nav-link" href="#recent-comments" data-toggle="tab">{{ lang('Recent Comments') }}</a></li>
                        </ul>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="recent-articles">
                                
                                @include('user.particals.articles')

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane posts-listing" id="recent-discussions">

                                @include('user.particals.discussions')

                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="recent-comments">
                               
                                @include('user.particals.comments')

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </main>
    </div>
@endsection

@section('scripts')
<script>
let acc = document.getElementsByClassName("accordion");
let i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function() {
        this.classList.toggle("active");
        let panel = this.nextElementSibling;
        if (panel.style.maxHeight){
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        } 
    }
}

</script>
@endsection