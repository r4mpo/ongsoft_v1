@extends('layouts.main')
@section('title', "Financeiros - OngSoft")
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<table class="table" style="width: 600px; margin-left: 27%;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Título</th>
        <th scope="col">Despesa (R$)</th>
        <th scope="col">Despesa (R$)</th>
        <th scope="col">Despesa (R$)</th>
        <th scope="col">Despesa (R$)</th>
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Importar por XML</h4>
        </div>
        <div class="modal-body">
            <input type="file" name="xmlFile" id="xmlFile">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" onclick="EnviarXml()" class="btn btn-default" data-dismiss="modal">Enviar</button>
        </div>
    </div>

  </div>
</div>

{{-- Referências JS --}}
<script src="/js/ApiFetch.js"></script>

<script>
    // Chamando dados para tabela
    dataTable()
</script>

@endsection