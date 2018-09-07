@extends('layouts.app')

@section('styles')
<style>
    container{
        margin: 20px auto;
    }

    .panel {
        text-align: center;
        padding: 10px;
    }

    .panel h2 {
        color: #444444;
        font-size: 18px;
        margin: 0 0 8px 0;
    }

    .panel p {
        color: #777777;
        font-size: 14px;
        margin-bottom: 30px;
        line-height: 24px;
    }

    .profile-img-card {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }   

    .profile-name-card {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        margin: 10px 0 0;
        min-height: 1em;
    }
</style>
@endsection

@section('content')

<div class="container">
    <main class="row justify-content-center">
        <div class="col-md-4">
            <div class="card" style="background: #F9F9F9;">
                <div class="panel">
                    <a href="/"><img src="/images/logo.png" alt="TTB Blogs"></a>
                    <p>Please enter your email and password</p>
                </div>
                <img id="profile-img" class="profile-img-card" src="/images/ava.png" />
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ url('/login') }}" aria-label="{{ lang('Login') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label for="email" class="col-md-1 col-form-label text-md-right"><span class="fa fa-envelope"></span></label>
                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ lang('Input Email') }}" required autofocus> 
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-1 col-form-label text-md-right"><span class="fa fa-lock "></span></label>
                            <div class="col-md-10 pass_show" >
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ lang('Input Password') }}" required> 
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ lang('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-info">
                                    {{ lang('Login') }}
                                </button>
                                <a class="btn btn-link text-right" href="{{ url('/password/reset') }}">
                                {{ lang('Forgot Password') }}
                            </a>
                            </div>
                            @if(config('services.github.client_id'))
                            <div class="col-md-8 offset-md-4">
                                <div class="strike">
                                    <span>or</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 offset-md-4">
                                    <a href="{{ url('/auth/github') }}" class="btn btn-primary form-control">
                                        <i class="fab fa-github"></i> {{ lang('Login With Github') }}
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.pass_show').append('<span class="ptxt" style="font-size: 12px; font-weight: bold;"> Show</span>');
    });


    $(document).on('click', '.pass_show .ptxt', function() {

        $(this).text($(this).text() == " Show" ? " Hide" : " Show");

        $(this).prev().attr('type', function(index, attr) { return attr == 'password' ? 'text' : 'password'; });

    });
</script>
@endsection
