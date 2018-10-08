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
        });
    </script>
@endsection