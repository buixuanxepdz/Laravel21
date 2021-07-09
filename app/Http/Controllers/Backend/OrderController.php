<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::orderBy('created_at','desc')->paginate(10);
        return view('backend.orders.index')->with(compact('orders'));
    }
    public function showProducts($order_id)
    {
        $orders = Order::find($order_id)->products;
        return view('backend.products.showProduct')->with(['orders' => $orders ]);
    }
    public function edit($id){
        $orderstt = Order::find($id);
        return view('backend.orders.edit')->with(['orderstt' => $orderstt]);
    }
    public function update(Request $request,$id){
        $orders = Order::find($id);
        $orders->status = $request->get('status');
        $orders->updated_at = Carbon::now();
        $orders->save();
            if ($orders->status == 3) {
                foreach ($orders->products as  $value) {
                    $products = Product::where('id',$value->id)->first();
                    $products->quantity -= $value->pivot->quantity;
                    $products->save();
                    if ($products->quantity == 0) {
                        $products->status = 2;
                        $products->save();
                    }
                }
            }
        return redirect()->route('backend.order.index');
    }
    public function delete(Order $order){
        $order->products()->detach();
        $order->delete();

        if ($order){
            return redirect()->route('backend.order.index')->with("success",'Xóa thành công');
        }
        return redirect()->route('backend.order.index')->with("error",'Xóa thất bại');
    }
}
