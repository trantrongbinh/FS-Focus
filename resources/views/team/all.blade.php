@extends('layouts.app')
@section('styles')
<style>
.teams {
    list-style: none;
    margin: 0;
    padding: 0;
}

.team {
    border-bottom: 1px solid #ccc;
    padding: 2rem;
    display: flex;
    align-items: flex-start;
}

.team:last-of-type {
    border-bottom: none;
}

.team>img {
    width: 100px;
    margin-right: 2rem;
    border-radius: 5px;
}

.team .author {
    font-size: 24px;
    color: #505050;
    opacity: 0.9;
    margin: 0;
    font-weight: 800;
    margin-bottom: 10px;
}

.team p {
    font-size: 18px;
    margin: 0 0 1rem 0;
}
.align-items-center div {
    color: #565656 !important;
}
</style>
@endsection
@section('content')
<div class="container" style="padding: 100px">
    <ol class="teams">
        <li class="team">
            <img src="https://api.adorable.io/avatars/200/b@adorable.io.png" alt="" />
            <div class="team-text" style="width: 100%;">
                <h5 class="author"><a href="#">Jack Jacklehammer</a></h5>
                <p>Ipsam, omnis nisi minus!</p>
                <div class="d-flex align-items-center" style="font-size: 18px; position: relative;">
                    <div class="views">164 posts</div>
                    <div class="comments"> 60 member</div>
                    <div class="time last--icon">188 followers</div>
                    <div style="position: absolute; right: 0;">
                        <button class="btn btn-outline-info btn-sm">Follow</button>
                    </div>
                </div>
            </div>
        </li>
        <li class="team">
            <img src="https://api.adorable.io/avatars/200/a@adorable.io.png" alt="" />
            <div class="team-text" style="width: 100%;">
                <h5 class="author"><a href="#">Susan Sanddollar</a></h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa sunt provident veniam molestias officia voluptatum, at eos fuga alias reprehenderit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa sunt provident veniam molestias officia voluptatum, at eos fuga alias reprehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa sunt provident veniam molestias officia voluptatum, at eos fuga alias reprehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa sunt provident veniam molestias officia voluptatum, at eos fuga alias reprehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa sunt provident veniam molestias officia voluptatum, at eos fuga alias reprehenderit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                <div class="d-flex align-items-center" style="font-size: 18px; position: relative;">
                    <div class="views">164 posts</div>
                    <div class="comments"> 60 member</div>
                    <div class="time last--icon">188 followers</div>
                    <div style="position: absolute; right: 0;">
                        <button class="btn btn-info btn-sm">Edit</button>
                    </div>
                </div>
            </div>
        </li>
        <li class="team">
            <img src="https://api.adorable.io/avatars/200/b@adorable.io.png" alt="" />
            <div class="team-text" style="width: 100%;">
                <h5 class="author"><a href="#">Jack Jacklehammer</a></h5>
                <p>Ipsam, omnis nisi minus voluptatem temporibus at sunt magni porro cum modi, fugiat libero, recusandae facere eligendi facilis natus doloribus omnis nisi minus voluptatem temporibus at sunt magni?</p>
                <div class="d-flex align-items-center" style="font-size: 18px; position: relative;">
                    <div class="views">164 posts</div>
                    <div class="comments"> 60 member</div>
                    <div class="time last--icon">188 followers</div>
                    <div style="position: absolute; right: 0;">
                        <button class="btn btn-outline-info btn-sm">Follow</button>
                    </div>
                </div>
            </div>
        </li>
    </ol>
    <br class="mb-5">
</div>
@endsection
@section('scripts')
@endsection