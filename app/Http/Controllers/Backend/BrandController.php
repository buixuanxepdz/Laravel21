<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBrandRequest;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brands.index')->with(['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();

        return view('backend.brands.create')->with(['brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->get('name');
        $brand->slug = \Illuminate\Support\Str::slug($request->get('name')).rand(0,999);
        $brand->user_id = Auth::user()->id;
        $brand->save();
        if( $brand->save()){
            return redirect()->route('backend.brand.index')->with("success",'Thêm thương hiệu thành công');      
        }else{
           return redirect()->route('backend.brand.index')->with("error",'Thêm thương hiệu thất bại');  
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::find($id);
        return view('backend.brands.edit')->with(['brands' => $brands]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBrandRequest $request, $id)
    {
        
        $brand = Brand::find($id);

        $brand->name = $request->get('name');
        $brand->save();
        if( $brand->save()){
            return redirect()->route('backend.brand.index')->with("updatesuccess",'Chỉnh sửa thương hiệu thành công');      
        }else{
           return redirect()->route('backend.brand.index')->with("updateerror",'Chỉnh sửa thương hiệu thất bại');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        // $brand = Brand::find($id);
        // $brand->delete();
        Product::where('brand_id',$brand->id)->update(['brand_id' => NULL]);
        if( $brand->delete()){
            return redirect()->route('backend.brand.index')->with("deletesuccess",'Xóa thương hiệu thành công');      
        }else{
           return redirect()->route('backend.brand.index')->with("deleteerror",'Xóa thương hiệu thất bại');  
        }
    }
}
