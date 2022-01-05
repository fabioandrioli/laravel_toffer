@extends('site.template.template')

@section('css', asset('css/cart.css'))

@section('content')
<main>
    <section class="section-cart">
        <div class="section-cart__card">
            <h2>Carrinho de compras</h2>
            <h5>Preço</h5>
           
            <figure class="product__cart">
                <hr>
                <div class="cart__product-show">
                    <img class="img-product-cart" src="image/produto/relogio_3.jpg" />
                    <div class="cart-description">
                        <h1>Marca:Lige</h1>
                        <p>
                            Lige 2021 novo relógio inteligente masculino tela de toque completa ..
                        </p>
                        <h5>
                            Em estoque
                        </h5>
                        <div class="cart__qtd">
                            <input type="number" class="form-control" value="1" /> 
                            <div class="cart__pipe">|</div>
                            <a href="#">Excluir</a>
                        </div>
                        
                    </div>
                </div>
                <div class="cart__price">
                    <h4 class="text__price">
                        <span>R$</span> 
                        131 
                        <span>00</span>
                    </h4>
                    <span class="promo">R$ 820,10</span>
                </div>
            </figure>
            <figure class="product__cart">
                <hr>
                <div class="cart__product-show">
                    <img class="img-product-cart" src="image/produto/relogio_3.jpg" />
                    <div class="cart-description">
                        <h1>Marca:Lige</h1>
                        <p>
                            Lige 2021 novo relógio inteligente masculino tela de toque completa ..
                        </p>
                        <h5>
                            Em estoque
                        </h5>
                        <div class="cart__qtd">
                            <input type="number" class="form-control" value="1" /> 
                            <div class="cart__pipe">|</div>
                            <a href="#">Excluir</a>
                        </div>
                        
                    </div>
                </div>
                <div class="cart__price">
                    <h4 class="text__price">
                        <span>R$</span> 
                        131 
                        <span>00</span>
                    </h4>
                    <span class="promo">R$ 820,10</span>
                </div>
            </figure>
           <hr>
           <div class="subtotal">
            <h4>Sub-total:(1 item)</h4>
            <div class="cart__price">
                <h4 class="text__price">
                    <span>R$</span> 
                    262
                    <span>00</span>
                </h4>
            </div>
           </div>
        </div>
        <div class="cart__action">
            <div class="subtotal">
                <h4>Sub-total:(1 item)</h4>
                <div class="cart__price">
                    <h4 class="text__price">
                        R$ 262,00
                    </h4>
                </div>
               <div class="frete">
                    <img class="icone_frete" src="./image/icones_site/caminhao-de-entrega.png" />
                    <h5 class="frete_gratis">Frete grátis</h5>
               </div>
               
            </div>
            <div class="buttons cho-container"></div>
        </div>
    </section>
</main>
@endsection
@push('scripts')
    <script>
        // Adicione as credenciais do SDK
        const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
                locale: 'pt-BR'
        });
        
        // Inicialize o checkout
        mp.checkout({
            preference: {
                id: '{{ $preference->id }}'
            },
            render: {
                    container: '.cho-container', // Indique o nome da class onde será exibido o botão de pagamento
                    label: 'Fechar pedido', // Muda o texto do botão de pagamento (opcional)
            }
        });
    </script>
@endpush
