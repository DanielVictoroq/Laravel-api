<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistema de Condomínio</title>
    <script src="{{ url('js/app.js') }}" defer></script>
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
</head>
<script>
    var baseurl =  "{{ env('APP_URL') }}";
</script>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <i class="fas fa-home mr-2"></i> Principal 
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <ul class="navbar-nav ml-auto">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('register') }}">Registrar</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown usuario-nav">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Session::get('dados_login')->nome.' '.Session::get('dados_login')->sobrenome}} <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right headermenu" aria-labelledby="navbarDropdown">
                                @if (Session::get('dados_login')->id_tipo == 'S' || Session::get('dados_login')->id_tipo == 'A')
                                <a class="dropdown-item" href="{{route('predio')}}"><i class="fas fa-hammer fa-2x"></i> Adicionar Serviço de Manutenção</a>
                                <a class="dropdown-item" href="{{route('recados')}}"><i class="far fa-newspaper fa-2x"></i>Recados</a>
                                <a class="dropdown-item" href="{{route('ocorrencias')}}"><i class="fas fa-exclamation-circle fa-2x"></i>Ocorrências</a>
                                <a class="dropdown-item" href="{{route('predio')}}"><i class="fas fa-home fa-2x"></i>Gerenciar Apartamentos</a>
                                
                                @else
                                <a class="dropdown-item" href="{{route('predio')}}"><i class="fas fa-exclamation-circle fa-2x"></i> Sinalizar Problema</a>
                                @endif
                                <a class="dropdown-item" href="{{route('predio')}}"><i class="far fa-building fa-2x"></i></i>Prédio</a>
                                <a class="dropdown-item" href="{{route('predio')}}"><i class="far fa-envelope fa-2x"></i>Mensagens</a>
                                <form id="logout-form" action="{{  route('logout') }}" method="GET" style="display: none;">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-2x"></i> Sair
                                </a>
                            </div>
                        </li>
                        
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
        
    </div>
    
    <footer class="footer-sistema container-fluid">
        <div class="container d-flex align-items-center justify-content-between text-white">
            <a class="navbar-brand " href="{{ url('/') }}">
                Sistema de Condomínio 
            </a>
            <p class="">@php echo date('Y');@endphp</p>
        </div>
    </footer>
</body>
</html>
