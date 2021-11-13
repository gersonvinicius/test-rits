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
    public function index($client)
    {
        return Order::where('client_id',$client)->get();
    }

    public function store($client, Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);
        $order = new Order();
        $order->date = $request->date;
        $order->client_id = $client;
        $products = [];

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

    public function show($client, $order)
    {
        return Order::where('client_id',$client)->where('id',$order)->first();
    }

    public function destroy($client, $order)
    {
        $order = Order::findOrFail($order);
        if($order->client_id == $client){
            $order->delete();
        }
    }
}
