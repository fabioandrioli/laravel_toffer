@extends('dashboard.template.template')


@section('body')
<div class="container container-toffer">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header card__header--toffer">{{ __('Editar especificação do produto '.$specification->product->title) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route("product.updateSpecification",$specification->id)}}">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="inputs">
                            <label for="id" class="register__text">{{$specification->product->title}}</label>
                            <input id="id"  name="product_id" value="{{$specification->product->id}}" type="hidden">
                           </div>


                       <div class="inputs">
                        <label for="name" class="register__text">titulo da especificação</label>
                        <input id="name" value="{{$specification->title}}"  name="title" type="text" placeholder="titulo" class="form-control" required autocomplete="name" autofocus>
                       </div>

                       <div class="inputs">
                        <label for="decription" class="register__text">descrição</label>
                        <input id="description" value="{{$specification->description}}"  name="description" type="text" placeholder="Descrição" class="form-control" required autocomplete="description" autofocus>
                       </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn__toffer">
                                    {{ __('Salvar') }}
                                </button>
                                <a class="btn btn-info btn__toffer" style="color:white;" href="{{route('dataClient')}}">voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection