<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::all();
    }

    public function orderClient($id)
    {
        return Order::where('client_id',$id)->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'status' => 'required',
        ]);
        $order = new Order();
        $order->date = $request->date;
        $order->status = $request->status;
        $order->client_id = $request->id;
        $products = [];

        //VERIFICAR SE OS PRODUTOS EXISTEM
        foreach($request->products as $id){
            $product = Product::findOrFail($id);
            array_push($products, $product);
        }
        if(count($products) > 0){
            $order->save();
            foreach($products as $product){
                $order->product()->attach($product->id);
            }
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required',
        ]);
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
    }

    public function show($id)
    {
        return Order::where('client_id',$id)->first();
    }

    public function destroy(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        if($order->client_id == $request->id_logado){
            $order->delete();
        }
    }
}
