cdcd<!-- Navigation start -->
<nav class="navbar navbar-expand-lg custom-navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#WafiAdminNavbar" aria-controls="WafiAdminNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i></i>
						<i></i>
						<i></i>
					</span>
    </button>
    <div class="collapse navbar-collapse" id="WafiAdminNavbar">
        <ul class="navbar-nav">
            <li class="nav-item dropdown active">
                <a class="nav-link @if (Route::is('admin'))active-page @endif" href="{{route('admin')}}" role="button">
                    <i class="icon-devices_other nav-icon"></i>
                    {{trans("menu.main")}}
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle @if (Route::is('pages*') || Route::is('posters*') || Route::is('news*') || Route::is('persons*') || Route::is('places*'))  active-page @endif" href="#" id="companyDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-info-with-circle nav-icon"></i>
                    {{trans("menu.info")}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="companyDropdown">
                    <li><a class="dropdown-item  @if (Route::is('pages*')) active-page @endif" href="{{route('pages.index')}}">Pagini</a></li>
                    <li><a class="dropdown-item @if (Route::is('posters*')) active-page @endif" href="{{route('posters.index')}}">Banere</a></li>
                    <li><a class="dropdown-item @if (Route::is('news*')) active-page @endif" href="{{route('news.index')}}">Noutăți</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle   @if (Route::is('admins*') || Route::is('language*') || Route::is('translate*')) active-page @endif" href="#" id="companyDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-building nav-icon"></i>
                    {{trans("menu.config")}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="companyDropdown">
                    <li><a class="dropdown-item @if (Route::is('admins*')) active-page @endif" href="{{route('admins.index')}}">Editează administratorii</a></li>
                    <li><a class="dropdown-item @if (Route::is('language*')) active-page @endif" href="{{route('language.index')}}">Language</a></li>
                    <li><a class="dropdown-item @if (Route::is('translate*')) active-page @endif" href="{{route('translate.index')}}">Constante</a></li>
                         </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- Navigation end -->
