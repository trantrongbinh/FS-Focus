@extends('layouts.app')

@section('styles')
<style>
.navbar.navbar-expand-lg {
  display: none;
}

.header_bg {
  width: 130%;
  position: absolute;
  z-index: 0;
  height: 100%;
  background-attachment: fixed;
  opacity: 0.09;
  left: 0;
  top: 0;
}

.pen_cta a{
  background: none;
  color: #ffff;
  border: 2px solid #ef8e27;
  padding: 7px 15px;
  font-size: 12px;
  font-family: "montserrat";
  transition: all 0.3s;
  cursor: pointer;
}

.pen_cta a:hover {
  color: white !important;
  background: #ef8e27;
}


.penfolio_inner__contact {
  background: #ef8e27;
  padding: 10px 10px;
  text-align: center;
  padding-bottom: 100px;
}

.penfolio_inner__contact img {
  width: 100px;
  border-radius: 100px;
  margin: 24px 0px;
  border: 2px solid white;
}

.pen_intro__image h2 {
  color: #fff;
  font-family: Lora;
  font-weight: 100;
  font-size: 40px;
  color: white;
  text-align: center;
  margin: 0;
}

.pen_intro__image h3 {
  color: #fff;
  margin: 0;
  font-size: 14px;
  font-family: Lora;
  font-weight: 100;
  font-style: italic;
  opacity: 0.9;
}

a.cp {
  text-decoration: none;
  margin: auto;
  text-align: center;
  font-size: 12px;
  padding: 5px 10px;
  color: #fff;
  transition: all 0.2s;
  text-decoration: none;
  border: 2px solid #fff;
}

a.cp:hover {
  color: #f38d3a !important;
  background: white;
}

.penfolio_inner__pens .penfolio_header {
  background: #121318;
  position: relative;
  overflow: hidden;
  color: white;
  padding: 60px 20px;
  text-align: center;
}

.penfolio_inner__pens .penfolio_header h2 {
  font-family: 'Lora';
  font-weight: 100;
  font-size: 40px;
  text-align: center;
  margin: 0;
}

.penfolio_inner__pens .penfolio_header h3 {
  margin: 0;
  font-size: 14px;
  font-family: 'Lora';
  font-weight: 100;
  font-style: italic;
  opacity: 0.4;
}

.penfolio_inner__home {
  padding-bottom: 20px;
  background: #121318;
  overflow: hidden;
  position: relative;
  border-top: 2px solid #ef8e27;
}

.penfolio_inner__home header {
  height: 120px;
  z-index: 2;
  position: relative;
  margin-top: -70px;
}

.penfolio_inner__home header a {
  text-decoration: none;
}
.penfolio_inner__home header .s_link {
  border: none;
  margin-right: 20px;
  color: white;
}
.penfolio_inner__home header .s_link:hover {
  color: #ef8e27 !important;
  background: transparent;
}
.penfolio_inner__home .pen_logo {
  float: left;
  padding: 40px;
}
.penfolio_inner__home .pen_logo h2 {
  color: white;
  margin: 0;
  font-size: 24px;
}
.penfolio_inner__home .pen_cta {
  float: right;
  position: relative;
  padding: 40px;
  top: 9px;
}
.penfolio_inner__home .pen_intro {
  text-align: center;
  margin-top: 30px;
  position: relative;
  z-index: 1;
}
.penfolio_inner__home .pen_intro nav {
  margin-bottom: 80px;
  margin-top: 90px;
}

.penfolio_inner__home .pen_intro h2 {
  color: #ef8e27;
  font-size: 16px;
  margin: 10px 0px 0px 0px;
}
.penfolio_inner__home .pen_intro h3 {
  margin: 0;
  color: #ffff;
  font-weight: 100;
  font-size: 12px;
  opacity: 0.9;
  padding: 10px;
}
.penfolio_inner__home .pen_intro h4 {
  color: White;
  font-size: 12px;
}
.penfolio_inner__home .pen_intro h5 {
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
.penfolio_inner__home .pen_intro__image {
  width: 90px;
  margin: 0 auto 10px auto;
}
.penfolio_inner__home .pen_intro__image img {
  width: 100%;
  border: 3px solid white;
  border-radius: 200px;
}
.penfolio_inner__home .pen_intro__text {
  width: 600px;
  margin: 0 auto;
}
.penfolio_inner__home .pen_intro__text a {
  color: #ef8e27;
  text-decoration: none;
  border-bottom: 2px solid #ef8e27;
  padding-bottom: 3px;
}
.penfolio_inner__home .pen_intro__text h1 {
  color: white;
  font-size: 36px;
  margin: 0;
}
.penfolio_inner__home .pen_intro__text h3 {
  font-weight: 200;
  font-size: 26px;
  margin: 10px;
  line-height: 35px;
  color: #3e4152;
}

/*point*/
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
