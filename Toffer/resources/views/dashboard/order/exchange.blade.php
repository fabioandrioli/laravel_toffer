@extends('dashboard.order.template')

@section('orders')
        
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
         <a class="btn-order-next-status verde-claro" href="#">Mudar status para: Finalizado</a>
         <a class="btn-order-next-status mostard" href="#">Mudar status para: Aguardando entrega</a>
         <a class="btn-order-next-status morrom-estranho" href="#">Mudar status para: Devolução</a>
         <a class="btn-order-next-status verde-escuro" href="#">Mudar status para: Em entrega</a>
     </div>
 </figure>
@endsection