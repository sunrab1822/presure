<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderrequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('category')->get();
        return response()->json($orders);
    }

    public function show($id){
        $order = Order::with('category')->find($id);
        if (!$order) {
            return response()->json(['message' => 'A megrendelés nem létezik.'], 404);
        }

        return response()->json($order);
    }

    public function store(StoreOrderrequest $request){


        if (!$request->validated()) {
            return response()->json(['message' => 'Hiányos adatok'], 400);
        }

        $order = Order::create($request->only(['category', 'customer_name', 'deadline', 'quantity', 'publisher_name']));
        return response()->json(['id'=>$order['id']], 201);
    }

    public function destroy($id){
        $order = Order::find($id);
        if (!$order) {
            return response()->json(['message' => 'A megrendelés nem létezik.'], 404);
        }
        $order->delete();
        return response(204);
    }

    public function update(Request $request, $id){
        if( Order::where('id', $id)->update($request->only(['category', 'customer_name', 'deadline', 'quantity', 'publisher_name']))){
            return response()->json(['message' => "Hiányos adatok."], 400);
        }
        $order = Order::find($id);
        return response()->json($order, 200);


    }

}
