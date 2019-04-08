@extends('layouts.app')

@section('styles')
    <style>
        .create-discussion {
            padding-bottom: 100px;
        }
        .dicussion {
            margin-top: 40px;
        }
        .ql-container.ql-bubble {
            font-size: 18px;
        }

        #title {
            resize: none;
            font-size: 24px !important;
            min-height: 46px !important;
            font-weight: 700 !important;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <main class="dicussion row create-discussion">
            <div class="col-md-9 offset-md-1">
                <form class="form" action="{{ url('discussion', ['id' => $discussion->id]) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">{{ lang('Discuss Title') }} <span class="text-red">*</span></label>
                        <div class="col-sm-10">
                            <textarea class="textarea form-control{{ $errors->has('title') ? ' is-invalid' : '' }} box__input textarea--autoHeight border__none" rows="1" id="title" name="title"  placeholder="Title your post">{{ $discussion->title }}</textarea>
                            @if ($errors->has('title'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">{{ lang('Discuss Tag') }} <span class="text-red">*</span></label>
                        <div class="col-sm-10">
                            <select class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }} select2" multiple="multiple" data-placeholder=" Tag your post" style="width: 100%;" name="tags[]">
                                @foreach($tags as $tag)
                                    @if(in_array($tag->id, $selectTags))
                                        <option value="{{ $tag->id }}" selected>{{ $tag->tag }}</option>
                                    @else
                                        <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('tags'))
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('tags') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-2 col-form-label">{{ lang('Discuss Content') }} <span class="text-red">*</span></label>
                        <div class="col-sm-10">
                            <bubble-editor id="content-dis" table-type="discussion" strategy="discussion" old-content="{{ json_decode($discussion->content)->html }}"></bubble-editor>
                            @if ($errors->has('content'))
                                <span class="invalid-feedback d-block">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success float-right" onClick="this.form.submit(); this.disabled=true;">{{ lang('Edit Discussion') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
    <div class="pb__100"></div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('.select').select2();
    </script>
@endsection
