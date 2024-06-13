<!doctype html>
<html lang="en">
<head>
    @include('admin.components.head')
</head>
<body>
    <!-- Loading starts
    <div id="loading-wrapper">
        <div class="spinner-border" role="status">
            <span class="sr-only">ElitAgrotehnologie...</span>
        </div>
    </div>
     Loading ends -->

    <!-- Header start -->
    <header class="header">
        <div class="logo-wrapper">
            <a href="{{route('admin')}}" class="logo">
                <span class="text-lg" style="color: white">Pequeno CMS</span>
            </a>
            <a href="#" class="quick-links-btn" data-toggle="tooltip" data-placement="right" title="" data-original-title="Navigare rapidă">
                <i class="icon-menu1"></i>
            </a>
        </div>
        <div class="header-items">
            <!-- Header actions start -->
            <ul class="header-actions">

                <li class="dropdown">
                    <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                        <span class="user-name">{{Auth::user()->name}} {{Auth::user()->surname}}</span>
                        <span class="avatar">{{Auth::user()->name[0] ?? ''}}{{Auth::user()->surname[0] ?? ''}}<span class="status busy"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
                        <div class="header-profile-actions">
                            <div class="header-user-profile">

                                <h5>{{Auth::user()->name}} {{Auth::user()->surname}}</h5>
                                <p>{{Auth::user()->roles()->first()->name ?? ''}}</p>
                            </div>
                            <a href="/company/edit"><i class="icon-user1"></i> Profilul meu</a>
                            <a href="/company/edit"><i class="icon-settings1"></i> Setări account</a>
                            <a href="{{route('logout')}}"><i class="icon-log-out1"></i> Logout</a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="quick-settings-btn" data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick Settings">
                        <i class="icon-list"></i>
                    </a>
                </li>
            </ul>
            <!-- Header actions end -->
        </div>
    </header>
    <!-- Header end -->

    <!-- Screen overlay start -->
    <div class="screen-overlay"></div>
    <!-- Screen overlay end -->

    @include('admin.components.quicklinks')

    <!-- Quick settings start -->
    <div class="quick-settings-box">
        <div class="quick-settings-header">
            <div class="date-container">Today <span class="date" id="today-date"></span></div>
            <a href="#" class="quick-settings-box-close">
                <i class="icon-circle-with-cross"></i>
            </a>
        </div>
        <div class="quick-settings-body">
            <div class="fullHeight">
                <div class="quick-setting-list">
                    <h6 class="title">Events</h6>
                    <ul class="list-items">
                        <li>
                            <div class="list-title">Product Launch</div>
                            <div class="list-location">10:00 AM</div>
                        </li>
                        <li>
                            <div class="list-title">Team Meeting</div>
                            <div class="list-location">01:30 PM</div>
                        </li>
                        <li>
                            <div class="list-title">Q&A Session</div>
                            <div class="list-location">02:30 PM</div>
                        </li>
                    </ul>
                </div>
                <div class="quick-setting-list">
                    <h6 class="title">Notes</h6>
                    <ul class="list-items">
                        <li>
                            <div class="list-title">Refreshing the list</div>
                            <div class="list-location">03:15 PM</div>
                        </li>
                        <li>
                            <div class="list-title">Not able to click on button</div>
                            <div class="list-location">03:18 PM</div>
                        </li>
                    </ul>
                </div>
                <div class="quick-setting-list">
                    <h6 class="title">Quick Settings</h6>
                    <ul class="set-priority-list">
                        <li>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" checked id="systemUpdates">
                                <label class="custom-control-label" for="systemUpdates">System Updates</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="noti">
                                <label class="custom-control-label" for="noti">Notifications</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick settings end -->

    {{--Content--}}
    <div class="container-fluid">
        @include('admin.components.navigation');

        @yield('content')
        <!-- Footer start -->
        <footer class="main-footer">© Trigava CMS 2021</footer>
        <!-- Footer end -->
        @include('admin.components.delete_modal')
    </div>
    {{--Content END--}}

    <!-- Main Js Required -->
    <script src="{{asset('/admin_assets/js/main.js')}}"></script>

    <script src="{{asset('/admin_assets/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('/admin_assets/js/my_scripts.js')}}"></script>
    <!-- Datepickers -->
    <script src="{{asset('/admin_assets/js/bootstrap-datepicker.js')}}"></script>
    <script>$('.datepicker').datepicker({format: 'yyyy-mm-dd',});</script>
    @yield('scripts')
</body>
