@extends('layouts.app')
@section('styles')
<style>
    .center-content__width {
    margin: 0 auto;
    max-width: 1165px;
}

.user-profile {
  padding-bottom: 30px;
}

.profile-header-background {
  margin: -30px -30px 0 -30px;
}
.profile-header-background img {
  width: 100%;
  height: 400px;
}

.profile-info-left {
  position: relative;
  top: -92px;
}
.profile-info-left img.avatar {
  border: 2px solid #fff;
}
.profile-info-left h2 {
  font-family: "josefinslab-semibold";
  margin-bottom: 30px;
}
.profile-info-left .section {
  margin-top: 50px;
}
.profile-info-left .section h3 {
  font-size: 1.1em;
  font-weight: 700;
  border-bottom: 1px solid #ccc;
  padding-bottom: 10px;
}
.profile-info-left ul.list-social > li {
  line-height: 2.3;
}
.profile-info-left ul.list-social > li i {
  display: inline-block;
  vertical-align: middle;
  *vertical-align: auto;
  *zoom: 1;
  *display: inline;
  position: relative;
  top: 1px;
  font-size: 16px;
  min-width: 16px;
  line-height: 1;
}
.profile-info-left ul.list-social > li a {
  color: #696565;
}

.profile-info-right .tab-content {
  padding: 30px 0;
  background-color: transparent;
}
@media screen and (max-width: 768px) {
  .profile-info-right {
    position: relative;
    top: -70px;
  }
}

.user-follower,
.user-following {
  position: relative;
  margin-bottom: 40px;
}
.user-follower img,
.user-following img {
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  width: 40px;
}
.user-follower a,
.user-following a {
  font-size: 1.1em;
  line-height: 1;
}
.user-follower .username,
.user-following .username {
  font-size: 0.9em;
  line-height: 1.5;
}
.user-follower .btn,
.user-following .btn {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 92px;
}

.btn-toggle-following {
  background-color: #7bae16;
  color: #fff;
}
.btn-toggle-following:hover {
  background-color: #ef2020;
  color: #fff;
}
.btn-toggle-following:hover span {
  display: none;
}
.btn-toggle-following:hover:after {
  content: 'Unfollow';
  display: inline;
}
.btn-toggle-following:hover i:before {
  content: '\f129';
}


/* list icons */
.list-icons-demo li {
  margin-bottom: 20px;
  text-align: center;
}
.list-icons-demo li i {
  font-size: 24px;
}

.list-icons-demo2 li {
  margin-bottom: 10px;
}

.activity-item {
  overflow: visible;
  position: relative;
  margin: 15px 0;
  border-top: 1px dashed #ccc;
  padding-top: 15px;
}
.activity-item:first-child {
  border-top: none;
}
.activity-item .avatar {
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  width: 32px;
}
.activity-item > i {
  font-size: 18px;
  line-height: 1;
}
.activity-item .media-body {
  position: relative;
}
.activity-item .activity-title {
  margin-bottom: 0;
  line-height: 1.3;
}
.activity-item .activity-attachment {
  padding-top: 20px;
}
.activity-item .well {
  -moz-border-radius: 0;
  -webkit-border-radius: 0;
  border-radius: 0;
  -moz-box-shadow: none;
  -webkit-box-shadow: none;
  box-shadow: none;
  border: none;
  border-left: 2px solid #cfcfcf;
  background: #fff;
  margin-left: 20px;
  font-size: 0.85em;
}
.activity-item .thumbnail {
  display: inline;
  border: none;
  padding: 0;
}
.activity-item .thumbnail img {
  -moz-border-radius: 2px;
  -webkit-border-radius: 2px;
  border-radius: 2px;
  width: auto;
  margin: 0;
}
.activity-item .activity-actions {
  position: absolute;
  top: 15px;
  right: 0;
}
.activity-item .activity-actions .btn i {
  margin: 0;
}
.activity-item .activity-actions .dropdown-menu > li > a {
  font-size: 0.9em;
  padding: 3px 10px;
}
.activity-item + .btn {
  margin-bottom: 15px;
}

.chart {
    position: absolute;
    width: 250px;
    height: 250px;
    top: 50%;
    left: 50%;
    margin: 0 0 0 -130px;
}

.doughnutTip {
    position: absolute;
    min-width: 30px;
    max-width: 300px;
    padding: 5px 15px;
    border-radius: 1px;
    background: rgba(0, 0, 0, .8);
    color: #ddd;
    font-size: 15px;
    text-shadow: 0 1px 0 #000;
    text-transform: uppercase;
    text-align: center;
    line-height: 1.3;
    letter-spacing: .06em;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
    pointer-events: none;
    z-index: 1040;
}

.doughnutTip:after {
    position: absolute;
    left: 50%;
    bottom: -6px;
    content: "";
    height: 0;
    margin: 0 0 0 -6px;
    border-right: 5px solid transparent;
    border-left: 5px solid transparent;
    border-top: 6px solid rgba(0, 0, 0, .7);
    line-height: 0;
}

.doughnutSummary {
    position: absolute;
    top: 50%;
    left: 50%;
    color: #666;
    text-align: center;
    text-shadow: 0 -1px 0 #111;
    cursor: default;
}

.doughnutSummaryTitle {
    position: absolute;
    top: 50%;
    width: 100%;
    margin-top: -27%;
    font-size: 18px;
    letter-spacing: .06em;
}

.doughnutSummaryNumber {
    position: absolute;
    top: 50%;
    width: 100%;
    margin-top: -15%;
    font-size: 30px;
}

.chart path:hover {
    opacity: 0.65;
}

.profile__detail-stats {
    margin-top: 50px;
    margin-bottom: 10px;
}

.profile__detail-stats li {
    display: inline-block;
    font-size: 15px;
    line-height: 1.5;
    margin-right: 20px;
    cursor: pointer;
}

.profile__detail-stats li:last-of-type {
    margin-right: 0;
}

.vote {
    position: absolute;
    text-align: center;
}
</style>
@endsection
@section('content')
<div class="user-profile">
    <div class="profile-header-background" style="height: 180px;">
    </div>
    <div class="container center-content__width mt-4 mb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-info-left">
                    <div class="text-center">
                        <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Avatar" class="avatar img-circle">
                        <h2>Jack Bay</h2>
                    </div>
                    <div class="action-buttons">
                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <a href="#" class="btn btn-success btn-block"><i class="fa fa-plus-round"></i> Follow</a>
                            </div>
                            <div class="col-sm-6">
                                <a href="#" class="btn btn-primary btn-block"><i class="fa fa-android-mail"></i> Message</a>
                            </div>
                        </div>
                    </div>
                    <div class="section">
                        <h3>About Me</h3>
                        <p>Energistically administrate 24/7 portals and enabled catalysts for change. Objectively revolutionize client-centered e-commerce via covalent scenarios. Continually envisioneer.</p>
                        <div class="panel-thumbnails"><a href="" class="btn btn-info btn-twitter btn-sm"><i class="fab fa-twitter"></i></a> <a rel="publisher" href="" class="btn btn-danger btn-sm"><i class="fab fa-github"></i></a> <a rel="publisher" href="" class="btn btn-info btn-sm"><i class="fab fa-facebook-square"></i></a> <a rel="publisher" href="" class="btn btn-warning btn-sm"><i class="fab fa-stack-overflow"></i></a></div>
                    </div>
                    <div class="section">
                        <h3>Statistics</h3>
                        <p><span class="badge badge-secondary">332</span> Following</p>
                        <p><span class="badge badge-secondary">124</span> Followers</p>
                        <p><span class="badge badge-secondary">620</span> Likes</p>
                    </div>
                    <div class="section">
                        <h3>Social</h3>
                        <ul class="list-unstyled list-social">
                            <li><a href="#"><i class="fab fa-twitter"></i> @jackbay</a></li>
                            <li><a href="#"><i class="fab fa-facebook"></i> Jack Bay</a></li>
                            <li><a href="#"><i class="fab fa-github"></i> jackdribs</a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i> Jack Bay</a></li>
                        </ul>
                    </div>
                </div>
            </div>
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