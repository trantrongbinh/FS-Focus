@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset(mix('css/author.css')) }}">
<style>
    figure.snip1192 {
  font-family: 'Raleway', Arial, sans-serif;
  position: relative;
  overflow: hidden;
  margin: 10px;
  min-width: 220px;
  max-width: 310px;
  width: 100%;
  text-align: left;
  box-shadow: none !important;
}
figure.snip1192 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}
figure.snip1192 img {
  max-width: 100%;
  height: 100px;
  width: 100px;
  border-radius: 50%;
  margin-bottom: 15px;
  display: inline-block;
  z-index: 1;
  position: relative;
}
figure.snip1192 blockquote {
  margin: 0;
  color: #fff;
  display: block;
  border-radius: 8px;
  position: relative;
  background-color: #505050;
  padding: 30px 50px 65px 50px;
  font-size: 0.8em;
  font-weight: 500;
  margin: 0 0 -50px;
  line-height: 1.6em;
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.15);
}

figure.snip1192 blockquote:before {
  top: 35px;
  left: 20px;
}
figure.snip1192 blockquote:after {
  content: "\201D";
  right: 20px;
  bottom: 35px;
}
figure.snip1192 .author {
  margin: 0;
  text-transform: uppercase;
  text-align: center;
  color: #ffffff;
}
figure.snip1192 .author h5 {
    color: #505050;
  opacity: 0.8;
  margin: 0;
  font-weight: 800;
}
figure.snip1192 .author h5 span {
  font-weight: 400;
  text-transform: none;
  display: block;
}

</style>
@endsection
@section('content')
<div class="container">
    <div class="row mt-2" id="all-author">
        <div class="col-md-6 offset-md-3">
            <div class="widget search search-authors">
                <form method="GET" id="form-search-author" action="" class="search-author">
                    <div class="form-group">
                        <input type="search" id="name" placeholder="What are you looking for?" class="form-control" data-action="grow" autocomplete="off" name="q" required>
                        <button id="submit" type="submit" class="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-12 list-authors" id="authors" style="display: flex;justify-content: center;align-items: center;flex-flow: wrap;margin: auto;height: 100%;">
            <!-- @include('user.particals.authors') -->
            <figure class="snip1192">
                <blockquote>Calvin: Sometimes when I'm talking with others, my words can't keep up with my thoughts.</blockquote>
                <div class="author">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample1.jpg" alt="sq-sample1" />
                    <h5>Pelican Steve <span> LittleSnippets</span></h5>
                </div>
            </figure>
            <figure class="snip1192">
                <blockquote>Calvin: Sometimes when I'm talking with others, my words can't keep up with my thoughts.</blockquote>
                <div class="author">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample1.jpg" alt="sq-sample1" />
                    <h5>Pelican Steve <span> LittleSnippets</span></h5>
                </div>
            </figure>
            <figure class="snip1192">
                <blockquote>Calvin: Sometimes when I'm talking with others, my words can't keep up with my thoughts.</blockquote>
                <div class="author">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample1.jpg" alt="sq-sample1" />
                    <h5>Pelican Steve <span> LittleSnippets</span></h5>
                </div>
            </figure>
            <figure class="snip1192">
                <blockquote>Calvin: Sometimes when I'm talking with others, my words can't keep up with my thoughts.</blockquote>
                <div class="author">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample1.jpg" alt="sq-sample1" />
                    <h5>Pelican Steve <span> LittleSnippets</span></h5>
                </div>
            </figure>
            <figure class="snip1192">
                <blockquote>Calvin: Sometimes when I'm talking with others, my words can't keep up with my thoughts.</blockquote>
                <div class="author">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample1.jpg" alt="sq-sample1" />
                    <h5>Pelican Steve <span> LittleSnippets</span></h5>
                </div>
            </figure>
            <figure class="snip1192">
                <blockquote>Calvin: Sometimes when I'm talking with others, my words can't keep up with my thoughts.</blockquote>
                <div class="author">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample1.jpg" alt="sq-sample1" />
                    <h5>Pelican Steve <span> LittleSnippets</span></h5>
                </div>
            </figure>
            <figure class="snip1192">
                <blockquote>Calvin: Sometimes when I'm talking with others, my words can't keep up with my thoughts.</blockquote>
                <div class="author">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample1.jpg" alt="sq-sample1" />
                    <h5>Pelican Steve <span> LittleSnippets</span></h5>
                </div>
            </figure>
            <figure class="snip1192 hover">
                <blockquote>Thank you. before I begin, I'd like everyone to notice that my report is in a professional, clear plastic binder...</blockquote>
                <div class="author">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample24.jpg" alt="sq-sample24" />
                    <h5>Max Conversion<span> LittleSnippets</span></h5>
                </div>
            </figure>
            <figure class="snip1192">
                <blockquote>My behaviour is addictive functioning in a disease process of toxic co-dependency.</blockquote>
                <div class="author">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample29.jpg" alt="sq-sample29" />
                    <h5>Eleanor Faint<span> LittleSnippets</span></h5>
                </div>
            </figure>
        </div>
    </div>
    <br class="mb-5">
</div>
@endsection
@section('scripts')
<script src="{{ asset(mix('js/author.js')) }}"></script>
@endsection