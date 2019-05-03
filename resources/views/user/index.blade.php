@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="{{ asset(mix('css/profile.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/doughnut-chart.css')) }}">
@endsection
@section('content')
<div class="user-profile">
    <div class="profile-header-background" style="height: 180px;">
    </div>
    <div class="container center-content__width mt-4 mb-4">
        <div class="row">
            @include('user.particals.info')
            <div class="col-md-8" style="top: -90px;">
                <div class="row" style="position: relative; min-height: 280px;">
                    <div class="col-sm-6 text-center">
                        <div class="profile__detail-stats">
                            <ul>
                                <li><span class="badge badge-secondary">164</span> posts</li>
                                <li><span class="badge badge-secondary">188</span> followers</li>
                                <li><span class="badge badge-secondary">206</span> following</li>
                            </ul>
                        </div>
                        <div class="tag--v0">
                            <span>Chu de</span>
                            <ul>
                                <li><a href="#">Tinh Yeu</a></li>
                                <li><a href="#">Khoa Hoc Cong Nghe</a></li>
                                <li><a href="#">Giao Duc</a></li>
                                <li><a href="#">Lap Trinh</a></li>
                                <li><a href="#">Giai Tri</a></li>
                                <li><a href="#">Van Hoa</a></li>
                            </ul>
                        </div>
                        <div class="panel-thumbnails">
                            <span>Congty/Tochuc</span>
                            <div class="">
                                <a href="">
                                    <img src="https://avatars.githubusercontent.com/u/1000665?v=3" alt="Team avatar" class="img-fluid" style="width: 30px; height: 30px; border-radius: 3px;">
                                </a>&nbsp&nbsp
                                <a href="">
                                    <img src="https://avatars2.githubusercontent.com/u/37802322?s=70&v=4" alt="Team avatar" class="img-fluid" style="width: 30px; height: 30px; border-radius: 3px;">
                                </a>&nbsp&nbsp
                                <a href="">
                                    <img src="https://avatars3.githubusercontent.com/u/37947030?s=70&v=4" alt="Team avatar" class="img-fluid" style="width: 30px; height: 30px; border-radius: 3px;">
                                </a>&nbsp&nbsp
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div style="position: relative">
                            <div id="doughnutChart" class="chart"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile-info-right">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu3">Menu 3</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane container active" id="home">
                                    <div class="card radius shadowDepth1"><a href="http://localhost:8080/what-is-machine-learning-c9snb" class="card__image background__cover" style="background-image: url(&quot;https://cdn-images-1.medium.com/max/800/1*x-0E0Ueg1avtu8un3KyGIA.png&quot;);"></a>
                                        <div class="card__content card__padding">
                                            <div class="card__share">
                                                <div class="card__social"><a href="#" class="share-icon facebook"><span class="fab fa-facebook-square"></span></a> <a href="#" class="share-icon twitter"><span class="fab fa-twitter"></span></a> <a href="#" class="share-icon googleplus"><span class="fab fa-google-plus"></span></a></div> <a id="share" href="#" class="share-toggle share-icon"></a>
                                            </div>
                                            <div data-v-37607ae5="" class="vote">
                                                <div data-v-37607ae5="" class="up"><i data-v-37607ae5="" aria-hidden="true" class="fa fa-caret-up fa-2x" style="color: rgb(170, 170, 170);"></i></div>
                                                <div data-v-37607ae5="" class="votes">0</div>
                                                <div data-v-37607ae5="" class="down"><i data-v-37607ae5="" aria-hidden="true" class="fa fa-caret-down fa-2x" style="color: rgb(170, 170, 170);"></i></div>
                                            </div>
                                            <div class="card__post">
                                                <div class="card__meta"><a href="http://localhost:8080/category/Ms.%20Abigail%20Jacobi" class="topic"> Ms. Abigail Jacobi</a> <time><i class="far fa-clock"></i> 1 week ago</time> <span class="readingTime">5 min read</span></div>
                                                <article class="card__article">
                                                    <h3 class="h4"><a href="http://localhost:8080/what-is-machine-learning-c9snb">What is Machine Learning?</a></h3>
                                                    <p class="card__desc"></p>
                                                </article>
                                                <div class="tag--v2">
                                                    <ul>
                                                        <li><a href="http://localhost:8080/tag/est">est</a><span>20</span></li>
                                                        <li><a href="http://localhost:8080/tag/iure">iure</a><span>20</span></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card__action">
                                            <div class="card__author">
                                                <figure class="profile--author profile--author__left" style="display: inline;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAAD/CAIAAACxapedAAAABnRSTlMAAAAAAABupgeRAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAC50lEQVR4nO3UQQ3DQBAEwXMQHERDM0RDCIH4kdfK6ioEo1Vrj72uBUmf6QEwRv10qZ8u9dOlfrrUT5f66VI/XeqnS/10qZ8u9dOlfrrUT5f66VI/XeqnS/10qZ8u9dOlfrrUT5f66VI/XeqnS/10qZ8u9dOlfrrUT5f66VI/XeqnS/10qZ8u9dOlfrrUT5f66VI/XeqnS/10qZ8u9dOlfrrUT5f66VI/XeqnS/10qZ+uY3rA++x1TU94dK9zesKb+P10qZ8u9dOlfrrUT5f66VI/XeqnS/10qZ8u9dOlfrrUT5f66VI/XeqnS/10qZ8u9dOlfrrUT5f66VI/XeqnS/10qZ8u9dOlfrrUT5f66VI/XeqnS/10qZ8u9dOlfrrUT5f66VI/XeqnS/10qZ8u9dOlfrrUT5f66VI/XeqnS/10HXtd0xtght9Pl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9dx/SAR3td0xMe3eucnvCDi/3L76dL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny710/UF7ncJW3dRjfoAAAAASUVORK5CYII=" alt="trantrongbinh">
                                                    <div class="card__author-content">
                                                        By <a href="/user/trantrongbinh">trantrongbinh</a></div>
                                                    <figcaption class="profile--info hidden" style="margin-top: -10px;">
                                                        <div class="author-profile--popup"><img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTF_erFD1SeUnxEpvFjzBCCDxLvf-wlh9ZuPMqi02qGnyyBtPWdE-3KoH3s" alt="Ash" class="avatar"> <br><a title="Theo dõi Huskywannafly" class="btn btn-outline-info btn-sm btn--follow">Theo dõi</a>
                                                            <div class="username">Will Smith</div>
                                                            <div class="bio">Senior UI Designer</div>
                                                            <div class="description">
                                                                I use to design websites and applications for the web.
                                                            </div>
                                                            <ul class="data">
                                                                <li><span>127</span>
                                                                    <p>(Posts)</p>
                                                                </li>
                                                                <li><span> 2</span>
                                                                    <p>(Followers)</p>
                                                                </li>
                                                                <li><span> 311</span>
                                                                    <p>(Following)</p>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                                <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 413</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 5</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu"><a href="http://localhost:8080/article/22/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                                    </span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane container fade" id="menu1">
                                    <!-- <div class="tab-pane fade" id="followers"> -->
                                    <div class="media user-follower">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">Antonius<br><span class="text-muted username">@mrantonius</span></a>
                                            <button type="button" class="btn btn-sm btn-toggle-following pull-right"><i class="fa fa-checkmark-round"></i> <span>Following</span></button>
                                        </div>
                                    </div>
                                    <div class="media user-follower">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar2.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">Michael<br><span class="text-muted username">@iamichael</span></a>
                                            <button type="button" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Follow</button>
                                        </div>
                                    </div>
                                    <div class="media user-follower">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar3.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">Stella<br><span class="text-muted username">@stella</span></a>
                                            <button type="button" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Follow</button>
                                        </div>
                                    </div>
                                    <div class="media user-follower">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar4.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">Jane Doe<br><span class="text-muted username">@janed</span></a>
                                            <button type="button" class="btn btn-sm btn-toggle-following pull-right"><i class="fa fa-checkmark-round"></i> <span>Following</span></button>
                                        </div>
                                    </div>
                                    <div class="media user-follower">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar5.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">John Simmons<br><span class="text-muted username">@jsimm</span></a>
                                            <button type="button" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Follow</button>
                                        </div>
                                    </div>
                                    <div class="media user-follower">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar6.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">Antonius<br><span class="text-muted username">@mrantonius</span></a>
                                            <button type="button" class="btn btn-sm btn-toggle-following pull-right"><i class="fa fa-checkmark-round"></i> <span>Following</span></button>
                                        </div>
                                    </div>
                                    <div class="media user-follower">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar6.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">Michael<br><span class="text-muted username">@iamichael</span></a>
                                            <button type="button" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Follow</button>
                                        </div>
                                    </div>
                                    <div class="media user-follower">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar7.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">Stella<br><span class="text-muted username">@stella</span></a>
                                            <button type="button" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Follow</button>
                                        </div>
                                    </div>
                                    <div class="media user-follower">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">Jane Doe<br><span class="text-muted username">@janed</span></a>
                                            <button type="button" class="btn btn-sm btn-toggle-following pull-right"><i class="fa fa-checkmark-round"></i> <span>Following</span></button>
                                        </div>
                                    </div>
                                    <div class="media user-follower">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar2.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">John Simmons<br><span class="text-muted username">@jsimm</span></a>
                                            <button type="button" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Follow</button>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>
                                <div class="tab-pane container fade" id="menu2">
                                    <div class="media user-following">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">Stella<br><span class="text-muted username">@stella</span></a>
                                            <button type="button" class="btn btn-sm btn-danger pull-right"><i class="fa fa-close-round"></i> Unfollow</button>
                                        </div>
                                    </div>
                                    <div class="media user-following">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar2.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">Jane Doe<br><span class="text-muted username">@janed</span></a>
                                            <button type="button" class="btn btn-sm btn-danger pull-right"><i class="fa fa-close-round"></i> Unfollow</button>
                                        </div>
                                    </div>
                                    <div class="media user-following">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar3.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">John Simmons<br><span class="text-muted username">@jsimm</span></a>
                                            <button type="button" class="btn btn-sm btn-danger pull-right"><i class="fa fa-close-round"></i> Unfollow</button>
                                        </div>
                                    </div>
                                    <div class="media user-following">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar4.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">Antonius<br><span class="text-muted username">@mrantonius</span></a>
                                            <button type="button" class="btn btn-sm btn-danger pull-right"><i class="fa fa-close-round"></i> Unfollow</button>
                                        </div>
                                    </div>
                                    <div class="media user-following">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar5.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">Michael<br><span class="text-muted username">@iamichael</span></a>
                                            <button type="button" class="btn btn-sm btn-danger pull-right"><i class="fa fa-close-round"></i> Unfollow</button>
                                        </div>
                                    </div>
                                    <div class="media user-following">
                                        <img src="http://bootdey.com/img/Content/avatar/avatar6.png" alt="User Avatar" class="media-object pull-left">
                                        <div class="media-body">
                                            <a href="#">Stella<br><span class="text-muted username">@stella</span></a>
                                            <button type="button" class="btn btn-sm btn-danger pull-right"><i class="fa fa-close-round"></i> Unfollow</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane container fade" id="menu3">
                                    <div class="post card">
                                        <div class="card-body">
                                            <div class="user-block">
                                                <div class="post-footer d-flex align-items-center"><a href="/user/Khalid Satterfield V" class="author d-flex align-items-center flex-wrap">
                                                        <div class="avatar"><img src="/images/default.png" alt="Khalid Satterfield V" class="img-fluid"></div>
                                                        <div class="title"><span>Khalid Satterfield V</span></div>
                                                    </a>
                                                    <div class="date"><i class="far fa-clock"></i> 3 weeks ago
                                                    </div>
                                                    <div><a href="http://localhost:8080/discussion/dicta-voluptatibus-accusantium-sed-qui-ysgx4"><i class="far fa-comment-alt"> 2</i> Replies
                                                        </a></div>
                                                </div> <a href="javascript:;" class="float-right btn-tool">×</a>
                                            </div>
                                            <header class="post-header"><a href="http://localhost:8080/discussion/dicta-voluptatibus-accusantium-sed-qui-ysgx4">
                                                    <h3 class="h4 ">Dicta voluptatibus accusantium sed qui.</h3>
                                                </a>
                                                <div class="meta"></div>
                                                <div class="ql-editor">
                                                    <div>
                                                        <div class="markdown">Quia mollitia ut in consequuntur quis incidunt nulla. Qui consequuntur aut voluptas repellat quam eum ut. Cum iure consequatur beatae in necessitatibus. Dicta facilis rerum dolores iusto dolorem.</div>
                                                        <!---->
                                                    </div>
                                                </div>
                                            </header>
                                        </div> <a href="http://localhost:8080/login" class="text-center" style="padding-bottom: 20px;">You must be logged to add a comment !</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pb__100"></div>
@endsection
@section('scripts')
<script>
$(function() {
    $("#doughnutChart").drawDoughnutChart([
        { title: "Tokyo", value: 120, color: "#2C3E50" },
        { title: "San Francisco", value: 80, color: "#FC4349" },
        { title: "New York", value: 70, color: "#6DBCDB" },
        { title: "London", value: 50, color: "#F7E248" },
        { title: "Sydney", value: 40, color: "#D7DADB" },
        { title: "Berlin", value: 20, color: "#FFF" }
    ]);
});
</script>
<script src="{{ asset(mix('js/drawDoughnutChart.js')) }}"></script>
@endsection
{{-- @extends('layouts.app')
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
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    }
}
</script>
@endsection --}}