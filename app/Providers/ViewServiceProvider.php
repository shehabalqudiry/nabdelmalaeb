<?php

namespace App\Providers;

use App\Article;
use App\Category;
use App\Setting;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('front.layouts.inc.header',function($view){
            $categories = Category::all();
            $hotnews = Article::where('exclusive',1)->get();
            $settings = Setting::where('id',1)->first();
            $view->with([
                'categories' => $categories,
                'hotnews'    => $hotnews,
                'settings'    => $settings,
            ]);
        });
        view()->composer('front.layouts.inc.footer',function($view){
            $settings = Setting::where('id',1)->first();
            $view->with(['settings'=>$settings]);
        });
        view()->composer('front.layouts.inc.sidebar',function($view){
            $settings       = Setting::where('id',1)->first();
            $categories     = Category::all();
            $p_articles     = Article::inRandomOrder()->limit(4)->get();
            
            $view->with(['settings'=>$settings, 'categories' => $categories, 'p_articles'=> $p_articles]);
        });
    }


    public function boot()
    {
        //
    }
}
