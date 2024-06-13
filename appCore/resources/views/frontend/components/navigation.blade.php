<header class="theme-main-menu theme-menu-one pt-40 pb-30">
    <div class="main-header-area">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xxl-2 col-xl-2 col-lg-3 col-6 d-none d-lg-inline-block">
                    <div class="logo-area">
                        <a class="front" href="/">
                            <img src="{{asset('/frontend/img/logo/l_gi.png')}}" alt="Header-logo"></a>
                    </div>
                </div>
                <div
                    class="col-xxl-6 col-xl-7 col-lg-7 col-6 d-flex align-items-center justify-content-space-between">
                    <div class="logo-area d-lg-none d-md-inline-block">
                        <a class="front" href="/">
                            <img src="{{asset('/frontend/img/logo/l_gi.png')}}"
                                                                alt="Header-logo"></a>
                    </div>
                    <div class="main-menu d-none d-lg-block ps-xxl-5">
                        <nav id="mobile-menu">
                            <ul class="menu-list ps-0">
                                @foreach(App\Page::where('parent', NULL)->where('first_menu', 1)->orderBy('ord')->get() as $page)
                                    @include('frontend.components.page_list', ['page' => $page])
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-3 col-lg-2 col-6">
                    <div class="right-nav d-flex align-items-center justify-content-end ms-5">
                        <div class="quote__btn">
                            <a href="/contacts" class="ht_btn"><span>Contacts
                                    <img src="{{asset('/frontend/img/icon/arrow.svg')}}" alt="icon"></span>
                            </a>
                        </div>
                        <div class="hamburger-menu">
                            <a class="round-menu" href="javascript:void(0);">
                                <i class="far fa-bars"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<aside class="slide-bar">
    <div class="close-mobile-menu">
        <a href="javascript:void(0);">
            <i class="fas fa-times"></i>
        </a>
    </div>
    <!-- offset-sidebar start -->
    <div class="offset-sidebar">
        <div class="offset-widget offset-logo mb-30">
            <a href="/">
                <img src="{{asset('/frontend/img/logo/l_gi.png')}}" alt="logo">
            </a>
        </div>
        <div class="mobile-menu"></div>
        <div class="offset-widget mb-30 pr-10">
            <div class="info-widget info-widget2">
                <h4 class="offset-title mb-20">Contact Info</h4>
                <p>
                    <i class="fal fa-address-book"></i>
                    {{trans('link.address')}}</p>
                <p>
                    <i class="fal fa-phone"></i>
                    {{trans('link.phone')}}
                </p>
                <p>
                    <i class="fal fa-envelope-open"></i>
                    {{trans('link.email')}}
                </p>
            </div>
        </div>
        <!-- <div class="login-btn text-center">
            <a class="ht_btn w-100" href="login.html">Login</a>
        </div> -->
    </div>
    <!-- offset-sidebar end -->

</aside>
<div class="body-overlay"></div>
