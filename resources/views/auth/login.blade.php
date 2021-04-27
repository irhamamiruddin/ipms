@extends('layouts.login-layout')

@section('content')
<h4>Sign in to continue.</h4>

<form class="pt-3" method="POST" action="{{ route('login') }}">
@csrf
    <div class="form-group">
        <input id="email" name="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="E-Mail Address" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form-group">
        <input id="password" name="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="mt-3">
        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
    </div>

    <div class="my-2 d-flex justify-content-between align-items-center">
        <div class="form-check">
        <label class="form-check-label text-muted">
            <input name="remember" id="remember" type="checkbox" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
            Remember Me
        </label>
        </div>
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
        @endif
    </div>

    <div class="text-center mt-4 font-weight-light">
        Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
    </div>
</form>
@endsection
