<?php

namespace App\Http\Views;

use App\Models\Category;
use Illuminate\View\View;

class MenuCategoryComposer
{
    public function compose(View $view){
        $menus = Category::where('parent_id',0)->get();
        
        $view->with('menu',$menus);
        
    }

    public function getCategoryChildren($category)
    {
       
    }
}