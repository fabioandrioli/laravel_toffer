<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        return view("dashboard.template.template");
    }

    public function clients(){
        $users = User::where("role","cliente")->paginate(10);
        return view("dashboard.client.clients",compact("users"));
    }

}
