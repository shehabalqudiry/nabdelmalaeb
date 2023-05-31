@extends('front.layouts.front')
@section('title', 'عاجل')
@section('content')

    <!--// Fancy Title Two //-->
    <div class="ritekhela-fancy-title-two">
        <h2 class="mainFont">عاجل</h2>
    </div>
    <!--// Fancy Title Two //-->

    <!--// Latest Blog's //-->
    <div class="ritekhela-blogs ritekhela-blog-view1 mb-5">
        <ul class="row">
            @foreach ($i_articles as $article)
                <li class="col-md-6">
                    <div class="newsPartContainer">
                        <figure><a
                                href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}"><img
                                    src="{{ $article->image_path }}" alt="{{ $article->title }}"> <i
                                    class="fa fa-link"></i> </a></figure>
                        <div class="ritekhela-blog-view1-text">
                            <ul class="ritekhela-blog-options">
                                <li class="mainFont"><i class="far fa-calendar-alt"></i>
                                    {{ App\Http\Controllers\Front\HomeFrontController::mydate($article->created_at, 'd M Y h:i م') }}
                                </li>
                                <li class="mainFont"><a href="#"><i class="far fa-edit"></i>{{ $article->user->name }}</a>
                                </li>
                            </ul>
                            <h2 style="padding: 8px; text-align:center"><a
                                    href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}"
                                    class="secondFont">{{ $article->title }}</a></h2>
                            <div class="col-12 d-flex justify-content-center">
                                <a href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}"
                                    class="ritekhela-blog-view1-btn mainFont">عرض التفاصيل</a>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="ritekhela-blogs ritekhela-blog-view2">
        <ul class="row">
            @foreach ($articles as $article)
                <li class="col-md-12">
                    <div class="newsPartContainer">
                        <figure><a
                                href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}"><img
                                    style="padding-top: 14px;" src="{{ $article->image_path }}"
                                    alt="{{ $article->title }}"></a></figure>
                        <div class="ritekhela-blog-view2-text">

                            <h2><a
                                    href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}">{{ $article->title }}
                                </a></h2>
                            <time datetime="2008-02-14 20:00">
                                {{ App\Http\Controllers\Front\HomeFrontController::mydate($article->created_at, 'd M Y h:i م') }}</time>
                            <p class="secondFont mainColor" style="padding:8px; color:yellow; font-size:18px;">
                                {{ $article->excerpt }}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <br><br>
    <!--// Latest Blog's //-->
    <div class="ritekhela-gallery ritekhela-gallery-view1">
        <ul class="row">
            @foreach ($r_articles as $article)
                <li class="col-md-4">
                    <figure>
                        <a data-fancybox-group="group"
                            href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}"
                            class="fancybox"><img src="{{ $article->image_path }}" alt="{{ $article->title }}"> <i
                                class="fa fa-link ritekhela-bgcolor"></i> </a>
                        <figcaption>
                            <span class="ritekhela-bgcolor-two far fa-calendar-alt">
                                {{ App\Http\Controllers\Front\HomeFrontController::mydate($article->created_at, 'D d M Y h:i م') }}</span>
                        </figcaption>
                    </figure>
                    <h2 class="secondFont"><a
                            href="{{ route('front.articles.single', ['id' => $article->id, 'slug' => $article->slug]) }}">{{ $article->title }}</a>
                    </h2>
                </li>
            @endforeach
        </ul>
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
