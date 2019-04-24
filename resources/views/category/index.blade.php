@extends('layouts.app')
@section('styles')
<style>
body {
    background: #efefef;
    color: #4f585e;
    text-rendering: optimizeLegibility;
}

a.btn--check {
    background: #fff;
    border-radius: 4px;
    box-shadow: 1px 1px 1px 1px rgba(0, 0, 0, 0.25);
    color: #989898;
    display: inline-block;
    padding: 6px 30px 8px;
    position: relative;
    text-decoration: none;
    transition: all 0.1s 0s ease-out;
}

a.check {
    background: #0096a0;
    border-radius: 4px;
    box-shadow: 0 2px 0px 0 rgba(0, 0, 0, 0.25);
    color: #ffffff;
    display: inline-block;
    padding: 6px 30px 8px;
    position: relative;
    text-decoration: none;
    transition: all 0.1s 0s ease-out;
}

.no-touch a.btn--check:hover {
    background: #00a2ad;
    box-shadow: 0px 8px 2px 0 rgba(0, 0, 0, 0.075);
    transform: translateY(-2px);
    transition: all 0.25s 0s ease-out;
}

.no-touch a.btn--check:active,
a.btn--check:active {
    background: #008a93;
    box-shadow: 0 1px 0px 0 rgba(255, 255, 255, 0.25);
    transform: translate3d(0, 1px, 0);
    transition: all 0.025s 0s ease-out;
}

div.cards {
    margin: 30px auto;
    text-align: center;
}

div.card {
    background: #ffffff;
    display: inline-block;
    margin: 20px;
    max-width: 300px;
    perspective: 1000;
    position: relative;
    text-align: left;
    transition: all 0.3s 0s ease-in;
    z-index: 1;
}

div.card img {
    max-width: 300px;
}

div.card div.card-title {
    background: #ffffff;
    padding: 6px 15px 10px;
    position: relative;
    z-index: 0;
}

div.card div.card-title a.toggle-info {
    border-radius: 32px !important;
    height: 32px;
    padding: 0;
    position: absolute;
    right: 15px;
    top: 55px;
    width: 32px;
}

div.card div.card-title a.toggle-info i {
   text-align: center;
   margin-top: 10px;
}

div.card div.card-title h2 {
    font-size: 24px;
    font-weight: 700;
    letter-spacing: -0.05em;
    margin: 0;
    padding: 0;
}

div.card div.card-title h2 small {
    padding-top: 10px;
    display: block;
    font-size: 14px;
    font-weight: 600;
    letter-spacing: -0.025em;
}

</style>
@endsection
@section('content')

    @component('particals.jumbotron')
        <h3>{{ lang('Categories') }}</h3>
        <h6>{{ lang('Categories Meta') }}</h6>
    @endcomponent

    <div class="container categories">
        <div class="cards">
            @forelse($categories as $category)
                <div class="card">
                    @if ($category->image_url)
                        <div style="height: 200px; width: 300px; background-image: url('{{ $category->image_url }}'); background-position: 50% 50% !important; background-position: center!important; background-origin: border-box!important; background-size: cover!important;"></div>
                    @else
                        <div style="height: 200px; width: 300px; background-image: url('https://www.yazkazan.net/dosyalar/egitim/2016/11/8d3421b9116559225f35be64bc4e6876.jpg'); background-position: 50% 50% !important; background-position: center!important; background-origin: border-box!important; background-size: cover!important;"></div>
                    @endif
                    <div class="card-title">
                        <a href="#" class="toggle-info btn btn--check">
                            <i class="fas fa-check"></i>
                        </a>
                        <h2>
                            <a href="{{ url('category', ['name' => $category->name]) }}">{{ $category->name }}</a>
                            <small>{{ $category->articles->count() }} Bai viet</small>
                        </h2>
                    </div>
                </div>
            @empty
                <div class="text-center">
                    <h5>{{ lang('Nothing') }}</h5>
                </div>
            @endforelse
        </div>
    </div>
    <div class="pb__100"></div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {

    $('a.toggle-info').click(function(e) {
        e.preventDefault();

        var isChecking = false;

        if ($(this).hasClass('check')) {
            isChecking = true
        }

        if ($(this).closest('div.card').hasClass('checking')) {
            $(this).removeClass("check");

            if (isChecking) {
                $(this).closest('div.card').removeClass("checking");
            } else {
                $(this).addClass("check");
            }

        } else {
            $(this).closest('div.card').addClass("checking");
            $(this).addClass("check");
        }

    });
});
</script>
@endsection
