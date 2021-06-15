<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Category;
use App\Models\Order;
use App\Models\Image;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){

        // $user = User::find(1);
        // $userInfo = $user->userInfo;
        // dd($userInfo);
        // $userInfo = UserInfo::find(2);
        // $user = $userInfo->user;
        // dd($user);
        // dd($userInfo);
        // $product = Product::find(1);
        // $products = Category::find(1)->products;
        // dd($products);
        // foreach($products as $product)
        // {
        //     echo $product->name."<br>";
        // }

        // $productSaved = $category->products()->save($product);
        // $category = Category::find(1);

        // $product = $category->products()->create([
        //     'name' => 'san pham create',
        //     'slug' => 'aaa',
        //     'origin_price' => '10000',
        //     'sale_price' => '5000',
        //     'content' => 'Noi dung demo',
        //     'user_id' => 1
        // ]);

        // $order = new Order();

        // $order->total = 200000;
        // $order->save();
        
        // $attach = $order->products()->attach([2,3]);
        // $order = Order::find(1);

        // $products = $order->products;

        // foreach($products as $product){
        //     echo $product->name;
        // }

        // $img = Product::find(1);
        // $products = $img->images;
        // foreach($products as $product){
        //     echo $product->path;
        // }
        // dd($products);
        // $products = Image::find(1)->product;
        // dd($products);
        // if (Auth::check()) {
        //     echo "ok login";
        // }

        // dd(storage_path());
        // Storage::disk('local')->put('file.txt', 'Contents');
        // Storage::disk('public')->put('file2.txt', 'public');
        // Storage::disk('local_2')->put('file3.txt', 'contents');
        // Storage::put('test.txt', 'Xep');

        // $disk =Storage::disk('public');

        // $path = 'file2.txt';

        // if($disk->exists($path)){
        //     $public = $disk->get($path);
        //     dd($public);
        // }else{
        //     dd('ko ton tai file');
        // }

        $products = Product::with('orders')->first()->orders;
        foreach($products as $product){
            dd($product->pivot->get());
        }
        $products = Product::orderBy('updated_at', 'desc')->simplePaginate();
        
        // dd($products);
        return view('backend.dashboard')->with(['products' => $products]);
    }
}
