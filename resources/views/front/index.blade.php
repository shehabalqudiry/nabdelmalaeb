@extends('front.layouts.front')
@section('title', 'الصفحة الرئيسية')
@section('content')
        <!--// Content //-->
        <div class="ritekhela-main-content">

            <!--// Main Section //-->
            <div class="ritekhela-main-section ritekhela-fixture-slider-full">
                <div class="container">
                    <div class="row">

                        <div class="ritekhela-fancy-title-two ritekhela-fancy-title-two-right">
                            <h2 class="mainFont">أهم  مباريات اليوم</h2>
                        </div>

                        <div class="col-md-12">
                            <!--// Fixture Slider //-->
                            <div class="ritekhela-fixture-slider">
                                @foreach($matches as $match)
                                <div class="ritekhela-fixture-slider-layer">
                                    <div class="ritekhela-fixture-box">
                                        <span class="layer-shape"></span>
                                        <time datetime="2008-02-14 20:00">
                                        @php
                                            $date = new Jenssegers\Date\Date($match->timing, 'EET');
                                            $date->setLocale('ar');
                                            if(Jenssegers\Date\Date::now() > $date){
                                                echo 'انتهت المباراة';
                                            }else {
                                                if(Jenssegers\Date\Date::today()->format('Y m d') == $date->format('Y m d')){
                                                    echo 'اليوم'  . '<br />';
                                                }else {
                                                    echo $date->format('Y M d') . '<br />';
                                                }
                                                echo $date->format('h:i a');
                                            }
                                        @endphp
                                        </time>
                                        <ul>
                                            <li>{{ $match->home_team }}</li>
                                            <li>{{ $match->away_team }}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!--// Fixture Slider //-->

                            <div class="col-12 d-flex justify-content-center">
                                <a href="{{ route('front.matches') }}" class="ritekhela-blog-view1-btn mainFont secondColor" style="font-size:18px;">عرض باقى المباريات</a>
                            </div>

                        </div>

                        <!--// Left Section //-->
                        <div class="col-md-8" style="margin-top:80px;">

                            <!--// Fancy Title Two //-->
                            <div class="ritekhela-fancy-title-two">
                                <h2 class="mainFont">آخر الأخبار</h2>
                            </div>
                            <!--// Fancy Title Two //-->

                            <!--// Latest Blog's //-->
                            <div class="ritekhela-blogs ritekhela-blog-view1" style="margin-bottom:50px;">
                                <ul class="row">
                                    @foreach ($articles->take(2) as $article)
                                    <li class="col-md-6">
                                        <div class="newsPartContainer">
											<figure><a href="{{ route('front.articles.single', ['id'=>$article->id,'slug'=>$article->slug]) }}"><img src="{{ $article->image_path }}" alt=""> <i class="fa fa-link"></i> </a></figure>
											<div class="ritekhela-blog-view1-text">
												<ul class="ritekhela-blog-options">
													<li class="mainFont"><i class="far fa-calendar-alt"></i>
                                                    {{ App\Http\Controllers\Front\HomeFrontController::mydate($article->created_at) }}
                                                    </li>
													<li  class="mainFont"><a href="#"><i class="far fa-edit"></i> بقلم : {{ $article->user->name }}</a></li>
												</ul>
												<h2 style="padding: 8px; text-align:center"><a href="{{ route('front.articles.single', ['id'=>$article->id,'slug'=>$article->slug]) }}" class="secondFont">{{ $article->title }}</a></h2>
												<div class="col-12 d-flex justify-content-center">
													<a href="{{ route('front.articles.single', ['id'=>$article->id,'slug'=>$article->slug]) }}" class="ritekhela-blog-view1-btn mainFont">عرض التفاصيل</a>
												</div>
											</div>
										</div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="ritekhela-blogs ritekhela-blog-view2">
                                <ul class="row">
                                    @foreach ($random_articles as $article)
                                    <li class="col-md-6">
                                        <div class="newsPartContainer">
											<figure><a href="{{ route('front.articles.single', ['id'=>$article->id,'slug'=>$article->slug]) }}"><img src="{{ $article->image_path }}" alt="{{ $article->title }}"></a></figure>
											<div class="ritekhela-blog-view2-text">
												 <h2><a href="{{ route('front.articles.single', ['id'=>$article->id,'slug'=>$article->slug]) }}">{{ $article->title }}</a></h2>
												<time>
                                                    {{ App\Http\Controllers\Front\HomeFrontController::mydate($article->created_at) }}
											</div>
										</div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <a href="{{ route('front.articles') }}" class="ritekhela-blog-view1-btn mainFont secondColor" style="font-size:18px;">للمزيد من الأخبار</a>
                            </div><br><br>
                            <!--// Latest Blog's //-->

                            <!--// Fancy Title Two //-->
                            <div class="ritekhela-fancy-title-two">
                                <h2 class="mainFont">فيديوهات حصرية</h2>
                            </div>
                            <!--// Fancy Title Two //-->

                            <!--// Gallery //-->
                             <div class="ritekhela-blogs ritekhela-blog-view1">
                                <ul class="row">
                                    @foreach($videos->take(2) as $video)
                                    <li class="col-md-6">
                                        <figure>
											@php echo $video->youtube_url; @endphp
										</figure>
                                        <div class="ritekhela-blog-view1-text">
                                            <ul class="ritekhela-blog-options">
                                                <li><i class="far fa-calendar-alt"> {{ App\Http\Controllers\Front\HomeFrontController::mydate($video->created_at,'D d M Y') }}</i></li>
                                                <h2 class="secondFont"> <a href="#">{{ $video->title }}</a></h2>
                                            </ul>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="ritekhela-gallery ritekhela-gallery-view1">
                                <ul class="row">
                                    @foreach($random_videos as $video)
                                    <li class="col-md-4">
                                        <figure id="videos_small">
                                            @php echo $video->youtube_url; @endphp
                                            <figcaption>
                                                <span class="ritekhela-bgcolor-two far fa-calendar-alt"> {{ App\Http\Controllers\Front\HomeFrontController::mydate($video->created_at,'D d M Y') }}</span>
                                            </figcaption>
                                        </figure>
                                       <h2 class="secondFont"><a href="#">{{ $video->title }}</a></h2>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <a href="{{ route('front.videos') }}" class="ritekhela-blog-view1-btn mainFont secondColor" style="font-size:18px;">لمشاهدة المزيد</a>
                            </div><br><br>
                            <!--// Gallery //-->


                            <!--// Fancy Title Two //-->
                            <div class="ritekhela-fancy-title-two">
                                <h2 class="mainFont">قد يهمك ايضا </h2>
                            </div>
                            <!--// Fancy Title Two //-->

                            <div class="ritekhela-gallery ritekhela-gallery-view1">
                                <ul class="row">
                                    @foreach ($i_articles as $article)
                                    <li class="col-md-4">
                                        <figure>
                                            <a href="{{ route('front.articles.single', ['id'=>$article->id,'slug'=>$article->slug]) }}"><img src="{{ $article->image_path }}" alt="{{ $article->title }}"> <i class="fa fa-link ritekhela-bgcolor"></i> </a>
                                            <figcaption>
                                                <span class="ritekhela-bgcolor-two far fa-calendar-alt"> {{ App\Http\Controllers\Front\HomeFrontController::mydate($video->created_at,'D d M Y') }}</span>
                                            </figcaption>
                                        </figure>
                                       <h2 class="secondFont"><a href="{{ route('front.articles.single', ['id'=>$article->id,'slug'=>$article->slug]) }}">{{ $article->title }}</a></h2>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-12 d-flex justify-content-center">
                                <a href="{{ route('front.articles') }}" class="ritekhela-blog-view1-btn mainFont secondColor" style="font-size:18px;">للمزيد</a>
                            </div><br>
                        </div>
                        <!--// Left Section //-->

                        <!--// SideBaar //-->
                        <aside class="col-md-4" style="margin-top:80px;">

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
                                            <small>{{ $article->league->name }}</small>
                                            <a class="secondFont" href="{{ route('front.articles.single', ['id'=>$article->id,'slug'=>$article->slug]) }}">{{ $article->title }}</a>
                                            <time datetime="2008-02-14 20:00"> {{ App\Http\Controllers\Front\HomeFrontController::mydate($video->created_at,'d M Y') }}</time>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!--// Widget Popular News //-->

                            <div class="a">
                                @if($homeBanner1 != null)
                                <a href="{{ $homeBanner1->url }}" ><img src="{{ $homeBanner1->image_path }}" style="padding-bottom: 30px; max-height:333px; margin-top:70px; margin-bottom:10px;" width="100%" alt="{{ $homeBanner1->nme }}"> </a>
                                @else
                                <a href="#" ><img src="{{ asset('front/images/ad1.png') }}" style="padding-bottom: 30px; max-height:333px; margin-top:70px; margin-bottom:10px;" width="100%" alt=""> </a>
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

                            <!--// Widget Add's //-->
                            <div class="widget widget_add">
                                @if($homeBanner2 != null)
                                <a href="{{ $homeBanner2->url }}" ><img src="{{ $homeBanner2->image_path }}" style="padding-bottom: 30px; max-height:333px; margin-top:70px; margin-bottom:10px;" width="100%" alt=""> </a>
                                @else
                                <a href="#" ><img src="{{ asset('front/images/ad1.png') }}" style="padding-bottom: 30px; max-height:333px; margin-top:70px; margin-bottom:10px;" width="100%" alt=""> </a>
                                @endif
                           </div>
                           <!--// Widget Add's //-->
                        </aside>
                        <!--// SideBaar //-->

                    </div>
                </div>
            </div>
            <!--// Main Section //-->

        </div>
        <!--// Content //-->
@endsection

