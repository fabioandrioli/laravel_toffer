<?php

namespace App\Http\Controllers\Web\V1;

use App\Http\Controllers\Controller;

use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:administrador');
        // Order::with('orderItems')->where('orderItems.type',1)->with('orderItems.orderItemOptions', 'orderItems.orderMenuItems')->first()
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where("situation","waiting")->orderBy('id', 'DESC')->paginate(10);
        return view("dashboard.order.index",compact("orders"));
    }


    public function delivery()
    {
        $orders = Order::where("situation","delivery")->orderBy('id', 'DESC')->paginate(10);
        return view("dashboard.order.delivery",compact("orders"));
    }

    public function dispatched()
    {
        $orders = Order::where("situation","dispatched")->orderBy('id', 'DESC')->paginate(10);
        return view("dashboard.order.dispatched",compact("orders"));
    }

    public function exchange()
    {
        $orders = Order::where("situation","exchange")->orderBy('id', 'DESC')->paginate(10);
        return view("dashboard.order.exchange",compact("orders"));
    }

    public function giveup()
    {
        $orders = Order::where("situation","giveup")->orderBy('id', 'DESC')->paginate(10);
        return view("dashboard.order.giveup",compact("orders"));
    }


    public function waiting($id){
        $order = Order::find($id);
        $order->situation = "waiting";
        $log["description"] =  $order->situation;
        $log["data"] = Carbon::now();
        $order->dateOrder()->create($log);
        $order->save();
        return redirect()->back();
    }

    public function delivery_exchange($id){
        $order = Order::find($id);
        $order->situation = "delivery";
        $log["description"] =  $order->situation;
        $log["data"] = Carbon::now();
        $order->dateOrder()->create($log);
        $order->save();
        return redirect()->back();
    }

    public function dispatched_exchange($id){
        $order = Order::find($id);
        $order->situation = "dispatched";
        $log["description"] =  $order->situation;
        $log["data"] = Carbon::now();
        $order->dateOrder()->create($log);
        $order->save();
        return redirect()->back();
    }

    public function exchange_exchange($id){
        $order = Order::find($id);
        $order->situation = "exchange";
        $log["description"] =  $order->situation;
        $log["data"] = Carbon::now();
        $order->dateOrder()->create($log);
        $order->save();
        return redirect()->back();
    }

    public function giveup_exchange($id){
        $order = Order::find($id);
        $order->situation = "giveup";
        $log["description"] =  $order->situation;
        $log["data"] = Carbon::now();
        $order->dateOrder()->create($log);
        $order->save();
        return redirect()->back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
