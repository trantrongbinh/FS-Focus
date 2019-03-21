@extends('layouts.app')
@section('styles')
<style>
.article {
    position: relative;
    width: 100%;
    max-width: 960px;
    margin: 0 auto;
    box-sizing: border-box;
    max-width: 1200px;
    padding-bottom: 0 !important;
}

@media (min-width: 400px) {
    .article {
        width: 85%;
    }
}

@media (min-width: 550px) {
    .article {
        width: 80%;
    }
}

* {
    box-sizing: border-box;
}

#editor-container {
    border-bottom: 0px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    box-shadow: 0 0 40px 2px rgba(28, 31, 47, 0.1);
    font-size: 1.5rem;
    padding: 0px 20px;
    padding-top: 30px;
    padding-bottom: 10px;
    width: 100%;
    min-height: 750px;
}

#title-container {
    padding-left: 1%;
}

#title-container textarea::placeholder {
    padding-left: 1%;
    font-style: italic;

}

#editor-container .ql-snow {
    border: none;
}

#editor-wrapper {
    padding: 10px 20px 0;
}

#editor-wrapper .ql-container {
    padding: 0 2% 25px;
    min-height: 450px;
}

#editor-wrapper .ql-toolbar {
    border: none;
    padding: 2.5% 0%;
}

@media (max-width: 767px) {
    .multiselect {
        padding-left: 1% !important;
        margin: 10px 0;
    }

    .multiselect__placeholder {
        padding-left: 2% !important;
    }

    #editor-container {
        min-height: 400px !important;
        margin-bottom: 100px;
    }

    #editor-wrapper .ql-container {
        min-height: 300px !important;
    }
}

@media (min-width: 768px) {
    .multiselect {
        padding-left: 3%;
    }

    .multiselect__placeholder {
        padding-left: 4% !important;
        font-style: italic;
    }
}

.multiselect__tags {
    border: none !important;
}

.action-save {
    margin-top: -16px;
    color: #999;
    font-size: 14px;
}
</style>
@endsection
@section('content')
<div class="container">
    <main class="article row">
        <div class="col-md-12 create-post">
            <div class="clear"></div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <article-create></article-create>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
@section('scripts')
<script>
</script>
@endsection
