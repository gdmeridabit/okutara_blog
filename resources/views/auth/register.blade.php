@extends('layouts.auth')

@section('content')
  <div class="d-flex justify-content-center text-center py-5">
    <div class="form-block-container">
      <div class="text-left">
        <a href="/"><i class="fas fa-arrow-left"></i>　<span>Go back to Home</span></a>
      </div>
        @if(Session::has('message'))
        <div class="d-flex justify-content-center">
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        </div>
        @endif
      <div class="form-block-logo">
        <img src="{{ asset('img/logo1_black.png') }}">
      </div>
      <form method="POST" action="{{ route('register', ['locale' => App::getLocale()]) }}">
        @csrf
        <div class="form-group row">
            <div class="col-md-12">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus
                placeholder="Full Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email"
                placeholder="E-Mail Address">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autocomplete="username" autofocus
                placeholder="Username">
                @error('username')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password"
                placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password"
                placeholder="Confirm Password">
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-12">
                <button type="submit" class="btn btn-submit btn-block">
                    {{ __('Register') }}
                </button>
            </div>
            <div class="col-md-12">
                <a class="nav-link" href="{{ route('login', ['locale' => App::getLocale()]) }}">Already have an account? Login now!</a>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
