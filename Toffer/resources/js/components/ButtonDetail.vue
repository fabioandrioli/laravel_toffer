<template>
   <div class="link-details">
        <!-- Button trigger modal -->
       <a class="btn btn-info" @click="detail()"  data-toggle="modal" data-target="#exampleModal" href="#"><i class="fa fa-eye"></i></a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <!-- -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Telefone</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">{{user.id}}</th>
                                    <td>{{user.name}}</td>
                                    <td>{{user.email}}</td>
                                    <td>{{user.phone}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="">
                        <h3>Dados do cliente</h3>
                        <ul class="list-group">
                            <li class="list-group-item">Cpf: {{user.cpf}}</li>
                            <li class="list-group-item">Data de cadastro: {{new Date(user.created_at).toLocaleDateString('pt-BR', {timeZone: 'UTC'})}}</li>
                            <li class="list-group-item">Rua: {{address.street_name}}</li>
                            <li class="list-group-item">Complemento: {{address.complement}}</li>
                            <li class="list-group-item">Próximo: {{address.reference}}</li>
                            <li class="list-group-item">Numero: {{address.street_number}}</li>
                            <li class="list-group-item">Bairro: {{address.district}}</li>
                            <li class="list-group-item">Cidade: {{address.city}}</li>
                            <li class="list-group-item">{{user.role}}</li>
                        </ul>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
        </div>
   </div>
</template>

<script>
import axios from 'axios';
export default{

    props:['id'],
    data(){
        return {
            user:{},
            address:{},
            idUser:this.id,
        };
    },

    methods: {
        detail(){
            // console.log(this.id)
          axios.get("http://fabiogilberto.com.br/detail/"+this.idUser).then((response)=> {
               this.user = response.data.user;
               this.address = response.data.address;
               console.log(response.data.user)
            })
            .catch(error => console.log(error))
            .finally()
        }
    }
}
</script>
<style scoped>
    .link-details{
        display: inline;
    }
</style>
