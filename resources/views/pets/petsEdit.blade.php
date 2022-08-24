@extends('layouts.mainPet')
@section('titlePet', "Editar: " . $pet->name)
@section('contentPet')

    <form action="/pets/update/{{ $pet->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">

            <div class="img" style="background-image: url('/img/uploads/{{ $pet->image }}'); background-size: 100%;">
                {{--  --}}
            </div>

            <div class="form">
                <div class="CamposDeTexto">
                    <input type="text" class="CampoDeTexto" value="{{ $pet->id }}" onchange="disabledCb()" placeholder="Digite o ID (...)"  name="id" id="IdCampo">
                    <input type="checkbox" onclick="geracaoAutomatica()" id="cbId">
                    <input type="text" value="{{ $pet->name }}" class="CampoDeTexto" placeholder="Digite o nome (...)" name="name">
                    <input type="text" value="{{ $pet->age }}" class="CampoDeTexto" style="display: block;" placeholder="Digite a idade (...)" name="age">
                    <textarea class="CampoDeTexto" name="description" placeholder="Digite uma descrição (...)" maxlength="124" cols="21" rows="5">{{ $pet->description }}</textarea>
                </div>

                <div class="details">

                    <div class="GrupoDeCheckBox">
                        <input type="checkbox" name="details[]" id="Carinhoso" value="Carinhoso" aria-label="...">
                        <label for="Carinhoso">Carinhoso</label>
                        <input type="checkbox" name="details[]" id="Sociavel" value="Sociável" aria-label="...">
                        <label for="Sociavel">Sociável</label>
                        <input type="checkbox" name="details[]" id="Docil" value="Dócil" aria-label="...">
                        <label for="Docil">Dócil</label>
                    </div>
        
                    <div class="GrupoDeCheckBox">
                        <input type="checkbox" name="details[]" id="Adestrado" value="Adestrado" aria-label="...">
                        <label for="Adestrado">Adestrado</label>
                        <input type="checkbox" name="details[]" id="Protetor" value="Protetor" aria-label="...">
                        <label for="Protetor">Protetor</label>
                        <input type="checkbox" name="details[]" id="Pedigree" value="Pedigree" aria-label="...">
                        <label for="Pedigree">Pedigree</label>
                    </span>
        
                    <div class="GrupoDeCheckBox">
                        <input type="checkbox" name="details[]" id="Manso" value="Manso" aria-label="...">
                        <label for="Manso">Manso</label>
                        <input type="checkbox" name="details[]" id="Brincalhao" value="Brincalhão"
                            aria-label="...">
                        <label for="Brincalhao">Brincalhão</label>
                        <input type="checkbox" name="details[]" id="Castrado" value="Castrado" aria-label="...">
                        <label for="Castrado">Castrado</label>
                    </div>        

                </div>

                <div class="arquivo">
                    <input type="file" name="image" id="image">
                </div>

                <div class="CampoDoBtn">
                    <button type="submit" class="Botao">Atualizar</button>
                    <a href="/"><button type="button" class="BotaoAzul">Retornar</button></a>

                </div>

            </div>

        </div>
    </form>

    {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- JavaScript --}}
    <script src="/js/formScript.js"></script>

@endsection