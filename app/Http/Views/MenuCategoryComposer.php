<?php

namespace App\Http\Views;

use App\Models\Category;
use Illuminate\View\View;

class MenuCategoryComposer
{
    public function compose(View $view){
        $menus = Category::where('parent_id',0)->get();
        
        $view->with('menus',$menus);
        
    }

    public function getCategoryWithChildren($categories)
    {
       foreach($categories as $category)
       {
           $children = Category::where('parent_id',$category->id)->get();

           if(count($children) > 0)
           {
                $category->children = $this->getCategoryWithChildren($children);
           }
       }
       return $categories;
    }
}