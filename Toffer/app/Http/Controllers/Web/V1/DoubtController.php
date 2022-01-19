<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Doubt;

class DoubtController extends Controller
{
    public function __construct(){
        $this->middleware('can:administrador');
    }

    public function index(){
        $doubts = Doubt::orderBy('id', 'DESC')->paginate(8);
        return view("dashboard.doubt.index",compact('doubts'));
    }

    public function delete($id){
        $doubt = Doubt::find($id);
        $doubt->delete();
        return redirect()->route("doubt");
    }
}
