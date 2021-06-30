<?php

namespace App\Http\Views;

use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;


class MenuCategoryComposer
{
    public function compose(View $view){
        // if (!Cache::has('menus')) {
        //         $menus = Category::where('parent_id',0)->get();
        //         Cache::put('menus',$menus,60);
        //     }
        // // $menus = Category::where('parent_id',0)->get();
        // $menus = Cache::get('menus');

        $menus = Cache::remember('menus', 60*60, function() {
            return Category::where('parent_id',0)->get();
        });
        $menus = $this->getCategoryWithChildren($menus);
        $view->with('menus',$menus);
        
    }

    public function getCategoryWithChildren($categories)
    {
       foreach($categories as $category)
       {
           $childrens = Category::where('parent_id',$category->id)->get();

           if(count($childrens) > 0)
           {
                $category->children = $this->getCategoryWithChildren($childrens);
           }
       }
       return $categories;
    }
}