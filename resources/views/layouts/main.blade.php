<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- Bootstrap --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    {{-- Sweet Alert --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>

    {{-- CSS --}}
    <link rel="stylesheet" href="/css/style.css">

    <title>@yield('title')</title>
</head>

<body style="overflow-x: hidden;">
    {{-- Cabeçalho --}}
    <header>
        <div class="header">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">OngSoft</a>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <form class="navbar-form navbar-left" action="/" role="search">
                            <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Pesquisar">
                            </div>
                            <button type="submit" class="btn btn-default"><span style="color: black;" class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </form>
                        @auth
                            <ul class="nav navbar-nav">
                                <form action="logout" method="post">
                                    @csrf
                                    <li><a href="logout" onclick="event.preventDefault();this.closest('form').submit();"><span style="color: rgb(112, 13, 13); margin-top: 15px;" class="glyphicon glyphicon-log-out" aria-hidden="true"></span></a></li>
                                </form>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li><a href="/user/profile"><span style="color: black;" class="glyphicon glyphicon-user" aria-hidden="true"></span></a></li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li><a href="/dashboard"><span style="color: black;" class="glyphicon glyphicon-home" aria-hidden="true"></span></a></li>
                            </ul>

                            <ul class="nav navbar-nav">
                                <li><a href="/pets/create"><span style="color: black;" class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></li>
                            </ul>
                        @endauth

                        @guest
                            <ul class="nav navbar-nav">
                                <li><a href="/login"><span style="color: rgb(32, 173, 19);" class="glyphicon glyphicon-log-in" aria-hidden="true"></span></a></li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li><a href="/register"><span style="color: rgb(32, 173, 19);" class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a></li>
                            </ul>
                        @endguest
                    </div>
                </div>
            </nav>          
        </div>
    </header>

    {{-- Conteúdo --}}
    @yield('content')

    {{-- Rodapé --}}
    <footer>
        <div class="footer">
            <h3>OngSoft 2022 &copy; - All Rights Reserved - WEB DEVELOPER: @r4mpo</h3>
        </div>
    </footer>
    
</body>
</html>