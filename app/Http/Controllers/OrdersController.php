<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(Order $order)
    {
        $orders = Order::all();

        return view('orders', compact('orders'));
    }
}