@extends('layouts.mainPet')
@section('titlePet', "Cadastrar Pet - OngSoft")
@section('contentPet')

    <div class="container">

        <div class="form-image">
            <img src="/img/uploads/{{ $pet->image }}" alt="">
        </div>

        <form action="/pets/update/{{ $pet->id }}" class="form" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="fk_user" value="{{ $pet->fk_user }}">

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <input type="checkbox" id="cbId" onclick="geracaoAutomatica()"
                            aria-label="Checkbox for following text input">
                    </div>
                </div>
                <input type="number" onchange="disabledCb()" value="{{ $pet->id }}" id="IdCampo" name="id" required class="form-control"
                    placeholder="ID" aria-label="Text input with checkbox">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <ion-icon name="fish"></ion-icon>
                    </span>
                </div>
                <input type="text" value="{{ $pet->name }}" required class="form-control" placeholder="Nome" aria-label="Nome"
                    aria-describedby="basic-addon1" name="name">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <ion-icon name="calendar-number"></ion-icon>
                    </span>
                </div>
                <input type="number" value="{{ $pet->age }}" step="0.01" required class="form-control" placeholder="Idade" aria-label="Idade"
                    aria-describedby="basic-addon1" name="age">
            </div>

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <ion-icon name="information-circle"></ion-icon>
                    </span>
                </div>
                <textarea name="description" class="form-control" placeholder="Descrição (...)" aria-label="With textarea">{{ $pet->description }}</textarea>
            </div>
            
            <span class="input-group">
                <input type="checkbox" name="details[]" id="Carinhoso" value="Carinhoso" aria-label="...">
                <label for="Carinhoso" class="lbl_1">Carinhoso</label>
                <input type="checkbox" class="cb_1" name="details[]" id="Sociavel" value="Sociável" aria-label="...">
                <label for="Sociavel" class="lbl_1">Sociável</label>
                <input type="checkbox" name="details[]" class="cb_1" id="Docil" value="Dócil" aria-label="...">
                <label for="Docil" class="lbl_1">Dócil</label>
            </span>

            <span class="input-group" id="CheckBoxes_2">
                <input type="checkbox" name="details[]" id="Adestrado" value="Adestrado" aria-label="...">
                <label for="Adestrado" class="lbl_1">Adestrado</label>
                <input type="checkbox" name="details[]" class="cb_1" id="Protetor" value="Protetor" aria-label="...">
                <label for="Protetor" class="lbl_1">Protetor</label>
                <input type="checkbox" name="details[]" class="cb_1" id="Pedigree" value="Pedigree" aria-label="...">
                <label for="Pedigree" class="lbl_1">Pedigree</label>
            </span>

            <span class="input-group" id="CheckBoxes_3">
                <input type="checkbox" name="details[]" id="Manso" value="Manso" aria-label="...">
                <label for="Manso" class="lbl_1">Manso</label>
                <input type="checkbox" name="details[]" class="cb_1" id="Brincalhao" value="Brincalhão"
                    aria-label="...">
                <label for="Brincalhao" class="lbl_1">Brincalhão</label>
                <input type="checkbox" name="details[]" id="Castrado" class="cb_1" value="Castrado" aria-label="...">
                <label for="Castrado" class="lbl_1">Castrado</label>
            </span>

            <div class="typeFile">
                <input type="file" name="image" id="image">
            </div>
            
            <button type="submit" id="btnCadastrar" class="btn btn-success btn-lg btn-block">Atualizar</button>
            
            <div class="row">
                <a href="/">
                    <ion-icon name="return-down-back"></ion-icon>
                </a>
                <ion-icon onclick="infoAlert()" name="help-circle"></ion-icon>
            </div>
        </form>
    </div>

    {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- JavaScript --}}
    <script src="/js/formScript.js"></script>
    
@endsection