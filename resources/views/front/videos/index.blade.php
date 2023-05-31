@extends('front.layouts.front')
@section('title', 'الصفحة الرئيسية')
@section('content')
    <!--// Gallery //-->
    <div class="ritekhela-gallery ritekhela-gallery-view1">
        <ul class="row">
            @foreach ($videos as $video)
                <li class="col-md-4">
                    <figure>
                        @php
                            echo $video->youtube_url;
                        @endphp
                        <figcaption>
                            <span class="ritekhela-bgcolor-two far fa-calendar-alt">
                                {{ App\Http\Controllers\Front\HomeFrontController::mydate($video->created_at, 'd M Y') }}</span>
                        </figcaption>
                    </figure>
                    <h2>{{ $video->title }}</h2>
                </li>
            @endforeach
        </ul>
    </div>
    <!--// Gallery //-->
    <!--// Pagination //-->
    <div class="ritekhela-pagination">
        <ul>
            {{ $videos->links() }}
        </ul>
    </div>
    <!--// Pagination //-->

    @if ($videos->count() == 0)
        <h1>لا توجد فيديوهات</h1>
    @endif
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
