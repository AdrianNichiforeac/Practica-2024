@extends('layouts.frontend')
@section('title')
    {{$page->name}} -
@endsection
@section('content')
    <div class="page-title-area pt-220 pb-240 pt-lg-160 pb-lg-125 pb-md-100"
         data-background="{{asset('/frontend/img/page_b.jpeg')}}">
        <img class="page-title-shape shape-one " src="{{asset('/frontend/img/shape/pattern-25.svg')}}" alt="shape">
        <img class="page-title-shape shape-two" src="{{asset('/frontend/img/shape/pattern-26.svg')}} " alt="shape">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-title-wrapper text-center pt-45">
                        <h2 class="page-title mb-20">{{$page->name}}</h2>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb list-none">
                                <li><a href="/">{{trans('string.home')}}</a></li>
                                <li class="active" aria-current="page">{{$page->name}}</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--page-title-area end-->


    <section class="blog__details__section pt-170 pt-lg-110 pb-140 pb-lg-80">
        <div class="container">

            <div class="row">
                <div class="col-xl-7 col-lg-8 ps-lg-0">
                    @if (\Illuminate\Support\Facades\Session::get('success'))
                        <div class="alert alert-info"><i class="fa fa-info-circle"></i>{{trans("string.succes_sended")}}</div>
                    @endif
                    <div class="blog__details__wrapper">
                        @if($page->picture)
                            <div class="blog__thumb mb-20">
                                <img class="w-100" src="{{asset('storage/'.$page->picture)}}" alt="blog">
                            </div>
                        @endif
                        <h3 class="blog__title__two mb-20">{{$page->name}}</h3>
                        <p>{!! $page->content !!}</p>

                        @if($page['link_name'] == 'driver_registration')

                            @include('frontend.forms.driver_form')
                        @endif

                        @if($page['link_name'] == 'operator_registration')
                            @include('frontend.forms.operator_form')
                        @endif

                        @if($page['link_name'] == 'manager_registration')
                            @include('frontend.forms.manager_form')
                        @endif
                    </div>
                </div>

                <div class="col-xl-5 col-lg-4">
                    <div class="widget-right-section pe-xxl-4 me-xxl-3 mb-30">
                        <ul class="list-none service-widget">
                            @foreach(App\Page::where('second_menu', 1)->orderBy('ord')->get() as $page)
                            <li>
                                <a href="{{str_replace(' ', '',strtolower($page->link_name))}}">{{$page->name}}
                                    <span class="float-end"><i class="bi bi-arrow-right-short"></i></span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
