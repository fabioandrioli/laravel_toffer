@extends('site.template.template')

@section('css', asset('css/cart.css'))

@section('content')
<main>
    @if(Session::has('cart') && count(Session::get('cart')->getItems()) > 0)
    <section class="section-cart">
      
            <div class="section-cart__card">
                <h2>Carrinho de compras</h2>
                <h5>Preço</h5>
            
                    @forelse($products as $product)
                        <figure class="product__cart">
                            <hr>
                            <div class="cart__product-show">
                                <img class="img-product-cart" src="{{asset('storage/products/'.$product['item']->image)}}" />
                                <div class="cart-description">
                                    <h1>{{$product['item']->title}}</h1>
                                    <p>
                                        {{$product['item']->description}}
                                    </p>
                                </div>
                            </div>
                            <div class="cart__price">
                                <h4 class="text__price">
                                    <span>R$</span> 
                                    {{number_format($product['item']->unit_price,0,",",".")}}
                                    <span>00</span>
                                </h4>
                                <span class="promo">R$ 820,10</span>
                            </div>
                            <div class="product__action">
                                <h5 style="width:100%;">
                                    Em estoque
                                </h5>
                                <div class="cart__qtd">
                                    <h5>Quantidade: {{$product['qtd']}}</h5>
                                    <a style="color:white; margin:0 5px" class="btn btn-info" href="{{route('cart.add',$product['item']->id)}}">+</a> 
                                    <a  style="color:white; margin:0 5px" class="btn btn-danger" href="{{route('cart.remove',$product['item']->id)}}">-</a> 
                                    <div class="cart__pipe">|</div>
                                    <a href="{{route('cart.removeOneproduct',$product['item']->id)}}">Excluir</a>
                                    <div class="subtotal" style="width:100%;">
                                        <h4>Sub-total:</h4>
                                        <div class="cart__price">
                                            <h4 class="text__price">
                                                <span>R$</span> 
                                                {{number_format($product['item']->unit_price *  $product['qtd'],0,",",".")}}
                                                <span>00</span>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </figure>
                    @empty
                        <h3>Nenhum produto no carrinho</h3>
                    @endforelse
             
            <hr>
            <div class="subtotal">
                <h4>Total:({{$product['qtd']}})</h4>
                <div class="cart__price">
                    <h4 class="text__price">
                        <span>R$</span> 
                        {{number_format($cart->total(),0,",",".")}}
                        <span>00</span>
                    </h4>
                </div>
            </div>
            </div>
        <div class="cart__action">
            <div class="subtotal">
                <h4>Total:({{$product['qtd']}})</h4>
                <div class="cart__price">
                    <h4 class="text__price">
                        R$ {{number_format($cart->total(),0,",",".")}}
                    </h4>
                </div>
               <div class="frete">
                    <img class="icone_frete" src="./image/icones_site/caminhao-de-entrega.png" />
                    <h5 class="frete_gratis">Frete grátis</h5>
               </div>
               
            </div>
             <div class="buttons cho-container">
                <a href="#" class="mercadopago-button"  onclick="@if(Auth::check()) @if(Auth::user()->address)  checkout.open() @else redirectAddress() @endif @else redirect() @endif">Fechar pedido</a>
             </div>
           

        </div>
 
    </section>
    @else
        <h3>Nenhum produto no carrinho</h3>
    @endif
</main>

@endsection
@if(Session::has('cart'))
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
@endif
