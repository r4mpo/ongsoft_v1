@extends('layouts.main')
@section('title', "Financeiros - OngSoft")
@section('content')
    
    <table class="table" style="width: 600px; margin-left: 27%;">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Título</th>
            <th scope="col">Gasto (R$)</th>
            <th scope="col">Gasto (R$)</th>
            <th scope="col">Gasto (R$)</th>
            <th scope="col">Gasto (R$)</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>

        </tr>
        </thead>
        <tbody id="tabela">
            <tr>
                {{-- Dados ApiFetch --}}
            </tr>
        </tbody>
    </table>

    <button class="btn btn-warning" type="button" data-toggle="modal" data-target="#myModal" style="margin-left: 46%;">Importar</button>
    
    {{-- Modal para importar nota --}}
    @include('layouts.modal')
    
    {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- JavaScript --}}
    <script src="/js/ApiFetch.js"></script>

@endsection