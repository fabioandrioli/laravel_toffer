@extends('site.template.template')

@section('css', asset('css/contact.css'))

@section('content')
<main>
    <div class="container contact-form">
        <form method="post" action="{{route("email.contact")}}">
            @csrf
            @include('site.home.includes.message')
            <h3>Fale conosco, tire suas dúvidas.</h3>
           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Seu nome *" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" class="form-control" placeholder="Assunto" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="Seu email" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Seu telefone"  />
                    </div>
                    <div class="form-group">
                        <input type="submit" name="btnSubmit" class="btnContact" value="Enviar mensagem" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <textarea name="message" class="form-control" placeholder="Escreva aqui sua mensagem" style="width: 100%; height: 250px;"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
