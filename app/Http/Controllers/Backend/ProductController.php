<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('updated_at', 'desc')->paginate(15);
        return view('backend.products.index',['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $user = Auth::user();
        $brands = Brand::all();
        // if($user->cannot('create',Product::class)){
        //     abort(403);
        // }
        $this->authorize('create',Product::class);
        return view('backend.products.create')->with([
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {


        // $validatedData = $request->validate([
        //     'name'         => 'required|min:10|max:255',
        //     'origin_price' => 'required|numeric',
        //     'sale_price'   => 'required|numeric',
        //     'quantity'   => 'required|numeric',
        //     'category_id' => 'required',
        //     'status' => 'required',
        // ]);

        // $validator = Validator::make($request->all(),
        //     [
        //         'name'         => 'required|min:10|max:255',
        //         'origin_price' => 'required|numeric',
        //         'sale_price'   => 'required|numeric',
        //         'quantity'   => 'required|numeric|max:9999'
        //     ],
        //     [
        //         'required'         => ':attribute không được để trống',
        //         'min' => ':attribute không được nhỏ hơn :min',
        //         'max'   => ':attribute không được lớn hơn :max'
        //     ],
        //     [
        //         'name'         => 'Tên sản phẩm',
        //         'origin_price' => 'Giá gốc',
        //         'sale_price'   => 'Giá bán',
        //         'quantity'   => 'Số lượng'
        //     ]
        // );
        // if ($validator->errors()){
        //     return back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        // dd($request->except('_token'));
        $product = new Product();
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name')).rand(0,999);
        $product->category_id = $request->get('category_id');
        $product->brand_id = $request->get('brand_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->content = $request->get('content');
        $product->quantity = $request->get('quantity');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;
        $product->created_at = Carbon::now();
        $product->save();
            // if($product->save()){
            //     dd('ok');
            // }
            if($request->hasFile('image')){
                $files = $request->file('image');
                foreach($files as $file){
                    $name = $file->getClientOriginalName().rand(0,999);
                    $disk_name = 'public';

                    $path = Storage::disk($disk_name)->putFileAs('images',$file,$name);

                    $image = new Image();
                    $image->name = $name;
                    $image->disk = $disk_name;
                    $image->path = $path;
                    $image->product_id = $product->id;
                    $image->save();
                        // dd($image);
                }
                // $path = Storage::putFile('images',$file);
    
                // $name = $file->getClientOriginalName();
    
                // $path = Storage::putFileAs('images',$file,$name);
    
                // $path =$file->store('files');
                // $path = $file->move('images2',$name)
              
                // dd($path);
            }else{
                dd('khong co file');
            }
            // $this->authorize('create',Product::class);
        return redirect()->route('backend.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function showImages($id)
    {
        $images = Product::find($id)->images;
         return view('backend.products.showImages')->with(['images' => $images]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        // $products = Product::find($id);
        $images = Image::find($product);
        $brands = Brand::all();
        // $user = Auth::user();
        // if (Gate::denies('update-product', $products)){
        //     abort(403);
        // }
        // if($user->can('update',$products)){
        //     return view('backend.products.edit')->with(['categories' => $categories])->with(['products' => $products])->with(['images' => $images]); 
        // }else{
        //     abort(403);
        // }
        // $this->authorize('update',$products);
        return view('backend.products.edit')->with([
            'categories' => $categories,
            'products' => $product,
            'images' => $images,
            'brands' => $brands,
        ]); 
        //return view('backend.products.edit')->with(['product',$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, $id)
    {  

        // $validatedData = $request->validate([
        //     'name'         => 'required|min:10|max:255',
        //     'origin_price' => 'required|numeric',
        //     'sale_price'   => 'required|numeric',
        // ]);

        // $validator = Validator::make($request->all(),
        // [
        //     'name'         => 'required|min:10|max:255',
        //     'origin_price' => 'required|numeric',
        //     'sale_price'   => 'required|numeric',
        // ],
        // [
        //     'required'         => ':attribute không được để trống',
        //     'min' => ':attribute không được nhỏ hơn :min',
        //     'max'   => ':attribute không được lớn hơn :max',
        // ],
        // [
        //     'name'         => 'Tên sản phẩm',
        //     'origin_price' => 'Giá gốc',
        //     'sale_price'   => 'Giá bán',
        // ]
        // );
       
        // if ($validator->errors()){ 
        //     return back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        
        //  $data = $request->except('_token');
        $product = Product::find($id);
        
        // $product->update($data);
        $product->name = $request->get('name');
        $product->slug = \Illuminate\Support\Str::slug($request->get('name')).rand(0,999);
        $product->category_id = $request->get('category_id');
        $product->brand_id = $request->get('brand_id');
        $product->origin_price = $request->get('origin_price');
        $product->sale_price = $request->get('sale_price');
        $product->quantity = $request->get('quantity');
        $product->content = $request->get('content');
        $product->status = $request->get('status');
        $product->user_id = Auth::user()->id;
        $product->save();

        if($request->hasFile('image')){
            $files = $request->file('image');
            foreach($files as $file){
                
                $name = $file->getClientOriginalName().rand(0,999);
                // dd($file->getClientOriginalName());
                $disk_name = 'public';
                
                $path = Storage::disk($disk_name)->putFileAs('images',$file,$name);
                $image = Image::where('product_id',$product->id)->first();
                
                if(!$image){
                    $image = new Image();
                }
                
                // dd($image);
                $image->name = $name;
                $image->disk = $disk_name;
                $image->path = $path;
                $image->product_id = $product->id;

                $image->save();
                // dd($image);
            }
        }else{
            dd('khong co file');
        }
        // $this->authorize('update',Product::class);
        return redirect()->route('backend.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        // if (Gate::denies('delete-product', $product)){
        //     abort(403);
        // }
        // $this->authorize('delete',Product::class);
        return redirect()->route('backend.product.index');
    }
    public function search(Request $request){
        $keyword = $request->get('keyword');

        $searchs = Product::where('name','like','%'.$keyword.'%')->paginate(6);

        return view('backend.products.search')->with(['searchs' => $searchs]);
    }
}
