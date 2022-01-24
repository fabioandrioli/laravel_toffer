@extends('site.template.template')

@section('css', asset('css/register.css'))

@section('content')
<div class="container container-toffer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header card__header--toffer">{{ __('Cadastre-se') }}</div>

                @include('site.home.includes.message')


                <div class="card-body">
                    <form method="POST" action="{{ route('client.register') }}">
                        @csrf

                       <div class="inputs">
                        <label for="name" class="register__text">Nome Completo</label>
                        <input id="name" type="text" placeholder="Nome completo" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                       </div>

                       <div class="inputs">
                        <label for="email" class="register__text">Email</label>
                        <input id="email" type="text" placeholder="Email" class="form-control @error('name') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                       </div>

                       <div class="inputs">
                        <label for="telefone" class="register__text">Telefone</label>
                        <input id="telefone" name="phone" type="number" placeholder="Apenas número" class="form-control @error('phone') is-invalid @enderror" name="phone" value="84002449" required autocomplete="phone" autofocus>
                       </div>

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
                                    {{ __('Cadastrar-se') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
