<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        $product = Product::where('status',1)->orderBy('created_at','desc')->paginate(3);
        return view('frontend.home')->with(['product' => $product]);
    }

    public function show($slug){
        $products = Product::where('slug',$slug)->first();
        return view('frontend.detailproduct')->with(['products' => $products]);
    }
    public function search(Request $request){
        $keyword = $request->get('keyword');

        $searchs = Product::where('name','like','%'.$keyword.'%')->paginate(6);

        return view('frontend.search')->with(['searchs' => $searchs]);
    }
}
