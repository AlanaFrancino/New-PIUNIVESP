@extends('layouts.app')
@section('content')

    <div class="card card-solid">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="text-left">
                        <a href="{{route('users.create')}}" class="btn btn-lg bg-success" title="Edit Product">
                            <i class="fa fa-plus-circle"></i> Create new User
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <form action="{{route('users.search')}}" method="POST">
                        @csrf
                        <div class="input-group input-group-lg">
                            <input type="text" name="search" class="form-control @error('search') is-invalid @enderror" placeholder="Enter the user name">
                            <span class="input-group-append">
                            <button type="submit" class="btn btn-info btn-flat">Search</button>
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
                            <button type="button" class="btn btn-default btn-lg dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                User Filters
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item" href="{{ route('users.filter', ['parameter' => 'activated']) }}">Activated Users</a>
                                <a class="dropdown-item" href="{{ route('users.filter', ['parameter' => 'desactivated']) }}">Desactivated Users</a>
                                <a class="dropdown-item" href="{{ route('users.filter', ['parameter' => 'administrator']) }}">Administrator Users</a>
                                <a class="dropdown-item" href="{{ route('users.filter', ['parameter' => 'customer']) }}">Customer Users</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body pb-0">
            <div class="row">
                @forelse ($users as $user)
                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                                @if($user->tipo === 'user') User @else Funcionario @endif 
                            </div>
                            <div class="card-body pt-1">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="lead"><b>{{$user->nome_completo}}</b></h2>
                                        <p class="text-muted text-sm"><b>Email: </b>{{ $user->email }}</p>
                                    </div>
                                    <div class="col-5 text-center">
                                        <img
                                            @if(!$user->image)
                                            src="{{asset('../../images/user_padrao.jpg')}}"
                                            @else
                                            src="{{asset('storage/' . $user->image)}}"
                                            @endif
                                            alt="user-avatar" class="img-circle img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-right">
                                    <form action="{{route('users.delete', ['id' => $user->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route("users.edit", ['id' => $user->id])}}" class="btn bg-teal" title="Edit Category">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="submit" class="btn btn-danger" title="Excluir Usuario"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>Users Not Found. @isset($parameter) For filter: {{ $parameter }} @endisset</p>
                @endforelse
            </div>
        </div>
        <div class="card-footer">
            <div class="row d-flex justify-content-center ">
                {{$users->links()}}
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