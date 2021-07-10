<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(){
       
        // if (!Cache::has('category')) {
        //     // dd("chua co cache");
        //     $category = Category::get();
        //     $cache = Cache::put('category',$category,60);
        // }
        // dd("co cache");


        $product = Product::where('status',1)->orderBy('created_at','desc')->paginate(3);
        $rands = Product::inRandomOrder()->limit(3)->get();
        $randstwo = Product::inRandomOrder()->limit(3)->get();
        $brands = Brand::all();
        return view('frontend.home')->with([
            'product' => $product,
            'brands'=> $brands,
            'rands' => $rands,
            'randstwo' => $randstwo,
        ]);
    }

    public function show($slug){
        $products = Product::where('slug',$slug)->first();
        $brands = Brand::all();
        $relateds = Product::where('category_id',$products->category->id)->orderBy('id','desc')->limit(3)->get();

        return view('frontend.detailproduct')->with(['products' => $products])->with(['brands' => $brands])->with(compact('relateds'));
    }
    public function search(Request $request){
        $keyword = $request->get('keyword');

        $searchs = Product::where('name','like','%'.$keyword.'%')->paginate(6);
        $brands = Brand::all();
        return view('frontend.search')->with(['searchs' => $searchs])->with(['brands' => $brands]);
    }

    public function autocomplete_ajax(Request $request){
        $data = $request->all();
        if($data['query']){
            $product =  Product::where('name','like','%'.$data['query'].'%')->paginate(6);
            $output = '<ul class="dropdown-menu" style="display:block;position:relative;">';
            foreach ($product as $value) {
                $output .= '<li class ="lisearch"><a href="#">'.$value->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }


    public function productbrand(Request $request,$slug){
        $brand_name = Brand::where('slug',$slug)->first();
        // dd($category_name);
        $brands = Brand::all();
        $brand_products = Product::where('brand_id', $brand_name->id)->orderBy('created_at','desc')->paginate(6);
        // dd($category_products);
        if($request->get('minprice') && $request->get('maxprice') )
        {
            $min_price = $request->get('minprice');
            $max_price = $request->get('maxprice');
            $products = Product::where('brand_id', $brand_name->id)->whereBetween('sale_price',[$min_price,$max_price])->orderBy('sale_price','asc');
            $brand_products = $products->paginate(6);
        }
        return view('frontend.productbrand')->with(['brand_name' => $brand_name])->with(['brand_products' => $brand_products])->with(['brands' => $brands]);
    }
    public function productcategory(Request $request,$slug){
        $category_name = Category::where('slug',$slug)->first();
        // dd($category_name);
        $brands = Brand::all();
        $category_products = Product::where('category_id', $category_name->id)->orderBy('created_at','desc')->paginate(6);
        // if ($request->sortby == 'default') {
        //     $product = Product::where('category_id', $category_name->id)->orderBy('created_at','desc');
        //     return view('frontend.productcategory')->with(['category_name' => $category_name])->with(['category_products' => $category_products])->with(['brands' => $brands]);
        // }
        // if ($request->sortby) 
        // {
        //     $sortby = $request->sortby;
        //     switch ($sortby) {
        //         case 'moi-nhat':
        //             $products = Product::where('category_id', $category_name->id)->orderBy('created_at','desc');
        //             break;
        //         case 'sp-cu':
        //             $products = Product::where('category_id', $category_name->id)->orderBy('created_at','asc');
        //             break;
                
        //         default:
        //         $products = Product::orderBy('created_at','desc');
                
        //     }
        //     $category_products = $products->paginate(6);
        // }
        if($request->get('minprice') && $request->get('maxprice') )
        {
            $min_price = $request->get('minprice');
            $max_price = $request->get('maxprice');
            $products = Product::where('category_id', $category_name->id)->whereBetween('sale_price',[$min_price,$max_price])->orderBy('sale_price','asc');
            $category_products = $products->paginate(6);
        }

        // dd($category_products);
        return view('frontend.productcategory')->with(['category_name' => $category_name])->with(['category_products' => $category_products])->with(['brands' => $brands]);
    }

    

   
}
