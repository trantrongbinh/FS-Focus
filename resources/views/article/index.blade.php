@extends('layouts.app')

@section('content')
    @include('widgets.article')
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $(".button-post").click(function () {
                $(".form-post").toggle(700);
            });

			//auto height textarea
			$.each($('.textarea--autoHeight'), function () {
				var offset = this.offsetHeight - this.clientHeight;
				var resizeTextarea = function resizeTextarea(el) {
			  		$(el).css('height', 'auto').css('height', el.scrollHeight + offset);
				};
				$(this).on('keyup input', function () {
				  	resizeTextarea(this);
				}).removeAttr('data-autoresize');
			});
        });
    </script>
@endsection