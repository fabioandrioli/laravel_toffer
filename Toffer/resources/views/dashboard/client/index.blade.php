@extends('dashboard.template.template')

@section('body')
        
<div class="container">
	<div class="row">
		<div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
    	 <div style="width: 100%;">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-12">
                    <h2>{{$user->name}}</h2>
                    @if($user->phone)
                        <p><strong>Telefone: </strong>{{$user->phone}}</p>
                    @else
                        <p><strong>Nenhum telefone cadastrado</p>
                    @endif
                    @if(isset($user->address))
                        <p><strong>Endereço: </strong> {{$user->address->street_name}}, {{$user->address->street_number}} - {{$user->address->district}} / {{$user->address->city}} </p>
                        <p><strong>Complemento: </strong> {{$user->address->complement}} </p>
                        <p><strong>Referencia: </strong> {{$user->address->reference}}</p>
                        <p><strong>Descrição da fachada: </strong> {{$user->address->fachada}} </p>
                    @else
                        <a href="{{route('address')}}">Cadastre seu endereço</a>
                    @endif
                        <p><strong>Email: </strong>
                        <span class="tags">{{$user->email}}</span>

                    </p>
                </div>             
                
            </div>            
            <div style="width: 100%;display: flex;">
                <div class="col-4">
                    <a href="{{route('editClient')}}" class="btn btn-success">Editar dados <a/>
                </div>
                <div class="col-4 ">
                    <a href="{{route('editAddress')}}" class="btn btn-primary" style="color:white">Editar endereço <a/>
                </div>
                <div class="col-4 ">
                    <a href="{{route('editPassword')}}" class="btn btn-primary" style="background:#376295; color:white">Mudar senha </a>
                </div>
               
            </div>
    	 </div>                 
		</div>
	</div>
</div>
@endsection