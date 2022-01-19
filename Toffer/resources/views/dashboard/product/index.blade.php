@extends('dashboard.template.template')

@section('body')
        
  
        <div class="dashboard__header"> 
            <h4>Produtos</h4>
            <form class="menu__search" method="post" action="{{route("product.search")}}">
                @csrf
                <input class="menu__input" name="filter"  value="{{$filters['filter'] ?? ''}}"  type="text" placeholder="Buscar produtos"/>
                <button type="submit" class="menu__button"><i class="fas fa-search"></i></button>
            </form>
            <a class="btn btn-info" href="{{route('product.create')}}">Novo +</a>
        </div>
     
        @forelse ($products as $product)
        <hr>
        <div class="product__card">
            <img src="{{ asset('storage/products/'.$product->image) }}" />
            <div class="content">
                <h2>{{$product->title}}</h2>
                <hr>
                <h5>Valor: R$ {{$product->unit_price}},00</h5>
                <hr>
            <p style=" 
                max-width: 90%; 
                overflow: hidden;
                height:50px;
                text-overflow: ellipsis;
                white-space: wrap;"
            >{{ $product->description }}</p>
            </div>
            <div class="information">
                <h5>Em estoque: {{$product->qtd}}</h5>
            </div>
            <div class="product_action">
                <a class="btn btn-warning" style="color:#fff;" href="{{route('product.editar',$product->id)}}">Edtiar</a>
                <button-delete product="{{$product->id}}"></button-delete>
                <a class="btn btn-info" style="color:#fff;" href="#">Detalhes</a>
            </div>
        </div>
       @empty
           <h1>Nenhum producto encontrado</h1>
       @endforelse
@endsection