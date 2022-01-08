<template>
   <div class="link-details">
        <!-- Button trigger modal -->
       <a class="btn btn-danger" @click.prevent="confirme()"  data-toggle="modal" data-target="#exampleModal" href="#">Excluir</a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 
                <h3>Confirme a exclusão do produto {{produto.title}}</h3>
                <img :src="`/storage/products/${produto.image}`" alt="" srcset="">
              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                 <button @click="deletar()" type="button" class="btn btn-danger" >Confirmar</button>
            </div>
            </div>
        </div>
        </div>
   </div>
</template>

<script>
import axios from 'axios';
export default{

    props:['product'],
    data(){
        return {
            produto:{},
            id:this.product,
        };
    },

    methods: {
        confirme(){       
          axios.get("http://127.0.0.1:8000/product/confirmeDelete/"+this.id).then((response)=> {
               this.produto = response.data.product;
               console.log(response.data.product.title)
            })
            .catch(error => console.log(error))
            .finally()
        },

        deletar(){
              axios.get("http://127.0.0.1:8000/product/delete/"+this.id).then((response)=> {
                window.location.href = "/product";
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
