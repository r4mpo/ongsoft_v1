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
                            <a href="/pets/show/{{ $pet->id }}"><h2>{{ $pet->name }}</h2></a>
                            <p>{{ $pet->description }}</p>
                        </div>

                        {{-- Verificamos se o usuário está logado e se está autorizado --}}
                        @auth
                            @can('Administrador')
                                <form action="/pets/delete/{{ $pet->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <span id="btnExcluir" class="glyphicon glyphicon-trash" onclick="event.preventDefault();this.closest('form').submit();" aria-hidden="true"></span>  
                                    <a href="/pets/edit/{{ $pet->id }}"><span id="btnEditar" class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                                </form> 
                            @endcan
                        @endauth    
                                    
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