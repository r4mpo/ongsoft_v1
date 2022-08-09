@extends('layouts.main')
@section('title', "Editar: " . $pet->name)
@section('content')

    <script src="/js/formScript.js"></script>

    <div class="imgLayout">
        <img src="/img/uploads/{{ $pet->image }}" alt="" srcset="">
        <p style="margin-right: 60%; float: right; margin-top: 5px;">Imagem atual do pet :D</p>
    </div>

    <form action="/pets/update/{{ $pet->id }}" class="formPet" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <input type="hidden" name="fk_user" value="{{ $pet->fk_user }}">

        <div class="input-group">
            <div class="input-group">
                <span class="input-group-addon">
                    <input type="checkbox" id="cbId" onclick="geracaoAutomatica()" aria-label="...">
                </span>
                <input required type="number" value="{{ $pet->id }}" placeholder="ID" style="width: 218px" onchange="disabledCb()" id="IdCampo" name="id" class="form-control" aria-label="...">
            </div>
        </div>

        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><span style="color: black;" class="glyphicon glyphicon-pencil" aria-hidden="true"></span></span>
            <input type="text" value="{{ $pet->name }}" required name="name" class="form-control" placeholder="Nome (ex. Charlie)" aria-describedby="basic-addon1">
        </div>

        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><span style="color: black;" class="glyphicon glyphicon-heart" aria-hidden="true"></span></span>
            <input type="number" value="{{ $pet->age }}" required name="age" class="form-control" placeholder="Idade - Anos (ex. 3, 12)" aria-describedby="basic-addon1">
        </div>

        <textarea name="description" cols="28" rows="5" required>{{ $pet->description}}</textarea>

        <div class="CbPet">



            <p style="margin-top: 10px;">Selecione até 3 características do pet :D</p>

            <span class="input-group" style="margin-top: -10px;">

                <label for="Carinhoso">Carinhoso</label>
                <input type="checkbox" style="margin-left: 5px;" name="details[]" id="Carinhoso" value="Carinhoso" aria-label="...">

                <label for="Sociavel" style="margin-left: 5px;">Sociável</label>
                <input type="checkbox" style="margin-left: 5px;" name="details[]" id="Sociavel" value="Sociável" aria-label="...">

                <label for="Docil" style="margin-left: 5px;">Dócil</label>
                <input type="checkbox" style="margin-left: 5px;" name="details[]" id="Docil" value="Dócil" aria-label="...">
            </span>

            <span class="input-group">
                <label for="Adestrado">Adestrado</label>
                <input type="checkbox" style="margin-left: 5px;" name="details[]" id="Adestrado" value="Adestrado" aria-label="...">

                <label for="Protetor" style="margin-left: 5px;">Protetor</label>
                <input type="checkbox" style="margin-left: 5px;" name="details[]" id="Protetor" value="Protetor" aria-label="...">

                <label for="Pedigree" style="margin-left: 5px;">Pedigree</label>
                <input type="checkbox" style="margin-left: 5px;" name="details[]" id="Pedigree" value="Pedigree" aria-label="...">
            </span>

            <span class="input-group">
                <label for="Manso">Manso</label>
                <input type="checkbox" style="margin-left: 5px;" name="details[]" id="Manso" value="Manso" aria-label="...">

                <label for="Brincalhao" style="margin-left: 5px;">Brincalhão</label>
                <input type="checkbox" style="margin-left: 5px;" name="details[]" id="Brincalhao" value="Brincalhão" aria-label="...">

                <label for="Castrado" style="margin-left: 5px;">Castrado</label>
                <input type="checkbox" style="margin-left: 5px;" name="details[]" id="Castrado" value="Castrado" aria-label="...">
            </span>
        </div>

        <input type="file" name="image" id="image">

        <button class="btn btn-primary" style="margin-left: 80px; margin-top: 15px;" type="submit">Atualizar</button>
    </form>

    <script>
        disabledCb() // Chamando função ao carregar página
    </script>

@endsection