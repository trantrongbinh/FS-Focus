@extends('layouts.app')

@section('content')
    @include('user.particals.info')
    <div class="container">
        <main class="row">
             <div class="col-lg-3 left-box">
                <!-- Widget [Categories Widget]-->
                    <div class="widget categories">
                        <header>
                            <h3 class="h6">Categories</h3>
                        </header>
                        
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