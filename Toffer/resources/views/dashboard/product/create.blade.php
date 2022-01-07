@extends('dashboard.template.template')


@section('content')
<div class="container container-toffer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header card__header--toffer">{{ __('Cadastrar novo produto') }}</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf
                       <div class="inputs">
                        <label for="name" class="register__text">Nome do produto</label>
                        <input id="name" name="name" type="text" placeholder="Nome do produto" class="form-control" required autocomplete="name" autofocus>
                       </div>

                       <div class="inputs">
                            <label for="email" class="register__text">Descrição do produto</label>
                            <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
                       </div>

                       <div class="inputs">
                            <label for="cat_image" class="register__text">Imagem do produto</label>
                            <input id="cat_image" type="file" class="input_image form-control" name="cat_image">
                            <img src="" class="image-preview" id="category-img-tag" width="200px" />   <!--for preview purpose -->
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