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
    public function index(Request $request)
    {
        $products = Product::orderBy('updated_at', 'desc')->paginate(10);
        $categories = Category::all();
        // $products = Product::query();

        // if ($request->sortby == 'default') {
        //     return view('backend.products.index',['products' => $products]);
        // }
        
        // if ($request->sortby) 
        // {
        //     $sortby = $request->sortby;
        //     switch ($sortby) {
        //         case 'moi-nhat':
        //             $products = Product::orderBy('id','desc');
        //             break;
        //         case 'sp-cu':
        //             $products = Product::orderBy('id','asc');
        //             break;
                
        //         default:
        //         $products = Product::orderBy('id','desc');
                
        //     }
        //     $products = $products->paginate(10);
        // }
        
        return view('backend.products.index',['products' => $products])->with(['categories' => $categories]);
    }


    public function filterProduct(Request $request){
        if($request->get('status') == -1 && $request->get('category') == -1){
            return redirect()->route('backend.product.index');
        }

        $products = Product::query()->status($request)->category($request)->paginate(10);
        $categories = Category::all();
        return view('backend.products.index',['products' => $products])->with(['categories' => $categories]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id',0)->get();
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
        // $save =0 ;
        // if($save){
        //     $request->session()->flash('success','Tao sp thanh cong');
        // }else{
        //     $request->session()->flash('error','Tao sp that bai');
        // }
            // $this->authorize('create',Product::class);
            if($product->save() &&  $image->save()){
                 return redirect()->route('backend.product.index')->with("success",'Thêm mới sản phẩm thành công');  
            }else{
                return redirect()->route('backend.product.index')->with("error",'Thêm mới sản phẩm thất bại');  
            }
             
        
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
        //$product->slug = \Illuminate\Support\Str::slug($request->get('name'));
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

        }
        $delimg = $request->get('delimg');
        if(!empty($delimg)){
            foreach($delimg as $del){
                $imgdelete = Image::find($del);
                Storage::disk('public')->delete($imgdelete->path);
                $imgdelete->delete();
            }
        }
        // $this->authorize('update',Product::class);
        if($product->save()){
            return redirect()->route('backend.product.index')->with("updatesuccess",'Chỉnh sửa sản phẩm thành công');  
       }else{
           return redirect()->route('backend.product.index')->with("updateerror",'Chỉnh sửa sản phẩm thất bại');  
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $image = Image::where('product_id',$product->id)->delete();
        // if (Gate::denies('delete-product', $product)){
        //     abort(403);
        // }
        // $this->authorize('delete',Product::class);
        if( $product->delete()){
            return redirect()->route('backend.product.index')->with("deletesuccess",'Xóa sản phẩm thành công');      
        }else{
           return redirect()->route('backend.product.index')->with("deleteerror",'Xóa sản phẩm thất bại');  
        }
            // $save = 1;
        

        // return redirect()->route('backend.product.index');
    }
    public function search(Request $request){
        $keyword = $request->get('keyword');

        $searchs = Product::where('name','like','%'.$keyword.'%')->paginate(6);

        return view('backend.products.search')->with(['searchs' => $searchs]);
      
    }

    public function autocomplete_ajax(Request $request){
        $data = $request->all();
        if($data['query']){
            $product =  Product::where('name','like','%'.$data['query'].'%')->paginate(6);
            $output = '<ul class="dropdown-menu" style="display:block;position:relative;text-align:center">';
            foreach ($product as $value) {
                $output .= '<li class ="lisearch"><a href="#">'.$value->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }
}
