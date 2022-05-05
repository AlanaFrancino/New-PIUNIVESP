@extends('layouts.app')
@section('content')
@include('flash-message')
<div class="d-flex justify-content-center">
    <div class="col-lg-6 pt-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Cadastro Livro</h3>
            </div>
            <form action="{{route('livros.store')}}" method="POST">
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="titulo">Tituto</label>
                        <input type="titulo" 
                            class="form-control form-control-lg @error('titulo') is-invalid @enderror" 
                            id="titulo" 
                            name="titulo" 
                            placeholder="Insira o Titulo"
                            value="{{old('titulo')}}">
                        @error('titulo')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Genero</label>
                        <select 
                            class="form-control form-control-lg @error('genero') is-invalid @enderror"
                            name="genero"
                            id="genero">
                            @foreach ($generos as $key => $genero)
                            <option value={{$genero->id}}>{{$genero->descricao}}</option>
                            @endforeach
                        </select>
                        @error('genero')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor</label>
                        <input type="autor" 
                            class="form-control form-control-lg @error('autor') is-invalid @enderror" 
                            id="autor" 
                            name="autor" 
                            placeholder="Insira o Autor"
                            value="{{old('autor')}}">
                        @error('autor')
                            <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="patrimonio">Patrimonio</label>
                                <input 
                                    type="patrimonio" 
                                    class="form-control form-control-lg @error('patrimonio') is-invalid @enderror" 
                                    id="patrimonio" 
                                    name="patrimonio" 
                                    placeholder="Insira o Codigo de Patrimonio"
                                    value="{{old('patrimonio')}}">
                                @error('patrimonio')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="doacao">Doação</label>
                                <input 
                                    type="doacao" 
                                    class="form-control form-control-lg @error('doacao') is-invalid @enderror" 
                                    id="doacao" 
                                    name="doacao" 
                                    placeholder="Insira o Codigo de Doação"
                                    value="{{old('doacao')}}">
                                @error('doacao')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                    </div> 

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <label for="quantidade">Quantidade</label>
                                <input 
                                    type="quantidade" 
                                    class="form-control form-control-lg @error('quantidade') is-invalid @enderror" 
                                    id="quantidade" 
                                    name="quantidade" 
                                    placeholder="Insira a Quantidade"
                                    value="{{old('quantidade')}}">
                                @error('quantidade')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <label for="altura">P. Vertical</label>
                                <input 
                                    type="altura" 
                                    class="form-control form-control-lg @error('altura') is-invalid @enderror" 
                                    id="altura" 
                                    name="altura" 
                                    placeholder="Posição Vertical"
                                    value="{{old('altura')}}">
                                @error('altura')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <label for="largura">P. Horizontal</label>
                                <input 
                                    type="largura" 
                                    class="form-control form-control-lg @error('largura') is-invalid @enderror" 
                                    id="largura" 
                                    name="largura" 
                                    placeholder="Posição Horizontal"
                                    value="{{old('largura')}}">
                                @error('largura')
                                    <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        
                    </div> 
           
                    <div class="form-group">
                        <label>Prateleira</label>
                        <select 
                            class="form-control form-control-lg @error('prateleira') is-invalid @enderror"
                            name="prateleira"
                            id="rule">
                            @foreach ($prateleiras as $key => $prateleira)
                            <option value={{$prateleira->id}}>{{$prateleira->descricao}}</option>
                            @endforeach
                        </select>
                        @error('prateleira')
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