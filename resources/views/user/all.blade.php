@extends('layouts.app')

@section('styles')
<style>
/*=============================================
					CARD-1
===============================================*/
#card-1 {
	padding-top: 100px;
	margin-bottom: 200px;
}

#card-1 .panel.panel-card {
    position: relative;
    height: 341px;
    max-width: 250px;
    border: none;
    overflow: hidden;
    margin: 0 auto;
}

#card-1 .panel.panel-card .panel-heading {
    position: relative;
    z-index: 2;
    height: 120px;
    border-bottom-color: #fff;
    overflow: hidden;
    -webkit-transition: height 600ms ease-in-out;
    transition: height 600ms ease-in-out;
}

#card-1 .panel.panel-card .panel-heading img {
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: 1;
    width: 120%;
    -webkit-transform: translate3d(-50%, -50%, 0);
    transform: translate3d(-50%, -50%, 0);
}

#card-1 .panel.panel-card .panel-heading button {
    position: absolute;
    top: 10px;
    right: 15px;
    z-index: 3;
}

#card-1 .panel.panel-card .panel-figure {
    position: absolute;
    top: auto;
    left: 50%;
    z-index: 3;
    width: 70px;
    height: 70px;
    background-color: #fff;
    border-radius: 50%;
    opacity: 1;
    -webkit-box-shadow: 0 0 0 3px #fff;
    box-shadow: 0 0 0 3px #fff;
    -webkit-transform: translate3d(-50%, -50%, 0);
    transform: translate3d(-50%, -50%, 0);
    -webkit-transition: opacity 400ms ease-in-out;
    transition: opacity 400ms ease-in-out;
}

#card-1 .panel.panel-card .panel-body {
    padding-top: 40px;
    padding-bottom: 20px;
	background: #fff;
    -webkit-transition: padding 400ms ease-in-out;
    transition: padding 400ms ease-in-out;
}

#card-1  .panel-thumbnails {
    padding: 0 15px 20px;
    background: #fff;
    text-align: center;
}
</style>
@endsection

@section('content')
    <div class="container">
        <div class="row mt-2" id="card-1">
            <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
             <div class="col-sm-6 col-md-3">
                <div class="panel panel-default panel-card">
                    <div class="panel-heading">
                        <img src="https://unsplash.imgix.net/12/barley.jpg?q=75&fm=jpg&s=f39de5ca1970a13dbe6af6c86b3c47ec" />
                        <button class="btn btn-info btn-sm" role="button">Follow</button>
                    </div>
                    <div class="panel-figure">
                        <img class="/img-fluid rounded-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/73.jpg" />
                    </div>
                    <div class="panel-body text-center">
                        <h4 class="panel-header"><a href="">Maridlcrmn</a></h4>
                        <small>A short description goes here.</small>
                    </div>
                    <div class="panel-thumbnails">
                        <a class="btn btn-info btn-twitter btn-sm" href="">
							<i class="fab fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="">
                            <i class="fab fa-github"></i>
                        </a>
                        <a class="btn btn-info btn-sm" rel="publisher" href="">
                            <i class="fab fa-facebook-square"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="">
                            <i class="fab fa-stack-overflow"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <br class="mb-5">
    </div>
@endsection
