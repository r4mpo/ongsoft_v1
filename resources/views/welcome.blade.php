@extends('layouts.main')
@section('title', "Home - OngSoft")
@section('content')

    @if(session('msg'))
        <div class="msg">
            <p>{{ session('msg') }}</p>
        </div>
    @endif

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

    {{-- 
        Para separar o conteúdo por páginas, usamos $x->links() na view;
        No controller especificamos o máximo de dados que virá
        para a view, com o método ->paginate(x) ou ::paginate(x);
        No AppServiceProvider indicamos o uso de bootstrap 
    --}}

    <div class="pages">
        {{ $pets->links() }}
    </div>

@endsection