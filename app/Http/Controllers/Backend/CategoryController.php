<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories_parent = Category::where('parent_id',0)->get();
        $categories = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('backend.categories.index',['categories' => $categories,'categories_parent'=>$categories_parent]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::where('parent_id',0)->get();
        return view('backend.categories.create')->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->get('name');
        $category->slug = \Illuminate\Support\Str::slug($request->get('name')).rand(0,999);
        $category->parent_id = $request->get('parent_id');
        $category->save();
        Cache::forget('menus');

        if( $category->save()){
            return redirect()->route('backend.category.index')->with("success",'Thêm danh mục thành công');      
        }else{
           return redirect()->route('backend.category.index')->with("error",'Thêm danh mục thất bại');  
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

    public function showProducts($category_id)
    {
        $categories = Category::find($category_id)->products()->paginate(10);
        return view('backend.categories.showProduct')->with(['categories' => $categories ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);
        $category = Category::all();
        return view('backend.categories.edit')->with(['categories' => $categories])->with(['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoryRequest $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->get('name');
        $category->slug = \Illuminate\Support\Str::slug($request->get('name')).rand(0,999);
        $category->parent_id = $request->get('parent_id');
        $category->save();
        Cache::forget('menus');
        if( $category->save()){
            return redirect()->route('backend.category.index')->with("updatesuccess",'Chỉnh sửa danh mục thành công');      
        }else{
           return redirect()->route('backend.category.index')->with("updateerror",'Chỉnh sửa danh mục thất bại');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // $category = Category::find($id);
        // $category->delete();
        Product::where('category_id',$category->id)->update(['category_id' => NULL]);
        Cache::forget('menus');
        if( $category->delete()){
            return redirect()->route('backend.category.index')->with("deletesuccess",'Xóa danh mục thành công');      
        }else{
           return redirect()->route('backend.category.index')->with("deleteerror",'Xóa danh mục thất bại');  
        }
    }
}
