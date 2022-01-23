<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;



class ClientController extends Controller
{

    public function __construct(){
        $this->middleware('can:cliente');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::user();
        return view("dashboard.client.index",compact("user"));
    }

  

    public function editClient(){
      
        $user = Auth::user();
        return view("dashboard.client.edit",compact("user"));
    }

    public function updateClient(Request $request){
       
        $user = Auth::user();
        $user->update($request->all());
        return redirect()->route("dataClient");
    }

    public function editAddress(){
       
        $user = Auth::user();
        return view("dashboard.client.address",compact("user"));
    }

    public function updateAddress(Request $request){
      
        $user = Auth::user();
        $user->address()->update($request->all());
        return redirect()->route("dataClient");
    }

    public function editPassword(){
        
        $user = Auth::user();
        return view("dashboard.client.password",compact("user"));
    }

    public function updatePassword(Request $request){
       
        $user = Auth::user();
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user->update($data);
        return redirect()->route("dataClient");
    }

    
}
