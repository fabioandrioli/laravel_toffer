@extends('dashboard.template.template')


@section('body')
<div class="container container-toffer">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header card__header--toffer">{{ __('Cadastrar novo produto') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route("product.store")}}" enctype="multipart/form-data">
                        @csrf
                       <div class="inputs">
                        <label for="name" class="register__text">Nome do produto</label>
                        <input id="name" value="Relógio vipe" name="title" type="text" placeholder="Nome do produto" class="form-control" required autocomplete="name" autofocus>
                       </div>

                       <div class="inputs">
                            <label for="summary-ckeditor" class="register__text">Descrição do produto</label>
                            <textarea value="lorem asdasd asdasdasdasd asdasd asd" class="form-control" id="summary-ckeditor" name="description">asdasdas</textarea>
                       </div>

                       <div class="inputs">
                            <label for="cat_image" class="register__text">Imagem do produto</label>
                            <input id="cat_image" type="file" class="input_image form-control" name="image">
                            <img src="" class="image-preview" id="category-img-tag" width="200px" />   <!--for preview purpose -->
                        </div>

                       <div class="inputs">
                            <label for="exampleFormControlSelect1">Selecione uma categoria</label>
                            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                              @foreach($categories as $category)
                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                              @endforeach
                            </select>
                        </div>

                        <div class="inputs">
                            <label for="price" class="register__text">Preço</label>
                            <input value="3200" class="form-control" placeholder="R$ 00.00,00" type="number" id="price" name="unit_price">
                       </div>

                       <div class="inputs">
                            <label for="exampleFormControlSelect2">Tipo de medida</label>
                            <select name="type" class="form-control" id="exampleFormControlSelect2">
                                <option value="unidade" selected>Unidade</option>
                                <option value="kg">KG</option>
                            </select>
                        </div>

                        <div class="inputs">
                            <label for="exampleFormControlSelect3">Status</label>
                            <select name="type" class="form-control" id="exampleFormControlSelect3">
                                <option value="Ativo" selected>Ativo</option>
                                <option value="Inativo">Inativo</option>
                            </select>
                        </div>

                        <div class="inputs">
                            <label for="qtd" class="register__text">Quantidade</label>
                            <input value="30" class="form-control" placeholder="Quantidade" type="number" id="qtd" name="qtd">
                        </div>

                        <div class="inputs">
                            <label for="discount" class="register__text">Desconto</label>
                            <input value="30" class="form-control" placeholder="Desconto" type="number" id="discount" name="desconto">
                        </div>

                        <div class="inputs">
                            <label for="observacao" class="register__text" style="color:rgb(128, 35, 35)">Observação</label>
                            <input value="Testando o cadastro do produto" class="form-control" placeholder="Observação" type="text" id="observacao" name="observacao">
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
@push('tinymce')

{{-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> --}}
{{-- <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script> --}}
<script src="js/ckeditor/ckeditor.js"></script>
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
{{-- // CKEDITOR.replace( 'summary-ckeditor', {
    //     filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
    //     filebrowserUploadMethod: 'form'
    // }); //para upload de imagens, é necessário criar a tora --}}