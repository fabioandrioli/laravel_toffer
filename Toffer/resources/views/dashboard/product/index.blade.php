@extends('dashboard.template.template')

@section('body')
        
        <div class="dashboard__header"> 
            <h4>Produtos</h4>
            <a class="btn btn-info" href="{{route('product.create')}}">Novo +</a>
        </div>
        <hr>
        <div class="product__card">
            <img src="./image/produto/relogio_3.jpg" />
            <div class="content">
                <h2>Lige 2021 novo relógio inteligente masculino tela de toque completa...</h2>
                <hr>
                <h5>Valor: R$ 131,00</h5>
                <hr>
            </div>
            <div class="information">
                <h5>Em estoque</h5>
            </div>
            <div class="product_action">
                <a class="btn btn-warning" style="color:#fff;" href="#">Edtiar</a>
                <a class="btn btn-danger" style="color:#fff;" href="#">Excluir</a>
                <a class="btn btn-info" style="color:#fff;" href="#">Detalhes</a>
            </div>
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