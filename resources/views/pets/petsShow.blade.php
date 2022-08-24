@extends('layouts.mainPet')
@section('titlePet', $pet->name)
@section('contentPet')

    <div class="container">

        <div class="img" style="background-image: url('/img/uploads/{{ $pet->image }}'); background-size: 100%;">
            <!--  -->
        </div>

        <div class="info" style="text-align: center">
            <h2>Nome: {{ $pet->name }}</h2>
            <p>Idade: {{ $pet->age }} @if($pet->age > 1)anos @else ano @endif</p>
            
            @foreach ($pet->details as $detail)
                <li>{{ $detail }}</li>
            @endforeach

            <p id="description">{{ $pet->description }}</p>

            
            <div class="row">
                <a href="/"><button type="button" class="BotaoAzul">Retornar</button></a>
            </div>

        </div>

    </div>
@endsection