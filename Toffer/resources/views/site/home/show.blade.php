@extends('site.template.template')

@section('css', asset('css/show_main.css'))

@section('content')
<main>
    <div class="container-show">
        <section class="container-product-description">
            <div class="galeria">
                <div class="title__mobile">Relógio masculino Ligie</div>
                <img class="card-image" src="{{asset('/image/produto/relogio_3.jpg')}}" alt="">
               <div class="sub__card">
                   <a href="#"><img class="sub-card-image active" src="{{asset('/image/produto/relogio_3.jpg')}}" alt=""></a> 
                   <a href="#"><img class="sub-card-image" src="{{asset('/image/produto/relogio_3.jpg')}}" alt=""></a>
                   <a href="#"><img class="sub-card-image" src="{{asset('/image/produto/relogio_3.jpg')}}" alt=""></a>
               </div>
                <div class="mobile-image">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{asset('/image/produto/relogio_3.jpg')}}" style="width:100%;" alt="...">
                           
                          </div>
                          <div class="carousel-item">
                            <img src="{{asset('/image/produto/relogio_3.jpg')}}" style="width:100%;" alt="...">
                            
                          </div>
                          <div class="carousel-item">
                            <img src="{{asset('/image/produto/relogio_3.jpg')}}" style="width:100%;" alt="...">
                            
                          </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Próximo</span>
                        </button>
                    </div>
                </div>
               <h4 class="observacao">* Informação importante</h4>
               <h5 class="observacao" style="color:#ff0000;font-weight: 500;">Este relógio não é a prova de aguá</h5>
            </div>
            <div class="description">
                <h1 class="description__title">{{$product->title}}</h1>
                <p class="description__text">
                   {{$product->description}}
                </p>
                <hr>
                <h4 class="text__price">
                    <span>R$</span> 
                    {{number_format($product->unit_price,0,",",".")}}
                    <span>00</span>
                    <span class="promo">R$ 820,10</span>
                </h4>
                <div class="card-desconto">
                    <p>30% desconto</p>
                </div>
                <hr>
                <h4>Frete grátis</h4>
                <img class="forma_de_pagamento" src="{{asset('/image/pagamentos/pagamentos.jpg')}}" />
            </div>
            <div class="card-action">
                <h4 class="text__price">
                    <span>R$</span> 
                    {{number_format($product->unit_price,0,",",".")}}
                   <span>00</span>
                    <span class="promo">R$ 820,10</span>
                </h4>
                <h4>Entrega em até 3 horas</h4>
                <div class="buttons">
                    <a href="{{route('cart.add',$product->id)}}" class="add__cart">Adicionar ao carrinho</a>
                    <a href="#" class="mercadopago-button"  onclick="@if(Auth::check()) @if(Auth::user()->address)  checkout.open() @else redirectAddress() @endif @else redirect() @endif">Comprar agora</a>
                </div>
                <h4 class="text_frete">Frete grátis</h4>
                <h4 class="observacao_text">**Entrega apenas no litoral</h4>
                <img class="forma_de_pagamento" src="{{asset('/image/pagamentos/pagamentos.jpg')}}" />
            </div>       
        </section>
        <section class="perguntas">
         <form action="" method="post">
            <h4>Dúvidas ?</h4>
            <div class="input-group input-group-lg">
                <input type="text" placeholder="Digite suas dúvidas" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
              </div>
              <button class="btn btn-info mt-3 mb-3 btn-mobile">Enviar</button>
         </form>
         <hr>
        </section>
        <section class="especificacoes">
            <h3>Especificações do produto</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tbody>
                        <tr>
                          <td>Marca</td>
                          <td>Otto</td>
                        </tr>
                        <tr>
                          <td>Modelo</td>
                          <td>Thornton</td>
                        </tr>
                        <tr>
                          <td>Tipo de tela</td>
                          <td>the Bird</td>
                        </tr>
                      </tbody>
                </table>
              </div>
        </section>
    </div>
</main>

@endsection
@push('scripts')
<script>


    // Adicione as credenciais do SDK
    const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
            locale: 'pt-BR'
    });
    
    // Inicialize o checkout
    const checkout = mp.checkout({
        preference: {
            id: '{{ $preference->id }}'
        },
    });

    function redirect(){
      window.location.href = "{{route('login')}}";
    }

    function redirectAddress(){
      window.location.href = "{{route('address')}}";
    }

</script>
@endpush