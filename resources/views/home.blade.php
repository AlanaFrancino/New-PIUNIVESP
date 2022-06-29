@extends('layouts.app')

@section('content')
    @include('flash-message')
    <div class='dashboard-content'>
        <div class='container'>
            <div class='card'>
                <div class='card-header'>
                    <h1>Bem vindo ao Web Delmira</h1>
                </div>
                <div class='card-body'>
                    <p>Site em construção</p>
                </div>
            </div>
        </div>

        <iframe title="pi_controle_estoque" width="600" height="373.5" src="https://app.powerbi.com/view?r=eyJrIjoiYjZiMzY5MzItOWU5Ny00ZTQwLTlmOGEtNWUxM2EwMTkwMzNlIiwidCI6ImQ0NDU2M2FhLTIxZTMtNDNkMC1iMDlkLTU0MGNjNjlhMzlkNiIsImMiOjF9&pageName=ReportSection" frameborder="0" allowFullScreen="true"></iframe>
    </div>
@endsection
