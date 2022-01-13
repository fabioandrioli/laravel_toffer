@extends('dashboard.template.template')


@section('body')
<div class="container container-toffer">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header card__header--toffer">{{ __('Cadastrar nova categoria') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route("category.update",$category->id)}}">
                        @csrf
                        {{method_field('PUT')}}
                       <div class="inputs">
                        <label for="name" class="register__text">Nome  da categoria</label>
                        <input id="name" value="{{$category->name}}" name="name" type="text" placeholder="Nome do produto" class="form-control" required autocomplete="name" autofocus>
                       </div>

                       <div class="inputs">
                            <label for="summary-ckeditor" class="register__text">Descrição da categoria</label>
                            <textarea   class="form-control" id="summary-ckeditor" name="description">{!! $category->description !!}</textarea>
                       </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn__toffer">
                                    {{ __('Salvar') }}
                                </button>
                                <a class="btn btn-info btn__toffer" style="color:white;" href="{{route('category')}}">voltar</a>
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
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endpush
