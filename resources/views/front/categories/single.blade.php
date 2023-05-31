@extends('front.layouts.front')
@section('title', $category->name)
@section('content')
    @foreach ($category->leagues as $league)
        <ul class="row">
            <li class="col-md-12" style="margin-top: 15px">
                <div class="ritekhela-fancy-title-two mainColor ak-h2">
                    <h2><span class="mainFont">{{ $league->name }}</span></h2>
                </div>

            </li>
            @foreach ($league->articles->take(4) as $article)
                @if ($loop->iteration == 1)
                    <li class="col-md-12">
                        <figure><a
                                href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}"><img
                                    src="{{ $article->image_path }}" alt="{{ $article->title }}"
                                    class="ak-photo ak-hover"> </a></figure>
                        <div class="ritekhela-blog-view1-text ak-ritekhela-blog-view1-text ">
                            <h2><a href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}"
                                    class="mainFont ak-Color">{{ $article->excerpt }}</a></h2>

                        </div>
                    </li>
                @endif
                <li class="col-md-6 my-4">
                    <figure><a
                            href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}"><img
                                src="{{ $article->image_path }}" alt="{{ $article->title }}" class="ak-photo">
                        </a></figure>

                    <div class="ritekhela-blog-view1-text ak-back">

                        <h2><a href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}"
                                class="mainFont mainColor ak-hover">{{ $article->title }}</a></h2>
                        <p class="secondFont ak-Color">{{ $article->excerpt }}</p>
                        <div class="col-12 d-flex justify-content-center">
                            <a href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}"
                                class="ritekhela-blog-view1-btn mainFont">عرض التفاصيل</a>
                        </div>
                    </div>

                </li>
            @endforeach

        </ul>
    @endforeach
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
