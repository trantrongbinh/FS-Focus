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

.slogan p {
  color: #ef8e27;
  font-family: Lora;
  font-weight: 100;
  font-size: 18px;
  font-style: italic;
  text-align: center;
}

.slogan h3 {
  color: #ef8e27 !important;
  margin: 0;
  font-size: 16px;
  font-family: Lora;
  font-weight: 100;
  font-style: italic;
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

.penfolio_inner__home .pen_logo {
  float: left;
  padding: 40px;
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

@media (max-width: 768px) {
.penfolio_inner__home .pen_intro h5 {
    width: 100%;
    padding: 20px;
  }
  .penfolio_inner__about .about_left h2 {
    font-size: 32px;
  }
  .pen_logo, .pen_cta {
    width: 100% !important;
    text-align: center;
  }
  .penfolio_inner__home .pen_cta, nav {
    display: none;
  }
  .pen_cta {
    margin-top: 20px;
  }
  .pen_intro {
    margin: 0px 0px 54px 0px !important;
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

</style>
@endsection

@section('content')
    @include('particals.top-info')
@endsection
