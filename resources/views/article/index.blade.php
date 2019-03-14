@extends('layouts.app')

@section('styles')
<style>
	
/**
 * Card Styles
 */

.card {
	background-color: #fff;
	margin-bottom: 1.6rem;
}

.card__padding {
	padding: 1.6rem;
}
 
.card__image {
	min-height: 100px;
	background-color: #eee;
}
	.card__image img {
		height: 300px;
		width: 100%;
		max-width: 100%;
		display: block;
	}

.card__content {
	position: relative;
}

/* card meta */
.card__meta time {
	font-size: 1.5rem;
	color: #bbb;
	margin-left: 0.8rem;
}

/* card article */
.card__article a {
	text-decoration: none;
	color: #444;
	transition: all 0.5s ease;
}
	.card__article a:hover {
		color: #2980b9;
	}

/* card action */
.card__action {
	overflow: hidden;
	padding-right: 1.6rem;
	padding-left: 1.6rem;
	padding-bottom: 1.6rem;
}
	 
.card__author {}

	.card__author img,
	.card__author-content {
		display: inline-block;
		vertical-align: middle;
	}

	.card__author img{
		border-radius: 50%;
		margin-right: 0.6em;
	}

.card__share {
	float: right;
	position: relative;
	margin-top: -42px;
}

.card__social {
	position: absolute;
	top: 0;
	right: 0;
	visibility: hidden;
	width: 160px;
	transform: translateZ(0);
  	transform: translateX(0px);
  	transition: transform 0.35s ease;
}
	.card__social--active {
		visibility: visible;
		/*z-index: 3;*/
		transform: translateZ(0);
 		transform: translateX(-48px);
  		transition: transform 0.35s ease;
	}

.share-toggle {
	z-index: 2;
}
.share-toggle:before {
	content: "\f1e0";
	font-family: 'FontAwesome';
	color: #3498db;
}
	.share-toggle.share-expanded:before {
		content: "\f00d";
	}

.share-icon {
	display: inline-block;
	width: 48px;
	height: 48px;
	line-height: 48px;
	text-align: center;
	border-radius: 50%;
	background-color: #fff;
	transition: all 0.3s ease;
	outline: 0;

	box-shadow: 
	  		0 2px 4px rgba(0,0,0, 0.12),
	    	0 2px 4px rgba(0,0,0, 0.24);
}
	.share-icon:hover,
	.share-icon:focus {
		box-shadow: 
	  		0 3px 6px rgba(0,0,0, 0.12),
	    	0 3px 6px rgba(0,0,0, 0.24);

	    -webkit-transform: scale(1.2);
	    -moz-transform: scale(1.2);
	    -ms-transform: scale(1.2);
	    -o-transform: scale(1.2);
	    transform: scale(1.2);
	}

.facebook {
	background-color: #3b5998; 
}
.twitter {
	background-color: #00abe3; 
}
.googleplus {
	background-color: #d3492c;
}

.facebook,
.twitter,
.googleplus {
	color: #fff;
}

	.facebook:hover,
	.twitter:hover,
	.googleplus:hover {
		color: #eee;
	}

</style>
@endsection

@section('content')
    <div id="background-body">
        @include('widgets.article')
    </div>
@endsection
@section('scripts')
<script>
	$(document).ready(function($) {

	$('.card__share > a').on('click', function(e){ 
		e.preventDefault() // prevent default action - hash doesn't appear in url
   		$(this).parent().find( 'div' ).toggleClass( 'card__social--active' );
		$(this).toggleClass('share-expanded');
    });
  
});
</script>
@endsection

 