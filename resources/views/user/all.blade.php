@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset(mix('css/author.css')) }}">
<style>
.frame {
    border-radius: 10px;
    min-width: 270px;
    max-width: 300px;
    width: 100%;
    height: 260px;
    color: #786450;
    margin: 25px;
    /*background: #f8f8f8;*/
}

.center {
    width: 100%;
    overflow: hidden;
    height: 290px;
    border-bottom: 1px solid #dedede;
}

.profile--author {
    float: left;
    width: 170px;
    text-align: center;
}

.profile--author .image {
    position: relative;
    width: 70px;
    height: 70px;
    margin: 38px auto 0 auto;
}

.profile--author .image .circle-1,
.profile--author .image .circle-2 {
    position: absolute;
    box-sizing: border-box;
    width: 76px;
    height: 76px;
    top: -3px;
    left: -3px;
    border-width: 1px;
    border-style: solid;
    border-color: #786450 #786450 #786450 transparent;
    border-radius: 50%;
    transition: all 1.5s ease-in-out;
}

.profile--author .image .circle-2 {
    width: 82px;
    height: 82px;
    top: -6px;
    left: -6px;
    border-color: #786450 transparent #786450 #786450;
}

.profile--author .image img {
    display: block;
    border-radius: 50%;
    background: #f5e8df;
}

.profile--author .image:hover {
    cursor: pointer;
}

.profile--author .image:hover .circle-1,
.profile--author .image:hover .image .circle-2,
.profile--author .image .image:hover .circle-2 {
    transform: rotate(360deg);
}

.profile--author .image:hover .circle-2 {
    transform: rotate(-360deg);
}

.profile--author .name {
    font-size: 15px;
    font-weight: 600;
    margin-top: 20px;
}

.profile--author .job {
    font-size: 11px;
    line-height: 15px;
}

.profile--author .actions {
    margin-top: 33px;
}

.profile--author .actions .btn {
    display: block;
    width: 120px;
    margin: 0 auto 10px auto;
    background: none;
    border: 1px solid #786450;
    border-radius: 15px;
    font-size: 12px;
    font-weight: 600;
    box-sizing: border-box;
    transition: all 0.3s ease-in-out;
    color: #786450;
}

.profile--author .actions .btn:hover {
    background: #786450;
    color: #fff;
}

.stats {
    position: relative;
    float: left;
    padding-top: 40px;
    /*background: #f8f8f8;
    border-radius: 5px;*/
}

/*.stats:after {
    content: '';
    position: absolute;
    top: 60px;
    left: -50px;
    width: 50px;
    height: 0;
    border-style: solid;
    border-width: 10px 10px 10px 0px;
    border-color: transparent #f5f5f5 transparent transparent;
}*/

.stats .box {
    box-sizing: border-box;
    width: 120px;
    height: 70px;
    text-align: center;
    transition: all 0.4s ease-in-out;
}

.stats span {
    display: block;
}

.stats .value {
    font-size: 18px;
    font-weight: 600;
}

.stats .parameter {
    font-size: 11px;
}

