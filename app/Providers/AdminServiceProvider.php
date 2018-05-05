<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\User;
use App\Category;
use App\SubCategory;
class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        
        // $admin = User::where('id','=',auth()->user()->id);
        // // dd($admin);
        View::composer(['includes.sidebar','includes.header','includes.controlsidebar','includes.footer'],function($view){
            $id = auth()->user()->name;
            $view->with('admin',$id);
        });
        View::composer('dashboard',function($view){
             $categories = Category::all();
        
             $subs = SubCategory::all();
             $view->with('categories',$categories);
             $view->with('subs',$subs);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
