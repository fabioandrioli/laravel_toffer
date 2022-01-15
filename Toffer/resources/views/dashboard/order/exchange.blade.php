@extends('dashboard.order.template')

@section('orders')
@forelse ($orders as $order)          
    <figure>   
        <div class="client-information">
            <h5>Informações do cliente</h5>
            <hr>
            <h5>Endereço para entrega</h5>
        </div>
        <hr>
        <div class="situation">
            <h3 class="text-situation bordo">Processo de<br>troca</h3>
            <h3 class="order-text-price">R$ 131,00</h3>
        </div>
        <div class="card__order__action ">
            <a class="btn-order-next-status verde-claro"href="{{route("order.dispatched.exchange",$order->id)}}">Mudar status para: Finalizado</a>
            <a class="btn-order-next-status mostard" href="{{route("order.waiting.exchange",$order->id)}}">Mudar status para: Aguardando entrega</a>
            <a class="btn-order-next-status morrom-estranho" href="{{route("order.giveup.exchange",$order->id)}}">Mudar status para: Devolução</a>
            <a class="btn-order-next-status verde-escuro" href="{{route("order.delivery.exchange",$order->id)}}">Mudar status para: Em entrega</a>
        </div>
    </figure>
 @empty
 <h3>Nenhum pedido encontrado</h3>
@endforelse   
@endsection