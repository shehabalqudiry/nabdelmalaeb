@extends('front.layouts.front')
@section('title', 'اهم مباريات اليوم')
@section('content')

    <!--// Fixture List //-->
    <div class="ritekhela-fixture ritekhela-fixture-list">
        <ul class="row">
            @foreach ($matches as $match)
                <li class="col-md-12">
                    <div class="ritekhela-fixture-list-wrap">
                        <span class="ritekhela-fixture-list-pool">المباراة # {{ $loop->iteration }}</span>
                        <figure>
                            <figcaption>
                                <h2><a href="#">{{ $match->away_team }}</a></h2>
                            </figcaption>
                        </figure>
                        <div class="ritekhela-fixture-list-vs">
                            <small>{{ $match->league->name }}</small>
                            <span>VS</span>
                            <time datetime="2008-02-14 20:00">
                                @php
                                    $date = new Jenssegers\Date\Date($match->timing, 'EET');
                                    $date->setLocale('ar');
                                    if (Jenssegers\Date\Date::now() > $date) {
                                        echo 'انتهت المباراة';
                                    } else {
                                        if (Jenssegers\Date\Date::today()->format('Y m d') == $date->format('Y m d')) {
                                            echo 'اليوم' . '  ';
                                        } else {
                                            echo $date->format('Y M d') . '  ';
                                        }
                                        echo $date->format('h:i a');
                                    }
                                @endphp
                            </time>
                        </div>
                        <figure class="ritekhela-fixture-list-right">
                            <figcaption>
                                <h2><a href="#">{{ $match->home_team }}</a></h2>

                            </figcaption>
                        </figure>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <!--// Fixture List //-->

    <!--// Pagination //-->
    <div class="ritekhela-pagination">
        {{ $matches->links() }}
    </div>
    <!--// Pagination //-->
@endsection
@section('banners')
    <!--// Widget Add's //-->
    <div class="widget widget_add">
        @if ($homeBanner2 != null)
            <a href="{{ $homeBanner2->url }}"><img src="{{ $homeBanner2->image_path }}"
                    style="padding-bottom: 30px; max-height:333px; margin-top:70px; margin-bottom:10px;" width="100%"
                    alt="{{ $homeBanner2->name }}"> </a>
        @else
            <a href="#"><img src="{{ asset('front/images/ad1.png') }}"
                    style="padding-bottom: 30px; max-height:333px; margin-top:70px; margin-bottom:10px;" width="100%"
                    alt="نبض الملاعب"> </a>
        @endif
    </div>
    <!--// Widget Add's //-->
@endsection
@section('other')
    <div class="ritekhela-fancy-title-two">
        <h2 class="mainFont secondColor">تابع أيضا</h2>
    </div>
    <div class="ritekhela-main-content ak-ritekhela-main-content">

        <!--// Main Section //-->
        <div class="ritekhela-main-section ritekhela-fixture-list-full">
            <div class="container ritekhela-blog-view1">
                <div class="ritekhela-blogs ritekhela-blog-view2">
                    <ul class="row">
                        @foreach ($p_articles as $article)
                            <li class="col-md-6">
                                <div class="newsPartContainer">
                                    <figure><a
                                            href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}"><img
                                                src="{{ $article->image_path }}" alt=""></a></figure>
                                    <div class="ritekhela-blog-view2-text">
                                        <h2><a
                                                href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}">{{ $article->title }}
                                            </a></h2>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="ritekhela-pagination">

                </div>
                <!--// Main Section //-->
            </div>
        </div>
    </div>
@endsection
@section('banners')
    <!--// Widget Add's //-->
    <div class="widget widget_add">
        @if ($homeBanner2 != null)
            <a href="{{ $homeBanner2->url }}"><img src="{{ $homeBanner2->image_path }}"
                    style="padding-bottom: 30px; max-height:333px; margin-top:70px; margin-bottom:10px;" width="100%"
                    alt="{{ $homeBanner2->name }}"> </a>
        @else
            <a href="#"><img src="{{ asset('front/images/ad1.png') }}"
                    style="padding-bottom: 30px; max-height:333px; margin-top:70px; margin-bottom:10px;" width="100%"
                    alt="نبض الملاعب"> </a>
        @endif
    </div>
    <!--// Widget Add's //-->
@endsection
@section('other')
    <div class="ritekhela-fancy-title-two">
        <h2 class="mainFont secondColor">تابع أيضا</h2>
    </div>
    <div class="ritekhela-main-content ak-ritekhela-main-content">

        <!--// Main Section //-->
        <div class="ritekhela-main-section ritekhela-fixture-list-full">
            <div class="container ritekhela-blog-view1">
                <div class="ritekhela-blogs ritekhela-blog-view2">
                    <ul class="row">
                        @foreach ($p_articles as $article)
                            <li class="col-md-6">
                                <div class="newsPartContainer">
                                    <figure><a
                                            href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}"><img
                                                src="{{ $article->image_path }}" alt=""></a></figure>
                                    <div class="ritekhela-blog-view2-text">
                                        <h2><a
                                                href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}">{{ $article->title }}
                                            </a></h2>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="ritekhela-pagination">

                </div>
                <!--// Main Section //-->
            </div>
        </div>
    </div>
@endsection
