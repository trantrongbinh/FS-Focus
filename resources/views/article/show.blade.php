@extends('layouts.app')
@section('title', $article->title)
@section('styles')
<link rel="stylesheet" href="{{ asset(mix('css/detail-post.css')) }}">
<style>
.author__more {
    position: absolute;
    left: 82%;
    top: 0;
    bottom: 0;
    width: 220px;
}
.trailing {
    width: inherit;
}

.box {
    position: fixed;
    bottom: 0;
    z-index: 2;
    width: inherit;
    background: #FFF;
    -webkit-box-shadow: 0 0 1px rgba(0,0,0,0.35);
    -moz-box-shadow: 0 0 1px rgba(0,0,0,0.35);
    box-shadow: 0 0 1px rgba(0,0,0,0.35);
    padding: 0 10px;
}
.author-subscribe {
    border-bottom: 1px solid #EEE;
    padding-bottom: 15px;
    margin-bottom: 10px;
}
.heading {
    font-size: 13px;
    line-height: 20px;
    padding: 0 15px 10px;
}
.author {
    padding: 8px 0 44px 45px;
    margin: 0 15px;
    background: #FFF;
    position: relative;
}
.author .avatar {
    width: 40px;
    height: 40px;
    display: block;
    border-radius: 50%;
    overflow: hidden;
    float: left;
    margin-left: -45px;
}
.author .avatar img {
    max-width: 100%;
    max-height: 100%;
}
 .author .title {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
}
.author .title .display-name {
    font-family: SFD-Bold;
    color: #333;
    font-size: 14px;
    line-height: 18px;
}
.author .title .nickname {
    font-size: 13px;
    line-height: 16px;
    color: #999;
}





.fixed-plugin li > a,
.fixed-plugin .badge{
    transition: all .34s;
    -webkit-transition: all .34s;
    -moz-transition: all .34s;
}

.fixed-plugin{
    position: fixed;
    top: 180px;
    right: 0;
    width: 64px;
    background: rgba(0,0,0,.3);
    z-index: 1031;
    border-radius: 8px 0 0 8px;
    text-align: center;
}
.fixed-plugin .fa-cog{
    color: #FFFFFF;
    padding: 10px;
    border-radius: 0 0 6px 6px;
    width: auto;
}
.fixed-plugin .dropdown-menu{
    right: 80px;
    left: auto;
    width: 290px;
    border-radius: 10px;
    padding: 0 10px;
}
.fixed-plugin .dropdown-menu:after, .fixed-plugin .dropdown-menu:before{
    right: 10px;
    margin-left: auto;
    left: auto;
}
.fixed-plugin .fa-circle-thin{
    color: #FFFFFF;
}
.fixed-plugin .active .fa-circle-thin{
    color: #00bbff;
}

.fixed-plugin .dropdown-menu > .active > a,
.fixed-plugin .dropdown-menu > .active > a:hover,
.fixed-plugin .dropdown-menu > .active > a:focus{
    color: #777777;
    text-align: center;
}

.fixed-plugin img{
    border-radius: 0;
    width: 100%;
    height: 100px;
    margin: 0 auto;
}

.fixed-plugin .dropdown-menu li > a:hover,
.fixed-plugin .dropdown-menu li > a:focus{
    box-shadow: none;
}

.fixed-plugin .badge{
    border: 3px solid #FFFFFF;
    border-radius: 50%;
    cursor: pointer;
    display: inline-block;
    height: 23px;
    margin-right: 5px;
    position: relative;
    width: 23px;
}
.fixed-plugin .badge.active,
.fixed-plugin .badge:hover{
    border-color: #00bbff;
}

.fixed-plugin .badge-blue{
    background-color: #00bcd4;
}
.fixed-plugin .badge-green{
    background-color: #4caf50;
}
.fixed-plugin .badge-orange{
    background-color: #ff9800;
}
.fixed-plugin .badge-purple{
    background-color: #9c27b0;
}
.fixed-plugin .badge-red{
    background-color: #f44336;
}

.fixed-plugin .badge-rose{
    background-color: #e91e63;
}

