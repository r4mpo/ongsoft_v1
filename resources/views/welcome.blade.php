@extends('layouts.main')
@section('title', "Home - OngSoft")
@section('content')
    <div class="row">
        @foreach($pets as $pet)
            <div class="col-sm-6 col-md-4">
                <div class="container">
                    <div class="polaroid">
                        <img class="photo" src="/img/uploads/{{ $pet->image }}" alt="">
                        <div class="caption">
                            <h2>{{ $pet->name }}</h2>
                            <p>{{ $pet->description }}</p>
                        </div>
                    </div> 
                </div>  
            </div> 
        @endforeach
    </div>
@endsection