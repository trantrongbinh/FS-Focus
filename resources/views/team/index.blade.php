@extends('layouts.app')
@section('styles')
<style>
    /*------------------------------------------------*/
/*    Profile Page
/*------------------------------------------------*/
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
  top: -150px;
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
</style>
@endsection
@section('content')
<div class="user-profile">
    <div class="profile-header-background"><img src="http://demo.thedevelovers.com/dashboard/queenadmin-1.2/assets/img/city.jpg" alt="Profile Header Background"></div>
    <div class="container center-content__width mt-4 mb-4">
        <div class="row">
            <div class="col-md-4">
                <div class="profile-info-left">
                    <div class="text-center">
                        <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Avatar" class="avatar" style="border-radius: 5px;">
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
            <div class="col-md-8">
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
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane container active" id="home">
                            <div class="media activity-item">
                                <a href="#" class="pull-left">
                                    <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Avatar" class="media-object avatar">
                                </a>
                                <div class="media-body">
                                    <p class="activity-title"><a href="#">Antonius</a> started following <a href="#">Jack Bay</a> <small class="text-muted">- 2m ago</small></p>
                                    <small class="text-muted">Today 08:30 am - 02.05.2014</small>
                                </div>
                                <div class="btn-group pull-right activity-actions">
                                    <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-th"></i>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">I don't want to see this</a></li>
                                        <li><a href="#">Unfollow Antonius</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Get Notification</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="media activity-item">
                                <a href="#" class="pull-left">
                                    <img src="http://bootdey.com/img/Content/avatar/avatar2.png" alt="Avatar" class="media-object avatar">
                                </a>
                                <div class="media-body">
                                    <p class="activity-title"><a href="#">Jane Doe</a> likes <a href="#">Jack Bay</a> <small class="text-muted">- 36m ago</small></p>
                                    <small class="text-muted">Today 07:23 am - 02.05.2014</small>
                                </div>
                                <div class="btn-group pull-right activity-actions">
                                    <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-th"></i>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">I don't want to see this</a></li>
                                        <li><a href="#">Unfollow Jane Doe</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Get Notification</a></li>
                                    </ul>
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
                    </div>


                    <!-- <ul class="nav nav-pills nav-pills-custom-minimal custom-minimal-bottom">
                        <li class="active"><a href="#activities" data-toggle="tab">ACTIVITIES</a></li>
                        <li><a href="#followers" data-toggle="tab">FOLLOWERS</a></li>
                        <li><a href="#following" data-toggle="tab">FOLLOWING</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="activities">
                            <div class="media activity-item">
                                <a href="#" class="pull-left">
                                    <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Avatar" class="media-object avatar">
                                </a>
                                <div class="media-body">
                                    <p class="activity-title"><a href="#">Antonius</a> started following <a href="#">Jack Bay</a> <small class="text-muted">- 2m ago</small></p>
                                    <small class="text-muted">Today 08:30 am - 02.05.2014</small>
                                </div>
                                <div class="btn-group pull-right activity-actions">
                                    <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-th"></i>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">I don't want to see this</a></li>
                                        <li><a href="#">Unfollow Antonius</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Get Notification</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="media activity-item">
                                <a href="#" class="pull-left">
                                    <img src="http://bootdey.com/img/Content/avatar/avatar2.png" alt="Avatar" class="media-object avatar">
                                </a>
                                <div class="media-body">
                                    <p class="activity-title"><a href="#">Jane Doe</a> likes <a href="#">Jack Bay</a> <small class="text-muted">- 36m ago</small></p>
                                    <small class="text-muted">Today 07:23 am - 02.05.2014</small>
                                </div>
                                <div class="btn-group pull-right activity-actions">
                                    <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-th"></i>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">I don't want to see this</a></li>
                                        <li><a href="#">Unfollow Jane Doe</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Get Notification</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="media activity-item">
                                <a href="#" class="pull-left">
                                    <img src="http://bootdey.com/img/Content/avatar/avatar3.png" alt="Avatar" class="media-object avatar">
                                </a>
                                <div class="media-body">
                                    <p class="activity-title"><a href="#">Michael</a> posted something for <a href="#">Jack Bay</a> <small class="text-muted">- 1h ago</small></p>
                                    <small class="text-muted">Today 07:23 am - 02.05.2014</small>
                                    <div class="activity-attachment">
                                        <div class="well well-sm">
                                            Professionally evolve corporate services without ethical leadership. Proactively re-engineer client-focused infrastructures before alternative potentialities. Competently predominate just in time e-tailers for leveraged solutions. Intrinsicly initiate end-to-end collaboration and idea-sharing after 24/365 ROI. Rapidiously.
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group pull-right activity-actions">
                                    <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-th"></i>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">I don't want to see this</a></li>
                                        <li><a href="#">Unfollow Michael</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Get Notification</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="media activity-item">
                                <a href="#" class="pull-left">
                                    <img src="http://bootdey.com/img/Content/avatar/avatar5.png" alt="Avatar" class="media-object avatar">
                                </a>
                                <div class="media-body">
                                    <p class="activity-title"><a href="#">Jack Bay</a> has uploaded two photos <small class="text-muted">- Yesterday</small></p>
                                    <small class="text-muted">Yesterday 06:42 pm - 01.05.2014</small>
                                    <div class="activity-attachment">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="#" class="thumbnail">
                                                    <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Uploaded photo">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group pull-right activity-actions">
                                    <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-th"></i>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">I don't want to see this</a></li>
                                        <li><a href="#">Unfollow Jack Bay</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Get Notification</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="media activity-item">
                                <a href="#" class="pull-left">
                                    <img src="http://bootdey.com/img/Content/avatar/avatar6.png" alt="Avatar" class="media-object avatar">
                                </a>
                                <div class="media-body">
                                    <p class="activity-title"><a href="#">Jack Bay</a> has changed his profile picture <small class="text-muted">- 2 days ago</small></p>
                                    <small class="text-muted">2 days ago 05:42 pm - 30.04.2014</small>
                                    <div class="activity-attachment">
                                        <a href="#" class="thumbnail">
                                            <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Uploaded photo">
                                        </a>
                                    </div>
                                </div>
                                <div class="btn-group pull-right activity-actions">
                                    <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-th"></i>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                        <li><a href="#">I don't want to see this</a></li>
                                        <li><a href="#">Unfollow Jack Bay</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Get Notification</a></li>
                                    </ul>
                                </div>
                            </div>
                            <button type="button" class="btn btn-default center-block"><i class="fa fa-refresh"></i> Load more activities</button>
                        </div>
                        <div class="tab-pane fade" id="followers">
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
                        </div>
                        <div class="tab-pane fade" id="following">
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
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pb__100"></div>
@endsection
