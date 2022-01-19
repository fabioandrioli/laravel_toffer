<?php


namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Doubt;
use App\Models\Order;
use Mail;
use App\Mail\ContactMail;
use App\Mail\SendPasswordCreateUser;
use App\Mail\ForgetPasswordMail;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

use  MercadoPago\SDK;
use MercadoPago;

class SiteController extends Controller
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index(){
        
      $products = Product::where("status","ativo")->orderBy('id', 'DESC')->paginate(8);
        
       return view('site.home.index',compact('products'));
    }

    public function search(Request $request){
        $filters = $request->except('_token');
        $products = $this->product->search($request->filter);
        return view('site.home.index',compact('products','filters'));
    }

    public function show($id){

        $product = Product::find($id);
        
        $hasAddress = 0;
        if(Auth::check()){
            $user = Auth::user();
            if($user->address != null)
                $hasAddress = true;
        }

        $preference = $this->mercadoPago($product);
        return view('site.home.show',compact('preference','hasAddress','product'));
    }

    public function cart(){

        $cart = new Cart();

        $products = $cart->getItems();
        $preference = $this->mercadoPago($products);
        return view('site.home.cart',compact('preference','cart','products'));
    }

    public function forgetPasswordForm(){
        return view('site.user_guest.forgetPassword');
    }

    public function forgetEmailStore(Request $request){
        if(!Auth::check()){
            $dataGuestUser = $request;
            $user = $this->user->where('email',$dataGuestUser['email'])->first();
            for ($i=0; $i<7; $i++) {
                $dataGuestUser['password'] = $dataGuestUser['password']. chr(rand(65,90));
            }
            $dataGuestUser['senha'] = $dataGuestUser['password'];
            $dataGuestUser['password'] = bcrypt($dataGuestUser['password']);
            if($user->update([
                'password' => $dataGuestUser['password']
            ])){
                Mail::to($dataGuestUser['email'])->send(new ForgetPasswordMail( $dataGuestUser['senha']));
                return redirect()->route('site.login');
            }else{
                return redirect()->route('site.forgetPasswordForm')->withErrors('Algo deu errado, entre em contado com o suporte')->withInput();
            }
        }else{
            redirect()->route('site.login');
        }
    }

    public function payment(){
       
    }

    private function mercadoPago($product){

        // if(!Auth::check()){
        //     return redirect()->route("login");
        // }

        // if (!Gate::allows('email_verify')) {
        //     return view("site.home.verifyEmail");
        // }
    
        SDK::setAccessToken(config('services.mercadopago.token'));

        // Cria um objeto de preferência
        $preference = new MercadoPago\Preference();
        $cart = new Cart();

        if(!empty($product)){
            // Cria um item na preferência
            if(!is_array($product)){
                $item = new MercadoPago\Item();
                $item->title = $product->title;
                $item->quantity = 1;
                $item->currency_id = 'BRL';
                if($product->discount && $product->discount > 0){
                    $item->unit_price = $product->unit_price - ($product->unit_price * $product->discount / 100);
                }else{
                    $item->unit_price = $product->unit_price;
                }
                $preference->items = array($item);
            }else{
                foreach($product as $prod){
                    $item = new MercadoPago\Item();
                    $item->title = $prod['item']->title;
                    $item->quantity = $prod['qtd'];
                    $item->currency_id = 'BRL';
                    if($prod['item']->discount && $prod['item']->discount > 0){
                        $item->unit_price = $prod['item']->unit_price - ($prod['item']->unit_price * $prod['item']->discount / 100);
                    }else{
                        $item->unit_price = $prod['item']->unit_price;
                    }

                    $products[] = $item;
                }

    

                $preference->items = $products;
            }

            
            $preference->back_urls = array(
                "success" => route("success"),
                // "failure" => "http://www.seu-site/failure",
                // "pending" => "http://www.seu-site/pending"
            );
            $preference->auto_return = "approved";

            // $payer = new MercadoPago\Payer();
            // // $payer->id      =  Auth::user()->id;
            // $payer->name    = Auth::user()->name;
            // $payer->email   = Auth::user()->email;
            // $payer->surname = Auth::user()->name;
            // $address['address'] = Auth::user()->address;
            // $payer->date_created = date("Y-m-d");

            // $payer->address =  $address['address'];
            
        

            // $preference->payer = $payer;
            $preference->save();
            return $preference;
        }

        return redirect()->route("site.index");
    }

    public function success(Request $request){
        //"payment_id": "1245244885",
        $response = Http::get( 'https://api.mercadopago.com/v1/payments/1245244885'."?access_token=TEST-2888179626589580-121516-ba62988dfe4948306686c7796d7f1774-1040022616");

        return $response;
    }

    public function redirectUser(){

        if(Auth::user()->role == "cliente"){
            return redirect()->route("site.index");
        }else{
            return redirect()->route("dataClient");
        }
    }

    public function address(){
        return view("site.home.address");
    }

    public function saveAddressUser(Request $request){
        if(Auth::check()){
            $user = Auth::user();
            $data = $request->all();
            $data['state'] = "Paraná";
            $user->address()->create($data);
            return redirect()->route("site.cart");
        }
                
    }

    public function duvidas(Request $request){
        $data = $request->all();
        $data['email'] = Auth::user()->email;
        $data['user_id'] = Auth::user()->id;
        Doubt::create($data);
        session(['message' => 'Sua duvida foi enviada com sucesso']);
        return redirect()->back();
    }

    public function contact(){
        return view('site.home.contact');
    }

    // public function contactStore(EmailResquest $request){
    //     $data = $request->all();
    //     Mail::to('fabio.drioli@gmail.com')->send(new ContactMail($data));
    //     return redirect()->route('site.contacts');

    //     // Mail::send('site.email_site_contact', $data, function($message) use ($data) {
    //     //     $message->from($data['email'], $data['nome']);
    //     //     $message->to('fabio.tads15@gmail.com') ->subject($data['assunto']);
    //     // });

    //     return redirect()->route('site.contacts');

    // }

}
