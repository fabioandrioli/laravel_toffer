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
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefone</th>
                    <th class="action">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td class="action">
                        <button-detail id="{{$user->id}}"></button-detail>
                        <a class="btn btn-warning" href=""><i class="fa fa-edit"></i></a>
                        <a class="btn btn-danger" href=""><i class="fas fa-ban"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td>Nenhum cliente encontrado.</td>
                </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <!-- Modal -->
        <div class="modal-toffer  modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalhes do cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                ...
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
@endsection