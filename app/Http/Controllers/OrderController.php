<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::get();

        return view('pages.orders.order', compact('orders'));
    }

    public function create(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'unit_price' => 'required',
        //     'specification' => 'required'
        // ]);

        $order = new Order();
        $order->customerName = $request->customerName;
        $order->productName = $request->productName;
        $order->phone = $request->phone;
        $order->deliveryDate = $request->deliveryDate;
        $order->getItNow = $request->getItNow;
        $order->amount = $request->amount;
        $order->email = $request->email;
        $order->zalo = $request->zalo;
        $order->quoteWith = $request->quoteWith;
        $order->width = $request->width;
        $order->height = $request->height;
        $order->material = $request->material;
        $order->payment = $request->payment;
        $order->note = $request->note;

        $order->save();
        return redirect()->route('orders.index');
    }

    public function show(Request $request)
    {
        $order = Order::find($request->id);

        return view('pages.ordes.order-detail', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        // $request->validate([
        //     'name' => 'required',
        //     'unit_price' => 'required',
        //     'specification' => 'required'
        // ]);

        $order->customerName = $request->customerName;
        $order->productName = $request->productName;
        $order->phone = $request->phone;
        $order->deliveryDate = $request->deliveryDate;
        $order->getItNow = $request->getItNow;
        $order->amount = $request->amount;
        $order->email = $request->email;
        $order->zalo = $request->zalo;
        $order->quoteWith = $request->quoteWith;
        $order->width = $request->width;
        $order->height = $request->height;
        $order->material = $request->material;
        $order->payment = $request->payment;
        $order->note = $request->note;

        $order->save();
        return redirect()->route('ordes.index');
    }

}
