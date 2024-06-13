@extends('layouts.frontend')
@section('title')
     Contacts -
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
                        <h2 class="page-title mb-20">Contact Us</h2>
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb list-none">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">Pages</a></li>
                                <li class="active" aria-current="page">Contact Us</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--page-title-area end-->

    <!--contact__info__section start-->
    <div class="contact__info__section pt-180 pt-lg-120 pb-80 pb-lg-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single__info__box mb-30">
                        <div class="icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <span>{{trans('link.phone')}}</span>
                        <span>{{trans('link.fax')}}</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single__info__box mb-30">
                        <div class="icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <span>5105 Tollview Dr unit 206<br>Rolling Meadows , IL 60008</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single__info__box mb-30">
                        <div class="icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <span> {{trans('link.email')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact__info__section end-->


    <!--contact__section start-->
    <div class="contact__section pt-110 pb-100 pt-lg-60 pb-lg-90">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="contact__img__wrapper mb-30">
                        <img class="w-100" src="{{asset('/frontend/img/contact/cnt2.jpg')}}" alt="contact">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="main__contact__form ps-xxl-3 mb-30">
                        <h3 class="contact__form__title mb-20">Send us a message</h3>
                        <form class="widget-form" action="{{route('contactForm')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="label">Name / Surname</label>
                                    <input type="text" name="name" placeholder="Name / Surname">
                                </div>

                                <div class="col-md-6">
                                    <label class="label">Email</label>
                                    <input type="email" name="email" placeholder="Email">
                                </div>
                                <div class="col-md-6">
                                    <label class="label">Phone</label>
                                    <input type="text" name="phone" placeholder="Phone">
                                </div>
                                <div class="col-md-12">
                                    <label class="label">The message</label>
                                    <textarea name="message" placeholder="The message"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="ht_btn hover-bg border-0" type="submit">Send Message <img src="{{asset('/frontend/img/icon/arrow.svg')}}" alt="icon"></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--contact__section end-->

    <!--contact__map__section start-->
    <div class="contact__map__section">
        <div class="container-fluid px-0">
            <div class="row">
                <div class="contact__map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5755.72193294057!2d-88.02276322539748!3d42.06057431675313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x880faff78e3fffff%3A0xed277bdce2e3184b!2s5105%20Tollview%20Dr%20Unit%20206%2C%20Rolling%20Meadows%2C%20IL%2060008%2C%20Statele%20Unite%20ale%20Americii!5e0!3m2!1sro!2s!4v1700660437974!5m2!1sro!2s" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area -->
@endsection
