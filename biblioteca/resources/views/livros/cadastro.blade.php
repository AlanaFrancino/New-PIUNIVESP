@extends('layouts.app')

@section('content')
<div class='row' style="max-width: 100%;">
    <div class='col-md-12'>
        <div class='panel panel-cascade' id='panel' style="padding: 10px 20px;">
            <div class='panel-heading'>
                <h3 class='panel-title'>
                    Cadastro de Obras - Nova Obra
                </h3>
            </div>
            <div class='panel-body' style="border:1px solid #03989e8f;padding: 9px;border-radius: 4px;">
                <form>

                    <div class="wrap-input100">
                        <div class="form-group col-md-5">
                            <label for="tombo">Tombo</label>
                            <input type="text" class="form-control" id="tombo">
                            <span class="focus-input100"></span>
                            <span class="focus-form-control"></span>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="data">Data do Cadastro</label>
                            <input type="date" class="form-control" id="data">
                            <span class="focus-input100"></span>
                        </div>
                    </div>

                    <div>
                        <div class="form-group col-md-8">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo">
                            <span class="focus-input100"></span>
                        </div>
                    </div>

                    <div>
                        <div class="form-group col-md-8">
                            <label for="subtitulo">Subtítulo</label>
                            <input type="text" class="form-control" id="subtitulo">
                        </div>
                    </div>

                    <div>
                        <div class="form-group col-md-8">
                            <label for="autor">Autor(es)</label>
                            <input type="text" class="form-control" id="autor">
                        </div>
                    </div>

                    <div class="form-row" style="margin-left: 10px;">
                        <div class="form-group col-md-4">
                            <label for="editora">Editora</label>
                            <input type="text" class="form-control" id="editora">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="local">Local de Publicação</label>
                            <input type="text" class="form-control" id="local">
                        </div>
                    </div>

                    <div class="form-row" style="margin-left: 10px;">
                        <div class="form-group col-md-4">
                            <label for="ano">Ano</label>
                            <input type="number" class="form-control" id="ano">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="edicao">Edição</label>
                            <input type="text" class="form-control" id="edicao">
                        </div>
                    </div>

                    <div class="form-row" style="margin-left: 10px;">
                        <div class="form-group col-md-2">
                            <label for="paginas">Número de páginas</label>
                            <input type="number" class="form-control" id="paginas">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="exemplar">Exemplar</label>
                            <input type="number" class="form-control" id="exemplar">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="volume">Volume</label>
                            <input type="number" class="form-control" id="volume">
                        </div>
                    </div>

                    <div class="form-row" style="margin-left: 10px;">
                        <div class="form-group col-md-4">
                            <label for="idioma">Idioma</label>
                            <select id="idioma" class="form-control">
                                <option selected>Português</option>
                                <option>Inglês</option>
                                <option>Espanhol</option>
                                <option>Outros</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="isbn">ISBN</label>
                            <input type="number" class="form-control" id="isbn">
                        </div>
                    </div>

                </form>
                <div class="container-login100-form-btn">
                    <button style="width: 15%;" class="login100-form-btn">
                        Salvar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection