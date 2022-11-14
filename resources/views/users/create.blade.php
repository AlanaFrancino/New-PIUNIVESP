@extends('layouts.app')
@section('content')
@include('flash-message')
<?php
$Write="<?php $" . "UIDresult=''; " . "echo $" . "UIDresult;" . " ?>";
file_put_contents(resource_path('views/UIDContainer.blade.php'),$Write) 
?>
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
                        <label for="tag">Tag</label>
                        <input type="tag" 
                            class="form-control form-control-lg @error('tag') is-invalid @enderror" 
                            id="tag" 
                            name="tag" 
                            placeholder="Insira a tag"
                            value="{{old('tag')}}">
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
                            value="{{old('email')}}">
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
                    <div class="form-group">
                        <label>Tipo Usuario</label>
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
                    <div id="aluno" class="form-group">
                        <label for="ra">RA</label>
                        <input 
                            type="ra" 
                            class="form-control form-control-lg @error('ra') is-invalid @enderror" 
                            id="ra" 
                            name="ra" 
                            placeholder="Insira o RA"
                            value="{{old('ra')}}">
                        @error('ra')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>  
                    <div id="func" class="form-group">
                        <label for="cargo">Cargo</label>
                        <input 
                            type="cargo" 
                            class="form-control form-control-lg @error('cargo') is-invalid @enderror" 
                            id="cargo" 
                            name="cargo" 
                            placeholder="Insira o Cargo"
                            value="{{old('cargo')}}">
                        @error('cargo')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>  
                </div>
                
                <div class="card-footer text-right">
                    <button type="submit" class="btn brn-lager btn-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#aluno').hide();
            $('#rule').change(function() {
                if ($('#rule').val() == 'FUNC') {
                    $('#func').show();
                    $('#aluno').hide();
                } else {
                    $('#aluno').show();
                    $('#func').hide();
                }
            });
        });
    </script>
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
                showUser(getID);
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
        
        function showUser(str) {
            if (str == "") {
                document.getElementById("show_user_data").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("show_user_data").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","read tag user data.php?id="+str,true);
                xmlhttp.send();
            }
        }
        
        var blink = document.getElementById('blink');
        // setInterval(function() {
        //     blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        // }, 750); 
    </script>
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