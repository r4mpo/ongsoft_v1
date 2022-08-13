<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Bootstrap --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title')</title>

</head>

<body>    
    {{-- Cabeçalho --}}
    <header>
        <div class="header">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="/">OngSoft</a>                        
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <form class="navbar-form navbar-left" action="/" role="search">
                            <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Pesquisar">
                            </div>
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </form>
                        @auth
                            <ul class="nav navbar-nav">
                                <li><a href="/user/profile"><span id="icon-nav" class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuário</a></li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li><a href="/dashboard"><span id="icon-nav" class="glyphicon glyphicon-usd" aria-hidden="true"></span> Financeiro</a></li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li><a href="/pets/create"><span id="icon-nav" class="glyphicon glyphicon-plus" aria-hidden="true"></span> Adicionar Pet</a></li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <form action="logout" method="post">
                                    @csrf
                                    <li><a href="logout" onclick="event.preventDefault();this.closest('form').submit();"><button type="button" id="btn-nav-logout">Sair</button></a></li>
                                </form>
                            </ul>
                        @endauth

                        @guest
                            <ul class="nav navbar-nav">
                                <li><a href="/login"><span id="icon-nav" class="glyphicon glyphicon-user" aria-hidden="true"></span>  Entrar</a></li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li><a href="/register"><span id="icon-nav" class="glyphicon glyphicon-user" aria-hidden="true"></span> Cadastrar-se</a></li>
                            </ul>
                        @endguest
                    </div>
                </div>
            </nav>          
        </div>
    </header>

    {{-- Conteúdo --}}
    @yield('content')
    
</body>
</html>