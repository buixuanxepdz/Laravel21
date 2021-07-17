<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Statistical;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request){
        $orders = Order::orderBy('created_at','desc')->paginate(10);
        if ($request->sortby == 'default') {
            return view('backend.orders.index')->with(compact('orders'));
        }
        if ($request->sortby) 
        {
            $sortby = $request->sortby;
            switch ($sortby) {
                case 'moi-nhat':
                    $orders = Order::orderBy('created_at','desc');
                    break;
                case 'sp-cu':
                    $orders = Order::orderBy('created_at','asc');
                    break;
                case 'tang-dan':
                    $orders = Order::orderBy('id','asc');
                    break;
                case 'giam-dan':
                    $orders = Order::orderBy('id','desc');
                    break;
                
                default:
                $orders = Order::orderBy('created_at','desc');
                
            }
            $orders = $orders->paginate(10);
        }
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


                $now  = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
                $profit = 0;
                $quantity = 0;
                if ($statistical = Statistical::where('order_date', $now)->first()){
                    foreach ($orders->products as $value){
                        $profit = $orders->total - ($value->pivot->quantity * $value->origin_price);
                        $quantity += $value->pivot->quantity;
                    }
    
                    $statistical->sales += $orders->total;
                    $statistical->profit += $profit;
                    $statistical->quantity += $quantity;
                    $statistical->total_order += 1;
                    $statistical->updated_at = Carbon::now();
                    $statistical->save();
    
                } else {
                    foreach ($orders->products as $value){
                        $profit = $orders->total - ($value->pivot->quantity * $value->origin_price);
                        $quantity += $value->pivot->quantity;
                    }
    
                    $statistical = new Statistical();
                    $statistical->order_date = $now;
                    $statistical->sales = $orders->total;
                    $statistical->profit = $profit;
                    $statistical->quantity = $quantity;
                    $statistical->total_order = 1;
                    $statistical->created_at = Carbon::now();
                    $statistical->updated_at = Carbon::now();
                    $statistical->save();
                }
            }
        if($orders){
             return redirect()->route('backend.order.index')->with('updatesuccess','Cập nhật trạng thái đơn hàng thành công');
        }
        return redirect()->route('backend.order.index')->with('updateerorr','Cập nhật trạng thái đơn hàng thất bại');
    }
    public function delete(Order $order){
        $order->products()->detach();
        $order->delete();

        if ($order){
            return redirect()->route('backend.order.index')->with("success",'Hủy đơn hàng thành công');
        }
        return redirect()->route('backend.order.index')->with("error",'Hủy đơn hàng thất bại');
    }
    
}
