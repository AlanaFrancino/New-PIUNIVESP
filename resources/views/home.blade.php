@extends('layouts.app')

@section('content')
    @include('flash-message')
    <div class='dashboard-content'>
        <div class='container'>
            <div class='card'>
                <br>
                <div class='card-header'>
                    <h1>Bem vindo ao Web Delmira</h1>
                </div>
                <h5 class="card-title" style="display: flex;flex-wrap: nowrap;justify-content: space-around;">Fluxo de empréstimos e acervo bibliográfico</h5>
                <div class='card-body' style="display: flex;flex-wrap: nowrap;justify-content: space-around;">
                    <iframe title="PI3" width="700" height="400"  src="https://dataplatform.cloud.ibm.com/dashboards/f636c54b-c076-47fa-9d54-34bf80ece421/view/0028c51a19ed22f472edf6e407ca25527432775fb1bb8b56d1d17b495d682597f06c46c7c87b1e58df135131a2bf105bcf" frameborder="0" allowFullScreen="true"></iframe>
                </div>
            </div>
        </div>

    </div>
@endsection
