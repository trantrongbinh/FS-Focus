@extends('layouts.app')

@section('styles')
<style>
* {
  box-sizing: border-box;
}
.wrap {
  margin: 0 auto;
}
.header_bg {
  width: 130%;
  position: absolute;
  z-index: 0;
  height: 100%;
  background-attachment: fixed;
  background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/217233/penfolio_bg.png");
  opacity: 0.06;
  left: 0;
  top: 0;
}
.pen_nav__mini.nav_active {
  top: 0px;
}
img {
  vertical-align: middle;
}
.pen_nav__mini {
  background: #fff;
  overflow: auto;
  transition: all 0.3s;
  position: fixed;
  width: 100%;
  z-index: 2;
  top: -200px;
  padding: 20px;
  box-shadow: 0 0 4px rgba(0, 0, 0, 0.18);
}
.pen_nav__mini .pen_cta a {
  background: 0 0;
  color: #ef8e27;
  border: 2px solid #ef8e27;
  padding: 12px 14px;
  font-size: 12px;
  font-family: montserrat;
  transition: all 0.3s;
  cursor: pointer;
  text-decoration: none;
  float: right;
}
.pen_nav__mini .pen_cta a:hover {
  background: #ef8e27;
  color: white;
}
.pen_nav__mini h5 {
  margin: 10px 0 0 10px;
  float: left;
  color: #606786;
  font-family: lora;
  font-style: italic;
}
.pen_nav__mini h5 .rep_username {
  color: #ef8e27;
}
.pen_nav__mini .pen_intro__image {
  width: 40px !important;
  margin: 0 !important;
  height: 40px;
  float: left;
  overflow: hidden;
  border-radius: 100px;
  padding: 0;
}
.pen_nav__mini .pen_intro__image img {
  width: 100%;
}
.pen_nav__mini .pen_intro__image a {
  border: none;
  padding: 0px;
}
.pen_nav__mini ul {
  padding: 10px 0px;
  float: right;
  margin: 0;
}
.pen_nav__mini ul li {
  display: inline;
  transition: all 0.2s;
  list-style-type: none;
  font-size: 13px;
  margin-right: 25px;
  color: #4d515a;
  cursor: pointer;
}
.pen_nav__mini ul li:hover {
  color: #ef8e27;
}
body .penfolio_inner__about .about_right .pen_cta, body .penfolio_inner__home header a, body .penfolio_inner__home .pen_cta button, body .penfolio_inner__home .pen_intro nav ul li.active {
  background: none;
  color: #ef8e27;
  border: 2px solid #ef8e27;
  padding: 12px 14px;
  font-size: 12px;
  font-family: "montserrat";
  transition: all 0.3s;
  cursor: pointer;
}
body .penfolio_inner__about .about_right .pen_cta:hover, body .penfolio_inner__home header a:hover, body .penfolio_inner__home .pen_cta button:hover, body .penfolio_inner__home .pen_intro nav ul li.active:hover {
  color: white !important;
  background: #ef8e27;
}
body .penfolio_inner__about .about_right .pen_cta:hover a, body .penfolio_inner__home header a:hover a, body .penfolio_inner__home .pen_cta button:hover a, body .penfolio_inner__home .pen_intro nav ul li.active:hover a {
  color: white;
}
body {
  margin: 0;
  font-family: "montserrat";
  padding: 0;
}
body iframe {
  margin-bottom: -10px;
  overflow: hidden;
}
body .penfolio_preloader {
  position: fixed;
  width: 100%;
  height: 100%;
  background: white;
  z-index: 3;
  text-align: center;
}
body .penfolio_preloader h2 {
  position: absolute;
  text-align: center;
  top: 50%;
  left: 0;
  font-weight: 900;
  letter-spacing: -2px;
  color: #ef8e27;
  width: 90px;
  right: 0;
  margin: auto;
  transform: translateY(-50%);
}
body .penfolio_preloader .dot {
  position: relative;
  text-align: center;
  top: 4px;
  left: 0;
  font-weight: 900;
  letter-spacing: -2px;
  color: #ef8e27;
  animation: dot 1s infinite;
  width: 6px;
  height: 6px;
  border-radius: 10px;
  background: #ef8e27;
}
body .penfolio_inner__footer {
  background: #121318;
  padding: 10px 40px;
  overflow: auto;
}
body .penfolio_inner__footer .pen_logo {
  float: right;
  color: white;
  opacity: 0.1;
  position: Relative;
  top: 10px;
}
body .penfolio_inner__footer ul {
  float: left;
  margin: 31px 0;
  position: Relative;
  top: 3px;
}
body .penfolio_inner__footer ul li {
  color: #3e4152;
  margin-right: 7px;
  cursor: pointer;
  transition: all 0.3s;
  font-size: 12px;
  list-style-type: none;
  display: inline;
}
body .penfolio_inner__footer ul li:hover {
  color: #ef8e27;
}
body .penfolio_inner__contact {
  background: #ef8e27;
  padding: 60px 20px;
  text-align: center;
}
body .penfolio_inner__contact img {
  width: 100px;
  border-radius: 100px;
  margin: 24px 0px;
  border: 2px solid white;
}
body .penfolio_inner__contact h2 {
  font-family: Lora;
  font-weight: 100;
  font-size: 40px;
  color: white;
  text-align: center;
  margin: 0;
}
body .penfolio_inner__contact h3 {
  margin: 0;
  font-size: 14px;
  font-family: Lora;
  font-weight: 100;
  font-style: italic;
  opacity: 0.4;
}
body .penfolio_inner__contact .rep_username, body .penfolio_inner__contact .rep_location, body .penfolio_inner__contact a {
  color: white;
  font-size: 17px;
  margin: 10px 0px;
}
body .penfolio_inner__contact .rep_location {
  color: rgba(0, 0, 0, 0.51);
  font-size: 14px;
  margin: 0px 0;
}
body .penfolio_inner__contact .rep_username {
  color: #fff;
  font-size: 27px;
  margin: 10px 0;
  font-family: lora;
  font-weight: bold;
}
body .penfolio_inner__contact ul {
  margin: 20px 0px 40px 0px;
  padding: 0;
}
body .penfolio_inner__contact ul li {
  list-style-type: none;
}
body .penfolio_inner__contact ul li a {
  font-size: 13px;
  text-decoration: none;
  margin: 10px 0px;
  display: block;
}
body .penfolio_inner__contact a.cp {
  text-decoration: none;
  margin: auto;
  text-align: center;
  width: 130px;
  font-size: 12px;
  padding: 13px 20px;
  color: #fff;
  transition: all 0.2s;
  text-decoration: none;
  border: 2px solid #fff;
}
body .penfolio_inner__contact a.cp:hover {
  color: #121318;
  background: white;
}
body .penfolio_inner__about {
  overflow: auto;
  position: relative;
}
body .penfolio_inner__about .about_left {
  float: left;
  height: 100%;
  width: 50%;
  position: absolute;
  background: #ef8e27;
  color: white;
  padding: 80px;
}
body .penfolio_inner__about .about_left h2 {
  position: absolute;
  left: 0;
  right: 0;
  top: 50%;
  font-family: 'Lora';
  font-weight: 100;
  font-size: 40px;
  transform: translateY(-50%);
  margin: auto;
  text-align: center;
}
body .penfolio_inner__about .about_right {
  float: right;
  width: 50%;
  padding: 80px;
  font-family: 'Lora';
  color: #6b6d75;
  font-weight: 100;
  line-height: 26px;
  font-size: 14px;
}
body .penfolio_inner__about .about_right a {
  color: #ef8e27;
  text-decoration: none;
  transition: all 0.3s;
}
body .penfolio_inner__about .about_right .pen_cta {
  float: left;
}
body .penfolio_inner__about .about_right .headline {
  font-size: 26px;
  line-height: 38px;
  color: #4f5675;
  font-style: italic;
}
body .penfolio_inner__pens {
  overflow: auto;
}
body .penfolio_inner__pens .penfolio_header {
  background: #121318;
  position: Relative;
  overflow: hidden;
  color: white;
  padding: 60px 20px;
  text-align: center;
}
body .penfolio_inner__pens .penfolio_header h2 {
  font-family: 'Lora';
  font-weight: 100;
  font-size: 40px;
  text-align: center;
  margin: 0;
}
body .penfolio_inner__pens .penfolio_header h3 {
  margin: 0;
  font-size: 14px;
  font-family: 'Lora';
  font-weight: 100;
  font-style: italic;
  opacity: 0.4;
}
body .penfolio_inner__pens .pen_card {
  float: left;
  position: relative;
  width: 100%;
}
body .penfolio_inner__pens .pen_card:hover .pen_overlay {
  opacity: 1;
}
body .penfolio_inner__pens .pen_card:hover img {
  transform: scale(1.07);
  transform-origin: 50%;
}
body .penfolio_inner__pens .pen_card .pen_overlay {
  position: absolute;
  width: 100%;
  opacity: 1;
  transition: all 0.3s;
  opacity: 0;
  height: 100%;
  background: rgba(32, 37, 43, 0.84);
  right: 0;
  z-index: 1;
}
body .penfolio_inner__pens .pen_card .pen_overlay a {
  text-decoration: none;
  position: absolute;
  left: 0;
  right: 0;
  margin: auto;
  text-align: center;
  width: 130px;
  top: 50%;
  font-size: 12px;
  padding: 13px 20px;
  color: #fff;
  transition: all 0.2s;
  text-decoration: none;
  border: 2px solid #fff;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
body .penfolio_inner__pens .pen_card .pen_overlay a:hover {
  color: #121318;
  background: white;
}
body .penfolio_inner__pens .pen_card:nth-of-type(even) {
  background: #f7f7f7;
}
body .penfolio_inner__pens .pen_card:nth-of-type(even) .pen_card__inner {
  float: left;
  background: #f7f7f7;
}
body .penfolio_inner__pens .pen_card:nth-of-type(even) .pen_card__inner:after {
  display: none;
  content: '';
  width: 100px;
  top: -50px;
  right: -60px;
  height: 150%;
  background: #f7f7f7;
  left: auto;
  position: absolute;
  transform: rotate(-4deg);
}
body .penfolio_inner__pens .pen_card:nth-of-type(even) .pen_details {
  float: right;
  right: 0;
}
body .penfolio_inner__pens .pen_card__inner {
  background: white;
  overflow: hidden;
  float: right;
  width: 50%;
  position: relative;
}
body .penfolio_inner__pens .pen_card__inner:hover .pen_details {
  display: block;
}
body .penfolio_inner__pens .pen_card__inner a {
  text-decoration: none;
}
body .penfolio_inner__pens .pen_card__inner:after {
  display: none;
  content: '';
  width: 100px;
  top: -50px;
  left: -60px;
  height: 150%;
  background: #fff;
  position: absolute;
  transform: rotate(4deg);
}
body .penfolio_inner__pens .pen_card img {
  width: 100%;
  transform: scale(1);
  transition: all 2s;
}
body .penfolio_inner__pens .pen_details {
  padding: 20px;
  width: 50%;
  position: absolute;
  height: 100%;
}
body .penfolio_inner__pens .pen_details__inner {
  position: absolute;
  top: 50%;
  width: 330px;
  left: 0;
  transition: all 0.3s;
  right: 0;
  margin: auto;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
body .penfolio_inner__pens .pen_details__inner a {
  background: 0 0;
  color: #ef8e27;
  padding: 11px 34px;
  font-size: 12px;
  font-family: lora;
  transition: all 0.3s;
  cursor: pointer;
  margin-left: 0px;
  text-decoration: none;
}
body .penfolio_inner__pens .pen_details__inner p a {
  padding: 0px;
  border: none;
}
body .penfolio_inner__pens .pen_details h2 {
  margin: 0;
  font-family: 'lora';
  font-style: italic;
  font-size: 26px;
  font-weight: 100;
  color: #4f5675;
}
body .penfolio_inner__pens .pen_details p {
  font-family: Lora;
  color: #6b6d75;
  padding-left: 20px;
  margin-left: 10px;
  font-weight: 100;
  line-height: 26px;
  font-style: italic;
  font-size: 14px;
  margin-bottom: 0px;
}
body .penfolio_inner__home {
  padding-bottom: 20px;
  background: #121318;
  overflow: hidden;
  position: relative;
  border-top: 4px solid #ef8e27;
}
body .penfolio_inner__home header {
  height: 120px;
  z-index: 2;
  position: relative;
}
body .penfolio_inner__home header .pen_responsive_nav {
  position: absolute;
  right: 20px;
  display: none;
  top: 20px;
}
body .penfolio_inner__home header .pen_responsive_nav i {
  color: white;
  font-size: 20px;
  cursor: pointer;
  transition: all 0.3s;
}
body .penfolio_inner__home header .pen_responsive_nav i:hover {
  color: #ef8e27;
}
body .penfolio_inner__home header .pen_responsive_nav ul {
  display: none;
  position: absolute;
  right: -10px;
  top: 30px;
  z-index: 1;
  padding: 0;
  margin: 0;
}
body .penfolio_inner__home header .pen_responsive_nav ul li {
  color: white;
  transition: all 0.3s;
  padding: 10px;
  font-size: 13px;
  cursor: pointer;
  text-align: right;
  list-style-type: none;
}
body .penfolio_inner__home header .pen_responsive_nav ul li:hover {
  color: #ef8e27;
}
body .penfolio_inner__home header a {
  text-decoration: none;
}
body .penfolio_inner__home header .s_link {
  border: none;
  margin-right: 20px;
  color: white;
}
body .penfolio_inner__home header .s_link:hover {
  color: #ef8e27 !important;
  background: transparent;
}
body .penfolio_inner__home .pen_logo {
  float: left;
  padding: 40px;
}
body .penfolio_inner__home .pen_logo h2 {
  color: white;
  margin: 0;
  font-size: 24px;
}
body .penfolio_inner__home .pen_cta {
  float: right;
  position: relative;
  padding: 40px;
  top: 9px;
}
body .penfolio_inner__home .pen_intro {
  text-align: center;
  margin-top: 30px;
  position: relative;
  z-index: 1;
}
body .penfolio_inner__home .pen_intro nav {
  margin-bottom: 80px;
  margin-top: 90px;
}
body .penfolio_inner__home .pen_intro nav ul li {
  display: inline-block;
  color: #3e4152;
  padding: 20px;
  font-size: 12px;
  margin: 0px 20px;
  transition: all 0.2s;
  cursor: pointer;
}
body .penfolio_inner__home .pen_intro nav ul li:hover {
  color: #ef8e27;
}
body .penfolio_inner__home .pen_intro h2 {
  color: #ef8e27;
  font-size: 16px;
  margin: 10px 0px 0px 0px;
}
body .penfolio_inner__home .pen_intro h3 {
  margin: 0;
  color: #3e4152;
  font-weight: 100;
  font-size: 12px;
}
body .penfolio_inner__home .pen_intro h4 {
  color: White;
  font-size: 12px;
}
body .penfolio_inner__home .pen_intro h5 {
  font-size: 26px;
  line-height: 38px;
  color: #e2f1ea;
  font-weight: 100;
  font-family: 'lora';
  width: 460px;
  margin: 0 auto;
  line-height: 23px;
  font-size: 18px;
  margin: 40px auto -40px auto;
}
body .penfolio_inner__home .pen_intro__image {
  width: 90px;
  margin: 0 auto 10px auto;
}
body .penfolio_inner__home .pen_intro__image img {
  width: 100%;
  border: 3px solid white;
  border-radius: 200px;
}
body .penfolio_inner__home .pen_intro__text {
  width: 600px;
  margin: 0 auto;
}
body .penfolio_inner__home .pen_intro__text a {
  color: #ef8e27;
  text-decoration: none;
  border-bottom: 2px solid #ef8e27;
  padding-bottom: 3px;
}
body .penfolio_inner__home .pen_intro__text h1 {
  color: white;
  font-size: 36px;
  margin: 0;
}
body .penfolio_inner__home .pen_intro__text h3 {
  font-weight: 200;
  font-size: 26px;
  margin: 10px;
  line-height: 35px;
  color: #3e4152;
}
.pen_card .pen_details__inner {
  opacity: 0;
  left: -80px !important;
}
.pen_card .pen_card__inner {
  opacity: 0 !important;
  transition: all 0.3s;
}
.pen_card.bring_in .pen_card__inner {
  opacity: 1 !important;
  transition: all 0.3s;
}
.pen_card.bring_in .pen_details__inner {
  opacity: 1;
  left: 0px !important;
}
@media (max-width: 768px) {
  .about_left, .about_right {
    width: 100% !important;
    position: relative !important;
    float: none !important;
    height: auto !important;
  }
  .pen_nav__mini {
    display: none !important;
  }
  body .penfolio_inner__footer ul {
    float: left;
    margin: 31px 0;
    position: Relative;
    top: 3px;
    margin: 30px 0px;
    padding: 0;
    float: none;
    text-align: center;
  }
  body .penfolio_inner__home .pen_intro h5 {
    width: 100%;
    padding: 20px;
  }
  .about_right {
    text-align: Center !important;
    padding: 24px !important;
  }
  body .penfolio_inner__about .about_left h2 {
    font-size: 32px;
  }
  .pen_logo, .pen_cta {
    width: 100% !important;
    text-align: center;
  }
  .penfolio_inner__home .pen_cta, nav {
    display: none;
  }
  .pen_responsive_nav {
    display: block !important;
  }
  .pen_cta {
    margin-top: 20px;
  }
  .pen_intro {
    margin: 0px 0px 54px 0px !important;
  }
  .pen_card__inner, .pen_details {
    width: 100% !important;
    position: Relative !important;
  }
  .pen_details {
    clear: both;
    height: auto !important;
  }
  body .penfolio_inner__pens .pen_details__inner {
    position: relative;
    transform: none;
    width: 100%;
    text-align: center;
  }
  body .penfolio_inner__pens .pen_card {
    float: left;
    position: relative;
    width: 100%;
    padding: 20px;
  }
  body .penfolio_inner__pens .pen_details p {
    padding-left: 0px;
    margin-left: 0px;
  }
  body .penfolio_inner__pens .penfolio_header {
    margin-top: 20px;
  }
  body .penfolio_inner__pens .pen_details__inner a {
    margin-left: 0px;
  }
}
@keyframes dot {
  0% {
    left: 0;
  }
  50% {
    left: 88px;
  }
  100% {
    left: 0;
  }
}
.post {
  border-bottom: 1px solid #ccc;
  margin: 4rem auto;
  padding-bottom: 4rem;
  position: relative;  
}

/* Add little circle in the middle after each post */
.post:after {
  content: "";
  display: block;

  /* The circle */
  width: 7px;
  height: 7px;
  background: #FFF;
  border: 1px solid #aaa;
  box-shadow: #FFF 0 0 0 10px;
  -webkit-border-radius: 100%;
  -moz-border-radius: 100%;
  border-radius: 100%;
  
  /* Put in the middle of post's border bottom */
  position: absolute;
    bottom: -5px;
    left: 50%;
  margin-left: -5px;
}

/* https://codepen.io/keitakawamoto/pen/EyQjOx */
</style>
@endsection

@section('content')

    @include('particals.top-info')

@endsection
