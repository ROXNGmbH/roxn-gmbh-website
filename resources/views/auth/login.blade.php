@extends('layouts.guest.app')

@section('main-content')
    <main>
        <section class="content-main mt-80 mb-80">
            <div class="card mx-auto card-login">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sign in</h4>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <input class="form-control  @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autofocus placeholder="Username or email" type="text"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- form-group// -->
                        <div class="mb-3">
                            <input class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password"  id="password" type="password" required autocomplete="current-password"/>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <!-- form-group// -->
                        <div class="mb-3">
                            <a href="#" class="float-end font-sm text-muted">Forgot password?</a>
                            <label class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}"/>
                                <span class="form-check-label">Remember</span>
                            </label>
                        </div>
                        <!-- form-group form-check .// -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                        <!-- form-group// -->
                    </form>
                </div>
            </div>
        </section>
        {{--        TODO::remove coments--}}
        {{--        <div class="row justify-content-center">--}}
        {{--            <div class="col-md-8">--}}
        {{--                <div class="card">--}}
        {{--                    <div class="card-header">{{ __('Login') }}</div>--}}
        {{--                    <div class="card-body">--}}
        {{--                        <form method="POST" action="{{ route('login') }}">--}}
        {{--                            @csrf--}}
        {{--                            <div class="row mb-3">--}}
        {{--                                <label for="email"--}}
        {{--                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}
        {{--                                <div class="col-md-6">--}}
        {{--                                    <input id="email" type="email"--}}
        {{--                                           class="form-control @error('email') is-invalid @enderror" name="email"--}}
        {{--                                           value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
        {{--                                    @error('email')--}}
        {{--                                    <span class="invalid-feedback" role="alert">--}}
        {{--                                        <strong>{{ $message }}</strong>--}}
        {{--                                    </span>--}}
        {{--                                    @enderror--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="row mb-3">--}}
        {{--                                <label for="password"--}}
        {{--                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}
        {{--                                <div class="col-md-6">--}}
        {{--                                    <input id="password" type="password"--}}
        {{--                                           class="form-control @error('password') is-invalid @enderror" name="password"--}}
        {{--                                           required autocomplete="current-password">--}}
        {{--                                    @error('password')--}}
        {{--                                    <span class="invalid-feedback" role="alert">--}}
        {{--                                        <strong>{{ $message }}</strong>--}}
        {{--                                    </span>--}}
        {{--                                    @enderror--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="row mb-3">--}}
        {{--                                <div class="col-md-6 offset-md-4">--}}
        {{--                                    <div class="form-check">--}}
        {{--                                        <input class="form-check-input" type="checkbox" name="remember"--}}
        {{--                                               id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
        {{--                                        <label class="form-check-label" for="remember">--}}
        {{--                                            {{ __('Remember Me') }}--}}
        {{--                                        </label>--}}
        {{--                                    </div>--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                            <div class="row mb-0">--}}
        {{--                                <div class="col-md-8 offset-md-4">--}}
        {{--                                    <button type="submit" class="btn btn-primary">--}}
        {{--                                        {{ __('Login') }}--}}
        {{--                                    </button>--}}
        {{--                                    @if (Route::has('password.request'))--}}
        {{--                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
        {{--                                            {{ __('Forgot Your Password?') }}--}}
        {{--                                        </a>--}}
        {{--                                    @endif--}}
        {{--                                </div>--}}
        {{--                            </div>--}}
        {{--                        </form>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </main>
@endsection