.fixed-plugin .badge-black{
    background-color: #000;
}

.fixed-plugin .badge-white{
    background-color: rgba(200, 200, 200, 0.2);
}

.fixed-plugin h5{
    font-size: 14px;
    margin: 10px;
}
.fixed-plugin .dropdown-menu li{
    display: block;
    padding: 5px 2px;
    width: 25%;
    float: left;
}

.fixed-plugin li.adjustments-line,
.fixed-plugin li.header-title,
.fixed-plugin li.button-container{
    width: 100%;
    height: 50px;
    min-height: inherit;
}

.fixed-plugin li.button-container{
    height: auto;
}
.fixed-plugin li.button-container div{
    margin-bottom: 5px;
}

.fixed-plugin #sharrreTitle{
    text-align: center;
    padding: 10px 0;
    height: 50px;
}

.fixed-plugin li.header-title{
    height: 30px;
    line-height: 25px;
    font-size: 12px;
    font-weight: 600;
    text-align: center;
    text-transform: uppercase;
}

.fixed-plugin .adjustments-line p{
    float: left;
    display: inline-block;
    margin-bottom: 0;
    font-size: 1em;
    color: #3C4858;
}

.fixed-plugin .adjustments-line a .badge-colors{
    position: relative;
    top: -2px;
}

.fixed-plugin .adjustments-line .togglebutton{
    float: right;
}

.fixed-plugin .adjustments-line .togglebutton .toggle{
    margin-right: 0;
}

.fixed-plugin .dropdown-menu > li.adjustments-line > a{
      padding-right: 0;
      padding-left: 0;
      border-bottom: 1px solid #ddd;
      border-radius: 0;
      margin: 0;
}
.fixed-plugin .dropdown-menu > li > a.img-holder{
      font-size: 16px;
      text-align: center;
      border-radius: 10px;
      background-color: #FFF;
      border: 3px solid #FFF;
      padding-left: 0;
      padding-right: 0;
      opacity: 1;
      cursor: pointer;
      max-height: 100px;
      overflow: hidden;
      padding: 0;
}

.fixed-plugin .dropdown-menu > li > a.switch-trigger:hover,
.fixed-plugin .dropdown-menu > li > a.switch-trigger:focus{
    background-color: transparent;
}
.fixed-plugin .dropdown-menu > li:hover > a.img-holder,
.fixed-plugin .dropdown-menu > li:focus > a.img-holder{
    border-color: rgba(0, 187, 255, 0.53);;
}
.fixed-plugin .dropdown-menu > .active > a.img-holder,
.fixed-plugin .dropdown-menu > .active > a.img-holder{
    border-color: #00bbff;
    background-color: #FFFFFF;
}

.fixed-plugin .dropdown-menu > li > a img{
    margin-top: auto;
}

.fixed-plugin .btn-social{
    width: 50%;
    display: block;
    width: 48%;
    float: left;
    font-weight: 600;
}
.fixed-plugin .btn-social i{
    margin-right: 5px;
}
.fixed-plugin .btn-social:first-child{
    margin-right: 2%;
}

.fixed-plugin .dropdown .dropdown-menu{
     -webkit-transform: translateY(-15%);
     -moz-transform: translateY(-15%);
     -o-transform: translateY(-15%);
     -ms-transform: translateY(-15%);
     transform: translateY(-15%);
     top: 27px;
     opacity: 0;

     transform-origin: 0 0;
}
.fixed-plugin .dropdown.open .dropdown-menu{
     opacity: 1;

     -webkit-transform: translateY(-13%);
     -moz-transform: translateY(-13%);
     -o-transform: translateY(-13%);
     -ms-transform: translateY(-13%);
     transform: translateY(-13%);

     transform-origin: 0 0;
}

.fixed-plugin .dropdown-menu:before,
.fixed-plugin .dropdown-menu:after{
    content: "";
    display: inline-block;
    position: absolute;
    top: 78px;
    width: 16px;
    transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);

}
.fixed-plugin .dropdown-menu:before{
    border-bottom: 16px solid rgba(0, 0, 0, 0);
    border-left: 16px solid rgba(0,0,0,0.2);
    border-top: 16px solid rgba(0,0,0,0);
    right: -17px;
}