</style>
@endsection
@section('content')
<div class="container">
    <div class="row mt-2" id="all-author">
        <div class="col-md-6 offset-md-3">
            <div class="widget search search-authors">
                <form method="GET" id="form-search-author" action="" class="search-author">
                    <div class="form-group"><input type="search" id="name" placeholder="What are you looking for?" class="form-control" data-action="grow" autocomplete="off" name="q" required><button id="submit" type="submit" class="submit"><i class="fas fa-search"></i></button></div>
                </form>
            </div>
        </div>
        <div class="col-md-12 list-authors" id="authors" style="display: flex; justify-content: center; align-items: center; flex-flow: wrap; margin: auto; height: 100%;">
            <div class="frame">
                <div class="center">
                    <div class="profile--author">
                        <div class="image">
                            <div class="circle-1"></div>
                            <div class="circle-2"></div><img src="http://100dayscss.com/codepen/jessica-potter.jpg" width="70" height="70" alt="Jessica Potter">
                        </div>
                        <div class="name"><a href="#">Jessica Potter</a></div>
                        <div class="job">Visual Artist</div>
                        <div class="actions"><button class="btn">Follow</button></div>
                    </div>
                    <div class="stats">
                        <div class="box"><span class="value">523</span><span class="parameter">Posts</span></div>
                        <div class="box"><span class="value">1387</span><span class="parameter">Likes</span></div>
                        <div class="box"><span class="value">146</span><span class="parameter">Follower</span></div>
                    </div>
                </div>
            </div>
            <div class="frame">
                <div class="center">
                    <div class="profile--author">
                        <div class="image">
                            <div class="circle-1"></div>
                            <div class="circle-2"></div><img src="https://s3.amazonaws.com/uifaces/faces/twitter/chadengle/128.jpg" width="70" height="70" alt="Jessica Potter">
                        </div>
                        <div class="name">Jessica Potter</div>
                        <div class="job">Visual Artist</div>
                        <div class="actions"><button class="btn">Follow</button></div>
                    </div>
                    <div class="stats">
                        <div class="box"><span class="value">523</span><span class="parameter">Posts</span></div>
                        <div class="box"><span class="value">1387</span><span class="parameter">Likes</span></div>
                        <div class="box"><span class="value">146</span><span class="parameter">Follower</span></div>
                    </div>
                </div>
            </div>
            <div class="frame">
                <div class="center">
                    <div class="profile--author">
                        <div class="image">
                            <div class="circle-1"></div>
                            <div class="circle-2"></div><img src="https://s3.amazonaws.com/uifaces/faces/twitter/ilya_pestov/128.jpg" width="70" height="70" alt="Jessica Potter">
                        </div>
                        <div class="name">Jessica Potter</div>
                        <div class="job">Visual Artist</div>
                        <div class="actions"><button class="btn">Follow</button></div>
                    </div>
                    <div class="stats">
                        <div class="box"><span class="value">523</span><span class="parameter">Posts</span></div>
                        <div class="box"><span class="value">1387</span><span class="parameter">Likes</span></div>
                        <div class="box"><span class="value">146</span><span class="parameter">Follower</span></div>
                    </div>
                </div>
            </div>
            <div class="frame">
                <div class="center">
                    <div class="profile--author">
                        <div class="image">
                            <div class="circle-1"></div>
                            <div class="circle-2"></div><img src="https://s3.amazonaws.com/uifaces/faces/twitter/isaacfifth/128.jpg" width="70" height="70" alt="Jessica Potter">
                        </div>
                        <div class="name">Jessica Potter</div>
                        <div class="job">Visual Artist</div>
                        <div class="actions"><button class="btn">Follow</button></div>
                    </div>
                    <div class="stats">
                        <div class="box"><span class="value">523</span><span class="parameter">Posts</span></div>
                        <div class="box"><span class="value">1387</span><span class="parameter">Likes</span></div>
                        <div class="box"><span class="value">146</span><span class="parameter">Follower</span></div>
                    </div>
                </div>
            </div>
            <div class="frame">
                <div class="center">
                    <div class="profile--author">
                        <div class="image">
                            <div class="circle-1"></div>
                            <div class="circle-2"></div><img src="https://s3.amazonaws.com/uifaces/faces/twitter/dudestein/128.jpg" width="70" height="70" alt="Jessica Potter">
                        </div>
                        <div class="name">Jessica Potter</div>
                        <div class="job">Visual Artist</div>
                        <div class="actions"><button class="btn">Follow</button></div>
                    </div>
                    <div class="stats">
                        <div class="box"><span class="value">523</span><span class="parameter">Posts</span></div>
                        <div class="box"><span class="value">1387</span><span class="parameter">Likes</span></div>
                        <div class="box"><span class="value">146</span><span class="parameter">Follower</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div><br class="mb-5">
</div>
@endsection
@section('scripts')
    <script src="{{ asset(mix('js/author.js')) }}"></script>
@endsection
