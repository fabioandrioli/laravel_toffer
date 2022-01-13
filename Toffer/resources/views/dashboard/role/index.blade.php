@extends('dashboard.template.template')

@section('body')
        
        <div class="dashboard__header"> 
            <h4>Papéis</h4>
            <a class="btn btn-info" href="">Novo +</a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th class="action">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($roles as $role)
                <tr>
                    <th scope="row">{{$role->id}}</th>
                    <td>{{$role->name}}</td>
                    <td class="action">
                        <a class="btn btn-warning" href=""><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href=""><i class="fas fa-ban"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>Nenhuma papel encontrado.</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>

@endsection