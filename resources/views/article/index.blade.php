@extends('layouts.app')

@section('content')
	<div id="background-body">
		@include('widgets.article')
	</div>
@endsection

@section('scripts')
<script>
           
	// $(document).ready(function () {
 //        var sidebarheight = $('#right').height();
 //        var windowheight = $(window).height();


 //        $(window).scroll(function () {
 //            var scrollTop = $(window).scrollTop();

 //            if (scrollTop >= sidebarheight - windowheight){
 //                $('#right').addClass('is-bottomPosition');
 //            }
 //            else {
 //                $('#right').removeClass('is-bottomPosition');
 //            }                   
 //        });
 //    });
 		$(window).bind('scroll', function() {
		    if($(window).scrollTop() >= $('#right').offset().top + $('#right').outerHeight() - window.innerHeight) {
		        $('#right').addClass('is-bottomPosition');
		    }
		});


</script>
@endsection
