@extends('layouts.layout')

@section('content')
<div class="limiter">

			<div class="row" style="flex-direction: row-reverse; ">
				<div class="col-lg-6 col-md-4 col-sm-0 login100-more" style="background-image: url('../../images/bg-01.png');">
				</div>
				<div class="col-lg-6 col-md-8 col-sm-12 login100-form-div" style="padding-right:0 !important; padding-left:0 !important; ">
					<div class="login100-form-top">
						<label class="login100-form-title p-b-40" style="padding-right: 50px;">
							
							<img class="logo" src="../../images/logo2.jpeg" style="max-width: 65px;"/>
							<span class="text-white">Web Delmira</span>
							
						</label>
					</div>
					<form method="POST" action="{{ route('login') }}" class="login100-form">
						<label class="login100-form-title p-b-42">Login</label>
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Esqueceu a sua senha?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
				</div>
			</div>

	</div>
@endsection
