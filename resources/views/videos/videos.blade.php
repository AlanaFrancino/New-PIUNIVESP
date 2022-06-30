@extends('layouts.app')
@section('content')
@include('flash-message')

<div class="card-body pb-0">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    Tutorial Livros
                </div>
                <video src="{{ asset('images/Tutorial_Livros.mp4') }}" controls></video>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    Tutorial Usuarios
                </div>
                <video src="{{ asset('images/Tutorial_Usuários.mp4') }}" controls></video>

            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    Tutorial Api Vlibras
                </div>
                <video src="{{ asset('images/Tutorial_API_Vlibras.mp4') }}" controls></video>

            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                    Tutorial Api Google
                </div>
                <video src="{{ asset('images/Tutorial_API_Google.mp4') }}" controls></video>
            </div>
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
