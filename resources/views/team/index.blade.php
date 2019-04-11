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
        padding: 5rem 0;
    }

    .profile__detail::after {
        content: "";
        display: block;
        clear: both;
    }

    .profile__detail-image {
        float: left;
        width: calc(33.333% - 1rem);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .profile__detail-image img {
        border-radius: 50%;
    }

    .profile__detail-info {
        float: right;
        width: calc(66.666% - 2rem);
    }

    /*.profile__detail-user-settings,
    .profile__detail-stats,
    .profile__detail-bio {
        float: right;
        width: calc(66.666% - 2rem);
    }*/

    .profile__detail-user-name {
        display: inline-block;
        font-size: 3.2rem;
        font-weight: 300;
    }

    .profile__detail-edit-btn {
        margin-bottom: 15px;
        font-size: 1rem;
        line-height: 1.8;
        border: 0.1rem solid #dbdbdb;
        border-radius: 0.3rem;
        padding: 0 1.4rem;
        margin-left: 2rem;
    }

    .profile__detail-settings-btn {
        margin-bottom: 15px;
        font-size: 2rem;
        margin-left: 1rem;
        text-orientation: none;
    }

    .profile__detail-stats {
        margin-top: -10px;
    }

    .profile__detail-stats li {
        display: inline-block;
        font-size: 1.3rem;
        line-height: 1.5;
        margin-right: 4rem;
        cursor: pointer;
    }

    .profile__detail-stats li:last-of-type {
        margin-right: 0;
    }

    .profile__detail-bio {
        font-size: 1.3rem;
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

</style>
@endsection
@section('content')
<div class="container">
<header>
    <div class="container--profile">
        <div class="profile__detail">
            <div class="profile__detail-image">
                <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" alt="">
            </div>
            <div class="profile__detail-info">
                <div class="profile__detail-user-settings">
                    <h1 class="profile__detail-user-name">janedoe_</h1>
                    <button class="btn profile__detail-edit-btn">Edit Profile</button>
                    <a class="btn profile__detail-settings-btn" href="#" aria-label="profile__detail settings"><i class="fas fa-cog" aria-hidden="true"></i></a>
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
        </div>
        <!-- End of profile__detail section -->
    </div>
    <!-- End of container -->
</header>

<main>
    <div class="container">
       
    </div>
    <!-- End of container -->
</main>
</div>
@endsection