<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function showProducts($order_id)
    {
        $orders = Order::find($order_id)->products;
        return view('backend.products.showProduct')->with(['orders' => $orders ]);
    }
}
