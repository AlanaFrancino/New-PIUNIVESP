
@extends('layouts.app')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
@section('content')
    @include('flash-message')
    <div class="d-flex justify-content-center">
        <div class="col-lg-6 pt-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Novo Emprestimo</h3>
                </div>
                <form action="{{ route('emprestimos.store') }}" method="POST">
                    <div class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="nome">Usuario</label>
                            <input type="hidden" name="iduser" id="iduser">
                            <input class="form-control form-control-lg @error('nome') is-invalid @enderror typeahead "
                                id="search" type="text" placeholder="Insira o Nome" value="{{ old('search') }}">
                            @error('search')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="Livro">Livro</label>
                            <input type="hidden" name="idlivro" id="idlivro">

                            <input class="typeahead form-control form-control-lg @error('sobrenome') is-invalid @enderror"
                                id="search2" type="text" placeholder="Insira o nome do livro"
                                value="{{ old('search2') }}">

                            @error('search2')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Qtd">Quantidade Retirada</label>
                                    <input type="text" class="form-control" name="Qtd" id="Qtd">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="data_dev">Data De Devolução</label>
                                    <input type="date" class="form-control" name="data_dev" id="data_dev">
                                    <span class="focus-input100"></span>
                                </div>
                            </div>
                        </div>


                    </div>
                    <script type="text/javascript">
                        var path = "{{ route('emprestimos.autocomplete') }}";
                
                        $("#search").autocomplete({
                            source: function(request, response) {
                                $.ajax({
                                    url: path,
                                    type: 'GET',
                                    dataType: "json",
                                    data: {
                                        search: request.term
                                    },
                                    success: function(data) {
                                        response(data);
                                    }
                                });
                            },
                            select: function(event, ui) {
                                $('#search').val(ui.item.label);
                                $('#iduser').val(ui.item.id);
                                console.log(ui.item);
                                console.log(ui.item.id);
                                return false;
                            }
                        });
                
                        var path2 = "{{ route('emprestimos.autocompletelivros') }}";
                
                        $("#search2").autocomplete({
                            source: function(request, response) {
                                $.ajax({
                                    url: path2,
                                    type: 'GET',
                                    dataType: "json",
                                    data: {
                                        search2: request.term
                                    },
                                    success: function(data) {
                                        response(data);
                                    }
                                });
                            },
                            select: function(event, ui) {
                                $('#search2').val(ui.item.label);
                                $('#idlivro').val(ui.item.id);
                                console.log(ui.item);
                                console.log(ui.item.id);
                                return false;
                            }
                        });
                    </script>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn brn-lager btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        $('#flash-overlay-modal').modal();
    </script>
    <script>
        $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
@stop
