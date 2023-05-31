<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Banner;
use App\Match;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;




class HomeFrontController extends Controller
{

    public static function mydate($date, $myformat = 'd M, Y')
    {
        $date = new Date($date, 'EET');
        $date->setLocale('ar');
        return $date->format($myformat);
    }

    public function index(){

        $data['videos'] = Video::latest()->get();
        $data['random_videos'] = Video::latest()->skip(2)->limit(3)->get();

        $data['matches'] = Match::latest()->get();

        $data['articles'] = Article::latest()->get();
        $data['random_articles'] = Article::latest()->skip(2)->limit(6)->get();

        $data['i_articles'] = Article::latest()->skip(12)->limit(3)->get();
        $data['p_articles'] = Article::latest()->skip(8)->limit(4)->get();

        $data['homeBanner1'] = Banner::where(['place' => 1, 'status' => 1])->first();
        $data['homeBanner2'] = Banner::where(['place' => 2, 'status' => 1])->first();

        $data['settings'] = Setting::where('id', 1)->first();
        return view('front.index')->with($data);
    }

    public function search(Request $request)
    {
        $data['i_articles'] = Article::latest()->skip(12)->limit(3)->get();
        $data['p_articles'] = Article::latest()->skip(8)->limit(4)->get();

        $data['homeBanner1'] = Banner::where(['place' => 1, 'status' => 1])->first();
        $data['homeBanner2'] = Banner::where(['place' => 2, 'status' => 1])->first();

        $data['title'] = $_GET['top_search'];
        // dd($data['title']);
        $data['result'] = Article::where('title', 'like', '%' . $data['title'] . '%')
                                   ->orWhere('body', 'like', '%' . $data['title'] . '%')->latest()->paginate(10);

        return view('front.articles.search')->with($data);
    }
}
