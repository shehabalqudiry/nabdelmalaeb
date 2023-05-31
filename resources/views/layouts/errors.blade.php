<!doctype html>
<html lang="ar">
<head>
    <!-- meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>نبض الملاعب | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('front/') }}/images/icon.ico">
    <!--  google fonts  -->
    <!--  main font : font-family: 'El Messiri', sans-serif;  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">
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
</head>

<body class="home">
    <div id="ritekhela-loader">
        <div id="ritekhela-loader-inner">
            <div id="ritekhela-shadow"></div>
            <div id="ritekhela-box"></div>
        </div>
    </div>

    <div class="ritekhela-wrapper">

        @include('front.layouts.inc.header')
        @yield('banner')
        <!--// Content //-->
<div class="ritekhela-main-content">

    <!--// Main Section //-->
    <div class="ritekhela-main-section ritekhela-fixture-list-full">
        <div class="container">
            <div class="row">
                <!--// Full Section //-->
                <div class="col-md-12">
                    <div class="ritekhela-error-section">
                        <div class="ritekhela-error-section-inner">
                            <h2>@yield('code')</h2>
                            <p>@yield('content')</p>
                        </div>
                    </div>
                </div>
                <!--// Full Section //-->

            </div>
        </div>
    </div>
    <!--// Main Section //-->

</div>
<!--// Content //-->

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
                <form>
                    <input type="text" class="secondFont" value="اكتب ما تريد البحث عنه" onblur="if(this.value == '') { this.value ='اكتب ما تريد البحث عنه'; }" onfocus="if(this.value =='اكتب ما تريد البحث عنه') { this.value = ''; }">
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

