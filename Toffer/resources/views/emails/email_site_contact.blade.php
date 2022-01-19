<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    </head>
    <body>
        <body>
            <div style="align:center">
                 <div style="max-width: 680px; min-width: 500px; border: 2px solid #e3e3e3; border-radius:5px; margin-top: 20px">
                    <div style="vertical-align: center">
                        <h1 style="display:inline-block">Meu ecommerce</h1>
                        <div style="clear: both"></div>
                    </div>
                    <div  style="background-color: #fbfcfd; border-top: thick double #cccccc; text-align: left;">
                        <div style="margin: 30px;">
                             <p>
                                 Um usário entrou em contato,<br> <br>
                                 Responda seu novo usuário<br> <br>
                             </p>
                             <table style="text-align: left;">
                                 <tr>
                                     <th>Name</th>
                                    <td>: @isset($data['name']) {{$data['name']}} @endisset</td>
                                 </tr>
                                 <tr>
                                     <th>Email</th>
                                    <td>: @isset($data['email']) {{$data['email']}} @endisset</td>
                                 </tr>
                                 <tr>
                                     <th>Phone</th>
                                    <td>:@isset($data['phone']) {{$data['phone']}} @endisset</td>
                                 </tr>
                             </table>
                             <br><br>
                                <h3>Menssagem:</h3>
                                <p>@isset($data['message']) {{$data['message']}} @endisset</p>
                            <br><br>
                         </div>
                    </div>
                </div>
            </div>
        </body>
</html>