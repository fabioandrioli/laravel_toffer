@extends('dashboard.template.template')

@section('body')
        
<div class="container-fluid">
    <div class="card__order">
        <div class="card__order___header">
            <a class="btn_order mostard" href="{{route('order')}}">Aguardando entrega</a>
            <a class="btn_order verde-escuro" href="{{route('delivery')}}">Em entrega</a>
            <a class="btn_order verde-claro" href="{{route('dispatched')}}">Finalizado</a>
            <a class="btn_order bordo" href="{{route('exchange')}}">Processo de troca</a>
            <a class="btn_order morrom-estranho" href="{{route('giveup')}}">Devolução</a>
        </div>
        <div class="order__card___search">
            <form method="post">
                @csrf
                <input type="text" class="form-control search-order" name="filter"/>
                <button class="btn btn-info" type="submit">Buscar</button>
            </form>
        </div>
        <hr>
        @yield("orders")
    </div>
</div>
@endsection