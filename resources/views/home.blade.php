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
                <h5 class="card-title" style="display: flex;flex-wrap: nowrap;justify-content: space-around;">Historico de Aquisição e Acervo da biblioteca da UFRN</h5>
                <div class='card-body' style="display: flex;flex-wrap: nowrap;justify-content: space-around;">
                    <iframe title="PI2" width="700" height="400"  src="https://app.powerbi.com/view?r=eyJrIjoiYWU0YWU4NTAtZDJiNS00YzJmLThkNDEtOTA2M2RiZTBjNTU4IiwidCI6ImQ0NDU2M2FhLTIxZTMtNDNkMC1iMDlkLTU0MGNjNjlhMzlkNiIsImMiOjF9" frameborder="0" allowFullScreen="true"></iframe>
                </div>
            </div>
        </div>

    </div>
@endsection
