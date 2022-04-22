@extends('layouts.app')

@section('content')
<div class='row' style="max-width: 100%;">
    <div class='col-md-12'>
        <div class='panel panel-cascade' id='panel' style="padding: 10px 20px;">
            <div class='panel-heading'>
                <h3 class='panel-title'>
                    Cadastro Usuarios
                </h3>
            </div>
            <div class='panel-body' style="border:1px solid #03989e8f;padding: 9px;border-radius: 4px;">
                
                <form>
                    <div class="form-row" style="margin-left: 10px;">
                        <div class="form-group col-md-2">
                            <label for="busca">Busca</label>
                            <select id="busca" class="form-control">
                                <option selected>ID</option>
                                <option>Nome</option>
                            </select>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="busca">.</label>
                            <input type="text" class="form-control" id="id">
                        </div>
                        
                    </div>
                    <div>
                        <div class="form-group col-md-11">
                            <label for="idioma">Tipo Usuario</label>
                            <select id="idioma" class="form-control">
                                <option selected></option>
                                <option>Aluno</option>
                                <option>Funcionario</option>
                            </select>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <button style="width: 15%;" class="login100-form-btn" id="btn_salvar">
                            Buscar
                        </button>
                    </div>
                </form>
                <form>    
                    <div class="wrap-input100">
                        <div class="form-group col-md-11">
                            <label for="usu_nome">Usuario Nome</label>
                            <input type="text" class="form-control" id="usu_nome">
                            <span class="focus-input100"></span>
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-11">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario">
                            <span class="focus-input100"></span>
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-11">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email">
                            <span class="focus-input100"></span>
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-11">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" id="senha">
                        </div>
                    </div>
                    <div class="form-row" style="margin-left: 10px;">
                        <div class="form-group col-md-11">
                            <label for="ativo">Usuario Ativo?</label>
                            <select id="ativo" class="form-control">
                                <option selected>Sim</option>
                                <option>Não</option>
                            </select>
                        </div>

                    </div>

                </form>
                <div class="container-login100-form-btn">
                    <button style="width: 15%;" class="login100-form-btn" id="btn_salvar">
                        Salvar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection