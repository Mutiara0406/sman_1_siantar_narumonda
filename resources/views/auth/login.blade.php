@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="col-lg-4 col-md-6">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white text-center py-4">
            <h4 class="mb-0">{{ __('Login to Your Account') }}</h4>
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <!-- Buttons -->
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Login') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link text-decoration-none text-primary" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <div class="text-center mt-3">
        <p class="mb-0">
            {{ __("Don't have an account?") }}
            <a href="{{ route('register') }}" class="text-primary text-decoration-none">{{ __('Sign Up') }}</a>
        </p>
    </div>
</div>
@endsection
