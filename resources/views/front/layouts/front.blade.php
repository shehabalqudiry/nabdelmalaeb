<!doctype html>
<html lang="ar">
<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نبض الملاعب | @yield('title') : @yield('titleP' ?? '') </title>
    <meta name="nabdelmalaeb" content="football site" description = "football news site  , موقع اخبار رياضى" keywords = "nabdelmalaeb , football , news , sports , egyption , league , نبض الملاعب , الدورى المصرى , الدورى , كرة قدم , اخبار , رياضة" ,  auther = "Ahmed Shehab" , generator = "a professional sports website for football and other sports which talk about local and international leagues">
    
      <!--<meta property="og:title" content="نبض الملاعب | @yield('title')" />-->
      <!--<meta property="og:url" content="https://www.nabdelmalaeb.com/" />-->
      <!--<meta property="og:image" content="@yield('image')" />-->
      <!--<meta property="og:description" content="موقع نبض الملاعب الرياضى , موقع مصرى يتناول كل الأخبار الرياضية المحلية و العالمية فى كرة القدم و الرياضات الأخرى" />-->
      <!--<meta property="og:site_name" content="نبض الملاعب" />-->
      
    <meta property="og:title" content="نبض الملاعب | @yield('titleP')" />
    <meta property="og:image" content="@yield('image')" />
  
    <link rel="shortcut icon" href="{{ asset('front/') }}/images/icon.ico">
    <!--  google fonts  -->
    <!--  main font : font-family: 'El Messiri', sans-serif;  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <!--  second font : font-family: 'Mirza', cursive;  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mirza&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/slick-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/smartmenus.css') }}">
    <link rel="stylesheet" href="{{ asset('front/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=6064f3a0b7dede001191f5b7&product=inline-share-buttons" async="async"></script>

</head>

<body class="home mainBackgroundColor">
    <div id="ritekhela-loader">
        <div id="ritekhela-loader-inner">
            <div id="ritekhela-shadow"></div>
            <div id="ritekhela-box"></div>
        </div>
    </div>

    <div class="ritekhela-wrapper">

        @include('front.layouts.inc.header')
        @yield('banner')
        <!--// SubHeader //-->
        <div class="ritekhela-subheader mainBackgroundColor @if(Route::currentRouteName() == 'front.home') d-none @endif">
            <div class="container">
                <div class="row">
                    <div class="col-md-12  ak-ritekhela-breadcrumb">
                        <ul class="ritekhela-breadcrumb mainFont secondColor">
                            <li>@yield('title')</li>
                            <li><a href="{{ route('front.home') }}">الرئيسية</a></li>
                        </ul>
                        <h1 class="mainFont secondColor" style="font-size: 19px">@yield('title')</h1>
                    </div>
                </div>
            </div>
        </div>
        @if(Route::currentRouteName() == 'front.home')
        @yield('content')
        @else
            <!--// Content //-->
    <div class="ritekhela-main-content">
        <!--// Main Section //-->
        <div class="ritekhela-main-section ritekhela-fixture-list-full">
            <div class="container">
                <div class="row">

                    <div class="col-md-8">
                        <!--// Blog //-->
                        <div class="ritekhela-blogs ritekhela-blog-view1 ak-ritekhela-blogs">
                            @yield('content')
                        </div>

                    </div>
                    @if(Route::currentRouteName() != 'front.home')
                    @include('front.layouts.inc.sidebar')
                    @endif
                </div>
                @yield('other')
            </div>
        </div>
        @endif
    </div>
        @include('front.layouts.inc.footer')
    </div>
    <!--// Search ModalBox //-->
    <div class="loginmodalbox modal fade" id="ritekhelamodalsearch" tabindex="-1">
       <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
             <div class="modal-body ritekhela-bgcolor-two">
                <h5 class="modal-title mainFont">ابحث هنا</h5>
                <a href="#" class="close ritekhela-bgcolor-two" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </a>
                <form action="{{ route('front.search') }}" method="GET">
                    @csrf
                    <input type="text" class="secondFont" name="top_search" value="اكتب ما تريد البحث عنه" onblur="if(this.value == '') { this.value ='اكتب ما تريد البحث عنه'; }" onfocus="if(this.value =='اكتب ما تريد البحث عنه') { this.value = ''; }">
                    <input type="submit" value="بحث" class="ritekhela-bgcolor mainFont">
                </form>
             </div>
          </div>
       </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('front/script/jquery.js') }}"></script>
    <script src="{{ asset('front/script/popper.min.js') }}"></script>
    <script src="{{ asset('front/script/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/script/slick.slider.min.js') }}"></script>
    <script src="{{ asset('front/script/fancybox.min.js') }}"></script>
    <script src="{{ asset('front/script/isotope.min.js') }}"></script>
    <script src="{{ asset('front/script/smartmenus.min.js') }}"></script>
    <script src="{{ asset('front/script/progressbar.js') }}"></script>
    <script src="{{ asset('front/script/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('front/script/functions.js') }}"></script>
</body>
</html>
