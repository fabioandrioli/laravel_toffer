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
        $users = User::all();
        return view("dashboard.user.index",compact("users"));
    }

}
