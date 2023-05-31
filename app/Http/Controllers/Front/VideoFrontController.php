<?php

namespace App\Http\Controllers\Front;

use App\Article;
use App\Banner;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Video;
use Illuminate\Http\Request;

class VideoFrontController extends Controller
{
    public function index()
    {
        $data['homeBanner1']    = Banner::where(['place' => 15, 'status' => 1])->first();
        $data['homeBanner2']    = Banner::where(['place' => 16, 'status' => 1])->first();
        $data['settings'] = Setting::first();

        $data['p_articles'] = Article::inRandomOrder()->limit(5)->get();
        $data['videos'] = Video::paginate(12);
        return view('front.videos.index')->with($data);
    }

}
