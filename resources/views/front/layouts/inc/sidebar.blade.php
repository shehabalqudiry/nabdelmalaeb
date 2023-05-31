<!--// SideBaar //-->
<aside class="col-md-4" style="margin-top:15px;">

    <!--// Widget Popular News //-->
    <div class="widget widget_popular_news">
        <div class="ritekhela-fancy-title-two">
            <h2 class="mainFont">تابع أيضا</h2>
        </div>
        <ul>
            @foreach ($p_articles as $article)
                <li>
                    <span>0{{ $loop->iteration }}</span>
                    <div class="popular_news_text">
                        <small><a style="color: black" href="{{ route('front.leagues.single', ['id' => $article->league->id, 'slug' => $article->league->slug]) }}">{{ $article->league->name }}</a></small>
                        <a class="secondFont"
                            href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}">{{ $article->title }}</a>
                        <time datetime="2008-02-14 20:00">
                            {{ App\Http\Controllers\Front\HomeFrontController::mydate($article->created_at, 'd M Y') }}</time>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <!--// Widget Popular News //-->

    <div class="a">
        @if ($homeBanner1 != null)
            <a href="{{ $homeBanner1->url }}"><img src="{{ $homeBanner1->image_path }}"
                    style="padding-bottom: 30px; max-height:333px; margin-top:70px; margin-bottom:10px;" width="100%"
                    alt="{{ $homeBanner1->nme }}"> </a>
        @else
            <a href="#"><img src="{{ asset('front/images/ad1.png') }}"
                    style="padding-bottom: 30px; max-height:333px; margin-top:70px; margin-bottom:10px;" width="100%"
                    alt=""> </a>
        @endif
    </div>

    <!--// Widget Social Media //-->
    <div class="widget widget_social_media">
        <div class="ritekhela-fancy-title-two">
            <h2 class="mainFont">تابعونا على</h2>
        </div>
        <ul>
            <li>
                <a href="{{ $settings->facebook }}" class="fb">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li>
                <a href="{{ $settings->youtube }}" class="you_tube">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
            <li>
                <a href="{{ $settings->twitter }}" class="twitter">
                    <i class="fab fa-twitter"></i>
                </a>
            </li>
        </ul>
    </div>
    <!--// Widget Social Media //-->
    <div class="widget widget_categories special">
        <div class="ritekhela-fancy-title-two">
            <h2 class="mainFont">التصنيفات</h2>
        </div>
        <ul class="mainFont">
            @foreach ($categories as $category)
            <li><a href="{{ route('front.categories.single', ['id' => $category->id, 'slug' => $category->slug]) }}">{{ $category->name }}</a> <span>03</span></li>
            @endforeach
        </ul>
    </div>
    @yield('banners')
</aside>
<!--// SideBaar //-->
