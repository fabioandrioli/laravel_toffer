<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Mail\ContactEmail;

class EmailController extends Controller
{
    public function contact(Request $request){
        $data = $request->all();
        session(['message' => 'Sua duvida foi enviada com sucesso']);
        Mail::to('fabio.drioli@gmail.com')->send(new ContactEmail($data));
        return redirect()->back();
    }
}
