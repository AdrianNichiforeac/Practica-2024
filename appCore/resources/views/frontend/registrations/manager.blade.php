@extends('layouts.frontend')
@section('title')
 Manager Registration -
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
                        <h2 class="page-title mb-20">Manager Registration</h2>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb list-none">
                                <li><a href="/">{{trans('string.home')}}</a></li>
                                <li class="active" aria-current="page">Manager Registration</li>
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

                        <h3 class="blog__title__two mb-20">Manager Registration</h3>
                        <p>As a  family owned Chicago, Illinois  based Carrier that was founded in 2015, we strive to provide consistent and on-time service. We specialize in over the road truckload transportation through 48 states. Our goal is to provide trucking services to meet any customer's requirements.
                            24/7 dedicated support team that ensures you get the right equipment , at competitive rates.
                        </p>
                    </div>

                    <div class="row align-items-center mt-30">
                        <h3>HR (dispatch,safety,fleet management) </h3>
                        <div class="black-bg widget-form mb-50">
                            <h4 class="widget__title__one text-white mb-15">Collaboratively engineer prospective.</h4>
                            <form action="{{route('managerRegistrationPost')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" placeholder="First Name">
                                        <input type="text" name="surname" placeholder="Last Name">
                                        <input type="email" name="email" placeholder="Email">
                                        <input type="text" name="phone" placeholder="Phone">
                                        <input type="date" name="dob" placeholder="DoB">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="position_interested" placeholder="Position interested ">
                                        <input type="text" name="years_of_experience" placeholder="Please enter  years of experience">
                                        <input type="text" name="wage_expectation" placeholder="Approximate wage expectation">
                                        <div class="col-md-12">
                                            <button style="margin-bottom: 10px; width: 100%" onclick="$('#cv_file').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> CV File</button>
                                            <input type="file" name="cv_file" id="cv_file" class="file" style="display: none" onchange="displayFileName(this)">
                                            <p id="file-name-placeholder">Niciun fișier selectat</p>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="widget-btn mt-20">Apply Now</button>
                            </form>
                        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

    <script>
        function displayFileName(input) {
            var fileNamePlaceholder = document.getElementById('file-name-placeholder');

            if (input.files.length > 0) {
                fileNamePlaceholder.textContent = 'Fișier selectat: ' + input.files[0].name;
            } else {
                fileNamePlaceholder.textContent = 'Niciun fișier selectat';
            }
        }
    </script>
    @yield('scripts')
