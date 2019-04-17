@extends('layouts.app')
@section('styles')
<style>
.container--profile {
    max-width: 93.5rem;
    margin: 0 auto;
    padding-right: 40px !important;
}

/* Profile__detail Section */
.profile__detail {
    padding-top: 5rem;
    padding-bottom: 4rem;
}

.profile__detail::after {
    content: "";
    display: block;
    clear: both;
}

.profile__detail-image {
    float: left;
    width: 30%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.profile__detail-image img {
    border-radius: 50%;
}

.profile__detail-info {
    float: right;
    width: 70%;
}

.profile__detail-user-name {
    display: inline-block;
    font-size: 3.1rem;
    font-weight: 300;
}

.profile__nickname {
    margin-bottom: 15px;
    color: #666;
    font-size: 1.5rem;
    line-height: 1.8;
    margin-left: 2rem;
}

.profile__detail-stats {
    margin-top: -10px;
}

.profile__detail-stats li {
    display: inline-block;
    font-size: 1.2rem;
    line-height: 1.5;
    margin-right: 4rem;
    cursor: pointer;
}

.profile__detail-stats li:last-of-type {
    margin-right: 0;
}

.profile__detail-bio {
    font-size: 1.2rem;
    font-weight: 400;
    line-height: 1.5;
    margin-top: 10px;
}

.profile__detail-real-name,
.profile__detail-stat-count,
.profile__detail-edit-btn {
    font-weight: 600;
}

/* Media Query */

@media screen and (max-width: 994px) {
    .container--profile {
        padding-right: 0 !important;
    }

    .char--statistic {
        display: none;
    }

    .author--info {
        width: 100% !important;
        margin-left: 20px;
    }


    .profile__detail-edit-btn {
        font-size: 0.8rem;
    }

    .profile__detail-settings-btn {
        font-size: 1rem;
    }

    .profile__detail-stats li {
        font-size: 1.1rem;
    }
}

@media screen and (max-width: 770px) {
    .container--profile {
        margin: 0px -70px;
    }

    .profile__detail-user-name {
        font-size: 2.7rem;
    }

    .profile__detail-stats li {
        font-size: 1rem;
    }

    .profile__detail-bio {
        font-size: 1.1rem;
    }
}

.vote {
    position: absolute;
    text-align: center;
}

.chart {
    position: absolute;
    width: 230px;
    height: 230px;
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
</style>
@endsection
@section('content')
<div class="container">
    <header>
        <div class="container--profile">
            <div class="profile__detail">
                <div class="profile__detail-image" style="margin-top: 30px;">
                    <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" alt="">
                </div>
                <div class="profile__detail-info">
                    <div class="author--info" style="width: 60%; float: left; margin-top: 20px;">
                        <div class="profile__detail-user-settings">
                            <h1 class="profile__detail-user-name">janedoe_</h1>
                            <span class="profile__nickname">( trantrongbinh )</span>
                        </div>
                        <div class="profile__detail-stats">
                            <ul>
                                <li><span class="profile__detail-stat-count">164</span> posts</li>
                                <li><span class="profile__detail-stat-count">188</span> followers</li>
                                <li><span class="profile__detail-stat-count">206</span> following</li>
                            </ul>   
                        </div>
                        <div class="profile__detail-bio">
                            <p><span class="profile__detail-real-name">Jane Doe</span> Lorem ipsum dolor sit, amet consectetur adipisicing elit Lorem ipsum dolor sit, amet consectetur adipisicing elit Lorem ipsum dolor sit, amet consectetur adipisicing elit</p>
                        </div>
                    </div>
                    <div class="char--statistic" style="width: 30%; float: right; position: relative;">
                        <div id="doughnutChart" class="chart"></div>
                    </div>
                </div>
            </div>
            <!-- End of profile__detail section -->
        </div>
        <!-- End of container -->
    </header>
    <div style="position: relative; display: inline-block;">
        <div style="width: 23%; float: left;" class="is-topPosition">
            <div style="margin-left: 20%; padding: 0 20px;" >
                <div class="text-center" style="padding-top: 20px;">
                    <button class="form-control">Follow</button>
                </div>
                <div class="panel-thumbnails text-center" style="padding-top: 20px;">
                    <a href="" class="btn btn-info btn-twitter btn-sm"><i class="fab fa-twitter"></i></a>
                    <a rel="publisher" href="" class="btn btn-danger btn-sm"><i class="fab fa-github"></i></a>
                    <a rel="publisher" href="" class="btn btn-info btn-sm"><i class="fab fa-facebook-square"></i></a>
                    <a rel="publisher" href="" class="btn btn-warning btn-sm"><i class="fab fa-stack-overflow"></i></a>
                </div><br>
                <ul class="list-unstyled">
                    <li>
                        <a href="https://facebook.com" target="_blank"><i class="fas fa-globe"></i>&nbsp&nbsp FS-Focus.com</a>
                    </li>
                    <li>
                        <a href="#" target="_blank"><i class="fas fa-map-marker-alt"></i>&nbsp&nbsp Hai Duong</a>
                    </li>
                    <li>
                        <a href="https://github.com" target="_blank"><i class="far fa-envelope"></i>&nbsp&nbsp tranbinhbak@gmail.com</a>
                    </li>
                </ul>
                <!-- <div class="text-center" style="padding-top: 10px;">
                    <button class="form-control">Edit</button>
                </div> -->
                <hr>
                <div class="panel-thumbnails">
                    <h6>Organizations</h6>
                    <div class="">
                        <a href="" >
                            <img src="https://lorempixel.com/640/480/?10139" alt="Team avatar" class="img-fluid" style="width: 40px; height: 40px; border-radius: 3px;">
                        </a>&nbsp&nbsp
                        <a href="" >
                            <img src="https://avatars2.githubusercontent.com/u/37802322?s=70&v=4" alt="Team avatar" class="img-fluid" style="width: 40px; height: 40px; border-radius: 3px;">
                        </a>&nbsp&nbsp
                        <a href="" >
                            <img src="https://avatars3.githubusercontent.com/u/37947030?s=70&v=4" alt="Team avatar" class="img-fluid" style="width: 40px; height: 40px; border-radius: 3px;">
                        </a>&nbsp&nbsp
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="container" style="width: 77%; float: right; padding: 0 70px">
            <div class="card-header p-2" style="border-bottom: none !important; background-color: #fff !important;">
                <ul class="nav nav-pills row justify-content-center align-self-center">
                    <li class="nav-item"><a href="#recent-articles" data-toggle="tab" class="nav-link active">Recent Articles</a></li>
                    <li class="nav-item"><a href="#recent-discussions" data-toggle="tab" class="nav-link">Recent Discussions</a></li>
                    <li class="nav-item"><a href="#recent-comments" data-toggle="tab" class="nav-link">Recent Comments</a></li>
                </ul>
            </div>
            <div class="container card-body">
                <div class="tab-content">
                    <div id="recent-articles" class="active tab-pane">
                        <div id="featured-posts">
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
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/es6-beyond-syntax-1-s4smt" class="card__image background__cover" style="background-image: url(&quot;http://localhost:8080/uploads/article/2019/04/08/sD1uPN3BBQPsSfrBbeQ4YcHS7mncX165uJfk4Wg0.png&quot;);"></a>
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
                                            <h3 class="h4"><a href="http://localhost:8080/es6-beyond-syntax-1-s4smt">ES6 &amp; Beyond - Syntax Phần 1.</a></h3>
                                            <p class="card__desc"></p>
                                        </article>
                                        <div class="tag--v2">
                                            <ul>
                                                <li><a href="http://localhost:8080/tag/est">est</a><span>20</span></li>
                                                <li><a href="http://localhost:8080/tag/incidunt">incidunt</a><span>20</span></li>
                                                <li><a href="http://localhost:8080/tag/iure">iure</a><span>20</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card__action">
                                    <div class="card__author">
                                        <figure class="profile--author profile--author__left" style="display: inline;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAAD/CAIAAACxapedAAAABnRSTlMAAAAAAABupgeRAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAC2klEQVR4nO3UQQ0CQRBFQZYgBGkjbaSNlDUAJJz68KoU/HRe+jprPyDpOT0AxqifLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXT9Zoe8Mt7r+kJH5y1pyd85WJ/8fvpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpus7a0xtght9Pl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+um59kwu/3+ks+QAAAABJRU5ErkJggg==" alt="undefine">
                                            <div class="card__author-content">
                                                By <a href="/user/undefine">undefine</a></div>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 33</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 0</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/24/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/phong-van-o-sillicon-valley-phan-2-happy-ending-oqvot" class="card__image background__cover" style="background-image: url(&quot;https://1.bp.blogspot.com/-vtWhYkX68Qg/XJSiW6UaCOI/AAAAAAAADek/57w39VOVmvIs6eZE2Rr5PT-7-t5OFLyHACLcBGAs/s640/Snap%2B2019-03-22%2Bat%2B15.52.16.png&quot;);"></a>
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
                                            <h3 class="h4"><a href="http://localhost:8080/phong-van-o-sillicon-valley-phan-2-happy-ending-oqvot">Phỏng vấn ở Sillicon Valley phần 2 - Happy Ending</a></h3>
                                            <p class="card__desc"></p>
                                        </article>
                                        <div class="tag--v2">
                                            <ul>
                                                <li><a href="http://localhost:8080/tag/incidunt">incidunt</a><span>20</span></li>
                                                <li><a href="http://localhost:8080/tag/iure">iure</a><span>20</span></li>
                                                <li><a href="http://localhost:8080/tag/doloremque">doloremque</a><span>20</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card__action">
                                    <div class="card__author">
                                        <figure class="profile--author profile--author__left" style="display: inline;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAAD/CAIAAACxapedAAAABnRSTlMAAAAAAABupgeRAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAC2klEQVR4nO3UQQ0CQRBFQZYgBGkjbaSNlDUAJJz68KoU/HRe+jprPyDpOT0AxqifLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXT9Zoe8Mt7r+kJH5y1pyd85WJ/8fvpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpus7a0xtght9Pl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+um59kwu/3+ks+QAAAABJRU5ErkJggg==" alt="undefine">
                                            <div class="card__author-content">
                                                By <a href="/user/undefine">undefine</a></div>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 5</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 0</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/26/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/programmers-need-a-hippocratic-oath-39j29" class="card__image background__cover" style="background-image: url(&quot;https://cdn-images-1.medium.com/max/2400/1*NWI0QIxl_7E2ecejMGCs6w.jpeg&quot;);"></a>
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
                                        <div class="card__meta"><a href="http://localhost:8080/category/Prof.%20Sylvan%20Purdy" class="topic"> Prof. Sylvan Purdy</a> <time><i class="far fa-clock"></i> 1 week ago</time> <span class="readingTime">5 min read</span></div>
                                        <article class="card__article">
                                            <h3 class="h4"><a href="http://localhost:8080/programmers-need-a-hippocratic-oath-39j29">Programmers Need a Hippocratic Oath</a></h3>
                                            <p class="card__desc"></p>
                                        </article>
                                        <div class="tag--v2">
                                            <ul>
                                                <li><a href="http://localhost:8080/tag/incidunt">incidunt</a><span>20</span></li>
                                                <li><a href="http://localhost:8080/tag/doloremque">doloremque</a><span>20</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card__action">
                                    <div class="card__author">
                                        <figure class="profile--author profile--author__left" style="display: inline;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP8AAAD/CAIAAACxapedAAAABnRSTlMAAAAAAABupgeRAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAC2klEQVR4nO3UQQ0CQRBFQZYgBGkjbaSNlDUAJJz68KoU/HRe+jprPyDpOT0AxqifLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXTpX661E+X+ulSP13qp0v9dKmfLvXT9Zoe8Mt7r+kJH5y1pyd85WJ/8fvpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpus7a0xtght9Pl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+utRPl/rpUj9d6qdL/XSpny7106V+um59kwu/3+ks+QAAAABJRU5ErkJggg==" alt="undefine">
                                            <div class="card__author-content">
                                                By <a href="/user/undefine">undefine</a></div>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 7</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 3</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/23/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/a-beginners-guide-to-machine-learning-usuvp" class="card__image background__cover" style="background-image: url(&quot;https://cdn-images-1.medium.com/max/1200/1*XTlbTlMzDmr_zd86oX4PTw.jpeg&quot;);"></a>
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
                                        <div class="card__meta"><a href="http://localhost:8080/category/Ms.%20Abigail%20Jacobi" class="topic"> Ms. Abigail Jacobi</a> <time><i class="far fa-clock"></i> 2 weeks ago</time> <span class="readingTime">5 min read</span></div>
                                        <article class="card__article">
                                            <h3 class="h4"><a href="http://localhost:8080/a-beginners-guide-to-machine-learning-usuvp">A Beginner’s Guide to Machine Learning</a></h3>
                                            <p class="card__desc"></p>
                                        </article>
                                        <div class="tag--v2">
                                            <ul>
                                                <li><a href="http://localhost:8080/tag/est">est</a><span>20</span></li>
                                                <li><a href="http://localhost:8080/tag/doloremque">doloremque</a><span>20</span></li>
                                                <li><a href="http://localhost:8080/tag/molestiae">molestiae</a><span>20</span></li>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 41</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 1</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/21/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/ut-ullam-sunt-fugiat-est-ut-minima-nemo-mnw6n" class="card__image background__cover" style="background-image: url(&quot;https://lorempixel.com/640/480/?83175&quot;);"></a>
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
                                        <div class="card__meta"><a href="http://localhost:8080/category/Virgie%20Moen" class="topic"> Virgie Moen</a> <time><i class="far fa-clock"></i> 3 weeks ago</time> <span class="readingTime">5 min read</span></div>
                                        <article class="card__article">
                                            <h3 class="h4"><a href="http://localhost:8080/ut-ullam-sunt-fugiat-est-ut-minima-nemo-mnw6n">Algorithm Implementation Roadmap</a></h3>
                                            <p class="card__desc">Ab qui possimus natus eligendi ratione nulla.</p>
                                        </article>
                                    </div>
                                </div>
                                <div class="card__action">
                                    <div class="card__author">
                                        <figure class="profile--author profile--author__left" style="display: inline;"><img src="/images/default.png" alt="Dr. Barney Stiedemann">
                                            <div class="card__author-content">
                                                By <a href="/user/Dr. Barney Stiedemann">Dr. Barney Stiedemann</a></div>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 8</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 3</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/6/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/laborum-magni-eum-eaque-unde-et-qxhkw" class="card__image background__cover" style="background-image: url(&quot;https://lorempixel.com/640/480/?22597&quot;);"></a>
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
                                        <div class="card__meta"><a href="http://localhost:8080/category/Aida%20Thompson" class="topic"> Aida Thompson</a> <time><i class="far fa-clock"></i> 3 weeks ago</time> <span class="readingTime">5 min read</span></div>
                                        <article class="card__article">
                                            <h3 class="h4"><a href="http://localhost:8080/laborum-magni-eum-eaque-unde-et-qxhkw">Laborum magni eum eaque unde et.</a></h3>
                                            <p class="card__desc">Ex officiis laborum laborum voluptatem voluptate quis sint provident.</p>
                                        </article>
                                    </div>
                                </div>
                                <div class="card__action">
                                    <div class="card__author">
                                        <figure class="profile--author profile--author__left" style="display: inline;"><img src="/images/default.png" alt="Dr. Kole Heller">
                                            <div class="card__author-content">
                                                By <a href="/user/Dr. Kole Heller">Dr. Kole Heller</a></div>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 1</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 4</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/9/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/deserunt-ut-repellat-et-et-occaecati-quidem-cumque-totam-84tse" class="card__image background__cover" style="background-image: url(&quot;https://lorempixel.com/640/480/?59584&quot;);"></a>
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
                                        <div class="card__meta"><a href="http://localhost:8080/category/Ross%20Gerhold" class="topic"> Ross Gerhold</a> <time><i class="far fa-clock"></i> 3 weeks ago</time> <span class="readingTime">5 min read</span></div>
                                        <article class="card__article">
                                            <h3 class="h4"><a href="http://localhost:8080/deserunt-ut-repellat-et-et-occaecati-quidem-cumque-totam-84tse">Deserunt ut repellat et et occaecati quidem cumque totam.</a></h3>
                                            <p class="card__desc">Omnis incidunt voluptatem debitis aut.</p>
                                        </article>
                                    </div>
                                </div>
                                <div class="card__action">
                                    <div class="card__author">
                                        <figure class="profile--author profile--author__left" style="display: inline;"><img src="/images/default.png" alt="Barry Lesch">
                                            <div class="card__author-content">
                                                By <a href="/user/Barry Lesch">Barry Lesch</a></div>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 1</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 2</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/4/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/officiis-iste-harum-numquam-labore-lms2u" class="card__image background__cover" style="background-image: url(&quot;https://lorempixel.com/640/480/?67522&quot;);"></a>
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
                                        <div class="card__meta"><a href="http://localhost:8080/category/Prof.%20Brandt%20Blanda" class="topic"> Prof. Brandt Blanda</a> <time><i class="far fa-clock"></i> 1 month ago</time> <span class="readingTime">5 min read</span></div>
                                        <article class="card__article">
                                            <h3 class="h4"><a href="http://localhost:8080/officiis-iste-harum-numquam-labore-lms2u">Officiis iste harum numquam labore.</a></h3>
                                            <p class="card__desc">Atque temporibus distinctio ut voluptate consectetur.</p>
                                        </article>
                                    </div>
                                </div>
                                <div class="card__action">
                                    <div class="card__author">
                                        <figure class="profile--author profile--author__left" style="display: inline;"><img src="/images/default.png" alt="Jon Bergnaum DVM">
                                            <div class="card__author-content">
                                                By <a href="/user/Jon Bergnaum DVM">Jon Bergnaum DVM</a></div>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 1</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 2</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/14/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/ut-quae-reiciendis-ad-occaecati-eaque-quia-consequatur-enim-et-qui-aliquid-wovps" class="card__image background__cover" style="background-image: url(&quot;https://lorempixel.com/640/480/?87767&quot;);"></a>
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
                                        <div class="card__meta"><a href="http://localhost:8080/category/Kim%20Morar%20DDS" class="topic"> Kim Morar DDS</a> <time><i class="far fa-clock"></i> 1 month ago</time> <span class="readingTime">5 min read</span></div>
                                        <article class="card__article">
                                            <h3 class="h4"><a href="http://localhost:8080/ut-quae-reiciendis-ad-occaecati-eaque-quia-consequatur-enim-et-qui-aliquid-wovps">TTB</a></h3>
                                            <p class="card__desc">Ut laboriosam molestiae iure vero cumque odio vero.</p>
                                        </article>
                                    </div>
                                </div>
                                <div class="card__action">
                                    <div class="card__author">
                                        <figure class="profile--author profile--author__left" style="display: inline;"><img src="/images/default.png" alt="admin">
                                            <div class="card__author-content">
                                                By <a href="/user/admin">admin</a></div>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 0</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 1</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/17/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/hic-quia-sed-velit-aut-incidunt-dolor-occaecati-iusto-qui-cs9wo" class="card__image background__cover" style="background-image: url(&quot;https://lorempixel.com/640/480/?44171&quot;);"></a>
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
                                        <div class="card__meta"><a href="http://localhost:8080/category/Kim%20Morar%20DDS" class="topic"> Kim Morar DDS</a> <time><i class="far fa-clock"></i> 1 month ago</time> <span class="readingTime">5 min read</span></div>
                                        <article class="card__article">
                                            <h3 class="h4"><a href="http://localhost:8080/hic-quia-sed-velit-aut-incidunt-dolor-occaecati-iusto-qui-cs9wo">Hic quia sed velit aut incidunt dolor occaecati iusto qui.</a></h3>
                                            <p class="card__desc">Molestiae vero ut id et totam.</p>
                                        </article>
                                    </div>
                                </div>
                                <div class="card__action">
                                    <div class="card__author">
                                        <figure class="profile--author profile--author__left" style="display: inline;"><img src="/images/default.png" alt="Lou Blick">
                                            <div class="card__author-content">
                                                By <a href="/user/Lou Blick">Lou Blick</a></div>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 0</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 1</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/15/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/molestias-quae-voluptatem-omnis-gfwdv" class="card__image background__cover" style="background-image: url(&quot;https://lorempixel.com/640/480/?32418&quot;);"></a>
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
                                        <div class="card__meta"><a href="http://localhost:8080/category/Prof.%20Brandt%20Blanda" class="topic"> Prof. Brandt Blanda</a> <time><i class="far fa-clock"></i> 1 month ago</time> <span class="readingTime">5 min read</span></div>
                                        <article class="card__article">
                                            <h3 class="h4"><a href="http://localhost:8080/molestias-quae-voluptatem-omnis-gfwdv">Molestias quae voluptatem omnis.</a></h3>
                                            <p class="card__desc">Sed qui quod delectus fuga saepe adipisci.</p>
                                        </article>
                                    </div>
                                </div>
                                <div class="card__action">
                                    <div class="card__author">
                                        <figure class="profile--author profile--author__left" style="display: inline;"><img src="/images/default.png" alt="admin">
                                            <div class="card__author-content">
                                                By <a href="/user/admin">admin</a></div>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 0</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 0</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/12/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/velit-maiores-cum-totam-repellat-laborum-temporibus-dolor-tenetur-sed-assumenda-occaecati-z3l88" class="card__image background__cover" style="background-image: url(&quot;https://lorempixel.com/640/480/?70499&quot;);"></a>
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
                                        <div class="card__meta"><a href="http://localhost:8080/category/Aida%20Thompson" class="topic"> Aida Thompson</a> <time><i class="far fa-clock"></i> 1 month ago</time> <span class="readingTime">5 min read</span></div>
                                        <article class="card__article">
                                            <h3 class="h4"><a href="http://localhost:8080/velit-maiores-cum-totam-repellat-laborum-temporibus-dolor-tenetur-sed-assumenda-occaecati-z3l88">Velit maiores cum totam repellat laborum temporibus dolor tenetur sed assumenda occaecati.</a></h3>
                                            <p class="card__desc">Sunt veniam qui et ut voluptatem.</p>
                                        </article>
                                    </div>
                                </div>
                                <div class="card__action">
                                    <div class="card__author">
                                        <figure class="profile--author profile--author__left" style="display: inline;"><img src="/images/default.png" alt="Lou Blick">
                                            <div class="card__author-content">
                                                By <a href="/user/Lou Blick">Lou Blick</a></div>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 0</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 1</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/2/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/eveniet-reprehenderit-sint-exercitationem-sunt-hic-et-recusandae-dp0ch" class="card__image background__cover" style="background-image: url(&quot;https://lorempixel.com/640/480/?67406&quot;);"></a>
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
                                        <div class="card__meta"><a href="http://localhost:8080/category/Amari%20Hintz%20IV" class="topic"> Amari Hintz IV</a> <time><i class="far fa-clock"></i> 1 month ago</time> <span class="readingTime">5 min read</span></div>
                                        <article class="card__article">
                                            <h3 class="h4"><a href="http://localhost:8080/eveniet-reprehenderit-sint-exercitationem-sunt-hic-et-recusandae-dp0ch">Eveniet reprehenderit sint exercitationem sunt hic et recusandae.</a></h3>
                                            <p class="card__desc">Occaecati incidunt id veritatis sed sunt perferendis.</p>
                                        </article>
                                    </div>
                                </div>
                                <div class="card__action">
                                    <div class="card__author">
                                        <figure class="profile--author profile--author__left" style="display: inline;"><img src="/images/default.png" alt="admin">
                                            <div class="card__author-content">
                                                By <a href="/user/admin">admin</a></div>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 0</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 0</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/7/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card radius shadowDepth1"><a href="http://localhost:8080/neque-qui-aqwui" class="card__image background__cover" style="background-image: url(&quot;https://lorempixel.com/640/480/?85136&quot;);"></a>
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
                                        <div class="card__meta"><a href="http://localhost:8080/category/Rosamond%20Marks" class="topic"> Rosamond Marks</a> <time><i class="far fa-clock"></i> 1 month ago</time> <span class="readingTime">5 min read</span></div>
                                        <article class="card__article">
                                            <h3 class="h4"><a href="http://localhost:8080/neque-qui-aqwui">Neque qui.</a></h3>
                                            <p class="card__desc">Est omnis voluptatum quia veniam qui.</p>
                                        </article>
                                    </div>
                                </div>
                                <div class="card__action">
                                    <div class="card__author">
                                        <figure class="profile--author profile--author__left" style="display: inline;"><img src="/images/default.png" alt="Prof. Ryan Fay DVM">
                                            <div class="card__author-content">
                                                By <a href="/user/Prof. Ryan Fay DVM">Prof. Ryan Fay DVM</a></div>
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
                                        <div class="float-right card__action-interactive"><a href="javascript:;" class="link-black interactive-view"><i class="far fa-eye"></i> 0</a> <a href="#" class="link-black interactive-comment"><i class="far fa-comment-alt"></i> 1</a> <a href="#" class="link-black interactive-bookmark"><i class="far fa-bookmark"></i> 2</a> <span><a href="javascript:;" data-toggle="dropdown" class="btn-tool"><i class="fas fa-ellipsis-h"></i></a>
                                                <div class="dropdown-menu"><a href="http://localhost:8080/article/11/edit" class="dropdown-item">Edit</a> <a href="#" class="dropdown-item">Delete</a></div>
                                            </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="recent-discussions" class="tab-pane posts-listing">
                        <div class="row d-flex align-items-stretch featured-posts post-list">
                            <div class="text col-lg-12">
                                <div class="text-inner d-flex align-items-center">
                                    <div class="content">
                                        <header class="post-header"><a href="http://localhost:8000/an-overview-of-key-breakthroughs-in-blockchain-technology-and-why-nakamoto-consensus-is-such-a-big-deal-l3mbr">
                                                <h3 class="h4">An overview of key breakthroughs in blockchain technology — and why Nakamoto Consensus is such a big deal</h3>
                                            </a></header>
                                        <div class="category"><a href="http://localhost:8000/tag/enim" class="text-blue">
                                                #enim &nbsp;
                                            </a> <a href="http://localhost:8000/tag/autem" class="text-blue">
                                                #autem &nbsp;
                                            </a></div>
                                        <p>Distributed systems can be difficult to understand, mainly because the knowledge surrounding them is distributed. But don’t worry, I’m well aware of the irony. While teaching myself distributed comput...</p>
                                        <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                            <div class="comments"><i aria-hidden="true" class="fa fa-user data-margin"></i>TRANTRONGBINH</div>
                                            <div class="date"><i class="far fa-clock"></i> 2 days ago
                                            </div>
                                            <div class="comments meta-last"><i class="fas fa-eye"></i> 2</div>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="recent-comments" class="tab-pane">
                        <div class="row d-flex align-items-stretch featured-posts post-list">
                            <div class="text col-lg-12">
                                <div class="text-inner d-flex align-items-center">
                                    <div class="content">
                                        <header class="post-header"><a href="http://localhost:8000/an-overview-of-key-breakthroughs-in-blockchain-technology-and-why-nakamoto-consensus-is-such-a-big-deal-l3mbr">
                                                <h3 class="h4">An overview of key breakthroughs in blockchain technology — and why Nakamoto Consensus is such a big deal</h3>
                                            </a></header>
                                        <div class="category"><a href="http://localhost:8000/tag/enim" class="text-blue">
                                                #enim &nbsp;
                                            </a> <a href="http://localhost:8000/tag/autem" class="text-blue">
                                                #autem &nbsp;
                                            </a></div>
                                        <p>Distributed systems can be difficult to understand, mainly because the knowledge surrounding them is distributed. But don’t worry, I’m well aware of the irony. While teaching myself distributed comput...</p>
                                        <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                            <div class="comments"><i aria-hidden="true" class="fa fa-user data-margin"></i>TRANTRONGBINH</div>
                                            <div class="date"><i class="far fa-clock"></i> 2 days ago
                                            </div>
                                            <div class="comments meta-last"><i class="fas fa-eye"></i> 2</div>
                                        </footer>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex align-items-stretch featured-posts post-list">
                            <div class="text col-lg-12">
                                <div class="text-inner d-flex align-items-center">
                                    <div class="content">
                                        <header class="post-header"><a href="http://localhost:8000/an-overview-of-key-breakthroughs-in-blockchain-technology-and-why-nakamoto-consensus-is-such-a-big-deal-l3mbr">
                                                <h3 class="h4">An overview of key breakthroughs in blockchain technology — and why Nakamoto Consensus is such a big deal</h3>
                                            </a></header>
                                        <div class="category"><a href="http://localhost:8000/tag/enim" class="text-blue">
                                                #enim &nbsp;
                                            </a> <a href="http://localhost:8000/tag/autem" class="text-blue">
                                                #autem &nbsp;
                                            </a></div>
                                        <p>Distributed systems can be difficult to understand, mainly because the knowledge surrounding them is distributed. But don’t worry, I’m well aware of the irony. While teaching myself distributed comput...</p>
                                        <footer class="post-footer d-flex align-items-center" style="font-size: 0.8em;">
                                            <div class="comments"><i aria-hidden="true" class="fa fa-user data-margin"></i>TRANTRONGBINH</div>
                                            <div class="date"><i class="far fa-clock"></i> 2 days ago
                                            </div>
                                            <div class="comments meta-last"><i class="fas fa-eye"></i> 2</div>
                                        </footer>
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
</div>
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