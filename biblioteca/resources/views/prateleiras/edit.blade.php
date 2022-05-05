@extends('layouts.app')
@section('content')
@include('flash-message')
<div class="d-flex justify-content-center">
    <div class="col-lg-6 pt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Editar Estante</h3>
            </div>
            <form action="{{route('prateleiras.update', ['id' => $prateleiras->id])}}" method="POST">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <input type="descricao" 
                            class="form-control form-control-lg @error('descricao') is-invalid @enderror" 
                            id="descricao" 
                            name="descricao" 
                            placeholder="Insira a Descricao"
                            value="{{$prateleiras->descricao}}">
                        @error('descricao')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="rua">Rua</label>
                        <input type="rua" 
                            class="form-control form-control-lg @error('rua') is-invalid @enderror" 
                            id="rua" 
                            name="rua" 
                            placeholder="Insira Identificação da Rua"
                            value="{{$prateleiras->rua}}">
                        @error('rua')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="altura">Nivel Vertical</label>
                        <input 
                            type="altura" 
                            class="form-control form-control-lg @error('altura') is-invalid @enderror" 
                            id="altura" 
                            name="altura" 
                            placeholder="Insira a quantidade maxima de divisões vertical da Estante"
                            value="{{$prateleiras->altura}}">
                        @error('altura')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="largura">Nivel Horizontal</label>
                        <input 
                            type="largura" 
                            class="form-control form-control-lg @error('largura') is-invalid @enderror" 
                            id="largura" 
                            name="largura" 
                            placeholder="Insira a quantidade maxima de divisões horizontal da Estante"
                            value="{{$prateleiras->largura}}">
                        @error('largura')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div> 
                    
                </div>
                
                <div class="card-footer text-right">
                    <button type="submit" class="btn brn-lager btn-success">Editar</button>
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