<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\SubCategory;
use App\Category;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
         
         View::composer('homepage_search',function($view){
            $categories = array(Category::all());
            // dd(gettype($categories));
             $subs = SubCategory::all();
             $view->with('categories',$categories['0']);
             $view->with('subs',$subs);
         });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
