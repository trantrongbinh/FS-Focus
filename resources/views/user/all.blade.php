@extends('layouts.app')

@section('styles')
<style>
/*=============================================
					CARD-1
===============================================*/
#card-1 {
	padding-top: 70px;
	margin-bottom: 200px;
}

#card-1 .panel.panel-card {
    position: relative;
    max-width: 250px;
    border: none;
    overflow: hidden;
    margin: 0 auto;
}

#card-1 .panel.panel-card .panel-heading {
    position: relative;
    z-index: 2;
    height: 70px;
    border-bottom-color: #fff;
    overflow: hidden;
    -webkit-transition: height 600ms ease-in-out;
    transition: height 600ms ease-in-out;
}

#card-1 .panel.panel-card .panel-figure {
    position: absolute;
    top: auto;
    left: 50%;
    z-index: 3;
    width: 70px;
    height: 70px;
    background-color: #fff;
    border-radius: 50%;
    opacity: 1;
    -webkit-box-shadow: 0 0 0 3px #fff;
    box-shadow: 0 0 0 3px #fff;
    -webkit-transform: translate3d(-50%, -50%, 0);
    transform: translate3d(-50%, -50%, 0);
    -webkit-transition: opacity 400ms ease-in-out;
    transition: opacity 400ms ease-in-out;
}

#card-1 .panel.panel-card .panel-body {
    padding-top: 40px;
    -webkit-transition: padding 400ms ease-in-out;
    transition: padding 400ms ease-in-out;
}

#card-1  .panel-thumbnails {
    padding: 0 15px 10px;
    text-align: center;
}

.paginate-authors {
    margin: 50px auto;
}

.list-authors {
    margin: 0px auto;
}

.search-authors {
    border: none;
}

.btn-follow {
    padding: 0 5px 0 5px;
}

</style>
@endsection

@section('content')
    <div class="container">
        <div class="row mt-2" id="card-1">
            <div class="col-md-6 offset-md-3">
                <div class="widget search search-authors">
                    <form method="GET" id="form-search-author" action="" class="search-author">
                        <div class="form-group">
                            <input type="search" id="name" placeholder="What are you looking for?" class="form-control" data-action="grow" autocomplete="off" name="q" required>
                            <button id="submit" type="submit" class="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-11 list-authors" id="authors">
                @include('user.particals.authors')
            </div>
            
            
        </div>
        <br class="mb-5">
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#submit').click(function(event){
            event.preventDefault();
            var a = $('#name').val();
            a = a.replace(/\s\s+/g, ' ');
            if (a != '' && a != ' ') {
                $.ajax({
                    url: 'all-auther/search',
                    type: 'GET',
                    data: {'data': a},
                    dataType: 'JSON',
                })

                .done(function(data){
                    $('#authors').html(data.html);
                })
            }
        });
    });
</script>
@endsection
