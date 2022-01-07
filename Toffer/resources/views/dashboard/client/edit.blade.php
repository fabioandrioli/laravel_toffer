@extends('site.template.template')

@section('css', asset('css/register.css'))

@section('content')
<div class="container container-toffer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header card__header--toffer">{{ __('Editar meu dados') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update_client') }}">
                        @csrf
                       <div class="inputs">
                        <label for="name" class="register__text">Nome Completo</label>
                        <input id="name" name="name" type="text" placeholder="Nome completo" class="form-control" value="{{$user->name }}" required autocomplete="name" autofocus>
                       </div>

                       <div class="inputs">
                        <label for="email" class="register__text">Email</label>
                        <input id="email" name="email" type="text" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email" autofocus>
                       </div>

                       <div class="inputs">
                        <label for="telefone" class="register__text">Telefone</label>
                        <input id="telefone" name="phone" type="number" placeholder="Apenas número" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}" required autocomplete="phone" autofocus>
                       </div>
                     
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn__toffer">
                                    {{ __('Salvar') }}
                                </button>
                                <a class="btn btn-info" href="{{>route('dataClient')}}">voltar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