.fixed-plugin .dropdown-menu:after{
    border-bottom: 16px solid rgba(0, 0, 0, 0);
    border-left: 16px solid #FFFFFF;
    border-top: 16px solid rgba(0,0,0,0);
    right: -16px;
}

.fixed-plugin{
    top: 120px;
}
</style>
@endsection
@section('content')
<div class="article container body-white">
    <div class="row">
        <main class="col-lg-12">
            <div class="float-left action__social">
                <div class="links fixed-link">
                    <ul class="list-unstyled">
                        <li>
                            <vote></vote>
                            {{-- @if(Auth::guest())
                                <clap article-id="{{ $article->id }}" api="article" vote-count="{{ $article->countUpVoters() }}"></clap>
                            @else
                                <clap article-id="{{ $article->id }}" api="article" vote-count="" can-vote></clap>
                            @endif --}}
                        </li>
                        <li><a href="#"><i class="fas fa-bookmark"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="detail--post">
                <div class="container center-content__800px mt-4 mb-4">
                    <div class="row">
                        <div class="ml-3 w-60 d-flex align-items-center">
                            <a href="/user/{{ $article->user->name }}">
                                <img src="{{ $article->user->avatar }}" alt="{{ $article->user->name }}" class="avatar__60px align-middle">
                            </a>
                        </div>
                        <div class="col">
                            <div class="text-small text-small__black">
                                <a href="/user/{{ $article->user->name }}" class="author-name">
                                    {{ $article->user->name or 'No Name' }}
                                </a>
                            </div>
                            <div class="text-small text-light__grey truncate-line__2">
                                Software Developer and Medium fan.
                            </div>
                            <div class="text-small text-light__grey truncate-line__1">
                                <a href="#">
                                    {{ $article->published_at->diffForHumans() }}
                                </a>
                                <span>&middot;</span>
                                <a href="#">
                                    8 min read
                                </a>
                                <span>&middot;</span>
                                <a href="">
                                    <i class="far fa-eye"></i> {{ $article->getViews() }}
                                </a>
                                <span>&middot;</span>
                                <a href="">
                                    <i class="far fa-comment-alt"></i> {{ $article->comments_count }}
                                </a>
                            </div>
                            <div class="card__share">
                                <div class="card__social">
                                    <a class="share-icon edit" href="#"><span class="fas fa-pencil-alt"></span></a>
                                    <a class="share-icon delete" href="#"><span class="fas fa-trash-alt"></span></a>
                                    <a class="share-icon report" href="#"><span class="fas fa-flag"></span></a>
                                </div>
                                <a id="share" class="share-toggle action-toggle share-icon" href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container center-content__800px mb-4">
                    <h1>{{ $article->title }}</h1>
                    @if($article->category_id)
                        <a href="{{ url('category', ['name' => $article->category->name]) }}" class="topic--post"> {{ $article->category->name }}</a>
                    @endif
                    <div class="markdown ql-editor">
                        {!! $article->content['html'] !!}
                    </div>
                    <div class="mb__20"></div>
                    <div class="display__inline">
                        @if(count($article->tags))
                            <span class="post-tags">
                                @foreach($article->tags as $tag)
                                <a href="{{ url('tag', ['tag' => $tag->tag]) }}" class="tag">#{{ $tag->tag }}</a>
                                @endforeach
                            </span>
                        @endif
                        @if(config('blog.social_share.article_share'))
                            <span class="float-right">
                                <div class="social-share" data-title="{{ $article->title }}" data-description="{{ $article->title }}" {{ config('blog.social_share.sites') ? "data-sites=" . config('blog.social_share.sites') : '' }} {{ config('blog.social_share.mobile_sites') ? "data-mobile-sites=" . config('blog.social_share.mobile_sites') : '' }} initialized>
                                </div>
                            </span>
                        @endif
                    </div>
                    <!-- comment -->
                    @if(Auth::guest())
                        <comment title="You must be logged to add a comment !" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" null-text="">
                        </comment>
                    @else
                        <comment title="Bình luận" username="{{ Auth::user()->name }}" user-avatar="{{ Auth::user()->avatar }}" commentable-type="articles" commentable-id="{{ $article->id }}" comment-number="{{ $article->comments_count }}" null-text="" can-comment>
                        </comment>
                    @endif
                </div>
            </div>
            {{-- <div class="float-right author__more">
                <div class="trailing">
                    <div class="box is-expose" id="popup-box">
                        <a class="box-close float-right" href="#">×</a><br>
                        <div class="author-subscribe">
                            <div class="author">
                                <a class="avatar" href="/nguoi-dung/Huskywannafly">
                                    <img alt="avatar" src="https://s3-ap-southeast-1.amazonaws.com/img.spiderum.com/sp-xs-avatar/e22f6990295011e7a999e7b5135b7d88.jpg">
                                </a>
                                <div class="title">
                                    <a class="display-name" href="/nguoi-dung/Huskywannafly">
                                        Huskywannafly
                                    </a>
                                    <div class="nickname">@Huskywannafly</div>
                                </div>
                                <div class="action">
                                    <a class="btn btn-round btn-default btn-follow" title="Theo dõi Huskywannafly">
                                        Theo dõi
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div id="suggested-post">
                                <h3 class="heading">Bài đăng khác</h3>
                                <!---->
                                <ul class="list-article list-unstyled clearfix">
                                    <!---->
                                    <li class="item-article">
                                        <a class="block" fragment="suggested" href="/bai-dang/Tai-sao-khong-nen-doc-sach-self-help-6jw#suggested">
                                            <h6 class="title">Căn bệnh ung thư mang tên Self-help</h6>
                                        </a>
                                    </li>
                                    <li class="item-article">
                                        <a class="block" fragment="suggested" href="/bai-dang/Ve-Can-benh-ung-thu-mang-ten-Self-help-6k3#suggested">
                                            <h6 class="title">Về: "Căn bệnh ung thư mang tên Self-help"</h6>
                                        </a>
                                    </li>
                                    <li class="item-article">
                                        <a class="block" fragment="suggested" href="/bai-dang/Den-Spiderum-de-nghe-su-bat-dong-6km#suggested">
                                            <h6 class="title">Đến Spiderum để nghe ý kiến trái chiều</h6>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!---->
                    </div>
                </div>
            </div> --}}
            
            <div class="fixed-plugin">
                <div class="dropdown show-dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="fa fa-cog fa-2x"> </i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header-title"> Sidebar Filters</li>
                        <li class="adjustments-line">
                            <a href="javascript:void(0)" class="switch-trigger active-color">
                                <div class="badge-colors text-center">
                                    <span class="badge filter badge-purple" data-color="purple"></span>
                                    <span class="badge filter badge-blue" data-color="blue"></span>
                                    <span class="badge filter badge-green" data-color="green"></span>
                                    <span class="badge filter badge-orange" data-color="orange"></span>
                                    <span class="badge filter badge-red" data-color="red"></span>
                                    <span class="badge filter badge-rose active" data-color="rose"></span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li class="header-title">Sidebar Background</li>
                        <li class="adjustments-line">
                            <a href="javascript:void(0)" class="switch-trigger background-color">
                                <div class="text-center">
                                    <span class="badge filter badge-white" data-color="white"></span>
                                    <span class="badge filter badge-black active" data-color="black"></span>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li class="adjustments-line">
                            <a href="javascript:void(0)" class="switch-trigger">
                                <p>Sidebar Mini</p>
                                <div class="togglebutton switch-sidebar-mini">
                                    <label>
                                        <input type="checkbox" unchecked="">
                                    </label>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li class="adjustments-line">
                            <a href="javascript:void(0)" class="switch-trigger">
                                <p>Sidebar Image</p>
                                <div class="togglebutton switch-sidebar-image">
                                    <label>
                                        <input type="checkbox" checked="">
                                    </label>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </li>
                        <li class="header-title">Images</li>
                        <li class="active">
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../assets/img/sidebar-1.jpg" alt="" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../assets/img/sidebar-2.jpg" alt="" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../assets/img/sidebar-3.jpg" alt="" />
                            </a>
                        </li>
                        <li>
                            <a class="img-holder switch-trigger" href="javascript:void(0)">
                                <img src="../assets/img/sidebar-4.jpg" alt="" />
                            </a>
                        </li>
                        <li class="button-container">
                            <div class="">
                                <a href="http://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-rose btn-block">Buy Now</a>
                            </div>
                            <div class="">
                                <a href="http://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-info btn-block">Get Free Demo</a>
                            </div>
                        </li>
                        <li class="header-title">Thank you for 95 shares!</li>
                        <li class="button-container">
                            <button id="twitter" class="btn btn-social btn-twitter btn-round"><i class="fa fa-twitter"></i> &middot; 45</button>
                            <button id="facebook" class="btn btn-social btn-facebook btn-round"><i class="fa fa-facebook-square"> &middot;</i>50</button>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>
    <div class="pb__100"></div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
    // $sidebar = $('.sidebar');
    // $sidebar_img_container = $sidebar.find('.sidebar-background');

    // $full_page = $('.full-page');

    // $sidebar_responsive = $('body > .navbar-collapse');

    // window_width = $(window).width();

    // fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

    // if( window_width > 767 && fixed_plugin_open == 'Dashboard' ){
    //     if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
             $('.fixed-plugin .dropdown').addClass('open');
    //     }

    // }
    $('.fixed-plugin .dropdown').addClass('open');

    $('.fixed-plugin a').click(function(event){
      // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
        // if($(this).hasClass('switch-trigger')){
        //     if(event.stopPropagation){
        //         event.stopPropagation();
        //     }
        //     else if(window.event){
        //        window.event.cancelBubble = true;
        //     }
        // }
    });

    // $('.fixed-plugin .active-color span').click(function(){
    //     $full_page_background = $('.full-page-background');

    //     $(this).siblings().removeClass('active');
    //     $(this).addClass('active');

    //     var new_color = $(this).data('color');

    //     if($sidebar.length != 0){
    //         $sidebar.attr('data-active-color',new_color);
    //     }

    //     if($full_page.length != 0){
    //         $full_page.attr('filter-color',new_color);
    //     }

    //     if($sidebar_responsive.length != 0){
    //         $sidebar_responsive.attr('data-color',new_color);
    //     }
    // });

    // $('.fixed-plugin .background-color span').click(function(){
    //     $(this).siblings().removeClass('active');
    //     $(this).addClass('active');

    //     var new_color = $(this).data('color');

    //     if($sidebar.length != 0){
    //         $sidebar.attr('data-background-color',new_color);
    //     }
    // });

    // $('.fixed-plugin .img-holder').click(function(){
    //     $full_page_background = $('.full-page-background');

    //     $(this).parent('li').siblings().removeClass('active');
    //     $(this).parent('li').addClass('active');


    //     var new_image = $(this).find("img").attr('src');

    //     if( $sidebar_img_container.length !=0 && $('.switch-sidebar-image input:checked').length != 0 ){
    //         $sidebar_img_container.fadeOut('fast', function(){
    //            $sidebar_img_container.css('background-image','url("' + new_image + '")');
    //            $sidebar_img_container.fadeIn('fast');
    //         });
    //     }

    //     if($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0 ) {
    //         var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

    //         $full_page_background.fadeOut('fast', function(){
    //            $full_page_background.css('background-image','url("' + new_image_full_page + '")');
    //            $full_page_background.fadeIn('fast');
    //         });
    //     }

    //     if( $('.switch-sidebar-image input:checked').length == 0 ){
    //         var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
    //         var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

    //         $sidebar_img_container.css('background-image','url("' + new_image + '")');
    //         $full_page_background.css('background-image','url("' + new_image_full_page + '")');
    //     }

    //     if($sidebar_responsive.length != 0){
    //         $sidebar_responsive.css('background-image','url("' + new_image + '")');
    //     }
    // });
})
</script>
@endsection
