@extends('site.template.template')

@section('css', asset('css/register.css'))

@section('content')
<div class="container container-toffer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header card__header--toffer">{{ __('Alterar senha') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updatePassword') }}">
                        @csrf

                       <div class="inputs">
                        <label for="password" class="register__text">Senha</label>
                        <input id="password" type="password" placeholder="Senha" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="senha" autofocus>
                       </div>

                       <div class="inputs">
                        <label for="password-confirm" class="register__text">Confirme a senha</label>
                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirme a senha" name="password_confirmation" required autocomplete="new-password">
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
