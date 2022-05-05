
@extends('layouts.app')
@section('content')
@include('flash-message')
<div class="d-flex justify-content-center">
    <div class="col-lg-6 pt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cadastro Genero</h3>
            </div>
            <form action="{{route('generos.store')}}" method="POST">
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="descricao" 
                            class="form-control form-control-lg @error('descricao') is-invalid @enderror" 
                            id="descricao" 
                            name="descricao" 
                            placeholder="Insira a Descrição"
                            value="{{old('descricao')}}">
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
