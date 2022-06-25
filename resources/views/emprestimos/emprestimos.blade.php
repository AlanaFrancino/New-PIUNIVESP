@extends('layouts.app')

@section('content')
    <div class='row' style="max-width: 100%;">
        <div class='col-md-12'>
            <div class='panel panel-cascade' id='panel' style="padding: 10px 20px;">
                <div class='panel-heading'>
                    <h3 class='panel-title'>
                        Emprestimos
                    </h3>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Livro</th>
                            <th scope="col">Data Retirada</th>
                            <th scope="col">Data Prev Devolução</th>
                            <th scope="col">Devolvido?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>teste</td>
                            <td>Php</td>
                            <td>20/10/2022</td>
                            <td>25/10/2022</td>
                            <td><i class="fa fa-check" aria-hidden="true" style="color: green"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>user2</td>
                            <td>Php</td>
                            <td>20/11/2022</td>
                            <td>25/11/2022</td>
                            <td><i class="fa fa-times" aria-hidden="true" style="color: red"></i></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>teste</td>
                            <td>Php</td>
                            <td>20/10/2022</td>
                            <td>25/10/2022</td>
                            <td><i class="fa fa-check" aria-hidden="true" style="color: green"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
