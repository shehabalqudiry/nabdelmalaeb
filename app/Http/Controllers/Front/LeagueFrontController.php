<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Article;
use App\Banner;
use App\Setting;
use App\League;
use App\Match;
use Illuminate\Http\Request;

class LeagueFrontController extends Controller
{
    public function single($id, $slug = null)
    {
        $data['league'] = League::findOrFail($id);
        $data['l_articles'] = $data['league']->articles()->paginate(11);
        $data['settings'] = Setting::first();

        $data['i_articles'] = Article::where('league_id', $id)->limit(4)->get();
        $data['p_articles'] = Article::inRandomOrder()->limit(6)->get();

        $data['homeBanner1'] = Banner::where(['place' => 9, 'status' => 1])->first();
        $data['homeBanner2'] = Banner::where(['place' => 10, 'status' => 1])->first();

        return view('front.leagues.single')->with($data);
    }

    public function matches()
    {
        $data['homeBanner1']    = Banner::where(['place' => 11, 'status' => 1])->first();
        $data['homeBanner2']    = Banner::where(['place' => 12, 'status' => 1])->first();

        $data['p_articles'] = Article::inRandomOrder()->limit(6)->get();
        $data['matches'] = Match::paginate(5);
        return view('front.matches.index')->with($data);
    }
}
