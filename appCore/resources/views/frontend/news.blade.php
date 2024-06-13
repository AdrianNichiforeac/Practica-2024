@extends('layouts.frontend')
@section('content')
    @if(Route::is('newsDetail'))
@section('title')
    {{$news_detail->name}} -
@endsection


<div class="page-title-area pt-220 pb-240 pt-lg-160 pb-lg-125 pb-md-100"
     data-background="{{asset('/frontend/img/page_b.jpeg')}}">
    <img class="page-title-shape shape-one " src="{{asset('/frontend/img/shape/pattern-25.svg')}}" alt="shape">
    <img class="page-title-shape shape-two" src="{{asset('/frontend/img/shape/pattern-26.svg')}} " alt="shape">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-title-wrapper text-center pt-45">
                    <h2 class="page-title mb-20">{{$news_detail->name}}</h2>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb list-none">
                            <li><a href="/">{{trans('string.home')}}</a></li>
                            <li class="active" aria-current="page">{{trans('string.news')}}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--page-title-area end-->

<!-- blog__details__section start -->
<section class="blog__details__section pt-170 pt-lg-110 pb-140 pb-lg-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 ps-lg-0">
                <div class="blog__details__wrapper">
                    @if($news_detail->picture)
                    <div class="blog__thumb mb-20">
                        <img class="w-100" src="{{asset('storage/'.$news_detail->picture)}}" alt="blog">
                    </div>
                    @endif
                    <h3 class="blog__title__two mb-20"><a href="blog-details.html">{{$news_detail->name}}</a></h3>
                    <p>{!! $news_detail->content !!}</p>

                </div>
            </div>

            <div class="col-xl-5 col-lg-4">
                <div class="widget-right-section pe-xxl-4 me-xxl-3 mb-30">
                    <div class="grey-bg widget widget-post mb-50">
                        <div class="widget-title-box mb-20">
                            <h4 class="widget__title__two">{{trans('string.recent_post')}}</h4>
                        </div>
                        <ul class="post-list">
                            @foreach($last_news as $news_item)
                            <li>
                                <div class="recent__post mb-25">
                                    <a class="post__thumb" href="{{route('newsDetail', $news_item['id'])}}">
                                        <img style="width: 100px" src="{{asset('storage/'.$news_item->picture_small)}}" alt="Post Img"></a>
                                    <div class="post__content">
                                        <h5 class="mb-10"><a href="{{route('newsDetail', $news_item['id'])}}">{{$news_item->name}}</a></h5>
                                        <span>{{$news_item->data}}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="black-bg widget-form mt-60 mb-50">
                        <h3 class="widget__title__two text-white mb-15">Contact Us</h3>
                        <p class="mb-40">Collaboratively engineer prospective
                            imperatives with transparent technology.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter Name">
                            <input type="email" placeholder="Email">
                            <textarea name="message" placeholder="Write Message"
                                      spellcheck="false"></textarea>
                        </form>
                        <button class="widget-btn mt-20">Contact Now</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@else
@section('title')
    {{trans('string.news')}} -
@endsection

<div class="page-title-area pt-220 pb-240 pt-lg-160 pb-lg-125 pb-md-100"
     data-background="{{asset('/frontend/img/page_b.jpeg')}}">
    <img class="page-title-shape shape-one " src="{{asset('/frontend/img/shape/pattern-25.svg')}}" alt="shape">
    <img class="page-title-shape shape-two" src="{{asset('/frontend/img/shape/pattern-26.svg')}} " alt="shape">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-title-wrapper text-center pt-45">
                    <h2 class="page-title mb-20">{{trans('string.news')}}</h2>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb list-none">
                            <li><a href="/">Home</a></li>
                            <li class="active" aria-current="page">{{trans('string.news')}}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--page-title-area end-->

<!-- blog__section start -->
<section class="blog__section pt-175 pt-lg-120 pb-180 pb-lg-90">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            @foreach($news as $news_item)
            <div class="col-lg-4 col-md-6">
                <div class="blog__style__two mb-30">
                    <a class="blog__thumb w-100" href="{{route('newsDetail', $news_item['id'])}}">
                        <img class="w-100" src="{{asset('storage/'.$news_item->picture_small)}}" alt="Blog">
                    </a>
                    <div class="blog__content">
                        <h4 class="blog__title mb-20"><a href="{{route('newsDetail', $news_item['id'])}}">{{$news_item->name}}</a></h4>
                        <div class="blog__desc">
                            <p class="mb-20">{!! strip_tags(str_replace('&nbsp;','',substr($news_item->content, 0, 205))) !!}...</p>
                        </div>
                        <a class="blog_btn2" href="{{route('newsDetail', $news_item['id'])}}">Read More <img
                                src="{{asset('/frontend/img/icon/arrow-4.svg')}}" alt="arrow"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Blog -->
@endif
@endsection

