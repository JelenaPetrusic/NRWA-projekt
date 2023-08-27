<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
    $orders = Order::all();

    return response()->json($orders); 
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $order = new Order;
           $order-> orderNumber = $request->orderNumber;
           $order-> orderDate = $request->orderDate;
           $order-> requiredDate = $request->requiredDate;
           $order-> shippedDate = $request->shippeddDate;
           $order-> status = $request->status;
           $order-> customerNumber = $request->customerNumber;
           $order->save();
           return response()->json ([
            "message" => "Order Added"
        ], 201);
    }
    
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($orderNumber)
    {
        $order = Order :: find($orderNumber);
        if(!empty($order))
        {
            return response()->json($order);
        }
        else
           {
           return response()->json([ 
            "message" => "Book not found"
           ], 404);
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $orderNumber)
    {
        $order = Order::findOrFail($orderNumber);
        $order->update($request->all());

        return response()->json($order, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($orderNumber)  
    {
        if(Order::where( 'orderNumber' , $orderNumber)->exists()) {
        $order= Order :: find($orderNumber);
        $order->delete();

        return response()->json ([
          'message' => "records deleted."
        ], 202);
    } else {
       return response()->json([
        'message' => "order not found."
       ], 404) ;
}
    }
}