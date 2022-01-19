<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        return view("dashboard.user.index",compact("users"));
    }

    public function search(Request $request){
        $filters = $request->except('_token');
        $users = $this->user->search($request->filter);
        return view('dashboard.user.index',compact('users','filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.user.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        User::create();
        return redirect()->route("dashboard.user");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    public function detail($id)
    {
        $user = User::find($id);
        return response()->json([
            "user" => $user,
            "address" => $user->address,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $user = user::find($id);
        return view("dashboard.user.edit",compact("user"));
    }

    public function ban($id)
    {
        $user = user::find($id);
        $user->status = "inativo";
        $user->save();
        return view("dashboard.user.create",compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        if(empty($request->password))
            $data = $request->except('password');
        else{
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);
        }
        $user = User::find($id);
        $user->update($data);
        return redirect()->route("dashboard.user");
    }

    public function delete($id){
        $product = User::find($id);
        $product->delete();
        return redirect()->route("dashboard.user");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
