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
        if (!Gate::allows('email_verify')) {
            return view("site.home.verifyEmail");
        }
        $user = Auth::user();
        return view("dashboard.client.index",compact("user"));
    }


    public function editClient(){
        if (!Gate::allows('email_verify')) {
            return view("site.home.verifyEmail");
        }
        $user = Auth::user();
        return view("dashboard.client.edit",compact("user"));
    }

    public function updateClient(Request $request){
        if (!Gate::allows('email_verify')) {
            return view("site.home.verifyEmail");
        }
        $user = Auth::user();
        $user->update($request->all());
        return redirect()->route("dataClient");
    }

    public function editAddress(){
        if (!Gate::allows('email_verify')) {
            return view("site.home.verifyEmail");
        }
        $user = Auth::user();
        return view("dashboard.client.address",compact("user"));
    }

    public function updateAddress(Request $request){
        if (!Gate::allows('email_verify')) {
            return view("site.home.verifyEmail");
        }
        $user = Auth::user();
        $user->address()->update($request->all());
        return redirect()->route("dataClient");
    }

    public function editPassword(){
        if (!Gate::allows('email_verify')) {
            return view("site.home.verifyEmail");
        }
        $user = Auth::user();
        return view("dashboard.client.password",compact("user"));
    }

    public function updatePassword(Request $request){
        if (!Gate::allows('email_verify')) {
            return view("site.home.verifyEmail");
        }
        $user = Auth::user();
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user->update($data);
        return redirect()->route("dataClient");
    }

    
}
