@extends('layouts.app')
@section('content')
@include('flash-message')

<script>
    $(document).ready(function(){
         $("#getUID").load("{{ route('UIDContainer') }}");
        setInterval(function() {
            $("#getUID").load("{{ route('UIDContainer') }}");	
        }, 500);
    });
</script>
<p id="getUID" hidden></p>
<div class="d-flex justify-content-center">
    <div class="col-lg-6 pt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Editar Usuario</h3>
            </div>
            <form action="{{route('users.update', ['id' => $user->id])}}" method="POST">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="nome" 
                            class="form-control form-control-lg @error('nome') is-invalid @enderror" 
                            id="nome" 
                            name="nome" 
                            placeholder="Insira o Nome"
                            value="{{$user->nome}}">
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
                            value="{{str_replace("$user->nome ", "", $user->nome_completo)}}">
                        @error('sobrenome')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        <input type="tag" 
                            class="form-control form-control-lg @error('tag') is-invalid @enderror" 
                            id="tag" 
                            name="tag" 
                            placeholder="Insira a tag"
                            value="{{$user->tag}}">
                        @error('tag')
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
                            @if($user->tipo == "ALUNO")
                                value="{{$user->alunos()->first()->email}}"
                            @else
                                value="{{$user->funcionarios()->first()->email}}"
                            @endif
                            >
                        @error('email')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Senha</label>
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

                    @if($user->tipo == 'FUNC')
                    <div id="func" class="form-group">
                        <label for="cargo">Cargo</label>
                        <input 
                            type="cargo" 
                            class="form-control form-control-lg @error('cargo') is-invalid @enderror" 
                            id="cargo" 
                            name="cargo" 
                            placeholder="Insira o Cargo"
                            value="{{$user->funcionarios()->first()->cargo}}">
                        @error('cargo')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>  
                    @else
                    <div id="aluno" class="form-group">
                        <label for="ra">RA</label>
                        <input 
                            type="ra" 
                            class="form-control form-control-lg @error('ra') is-invalid @enderror" 
                            id="ra" 
                            name="ra" 
                            placeholder="Insira o RA"
                            value="{{$user->alunos()->first()->ra}}">
                        @error('ra')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>  
                    @endif
                    
                </div>
                
                <div class="card-footer text-right">
                    <button type="submit" class="btn brn-lager btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var myVar = setInterval(myTimer, 1000);
    var myVar1 = setInterval(myTimer1, 1000);
    var oldID="";
    clearInterval(myVar1);

    function myTimer() {
        var getID=document.getElementById("getUID").innerHTML;
        oldID=getID;
        if(getID!="") {
            document.querySelector("#tag").value = getID;
            // myVar1 = setInterval(myTimer1, 500);
            clearInterval(myVar);
        }
    }
    
    function myTimer1() {
        var getID=document.getElementById("getUID").innerHTML;
        if(oldID!=getID) {
            document.querySelector("#tag").value = getID;
            // myVar = setInterval(myTimer, 500);
            clearInterval(myVar1);
        }
    }
    
    
    var blink = document.getElementById('blink');
    // setInterval(function() {
    //     blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
    // }, 750); 
</script>
@stop

@section('css')
    
@stop

@section('js')
    <script>$('#flash-overlay-modal').modal();</script> 
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
@stop