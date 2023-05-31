<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Banner;
use App\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleFrontController extends Controller
{
    public function index(){

        $data['articles'] = Article::latest()->paginate(12);

        $data['settings'] = Setting::first();

        $data['homeBanner1']    = Banner::where(['place' => 3, 'status' => 1])->first();
        $data['homeBanner2']    = Banner::where(['place' => 4, 'status' => 1])->first();


        $data['p_articles'] = Article::inRandomOrder()->limit(5)->get();

        return view('front.articles.index')->with($data);
    }

    public function hotnews(){

        $data['settings'] = Setting::first();

        $data['homeBanner1']    = Banner::where(['place' => 5, 'status' => 1])->first();
        $data['homeBanner2']    = Banner::where(['place' => 6, 'status' => 1])->first();


        $data['p_articles'] = Article::inRandomOrder()->limit(6)->get();

        $data['i_articles'] = Article::where('exclusive', 1)->latest()->limit(2)->get();

        $data['articles'] = Article::where('exclusive', 1)->inRandomOrder()->paginate(10);

        $data['r_articles'] = Article::where('exclusive', 1)->inRandomOrder()->limit(3)->get();

        return view('front.articles.hotnews')->with($data);
    }

    public function single($id, $slug = null){

        $data['article'] = Article::findOrFail($id);

        $data['r_articles'] = Article::where('league_id', $data['article']->league_id)->latest()->limit(2)->get();

        $data['p_articles'] = Article::inRandomOrder()->limit(6)->get();

        $data['homeBanner1']    = Banner::where(['place' => 7, 'status' => 1])->first();
        $data['homeBanner2']    = Banner::where(['place' => 8, 'status' => 1])->first();

        return view('front.articles.single')->with($data);
    }
}
