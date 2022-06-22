
@extends('layouts.app')
@section('content')
@include('flash-message')
<div class="d-flex justify-content-center">
    <div class="col-lg-6 pt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Editar Usuario</h3>
            </div>
            <form action="{{route('generos.update', ['id' => $generos->id])}}" method="POST">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="descricao">Descricao</label>
                        <input type="descricao" 
                            class="form-control form-control-lg @error('descricao') is-invalid @enderror" 
                            id="descricao" 
                            name="descricao" 
                            placeholder="Insira o Descricao"
                            value="{{$generos->descricao}}">
                        @error('descricao')
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
