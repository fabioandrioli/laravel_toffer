<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('css/all.css')}}">
        <link rel="stylesheet" href="{{asset('css/site_header.css')}}">
        <link rel="stylesheet" href="@yield('css')">
        <link rel="stylesheet" href="{{asset('css/site_footer.css')}}">
        <link rel="stylesheet" href="{{asset('css/resets.css')}}">
        <title>Home</title>
  
    </head>
    <body>
    @inject('cart', 'App\Models\Cart')

    <div id="app">
        <header class="header">
            <nav class="menu"> 
                <div class="menu__mobile">
                    <h1><a class="mobile__logo" href="#">TOFFER</a></h1>
                    <a class="mobile__button" href="#"><i class="fas fa-bars fa-2x"></i></a>
                </div>
                <div class="menu__container mobile-active">
                    <h1><a class="menu__logo" href="{{route('site.index')}}">TOFFER</a></h1>

                    <ul>
                        @guest
                            <li><p  class="menu__item">Olá, Seja bem vindo!</p></li>
                         @else
                            <li><p  class="menu__item">Olá, {{ explode(' ',trim(Auth::user()->name))[0] }} Seja bem vindo!</p></li>
                        @endguest
                    </ul>
                    <form class="menu__search" method="post" action="{{route("site.search")}}">
                        @csrf
                        <input class="menu__input" name="filter"  value="{{$filters['filter'] ?? ''}}"  type="text" placeholder="Buscar produto"/>
                        <button type="submit" class="menu__button"><i class="fas fa-search"></i></button>
                    </form>
                    <ul>
                        <li> <a class="menu__item cart" href="{{route('site.cart')}}"><i class="fas fa-shopping-cart fa-2x"></i></li>
                        <li> <a class="menu__item cart" href="{{route('site.cart')}}"><p>@if(Session::has('cart'))({{count(Session::get('cart')->getItems())}}) @else {{(0)}} @endif<br>carrinho</p></a></li>
                    </ul>
                    <ul class="menu__access">
                        @guest
                            <li> <i style="color:white" class="icone_login fas fa-user fa-2x"></i></li>
                            <li> <a class="menu__item" href="{{ route('login') }}">Login</a></li>
                            <li> <a class="menu__item piper">|</a></li>
                            <li> <a class="menu__item" href="{{ route('register') }}">inscrever - se</a></li>
                        @else
                            <li> <i style="color:white" class="icone_login fas fa-user fa-2x"></i></li>
                            <li> <a class="menu__item" href="{{route('dataClient')}}"> {{ explode(' ',trim(Auth::user()->name))[0] }}</a></li>
                            <li> <a class="menu__item piper">|</a></li>
                            <li> 
                                <a class="menu__item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav><!-- Navbar - menu-->
            @yield('banner')
          </header>
          @yield('content')
        <footer>
            <div class="container__toffer footer">
                <ul>
                    <li>Entre em contato, clique <a class="link_contact" href="{{route('contact')}}">aqui</a> </li>
                    {{-- <li>Perguntas frequentes</li> --}}
                </ul>
                <ul>
                    <li>Todos os direitos reservados <i class="fa fa-copyright" aria-hidden="true"></i>copyright</li>
                </ul>
                <ul>
                    <li>Siga-nos nas nossas redes sociais</li>
                    <li>
                        <a href=""><i class="fab fa-facebook"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
    </body>
    <!-- JavaScript Bundle with Popper -->
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="{{asset('js/menu.js')}}"></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
    @stack('scripts')
    @stack('tinymce')   
</html>