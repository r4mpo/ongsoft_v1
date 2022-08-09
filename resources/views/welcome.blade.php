@extends('layouts.main')
@section('title', "Home - OngSoft")
@section('content')

    @if(session('msg'))
        <p class="msg">{{ session('msg') }}</p>
    @endif

    <div class="row" style="margin-left: 6%; margin-top: 3%;">
        @foreach($pets as $pet)
            <div class="col-sm-6 col-md-4" id="card">
                <div class="thumbnail">
                    <img src="/img/uploads/{{ $pet->image }}" alt="...">
                    <div class="caption">
                        <h3>{{ $pet->name }}</h3>
                        <p>{{ $pet->age }} @if($pet->age > 1)anos @else ano @endif</p>
                        <p><a href="/pets/show/{{ $pet->id }}" class="btn btn-warning" role="button">Leia mais...</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection