@extends('front.layouts.front')
@section('title', 'كل الأخبار')
@section('content')

    <!--// Fancy Title Two //-->
    <div class="ritekhela-fancy-title-two">
        <h2 class="mainFont">كل الأخبار</h2>
    </div>
    <!--// Fancy Title Two //-->

    <div class="ritekhela-gallery ritekhela-gallery-view1 my-2">
        <ul class="row">
            @foreach ($articles as $article)
                <li class="col-md-4">
                    <figure>
                        <a data-fancybox-group="group"
                            href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}"
                            class="fancybox"><img src="{{ $article->image_path }}" alt="{{ $article->title }}"> <i
                                class="fa fa-link ritekhela-bgcolor"></i> </a>
                        <figcaption>
                            <span class="ritekhela-bgcolor-two far fa-calendar-alt">
                                {{ App\Http\Controllers\Front\HomeFrontController::mydate($article->created_at, 'D d M Y') }}
                            </span>
                        </figcaption>
                    </figure>
                    <h2 class="secondFont"><a
                            href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}">{{ $article->title }}</a>
                    </h2>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="ritekhela-pagination">
        {{ $articles->links() }}
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
                                        <time datetime="2008-02-14 20:00">8فبراير 2021</time>
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
