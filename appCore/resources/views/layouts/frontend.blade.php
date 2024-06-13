<!doctype html>
<html lang="en">
<head>
    @include('frontend.components.head')
</head>
<body>
{{--Content--}}
    @include('frontend.components.navigation')
    @yield('content')
    <!-- Footer Start -->
<footer class="black-bg footer__section__three">
    <div class="footer__bg__two  pt-lg-10" data-background="{{asset('/frontend/img/shape/vector-9.svg')}}">
        <div class="footer__wrapper__two pt-80 pt-lg-90 pb-30">
            <div class="container">
                <div class="row gx-lg-0">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer__widget pe-xl-4 mb-30">
                            <a href="/" class="footer-logo d-inline-block mb-30">
                                <img src="{{asset('/frontend/img/logo/l_gi.png')}}" alt="footer-logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer__widget ps-xl-2 mb-30">
                            <h4 class="widget__title mb-30">{{trans('string.contacts')}}</h4>
                            <div class="virtual__contact__list">
                                <a style="font-size: 18px" href="tel:{{trans('link.phone')}}"><span>Phone:</span> {{trans('link.phone')}}</a>
                                <a style="font-size: 18px"><span>Fax:</span> {{trans('link.fax')}}</a>
                                <a style="font-size: 18px" href="mailto:{{trans('link.email')}}"><span>E-mail:</span>
                                    {{trans('link.email')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="footer__widget mb-30 ps-lg-4">
                            <h4 class="widget__title mb-30">{{trans('string.address')}}</h4>
                            <address class="address__info">5105 Tollview Dr unit 206<br>Rolling Meadows , IL 60008</address>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-5 col-md-6 d-flex justify-content-xl-end">
                        <div class="footer__widget mb-30 pe-lg-3">
                            <h4 class="widget__title mb-30">Social Media</h4>
                            <div class="social_media mt-35">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright__area pt-60 pb-40">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 text-lg-start text-center">
                        <div class="copyright__text mb-30">
                            <p>Copyright © 2023, All Rights Reserved</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 text-lg-end text-center">
                        <ul class="footer__menu mb-30">
                            <li>
                                <a href="/">{{trans('string.site_title')}}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



<script src="{{asset('/frontend/js/vendor/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('/frontend/js/vendor/popper.min.js')}}"></script>
<script src="{{asset('/frontend/js/vendor/bootstrap.min.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.meanmenu.js')}}"></script>
<script src="{{asset('/frontend/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('/frontend/js/slick.min.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('/frontend/js/metisMenu.min.js')}}"></script>
<script src="{{asset('/frontend/js/wow.min.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('/frontend/js/aos.js')}}"></script>
<script src="{{asset('/frontend/js/jquery-ui.js')}}"></script>
<script src="{{asset('/frontend/js/jquery.scrollUp.min.js')}}"></script>
<script src="{{asset('/frontend/js/plugins.js')}}"></script>
<!--Custom JS here -->
<script src="{{asset('/frontend/js/main.js')}}"></script>

@yield('scripts')

</body>
</html>
