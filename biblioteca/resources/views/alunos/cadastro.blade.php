@extends('layouts.app')

@section('content')
<div class='row' style="max-width: 100%;">
    <div class='col-md-12'>
        <div class='panel panel-cascade' id='panel' style="padding: 10px 20px;">
            <div class='panel-heading'>
                <h3 class='panel-title'>
                    Cadastro Alunos
                </h3>
            </div>
            <div class='panel-body' style="border:1px solid #03989e8f;padding: 9px;border-radius: 4px;">
                <form>

                    <div>
                        <div class="form-group col-md-11">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome">
                            <span class="focus-input100"></span>
                        </div>

                    </div>
                    <div>
                        <div class="form-group col-md-11 validate-input" data-validate = "Favor digitar um email valido">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email">
                            <span class="focus-input100"></span>
                        </div>
                        
                    </div>

                    <div class="wrap-input100">
                        <div class="form-group col-md-7">
                            <label for="ra">R.A</label>
                            <input type="text" class="form-control" id="ra">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="data_nasc">Data De Nascimento</label>
                            <input type="date" class="form-control" id="data_nasc">
                            <span class="focus-input100"></span>
                        </div>
                    </div>

                    <div class="form-row" style="margin-left: 10px;">
                        <div class="form-group col-md-11">
                            <label for="ativo">Aluno Ativo?</label>
                            <select id="ativo" class="form-control">
                                <option selected>Sim</option>
                                <option>N??o</option>
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