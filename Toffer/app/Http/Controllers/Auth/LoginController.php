<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ], [
            'required' => 'O campo :attribute é obrigatório',
            'email' => "Por favor informe um :attribute válido!",
         
        ], [
            'email'    => 'E-mail',

        ]); 

        session(['errors' => $validator->errors()]);


        if ($validator->fails()) {
            return redirect()
            ->back()
            ->withInput();
        }

        if($request->input('remember') == 1)
            $remember = true;
        else
            $remember = false;
       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$remember)){
            return redirect()->intended('guest');
        }else{
            session(['errors' => 'email ou senha incorretos!']);
            return redirect()
            ->back()
            ->withInput();
        }
            
        return redirect()->route("login");
     }
}
