@extends('layouts.frontend')
@section('title')
    Driver Registration -
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
                        <h2 class="page-title mb-20">Driver Registration</h2>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb list-none">
                                <li><a href="/">{{trans('string.home')}}</a></li>
                                <li class="active" aria-current="page">Driver Registration</li>
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

                        <h3 class="blog__title__two mb-20"><a href="#">Driver Registration</a></h3>
                        <p>As a  family owned Chicago, Illinois  based Carrier that was founded in 2015, we strive to provide consistent and on-time service. We specialize in over the road truckload transportation through 48 states. Our goal is to provide trucking services to meet any customer's requirements.
                            24/7 dedicated support team that ensures you get the right equipment , at competitive rates.
                        </p>
                    </div>

                    <div class="row align-items-center mt-30">
                        <h3>Our company is looking for reliable and experienced  Drivers with Class A CDL</h3>
                            <h4>Why to drive for GI National Corp?</h4>
                        <div class="col-xl-6 mb-30">
                            <ul class="text-list list-none" style="font-size: 15px">
                                <li style="font-size: 15px">Safety is a top priority</li>
                                <li style="font-size: 15px">Family Atmosphere</li>
                                <li style="font-size: 15px">Flatbed, Conestoga OTR opportunities </li>
                                <li style="font-size: 15px">ELD Compliant </li>
                                <li style="font-size: 15px">Pay per % or per miles</li>
                                <li style="font-size: 15px">Sign up Bonuses</li>
                            </ul>
                        </div>
                        <div class="col-xl-6 mb-30">
                            <ul class="text-list list-none" style="font-size: 15px">
                                <li style="font-size: 15px">Safety Bonuses</li>
                                <li style="font-size: 15px">Weekly Direct Deposit</li>
                                <li style="font-size: 15px">Flexible Home Time</li>
                                <li style="font-size: 15px">PrePass on all trucks</li>
                                <li style="font-size: 15px">Pet friendly </li>
                            </ul>
                        </div>
                        <h4>Why to drive for GI National Corp?</h4>
                        <div class="col-xl-6 mb-30">
                            <ul class="text-list list-none">
                                <li style="font-size: 15px">Over 25+ Years Of Experiences</li>
                                <li style="font-size: 15px">24/7 Support Team &amp; Delivery time</li>
                                <li style="font-size: 15px">Super Big Space Warehouse Facility</li>
                                <li style="font-size: 15px">Local &amp; Global Network</li>
                                <li style="font-size: 15px">Delivery Report &amp; Cash On Set</li>
                            </ul>
                        </div>
                        <div class="black-bg widget-form mb-50">
                            <h4 class="widget__title__one text-white mb-15">Collaboratively engineer prospective.</h4>
                            <form action="{{route('driverRegistrationPost')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="name" placeholder="First Name">
                                        <input type="text" name="surname" placeholder="Last Name">
                                        <input type="email" name="email" placeholder="Email">
                                        <input type="text" name="phone" placeholder="Phone">
                                        <input type="date" name="dob" placeholder="DoB">
                                        <div class="col-md-12">
                                            <button style="margin-bottom: 10px; width: 100%" onclick="$('#cdl_front_file').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> CDL Front File</button>
                                            <input type="file" name="cdl_front" id="cdl_front_file" class="file" style="display: none" onchange="displayCDLFront(this)">
                                            <p id="cdl_front_placeholder">Niciun fișier selectat</p>
                                        </div>
                                        <div class="col-md-12">
                                            <button style="margin-bottom: 10px; width: 100%" onclick="$('#cdl_back_file').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> CDL Back File</button>
                                            <input type="file" name="cdl_back" id="cdl_back_file" class="file" style="display: none" onchange="displayCDLBack(this)">
                                            <p id="cdl_back_placeholder">Niciun fișier selectat</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="address" placeholder="Address">
                                        <input type="text" name="city" placeholder="City">
                                        <select name="state_id" style="height: 150px; overflow-y: auto;">
                                            <option value="">State</option>
                                            @foreach($states as $state)
                                                <option value="{{$state->id}}" >{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="zip_code" placeholder="ZIP code">
                                        <input type="text" name="experience" placeholder="Experience">
                                        <div class="col-md-12">
                                            <button style="margin-bottom: 10px; width: 100%" onclick="$('#medical_file_d').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> Medical File</button>
                                            <input type="file" name="medical_file" id="medical_file_d" class="file" style="display: none" onchange="displayMedicalFileD(this)">
                                            <p id="medical-placeholder">Niciun fișier selectat</p>
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
    function displayCDLFront(input) {
        var fileNamePlaceholder = document.getElementById('cdl_front_placeholder');

        if (input.files.length > 0) {
            fileNamePlaceholder.textContent = 'Fișier selectat: ' + input.files[0].name;
        } else {
            fileNamePlaceholder.textContent = 'Niciun fișier selectat';
        }
    }

    function displayCDLBack(input) {
        var fileNamePlaceholder = document.getElementById('cdl_back_placeholder');

        if (input.files.length > 0) {
            fileNamePlaceholder.textContent = 'Fișier selectat: ' + input.files[0].name;
        } else {
            fileNamePlaceholder.textContent = 'Niciun fișier selectat';
        }
    }

    function displayMedicalFileD(input) {
        var fileNamePlaceholder = document.getElementById('medical-placeholder');

        if (input.files.length > 0) {
            fileNamePlaceholder.textContent = 'Fișier selectat: ' + input.files[0].name;
        } else {
            fileNamePlaceholder.textContent = 'Niciun fișier selectat';
        }
    }
</script>
@yield('scripts')
