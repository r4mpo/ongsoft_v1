@extends('layouts.main')
@section('title', $pet->name)
@section('content')
<div class="imgLayout">
    <img src="/img/uploads/{{ $pet->image }}" alt="" srcset="">
</div>
<div class="infoShow">
    <h1>{{ $pet->name }}</h1>
    <h2 style="margin-top: -10px;">{{ $pet->age }} @if($pet->age > 1)anos @else ano @endif</h2>
    @foreach ($pet->details as $detail)
        <li>{{ $detail }}</li>
    @endforeach
    <h5>{{ $pet->description }}</h5>
</div>
<div class="btnInfo">
    <a href="/pets/edit/{{ $pet->id }}"><button class="btn btn-primary" style="margin-left: 80px; margin-top: 60px;" type="button">Editar</button></a>
    <form action="/pets/delete/{{ $pet->id }}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" style="margin-left: 80px; margin-top: 15px;" type="submit">Excluir</button>
    </form>
</div>
@endsection