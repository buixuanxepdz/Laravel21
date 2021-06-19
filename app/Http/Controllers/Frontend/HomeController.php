<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(){
        $product = Product::where('status',1)->orderBy('created_at','desc')->paginate(3);
        $brands = Brand::all();
        return view('frontend.home')->with([
            'product' => $product,
            'brands'=> $brands
        ]);
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
    public function productcategory($slug){
        $category_name = Category::where('slug',$slug)->first();
        // dd($category_name);
        $category_products = Product::where('category_id', $category_name->id)->orderBy('created_at','desc')->paginate(6);
        // dd($category_products);
        return view('frontend.productcategory')->with(['category_name' => $category_name])->with(['category_products' => $category_products]);
    }
}
