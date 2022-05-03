@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center">
    <div class="col-lg-6 pt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cadastro Usuario</h3>
            </div>
            <form action="{{route('users.store')}}" method="POST">
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="nome" 
                            class="form-control form-control-lg @error('nome') is-invalid @enderror" 
                            id="nome" 
                            name="nome" 
                            placeholder="Insira o Nome"
                            value="{{old('nome')}}">
                        @error('nome')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="sobrenome">Sobrenome</label>
                        <input type="sobrenome" 
                            class="form-control form-control-lg @error('sobrenome') is-invalid @enderror" 
                            id="sobrenome" 
                            name="sobrenome" 
                            placeholder="Insira o sobrenome"
                            value="{{old('sobrenome')}}">
                        @error('sobrenome')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="email" 
                            class="form-control form-control-lg @error('email') is-invalid @enderror" 
                            id="email" 
                            name="email" 
                            placeholder="Insira o email"
                            value="{{old('email')}}">
                        @error('email')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input 
                            type="password" 
                            class="form-control form-control-lg @error('password') is-invalid @enderror" 
                            id="password" 
                            name="password" 
                            placeholder="Senha"
                            value="{{old('password')}}">
                        @error('password')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    
                            <span class="font-weight-bold" style="font-size:0.8rem">
                                Sua senha deve conter pelo menos uma letra maiúscula, um caractere especial, um número e deve conter pelo menos 8 caracteres.</span>
                        
                    </div> 
                    <div class="form-group">
                        <label>Access Level</label>
                        <select 
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            name="rule"
                            id="rule">
                            <option value="FUNC">Funcionario</option>
                            <option value="ALUNO">Aluno</option>
                        </select>
                        @error('rule')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                </div>  
                <div class="card-footer text-right">
                    <button type="submit" class="btn brn-lager btn-success">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    <script>$('#flash-overlay-modal').modal();</script> 
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
@stop