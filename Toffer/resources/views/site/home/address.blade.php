@extends('site.template.template')

@section('css', asset('css/register.css'))

@section('content')
<main>
    <div class="container container-toffer">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h3>Antes você deve completar seus dados</h3>

                <div class="card card-info">
                    <div class="card-header card__header--toffer">{{ __('Endereço para entrega') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('saveAddressUser') }}">
                            @csrf
    
                           <div class="inputs input--street">
                                <div class="street">
                                    <label for="rua" class="register__text">Rua</label>
                                    <input id="rua" type="text" placeholder="Nome da rua" class="form-control" name="street_name" value="Odalicio Freitas Gabriel" required autocomplete="street_name" autofocus>
                                </div>
                                <div class="number">
                                    <label for="number" class="register__text">Número</label>
                                    <input id="number" type="number" placeholder="numero" class="form-control" name="street_number" value="92" required autocomplete="street_number" autofocus>
                                </div>
                           </div>
    
                           
                           <div class="inputs">
                            <label for="cep" class="register__text">CEP</label>
                            <input id="cep" type="number" placeholder="CEP - apenas números" class="form-control" name="zip_code" value="8209190" required autocomplete="zip_code" autofocus>
                           </div>

                           <div class="inputs">
                            <label for="bairro" class="register__text">Bairro</label>
                            <input id="bairro" type="text" placeholder="Nome do bairro" class="form-control" name="district" value="São Vicente" required autocomplete="district" autofocus>
                           </div>

                           <div class="inputs">
                            <label for="bairro" class="register__text">Complemento</label>
                            <input id="bairro" type="text" placeholder="Casa, Apartament, etc" class="form-control" name="complement" value="Casa" required autocomplete="district" autofocus>
                           </div>
                           
                           <div class="inputs">
                            <label for="bairro" class="register__text">Rerefência</label>
                            <input id="bairro" type="text" placeholder="Próximo à" class="form-control" name="reference" value="Próximo a padaria taynara" required autocomplete="district" autofocus>
                           </div>

                           <div class="inputs">
                            <label for="bairro" class="register__text">Descrição da fachada</label>
                            <input id="bairro" type="text" placeholder="Descreva a frente do seu local de entrega" class="form-control" name="fachada" value="Casa com portão marrom" required autocomplete="district" autofocus>
                           </div>

                           <div class="inputs">
                            <div class="form-group">
                                <label  class="register__text" for="exampleFormControlSelect1">Selecione sua cidade (Apenas o litoral)</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                  <option>Cidade</option>
                                </select>
                              </div>
                           </div>

                           <div class="inputs">
                            <div class="form-group">
                                <label  class="register__text" for="exampleFormControlSelect2">Estado</label>
                                <select disabled class="form-control" id="exampleFormControlSelect2">
                                  <option>Paraná</option>
                                </select>
                              </div>
                           </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary btn__toffer">
                                        {{ __('Cadastrar') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
