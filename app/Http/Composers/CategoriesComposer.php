<?php


namespace App\Http\Composers;

use App\Category;
use Illuminate\Contracts\View\View;


/**
 * summary
 */
class CategoriesComposer
{
    public function compose(View $view)
    	{
      $categories = Category::withCount('articoli')->orderBy('nome')->get();
       
    	$view->with(compact('categories'));

    }
}