<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;


class CartController extends Controller
{
    public function index(){
        $items = Cart::content();

        return view('frontend.cart')->with(['items' => $items]);
    }

    public function add($id){
        $product = Product::find($id);
        Cart::add($product->id,$product->name,1,$product->sale_price,0,[
            'image' => $product->images[0]->path,
        ]);
        return redirect()->route('frontend.cart.index');
    }

    public function remove($id){
        Cart::remove($id);
        return redirect()->route('frontend.cart.index');
    }
    public function destroy(){
        Cart::destroy();
        return redirect()->route('frontend.cart.index');
    }

   
    public function update(Request $request){
        Cart::update($request->rowId,$request->qty);
    }
    
    public function checkout(){
        $user = Auth::user();
        $items = Cart::content();
        return view('frontend.checkout')->with(['items' => $items])->with(['user' => $user]);
    }

    public function pay(Request $request){
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->name = $request->get('name');
        $order->address = $request->get('address');
        $order->phone = $request->get('phone');
        $order->note = $request->get('note');
        $order->total = $request->get('total');
        $order->status = 0;
        $order->created_at = Carbon::now();
        $order->updated_at = Carbon::now();
        $items = Cart::content();
        $order->save();
        foreach ($items as $item) {
            $order->products()->attach($item->id, [
                'name'          => $item->name,
                'price'         => $item->price,
                'quantity'      => $item->qty,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now()
            ]);
        }
        $data['info'] = $request->all();
        $data['cart'] = Cart::content();
        $data['tax'] = Cart::tax();
        $data['total'] = Cart::total();
        $email = $request->email;
        
        Mail::send('frontend.email', $data, function ($message) use($email){
            $message->from('buixuanxep@gmail.com', 'Bùi Xuân Xếp');
            $message->to($email, $email);
            $message->subject('Xác nhận hóa đơn thanh toán mua hàng tại cửa hàng Laravel Shop');
        });
        Cart::destroy();
        if ($order) {
             return redirect()->route('frontend.cart.complete');
        }
         
    }


    public function sendComplete(){
            return view('frontend.sendcomplete');
    }

    public function listcart(){
        $carts = Order::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        // if(count($carts) > 0){
        //     foreach($carts as $cart) {
        //         foreach ($cart->orderproducts as $orderproduct) {
        //             $product[] = Product::find($orderproduct->product_id);
        //             // dd($product);
        //         }
        //     }
        // }
        // dd($carts);
        return view('frontend.listcart')->with(compact('carts'));
    }
}
