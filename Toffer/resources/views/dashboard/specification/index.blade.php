@extends('dashboard.order.template')

@section('body')
<figure>   
    <div class="client-information">
        <h5>{{$product->title}}</h5>
        <a class="btn btn-info" href="{{route("product.newSpecification",$product->id)}}">Nova especificação</a>
    </div>
    <ul>
        @foreach ($specifications as $specification)
            <li>
                <hr>
                Titulo<br>
                {{$specification->title}}
                <hr>
                Descricação<br>
                {{$specification->description}}
                <hr>
                <a href="{{route("product.editSpecification",$specification->id)}}">Editar</a>
                <a href="{{route("product.deleteSpecification",$specification->id)}}">Deletar</a>
            </li>
        @endforeach
    </ul>
</figure>
@endsection