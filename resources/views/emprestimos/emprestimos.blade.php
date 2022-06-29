@extends('layouts.app')

@section('content')
    @include('flash-message')
    <div class='row' style="max-width: 100%;">
        <div class='col-md-12'>
            <div class='panel panel-cascade' id='panel' style="padding: 10px 20px;">
                <h5 class="card-header h5">Emprestimos</h5>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Livro</th>
                            <th scope="col">Data Retirada</th>
                            <th scope="col">Data Prev Devolução</th>
                            <th scope="col">Devolvido?</th>
                            <th scope="col">Devolver</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($emprestimos as $emprestimo)
                            <tr>
                                <th scope="row">{{ $emprestimo->id }}</th>
                                @if (!empty($emprestimo->funcionario))
                                    <td>{{ $emprestimo->funcionario->nome }}</td>
                                @else
                                    <td>{{ $emprestimo->aluno->nome }}</td>
                                @endif
                                <td>{{ $emprestimo->livro->titulo }}</td>
                                <td>{{ date('d/m/Y', strtotime($emprestimo->created_at)) }}</td>
                                <td>{{ date('d/m/Y', strtotime($emprestimo->dt_prevdev)) }}</td>

                                @if ($emprestimo->status == 'Delvolvido')
                                    <td>
                                        <i class="fa fa-check" aria-hidden="true" style="color: green"></i>
                                    </td>
                                    <td>
                                        <a href="{{ route('emprestimos.update', ['id' => $emprestimo->id]) }}"  class="btn btn-xs btn-info pull-center" style="pointer-events: none;">Devolver</a> 
                                    </td>
                                @else
                                    <td>
                                        <i class="fa fa-times" aria-hidden="true" style="color: red"></i>
                                    </td>
                                    <td>
                                        <a href="{{ route('emprestimos.update', ['id' => $emprestimo->id]) }}"  class="btn btn-xs btn-info pull-center">Devolver</a> 
                                    </td>
                                @endif



                            </tr>

                        @empty
                            <p>Usuario não encontrado. @isset($parameter)
                                    na busca pelo filtro: {{ $parameter }}
                                @endisset
                            </p>
                        @endforelse
                    </tbody>

                </table>
                <div class="card-footer">
                    <div class="row d-flex justify-content-center ">
                        {{ $emprestimos->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
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
