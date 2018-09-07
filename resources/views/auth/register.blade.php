@extends('layouts.app')

@section('styles')
  <style>
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
    }

</style>
@endsection

@section('content')

<div class="container">
    <main class="row justify-content-center">
        <div class="col-md-5">
            <div class="card" style="background: #F9F9F9;">
                 <div class="panel">
                    <a href="/"><img src="/images/logo.png" alt="TTB Blogs"></a>
                    <p>Please enter your email and password</p>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/register') }}" aria-label="{{ lang('Register') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                           
                            <div class="col-md-10  offset-md-1">
                                <label for="name" class="control-label"><span class="fa fa-user"></span> {{ lang('Username') }}</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="{{ lang('Input Name') }}" required autofocus> 
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
                                <label for="email" class="control-label"><span class="fa fa-envelope"></span> {{ lang('Email') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ lang('Input Name') }}" required> 
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
                                <label for="password" class="control-label"><span class="fa fa-lock "></span> {{ lang('Password') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ lang('Input Password') }}" required> 
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
                                <label for="password-confirm" class="control-label"><span class="fa fa-lock "></span> {{ lang('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ lang('Input Confirm Password') }}" required>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-info">
                                    {{ lang('Register') }}
                                </button>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-md-8 offset-md-2 text-center">
                                <a class="btn btn-link" href="{{ url('/login') }}">
                                    {{ lang('Has Account') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
