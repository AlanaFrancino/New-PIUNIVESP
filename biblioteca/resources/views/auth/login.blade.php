@extends('layouts.layout')

@section('content')
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-more" style="background-image: url('../../images/bg-01.png');">
				</div>
				<div class="login100-form-div">
					<div class="login100-form-top">
						<label class="login100-form-title p-b-40" style="padding-right: 50px;">
							<a href="#" style="padding-right: 30px;">
								<img class="logo" src="../../images/logo1.jpeg" alt=""/>
							</a>
							Projeto Integrador
						</label>
					</div>
					<form action="{{route('login')}}" method="POST" class="login100-form validate-form">
						<label class="login100-form-title p-b-42">Login</label>
						@csrf
						<div class="wrap-input100 validate-input" data-validate = "Favor digitar um email valido">
							<input class="input100" type="text" name="email">
							<span class="focus-input100"></span>
							<span class="label-input100">Email</span>
						</div>


						<div class="wrap-input100 validate-input" data-validate="Por favor Digitar sua senha">
							<input class="input100" type="password" name="pass">
							<span class="focus-input100"></span>
							<span class="label-input100">Senha</span>
						</div>

						<div class="flex-sb-m w-full p-t-3 p-b-32">

							<div>
								<a href="#" class="txt1">
									Esqueci a Senha
								</a>
							</div>
						</div>


						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								Login
							</button>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
