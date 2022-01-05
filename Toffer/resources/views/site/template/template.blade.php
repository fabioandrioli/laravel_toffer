<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
       
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/all.css">
        <link rel="stylesheet" href="css/site_header.css">
        <link rel="stylesheet" href="@yield('css')">
        <link rel="stylesheet" href="css/site_footer.css">
        <link rel="stylesheet" href="css/resets.css">
        <title>Home</title>
    </head>
    <body>
        <header class="header">
            <nav class="menu"> 
                <div class="menu__mobile">
                    <h1><a class="mobile__logo" href="#">TOFFER</a></h1>
                    <a class="mobile__button" href="#"><i class="fas fa-bars fa-2x"></i></a>
                </div>
                <div class="menu__container mobile-active">
                    <h1><a class="menu__logo" href="{{route('index')}}">TOFFER</a></h1>

                    <ul>
                        <li><p  class="menu__item">Olá, Seja bem vindo!</p></li>
                    </ul>
                    <form class="menu__search">
                        <input class="menu__input" type="text" placeholder="Buscar produto"/>
                        <button type="button" class="menu__button"><i class="fas fa-search"></i></button>
                    </form>
                    <ul>
                        <li> <a class="menu__item cart" href="{{route('cart')}}"><i class="fas fa-shopping-cart fa-2x"></i></li>
                        <li> <a class="menu__item cart" href="{{route('cart')}}"><p>(0)<br>carrinho</p></a></li>
                    </ul>
                    <ul class="menu__access">
                        <li> <i style="color:white" class="icone_login fas fa-user fa-2x"></i></li>
                        <li> <a class="menu__item" href="#">Login</a></li>
                        <li> <a class="menu__item piper">|</a></li>
                        <li> <a class="menu__item" href="#">inscrever - se</a></li>
                    </ul>
                </div>
            </nav><!-- Navbar - menu-->
            @yield('banner')
          </header>
          @yield('content')
        <footer>
            <div class="container__toffer footer">
                <ul>
                    <li>Entre em contato</li>
                    <li>Perguntas frequentes</li>
                </ul>
                <ul>
                    <li>Entre em contato</li>
                    <li>Perguntas frequentes</li>
                </ul>
                <ul>
                    <li>Entre em contato</li>
                    <li>Perguntas frequentes</li>
                </ul>
            </div>
        </footer>
    </body>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <script src="js/menu.js"></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    @stack('scripts')
   
</html>