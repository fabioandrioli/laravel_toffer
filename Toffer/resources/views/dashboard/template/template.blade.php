@extends('site.template.template')

@section('css', asset('css/dashboard_main.css'))

@section('content')
<main>
    <div class="dashboard">
        <div class="menu-lateral">
            <ul>
                <li> <a href="{{route('dataClient')}}"><i class="fas fa-digital-tachograph fa-2x"></i>Meus Dados</a></li>
                <hr>
                @can("administrador")
                    <li> <a href="{{route('dashboard.clients')}}"><i class="fa fa-user fa-2x"></i> Clientes</a></li>
                    <hr>
                    @can("webmaster")
                         <li> <a href="{{route('dashboard.user')}}"><i class="fas fa-users fa-2x"></i> Usuários</a></li>
                         <hr>
                     @endcan
                    <li><a href="{{route('order')}}"><i class="fas fa-boxes fa-2x"></i> Pedidos</a></li>
                    <hr>
                    <li><a href="{{route('product')}}"><i class="fas fa-box fa-2x"></i> Produtos</a></li>
                    <hr>
                    <li><a href="{{route('category')}}"><i class="fas fa-th fa-2x"></i> Categorias</a></li>
                    <hr>
                    @can("webmaster")
                        <li><a href="#"><i class="fas fa-th-large fa-2x"></i> SubCategoria</a></li>
                        <hr>
                        <li><a href="#"><i class="fas fa-money-bill-wave fa-2x"></i> Vendas</a></li>
                        <hr>
                        <li><a href="#"><i class="fas fa-shopping-bag fa-2x"></i> Gastos</a></li>
                        <hr>
                        <li><a href="#"><i class="fas fa-chart-bar fa-2x"></i> Estatísticas</a></li>
                        <hr>
                    @endcan
                    <li><a href="{{route("doubt")}}"><i class="fas fa-bullhorn fa-2x"></i> Perguntas</a></li>
                    <hr>
                @endcan
            </ul>
        </div>
        <div class="dashboard__body">
            @yield('body')
        </div>
    </div>
</main>
@endsection
