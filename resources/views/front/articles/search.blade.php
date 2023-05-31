 @extends('front.layouts.front')
 @section('title', 'نتائج البحث')
 @section('content')
     @if ($result == null)
         <div class="ritekhela-search-result">
             <h2 class="mainColor">عفوا لم نجد ما تريده </h2>
             <p class="mainColor">نعتذر لعدم وجود الشيئ الذي تبحث عنه, من فضلك حاول المحاولة بكلمات مختلفه</p>
             <div class="ritekhela-error-section">
                 <form action="{{ route('front.search') }}" method="GET">
                     @csrf
                     <input type="text" name="top_search" placeholder="اكتب ما تريد البحث عنه">
                     <input type="submit" value="بحث">
                 </form>
             </div>
         </div>
     @else
         <div class="ritekhela-blogs ritekhela-blog-view1">
             <ul class="row">
                 @foreach ($result as $r)
                 {{-- @dd($r->image_path) --}}
                 <li class="col-md-6">
                     <figure><a href="{{ route('front.articles.single', ['id' => $r->id, 'slug' => $r->slug]) }}"><img src="{{ $r->image_path }}" alt="{{ $r->title }}"> <i class="fa fa-link"></i></a>
                     </figure>
                     <div class="ritekhela-blog-view1-text">
                         <ul class="ritekhela-blog-options">
                             <li><i class="far fa-calendar-alt"></i> {{ App\Http\Controllers\Front\HomeFrontController::mydate($r->created_at, 'D d M Y') }}</li>
                             <li><a href="#"><i class="far fa-user"></i>كتب : {{ $r->user->name }}</a></li>
                         </ul>
                         <h2><a href="{{ route('front.articles.single', ['id' => $r->id, 'slug' => $r->slug]) }}">{{ $r->title }}</a></h2>
                         <p>{{ $r->ecerpt }}</p>

                     </div>
                 </li>
                 @endforeach
             </ul>
             <div class="ritekhela-pagination">
                 {{ $result->appends(request()->query())->links() }}
             </div>
         </div>

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