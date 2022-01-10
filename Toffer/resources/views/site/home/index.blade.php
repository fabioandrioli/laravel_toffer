@extends('site.template.template')

@section('css', asset('css/index_main.css'))

@section('banner')
<div class="banner">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./image/banner/3062.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./image/banner/3062.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="./image/banner/3062.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
       <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </button>
      </div>
    
</div><!--Banner-->
@endsection

@section('content')
<main>
    <section class="information">
        <div class="information__container">
            <div class="information__card">
                <h3>Reembolso</h3>
                <div class="container-img-reembolso">
                    <img src="{{asset('image/secao_garantia/dinheiro-de-volta.png')}}" alt="Fácil Reembolso">
                </div>
            </div>
            <div class="information__card">
                <h3>Rápida entrega</h3>
                <div class="container-img-reembolso">
                    <img src="./image/secao_garantia/entrega-rapida.png" alt="Fácil Reembolso">
                </div>
            </div>
            <div class="information__card">
                <h3>Pagemento seguro</h3>
                <div class="container-img-reembolso">
                    <img src="./image/secao_garantia/forma-de-pagamento.png" alt="Fácil Reembolso">
                </div>
            </div>
        </div>
    </section>
    <section class="products">
        <div class="container__toffer product_display">
            @forelse ($products as $product)
                <figure class="product__card">
                    <a href="{{route('site.show',$product->id)}}">
                        <img class="card__image" src="{{asset("/storage/products/".$product->image)}}" alt="Relógio de couro" srcset="">
                        <div class="card_body">
                            <p class="card_title">{{$product->title}}</p>
                            <p class="card_description">{{$product->description}}</p>
                            {{-- <p class="card_observacao">1 Mais visualizado até agora</p> --}}
                            {{-- <p class="card_sail">4070 vendidos</p> --}}
                            <h3 class="price">R$ {{number_format($product->unit_price,2,",",".")}} <span>R$ 820,10</span></h3>
                            <p class="price-disable"></p>
                        </div>
                    </a>
                </figure>
            @empty
                <h4>Nenhum produto encontrado</h4>
            @endforelse
          

           
        </div>
    </section>
</main>
@endsection
