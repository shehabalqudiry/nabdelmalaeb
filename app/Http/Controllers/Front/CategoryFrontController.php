<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Banner;
use App\Category;
use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;

class CategoryFrontController extends Controller
{
    public function single($id, $slug = null){
        $data['category']       = Category::findOrFail($id);
        $data['settings']       = Setting::first();

        $data['i_articles']     = Article::limit(4)->get();
        $data['p_articles']     = Article::inRandomOrder()->limit(6)->get();

        $data['homeBanner1']    = Banner::where(['place' => 13, 'status' => 1])->first();
        $data['homeBanner2']    = Banner::where(['place' => 14, 'status' => 1])->first();

        return view('front.categories.single')->with($data);
    }
}
