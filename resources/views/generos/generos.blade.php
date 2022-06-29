@extends('layouts.app')
@section('content')
@include('flash-message')
    <div class="card card-solid">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="text-left ">
                        <a href="{{route('generos.create')}}" class="btn btn-lg bg-success text-white" title="Criar Novo Usuario">
                            <i class="fa fa-plus-circle"></i> Criar Novo Genero
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <form action="{{route('generos.search')}}" method="POST">
                        @csrf
                        <div class="input-group input-group-lg">
                            <input type="text" name="search" class="form-control @error('search') is-invalid @enderror" placeholder="Insira Descrição">
                            <span class="input-group-append">
                                <button type="submit" class="btn btn-info btn-flat btn-lg text-white">Buscar</button>
                            </span>
                            @error('search')
                                <span class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="text-right">               
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-lg dropdown-toggle dropdown-icon" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false">
                                Filtros Genero
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('generos.filter', ['parameter' => 'desactivated']) }}">Generos Desativados</a>
                                <a class="dropdown-item" href="{{ route('generos.filter', ['parameter' => 'activated']) }}">Generos Ativo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pb-0">
            <div class="row">
                @forelse ($generos as $genero)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-body pt-1">
                                <div class="row">
                                    <div class="col-12">
                                        <h2 class="lead text-center mt-2"><b>{{$genero->descricao}}</b></h2>
                                        <p class="text-muted">@if($genero->ativo)<span class="badge badge-success"> Ativo </span> @else<span class="badge badge-danger right"> Desativado </span> @endif </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <form action="{{route('generos.delete', ['id' => $genero->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route("generos.edit", ['id' => $genero->id])}}" class="btn bg-teal" title="Edit Genero">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger" title="Excluir Genero"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Generos não encontrado. @isset($parameter) na busca pelo filtro: {{ $parameter }} @endisset</p>
                @endforelse
            </div>
        </div>
        <div class="card-footer">
            <div class="row d-flex justify-content-center ">
                {{$generos->links()}}
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