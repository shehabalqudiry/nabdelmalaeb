<?php

namespace App\Http\Controllers;

use App\Article;
use App\Banner;
use App\Match;
use App\Category;
use App\League;
use App\User;
use App\Video;

class HomeController extends Controller
{
    public function index()
    {
        $users      = User::whereRoleIs(['admin', 'editor']);
        $categories = Category::all();
        $leagues    = League::all();
        $matches    = Match::all()->take(6);
        $articles   = Article::all();
        $banners    = Banner::all();
        $videos     = Video::all();
        return view('dashboard.home', compact([
            'users',
            'categories',
            'leagues',
            'matches',
            'articles',
            'banners',
            'videos',
        ]));
    }
}
