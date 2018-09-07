<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="{{ config('blog.meta.keywords') }}">
        <meta name="description" content="{{ config('blog.meta.description') }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ config('blog.default_icon') }}">

        <title>@yield('title', config('app.name'))</title>

        <link rel="stylesheet" href="{{ mix('css/home.css') }}">
        <link rel="stylesheet" href="{{ mix('css/themes/' . config('blog.color_theme') . '.css') }}">
        <!-- Scripts -->
        <script>
            window.Language = '{{ config('app.locale') }}';

            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>
        </script>

        @yield('styles')
    </head>
    <body>
        <div id="app">

            @include('particals.navbar')

            <div class="main">

                @yield('content')
                
            </div>

        </div>
        
        @include('particals.footer')

        <!-- Scripts -->
        <script src="{{ mix('js/home.js') }}"></script>
        
        @yield('scripts')

        <script>
            $(function () {
                $("[data-toggle='tooltip']").tooltip();
            });
            
        </script>

        @if(config('blog.google.open'))
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

            ga('create', '{{ config('blog.google.id') }}', 'auto');
            ga('send', 'pageview');
        </script>
        @endif
        <script>
            // back to top
            $(window).scroll(function() {
                if ($(this).scrollTop() > 100) {
                    $('#goTop').fadeIn();
                } else {
                    $('#goTop').fadeOut();
                }
            });
            $('#goTop').click(function() {
                $("html, body").animate({ scrollTop: 0 }, 600);
                return false;
            });

            //auto load pages wwith ajax
            // var page = 1;
            // $(window).scroll(function() {
            //     if($(window).scrollTop() + $(window).height() >= $(document).height()) {
            //         page++;
            //         loadMoreData(page);
            //     }
            // });

            // function loadMoreData(page, type){
            //     $.ajax({
            //         url: '?page=' + page,
            //         type: "get",
            //         beforeSend: function(){
            //             $('.ajax-load').show();
            //         }
            //     })
            //     .done(function(data){
            //         console.log(data)
            //         if(data == " "){
            //             $('.ajax-load').html("No more records found");
            //             return;
            //         }
            //         $('.ajax-load').hide();
            //         $("#list-article").append(data);
            //     })
            //     .fail(function(jqXHR, ajaxOptions, thrownError){
            //         alert('server not responding...');
            //     });
            // }
            //end

            $(document).ready(function () {

                'use strict';

                // ------------------------------------------------------- //
                // Search Box
                // ------------------------------------------------------ //
                $('#search').on('click', function (e) {
                    e.preventDefault();
                    $('.search-box').fadeIn();
                });
                $('.dismiss').on('click', function () {
                    $('.search-box').fadeOut();
                });

                // ------------------------------------------------------- //
                // Adding fade effect to dropdowns
                // ------------------------------------------------------ //
                $('.dropdown').on('show.bs.dropdown', function () {
                    $(this).find('.dropdown-menu').first().stop(true, true).fadeIn();
                });
                $('.dropdown').on('hide.bs.dropdown', function () {
                    $(this).find('.dropdown-menu').first().stop(true, true).fadeOut();
                });

                // ------------------------------------------------------- //
                // Right side navbar
                // ------------------------------------------------------ //
                $("#menu-close").click(function(e) {
                    e.preventDefault();
                    $("#sidebar-wrapper-home").toggleClass("active");
                });
                $("#menu-toggle-right").click(function(e) {
                    e.preventDefault();
                    $("#sidebar-wrapper-home").toggleClass("active");
                });

            });
        </script>
    </body>
</html>
