<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $products = Product::orderBy('updated_at', 'desc')->simplePaginate();
        return view('backend.dashboard',['products' => $products]);
    }
}
