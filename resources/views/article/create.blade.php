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

    </head>
    <body>
        <div id="app">
		    <div class="container-fuild">
		        <main class="article row">
		            <div class="col-md-10 offset-md-1">
	            	  	<div class="row">
	  						<div class="col-sm-12">
	  							<form class="form" action="" method="POST">
	  								{{ csrf_field() }}
		        					<form-create></form-create>
		        					<button type="submit" class="btn btn-outline-primary btn-sm">Tao</button>
		        				</form>
		        			</div>
	        			</div>
					</div>
				</main>
			</div>
        </div>
        
        @include('particals.footer')

        <!-- Scripts -->
        <script src="{{ mix('js/home.js') }}"></script>
        
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
        </script>
    </body>
</html>


 