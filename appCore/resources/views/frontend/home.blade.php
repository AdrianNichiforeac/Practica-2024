@extends('layouts.frontend')

@section('content')
    <div class="main-page-wrapper">
        <main>
            <section class="theme__main__banner">
                <div class="swiper hero__slider__one">
                    <div class="swiper-wrapper">
                        @foreach($posters as $poster)
                        <div class="swiper-slide">
                            <div class="main__banner__bg pt-290 pb-220 pb-lg-200 pt-md-200 pb-md-150"
                                 data-background="{{asset('/storage/'.$poster->picture)}}">
                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-xl-10 col-lg-12">
                                            <div class="theme__content text-xl-start text-center mb-5 mb-lg-0">
                                                <h4 class="banner__sub__title mb-15">{{$poster->name}}</h4>
                                                <p class="banner__description mb-45">{{$poster->description}}</p>
                                                <div class="banner__btn d-flex align-items-center">
                                                    <a href="{{$poster->link}}" class="ht_btn"><span>{{trans('string.read_more')}}</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- hero-paginatoin -->
                    <div class="swiper-button-next"><i class="bi bi-chevron-right"></i></div>
                    <div class="swiper-button-prev"><i class="bi bi-chevron-left"></i></div>
                </div>
            </section>
            <!-- counter__section start -->
            <section class="service__section pt-90 pt-lg-60 pb-lg-10">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section__title text-center mb-55">
                                <h2 class="section__title__main">Become a <span>member</span>
                                    of our team</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <ul class="nav nav-tabs product-tab" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                            aria-selected="false">Drivers</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                            aria-selected="false">Owners Operators</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                            data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                            aria-selected="false">HR Application</button>
                                </li>
                            </ul>

                        </div>
                        <div class="col-lg-12">
                            <div class="tab-content mt-65 mb-65" id="myTabContent">
                                <img class="service__map" src="{{asset('/frontend/img/service/service-map-1.jpg')}}" alt="service">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="service__img_-wrapper mb-lg-30">
												<span class="">
                                                    <img class="img-fluid" src="{{asset('/frontend/img/driv.png')}}" alt="driver">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="row align-items-center">
                                                <div class="black-bg widget-form">
                                                    <h4 class="widget__title__one text-white mb-15">Apply here</h4>
                                                    <form action="{{route('driverRegistrationPost')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" name="name" placeholder="First Name">
                                                                <input type="text" name="surname" placeholder="Last Name">
                                                                <input type="email" name="email" placeholder="Email">
                                                                <input type="text" name="phone" placeholder="Phone">
                                                                <input name="dob" placeholder="Date of birth" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                                                                <div class="col-md-12">
                                                                    <button style="margin-bottom: 10px; width: 100%; color: white; border-color: #303030; background-color: transparent; border-radius: 1px; height: 59px" onclick="$('#cdl_front_file').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> CDL Front File</button>
                                                                    <input type="file" name="cdl_front" id="cdl_front_file" class="file" style="display: none" onchange="displayCDLFront(this)">
                                                                    <p id="cdl_front_placeholder"></p>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button style="margin-bottom: 10px; width: 100%; color: white; border-color: #303030; background-color: transparent; border-radius: 1px; height: 59px" onclick="$('#cdl_back_file').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> CDL Back File</button>
                                                                    <input type="file" name="cdl_back" id="cdl_back_file" class="file" style="display: none" onchange="displayCDLBack(this)">
                                                                    <p id="cdl_back_placeholder"></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="address" placeholder="Address">
                                                                <input type="text" name="city" placeholder="City">
                                                                <select name="state_id" class="mb-3" style="height: 60px; overflow-y: auto; background: transparent; color: white; background-color: #181818;width: 100%; border: 2px solid rgba(255, 255, 255, 0.1)">
                                                                    <option value="">State</option>
                                                                    @foreach($states as $state)
                                                                        <option value="{{$state->id}}" >{{$state->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <input type="text" name="zip_code" placeholder="ZIP code">
                                                                <input type="text" name="experience" placeholder="How many years of experience">
                                                                <div class="col-md-12">
                                                                    <button style="margin-bottom: 10px; width: 100%; color: white; border-color: #303030; background-color: transparent; border-radius: 1px; height: 59px" onclick="$('#medical_file_d').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> Medical File</button>
                                                                    <input type="file" name="medical_file" id="medical_file_d" class="file" style="display: none" onchange="displayMedicalFileD(this)">
                                                                    <p id="medical-placeholder"></p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="widget-btn mt-20">Apply Now</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row ">
                                        <div class="col-lg-6">
                                            <div class="service__img_-wrapper mb-lg-30">

												<span class="">
                                                    <img class="img-fluid" src="{{asset('/frontend/img/operato.png')}}" alt="driver">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="row align-items-center ">
                                                <div class="black-bg widget-form mb-50">
                                                    <h4 class="widget__title__one text-white mb-15">Apply here</h4>
                                                    <form action="{{route('operatorRegistrationPost')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" name="name" placeholder="First Name">
                                                                <input type="text" name="surname" placeholder="Last Name">
                                                                <input type="email" name="email" placeholder="Email">
                                                                <input type="text" name="phone" placeholder="Phone">
                                                                <input name="dob" placeholder="Date of birth" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                                                                <div class="col-md-12">
                                                                    <button style="margin-bottom: 10px; width: 100%; color: white; border-color: #303030; background-color: transparent; border-radius: 1px; height: 59px" onclick="$('#cdl_front_o_file').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> CDL Front File</button>
                                                                    <input type="file" name="cdl_front" id="cdl_front_o_file" class="file" style="display: none" onchange="displayCDLFrontO(this)">
                                                                    <p id="cdl_front_operator"></p>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <button style="margin-bottom: 10px; width: 100%; color: white; border-color: #303030; background-color: transparent; border-radius: 1px; height: 59px" onclick="$('#cdl_back_o_file').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> CDL Back File</button>
                                                                    <input type="file" name="cdl_back" id="cdl_back_o_file" class="file" style="display: none" onchange="displayCDLBackO(this)">
                                                                    <p id="cdl_back_operator"></p>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="address" placeholder="Address">
                                                                <input type="text" name="city" placeholder="City">
                                                                <select name="state_id" class="mb-3" style="height: 60px; overflow-y: auto; background: transparent; color: white; background-color: #181818;width: 100%; border: 2px solid rgba(255, 255, 255, 0.1)">
                                                                    <option value="">State</option>
                                                                    @foreach($states as $state)
                                                                        <option value="{{$state->id}}" >{{$state->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <input type="text" name="zip_code" placeholder="ZIP code">
                                                                <input type="text" name="experience" placeholder="How many years of experience">
                                                                <div class="col-md-12">
                                                                    <button style="margin-bottom: 10px; width: 100%; color: white; border-color: #303030; background-color: transparent; border-radius: 1px; height: 59px" onclick="$('#medical_file_o').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> Medical File</button>
                                                                    <input type="file" name="medical_file" id="medical_file_o" class="file" style="display: none" onchange="displayMedicalFileO(this)">
                                                                    <p id="medical-file_oerator"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="widget-btn mt-20">Apply Now</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="service__img_-wrapper mb-lg-30">

												<span class="">
                                                    <img class="img-fluid" src="{{asset('/frontend/img/manag.png')}}" alt="driver">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="row align-items-center">

                                                <div class="black-bg widget-form mb-50">
                                                    <h4 class="widget__title__one text-white mb-15">Apply here</h4>
                                                    <form action="{{route('managerRegistrationPost')}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" name="name" placeholder="First Name">
                                                                <input type="text" name="surname" placeholder="Last Name">
                                                                <input type="email" name="email" placeholder="Email">
                                                                <input type="text" name="phone" placeholder="Phone">
                                                                <input name="dob" placeholder="Date of birth" class="textbox-n" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="position_interested" placeholder="Position interested ">
                                                                <input type="text" name="years_of_experience" placeholder="How many years of experience">
                                                                <input type="text" name="wage_expectation" placeholder="Approximate wage expectation">
                                                                <div class="col-md-12">
                                                                    <button style="margin-bottom: 10px; width: 100%; color: white; border-color: #303030; background-color: transparent; border-radius: 1px; height: 59px" onclick="$('#cv_file_m').click()" type="button" class="btn btn-info btn-block"><i class="fa fa-upload"></i> CV File</button>
                                                                    <input type="file" name="cv_file" id="cv_file_m" class="file" style="display: none" onchange="displayFileNameM(this)">
                                                                    <p id="file-name-manager"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="widget-btn mt-20">Apply Now</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- service__section end -->

            {{--<section class="blog__section pt-90 pt-lg-120 pb-100 pb-lg-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section__title text-center mb-55">
                                <h5 class="sub__title mb-20">{{trans('string.news')}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row align-items-center justify-content-center">
                        @foreach($news->take(6) as $news_item)
                            <div class="col-lg-4 col-md-6">
                                <div class="blog__style__two mb-30">
                                    <a class="blog__thumb w-100" href="{{route('newsDetail', $news_item['id'])}}">
                                        <img class="w-100"  src="{{asset('/storage/'.$news_item->picture_small)}}" alt="Blog">
                                    </a>
                                    <div class="blog__content">
                                        <h4 class="blog__title mb-20"><a href="{{route('newsDetail', $news_item['id'])}}">{{$news_item->name}}</a></h4>
                                        <div class="blog__desc">
                                            <p class="mb-20">{!! strip_tags(str_replace('&nbsp;','',substr($news_item->content, 0, 180)))!!}...</p>
                                        </div>
                                        <a class="blog_btn2" href="{{route('newsDetail', $news_item['id'])}}">Read More <img
                                                src="{{asset('/frontend/img/icon/arrow-4.svg')}}" alt="arrow"></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>--}}
            <!-- work__process__section start -->

        </main>

    </div>

    <script>
        function displayCDLFront(input) {
            var fileNamePlaceholder = document.getElementById('cdl_front_placeholder');

            if (input.files.length > 0) {
                fileNamePlaceholder.textContent = 'Selected file: ' + input.files[0].name;
            } else {
                fileNamePlaceholder.textContent = 'Niciun fișier selectat';
            }
        }

        function displayCDLBack(input) {
            var fileNamePlaceholder = document.getElementById('cdl_back_placeholder');

            if (input.files.length > 0) {
                fileNamePlaceholder.textContent = 'Selected file: ' + input.files[0].name;
            } else {
                fileNamePlaceholder.textContent = 'Niciun fișier selectat';
            }
        }

        function displayMedicalFileD(input) {
            var fileNamePlaceholder = document.getElementById('medical-placeholder');

            if (input.files.length > 0) {
                fileNamePlaceholder.textContent = 'Selected file: ' + input.files[0].name;
            } else {
                fileNamePlaceholder.textContent = 'Niciun fișier selectat';
            }
        }
    </script>

    <script>
        function displayCDLFrontO(input) {
            var fileNamePlaceholder = document.getElementById('cdl_front_operator');

            if (input.files.length > 0) {
                fileNamePlaceholder.textContent = 'Fișier selectat: ' + input.files[0].name;
            } else {
                fileNamePlaceholder.textContent = 'Niciun fișier selectat';
            }
        }

        function displayCDLBackO(input) {
            var fileNamePlaceholder = document.getElementById('cdl_back_operator');

            if (input.files.length > 0) {
                fileNamePlaceholder.textContent = 'Fișier selectat: ' + input.files[0].name;
            } else {
                fileNamePlaceholder.textContent = 'Niciun fișier selectat';
            }
        }

        function displayMedicalFileO(input) {
            var fileNamePlaceholder = document.getElementById('medical-file_oerator');

            if (input.files.length > 0) {
                fileNamePlaceholder.textContent = 'Fișier selectat: ' + input.files[0].name;
            } else {
                fileNamePlaceholder.textContent = 'Niciun fișier selectat';
            }
        }
    </script>

    <script>
        function displayFileNameM(input) {
            var fileNamePlaceholder = document.getElementById('file-name-manager');

            if (input.files.length > 0) {
                fileNamePlaceholder.textContent = 'Fișier selectat: ' + input.files[0].name;
            } else {
                fileNamePlaceholder.textContent = 'Niciun fișier selectat';
            }
        }
    </script>
    @yield('scripts')
@endsection


