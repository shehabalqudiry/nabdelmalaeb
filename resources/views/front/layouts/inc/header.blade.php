        <!--// Header //-->
        <header id="ritekhela-header" class="ritekhela-header-one">

            <!--// TopStrip //-->
            <div class="ritekhela-topstrip">
                <div class="container">
                    <div class="row">
                        <aside class="col-12">
                            <strong class="mainFont col-3">عاجل</strong>
                            <div class="ritekhela-latest-news-slider secondFont col-8">
                                @foreach ($hotnews as $h)
                                <div class="ritekhela-latest-news-slider-layer"><a href="{{ route('front.articles.single', ['id'=>$h->id,'slug'=>$h->slug]) }}">{{ $h->title }}</a></div>
                                @endforeach
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <!--// TopStrip //-->

            <!--// Main Header //-->
            <div class="ritekhela-main-header mainBackgroundColor">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('front.home') }}" class="ritekhela-logo"><img src="{{ $settings->image_path }}" alt="{{ $settings->sitename }}"></a>
                            <div class="ritekhela-right-section">
                                <div class="ritekhela-navigation">
                                    <span class="ritekhela-menu-link">
                                        <span class="menu-bar"></span>
                                        <span class="menu-bar"></span>
                                        <span class="menu-bar"></span>
                                    </span>
                                    <nav id="main-nav">
                                        <ul id="main-menu" class="sm sm-blue">
                                            <li class="@if(Route::currentRouteName() == 'front.home') active @endif"><a href="{{ route('front.home') }}" class="mainFont">الرئيسية </a></li>
                                            @foreach ($categories as $category)
                                            <li><a href="{{ route('front.categories.single', ['id' => $category->id, 'slug' => $category->slug]) }}" class="mainFont">{{ $category->name }}</a>
                                                <ul>
                                                    @foreach ($category->leagues as $league)
                                                    <li><a href="{{ route('front.leagues.single', ['id' => $league->id, 'slug' => $league->slug]) }}" class="mainFont">{{ $league->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                            <li class="@if(Route::currentRouteName() == 'front.articles.hotnews') active @endif"><a href="{{ route('front.articles.hotnews') }}" class="mainFont">عاجل</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <ul class="ritekhela-navsearch">
                                    <li><a href="#" data-toggle="modal" data-target="#ritekhelamodalsearch"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Main Header //-->

        </header>
        <!--// Header //-->
        @if(Route::currentRouteName() == 'front.home')
        @section('banner')
            <!--// Banner //-->
            <div class="banner">
                <div class="banner-one">
                    <!-- add your banner hare-->
                    <img src="{{ asset('uploads/settings/' . $settings->banner ) }}" alt="نبض الملاعب">

                </div>
            </div>
        @endsection
        @endif
