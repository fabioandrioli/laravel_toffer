@extends('dashboard.template.template')


@section('body')
<div class="container container-toffer">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header card__header--toffer">{{ __('Editar produto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                       <div class="inputs">
                        <label for="name" class="register__text">Nome do produto</label>
                        <input id="name" name="title" value="{{$product->title}}" type="text" placeholder="Nome do produto" class="form-control" required autocomplete="name" autofocus>
                        <small>Slug: {{$product->slug}}</small>
                       </div>

                       <div class="inputs">
                            <label for="summary-ckeditor" class="register__text">Descrição do produto</label>
                            <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                       </div>

                        <div class="inputs">
                            <label for="cat_image" class="register__text">Imagem do produto</label>
                            <input id="cat_image" type="file" class="input_image form-control" name="image">
                            <img src="{{asset("/storage/products/".$product->image)}}" class="image-preview" id="category-img-tag" width="200px" />   <!--for preview purpose -->
                        </div>

                       <div class="inputs">
                            <label for="exampleFormControlSelect1">Selecione uma categoria</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                                <option value="{{$product->category_id}}">{{$product->category->name}}</option>
                            </select>
                        </div>

                        <div class="inputs">
                            <label for="price" class="register__text">Preço</label>
                            <input class="form-control" value="{{$product->unit_price}}" placeholder="R$ 00.00,00" type="number" id="price" name="unit_price">
                       </div>

                       <div class="inputs">
                            <label for="exampleFormControlSelect2">Tipo de medida</label>
                            <select name="type" class="form-control" id="exampleFormControlSelect2">
                                <option value="{{$product->type}}" selected>{{$product->type}}</option>
                                <option value="kg">KG</option>
                                <option value="kg">Unidade</option>
                            </select>
                        </div>

                        <div class="inputs">
                            <label for="exampleFormControlSelect3">Status</label>
                            <select name="status" class="form-control" id="exampleFormControlSelect3">
                                <option value="{{$product->status}}" selected>{{$product->status}}</option>
                                <option value="ativo">ativo</option>
                                <option value="inativo">inativo</option>
                            </select>
                        </div>

                        <div class="inputs">
                            <label for="qtd" class="register__text">Quantidade</label>
                            <input class="form-control" value="{{$product->qtd}}" placeholder="Quantidade" type="number" id="qtd" name="qtd">
                        </div>

                        <div class="inputs">
                            <label for="discount" class="register__text">Desconto</label>
                            <input class="form-control" value="{{$product->discount}}" placeholder="Desconto" type="number" id="discount" name="discount">
                        </div>

                        <div class="inputs">
                            <label for="observacao" class="register__text" style="color:rgb(128, 35, 35)">Observação</label>
                            <input class="form-control" value="{{$product->observacao}}" placeholder="Observação" type="text" id="observacao" name="observacao">
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn__toffer">
                                    {{ __('Editar') }}
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
@push('tinymce')

<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#category-img-tag').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#cat_image").change(function(){
        readURL(this);
    });

    CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endpush
