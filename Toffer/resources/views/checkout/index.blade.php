<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        @php
        //     // SDK do Mercado Pago
        //     // require base_path('vendor/autoload.php');
        //     // Adicione as credenciais
        //    use  MercadoPago\SDK;
        //    SDK::setAccessToken(config('services.mercadopago.token'));

        //     // Cria um objeto de preferência
        //     $preference = new MercadoPago\Preference();



        //     // Cria um item na preferência
        //     $item = new MercadoPago\Item();
        //     $item->title = 'Meu produto';
        //     $item->quantity = 1;
        //     $item->unit_price = 75.56;
            

            
        //     $preference->back_urls = array(
        //         "success" => "https://www.seu-site/success",
        //         "failure" => "http://www.seu-site/failure",
        //         "pending" => "http://www.seu-site/pending"
        //     );
        //     $preference->auto_return = "approved";

        //     $preference->items = array($item);
        //     $preference->save();
        @endphp
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:10%">Price</th>
                        <th style="width:8%">Quantity</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:10%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                                <div class="col-sm-10">
                                    <h4 class="nomargin">Product 1</h4>
                                    <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">$1.99</td>
                        <td data-th="Quantity">
                            <input type="number" class="form-control text-center" value="1">
                        </td>
                        <td data-th="Subtotal" class="text-center">1.99</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong>Total 1.99</strong></td>
                    </tr>
                    <tr>
                        <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                        <td><div class="cho-container"></div></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script>
            // Adicione as credenciais do SDK
              const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
                    locale: 'pt-BR'
              });
            
              // Inicialize o checkout
              mp.checkout({
                  preference: {
                      id: '{{ $preference->id }}'
                  },
                  render: {
                        container: '.cho-container', // Indique o nome da class onde será exibido o botão de pagamento
                        label: 'Fechar pedido', // Muda o texto do botão de pagamento (opcional)
                  }
            });
            </script>
    </body>
</html>