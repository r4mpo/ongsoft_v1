@extends('layouts.mainPet')
@section('titlePet', $pet->name)
@section('contentPet')

    <div class="container">

        <div class="img" style="background-image: url('/img/uploads/{{ $pet->image }}')">
            <!--  -->
        </div>

        <div class="form" style="text-align: center">
            <h2>Nome: {{ $pet->name }}</h2>
            <h2>Idade: {{ $pet->age }} @if($pet->age > 1)anos @else ano @endif</h2>
            
            @foreach ($pet->details as $detail)
                <li>{{ $detail }}</li>
            @endforeach

            <p id="description">{{ $pet->description }}</p>

            
            <div class="row">
                <a href="/">Retornar</a>
            </div>

        </div>

    </div>
@endsection