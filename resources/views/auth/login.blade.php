@extends('layouts.auth')

@section('content')
<div class="d-flex justify-content-center text-center"
  style="height: 100vh">
  <div class="form-block-container" >
    <div class="text-left">
      <a href="/"><i class="fas fa-arrow-left"></i>　<span>@lang('auth.go_back)</span></a>
    </div>
    <div class="form-block-logo">
      <img src="{{ asset('img/logo1_black.png') }}">
    </div>
    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="form-group row">
        <div class="col-md-12">
          <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
            name="username" value="{{ old('username') }}" autocomplete="username" autofocus maxlength="20"
            placeholder="Username">
            @if ($errors->has('username'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('username') }}</strong>
            </span>
            @endif
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-12">
          <input id="password" type="password"
            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
            autocomplete="current-password" maxlength="20"
            placeholder="Password">
            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
              <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-12">
          <button type="submit" class="btn btn-submit btn-block">
            @lang('auth.login')
          </button>
        </div>
        <div class="col-md-12">
          <a class="nav-link" href="{{ route('register') }}">@lang('auth.sign_in')</a>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
