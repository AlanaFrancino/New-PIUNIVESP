@extends('layouts.app')
@section('content')
@include('flash-message')
    <div class="card card-solid">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="text-left ">
                        <a href="{{route('prateleiras.create')}}" class="btn btn-lg bg-success text-white" title="Criar Nova Prateleira">
                            <i class="fa fa-plus-circle"></i> Criar Nova Prateleira
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <form action="{{route('prateleiras.search')}}" method="POST">
                        @csrf
                        <div class="input-group input-group-lg">
                            <input type="text" name="search" class="form-control @error('search') is-invalid @enderror" placeholder="Insira o Nome">
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
                                Filtros Prateleira
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('prateleiras.filter', ['parameter' => 'desactivated']) }}">Prateleiras Desativados</a>
                                <a class="dropdown-item" href="{{ route('prateleiras.filter', ['parameter' => 'activated']) }}">Prateleiras Ativo</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pb-0">
            <div class="row">
                @forelse ($prateleiras as $prateleira)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-body pt-1">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{$prateleira->descricao}}</b></h2>
                                        <p class="text-muted text-sm"><b>Rua: </b>{{$prateleira->rua}}</p>
                                        <p class="text-muted text-sm"><b>Nivel Vertical: </b>{{ $prateleira->largura}}</p>
                                        <p class="text-muted text-sm"><b>Nivel Horizontal: </b>{{ $prateleira->altura }}</p>
                                        <p class="text-muted">@if($prateleira->ativo)<span class="badge badge-success"> Ativo </span> @else<span class="badge badge-danger right"> Desativado </span> @endif </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <form action="{{route('prateleiras.delete', ['id' => $prateleira->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route("prateleiras.edit", ['id' => $prateleira->id])}}" class="btn bg-teal" title="Edit Prateleira">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger" title="Excluir Prateleira"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Usuario não encontrado. @isset($parameter) na busca pelo filtro: {{ $parameter }} @endisset</p>
                @endforelse
            </div>
        </div>
        <div class="card-footer">
            <div class="row d-flex justify-content-center ">
                {{$prateleiras->links()}}
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