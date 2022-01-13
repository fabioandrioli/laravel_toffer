@extends('dashboard.template.template')

@section('body')
        
        <div class="dashboard__header"> 
            <h4>Clientes</h4>
            <a class="btn btn-info" href="">Novo +</a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Duvida</th>
                    <th scope="col">Email</th>
                    <th class="action">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($doubts as $doubt)
                <tr>
                    <th scope="row">{{$doubt->id}}</th>
                    <td>{{$doubt->doubt}}</td>
                    <td>{{$doubt->email}}</td>
                    <td class="action">
                        <a class="btn btn-danger" href="{{route("doubt.delete",$doubt->id)}}"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>Nenhuma dúvida encontrada.</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>

     
@endsection