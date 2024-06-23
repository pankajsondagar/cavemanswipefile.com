@php 
    $currentRouteName = Route::currentRouteName();
    $memberProfile    = $currentRouteName == 'member.profile';
    $memberAccount    = $currentRouteName == 'member.account';
    $memberWebsite    = $currentRouteName == 'member.website';
    $memberPassword   = $currentRouteName == 'member.password';
    $genealogyView    = $currentRouteName == 'member.genealogy';
    $dashboard        = $currentRouteName == 'member.dashboard';
    $feedback         = $currentRouteName == 'member.feedback';
    $affiliate        = $currentRouteName == 'member.affiliate';
    $banners          = $currentRouteName == 'member.banners';
    $videos           = $currentRouteName == 'member.videos';
    $digitalDownload  = $currentRouteName == 'member.digital.download';
    $digitalContent   = $currentRouteName == 'member.digital.content';
    $id               = @$isNormal ? '' : @$authMember->id;
@endphp
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="#">
                    <img src="{{ asset('images/icon/logo.jpg') }}" alt="CoolAdmin" />
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <!-- Dashboard -->
                <li class="{{ $dashboard ? 'active' : '' }}">
                    @if ($id)
                        <a href="{{ url('member/dashboard/'.$id) }}"><i class="fa fa-home"></i>Dashboard</a>
                    @else 
                        <a href="{{ route('member.dashboard') }}"><i class="fa fa-home"></i>Dashboard</a>
                    @endif
                </li>

                <!-- Genealogy View -->
                <li class="{{ $genealogyView ? 'active' : '' }}">
                    @if ($id)
                        <a href="{{ url('member/genealogy/'.$id) }}"><i class="fa fa-sitemap"></i>Genealogy View</a>
                    @else 
                        <a href="{{ route('member.genealogy') }}"><i class="fa fa-sitemap"></i>Genealogy View</a>
                    @endif
                </li>

                <!-- Profile -->
                <li class="has-sub">
                    <a class="js-arrow {{ $memberProfile || $memberWebsite || $memberPassword ? 'open' : '' }}" href="#">
                        <i class="fa fa-user"></i>Profile
                    </a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" style="{{ $memberProfile || $memberWebsite || $memberPassword ? 'display:block;' : '' }}"> 
                        <li class="{{ $memberProfile ? 'active' : '' }}">
                            @if ($id)
                                <a href="{{ url('member/profile/'.$id) }}">Profile</a>
                            @else 
                                <a href="{{ route('member.profile')}}">Profile</a>
                            @endif
                        </li>
                       
                        <li class="{{ $memberPassword  ? 'active' : '' }}">
                            @if ($id)
                                <a href="{{ url('member/password/'.$id) }}">Password</a>
                            @else 
                                <a href="{{ route('member.password')}}">Password</a>
                            @endif
                        </li>
                    </ul>
                </li>

                <!-- Manual Payment -->
                <li class="{{ $memberAccount ? 'active' : '' }}">
                    @if ($id)
                        <a href="{{ url('member/account/'.$id) }}"><i class="fa fa-money"></i>Manual Payment</a>
                    @else 
                        <a href="{{ route('member.account')}}"><i class="fa fa-money"></i>Manual Payment</a>
                    @endif
                </li>

                <!-- Contact Us -->
                <li class="{{ $feedback ? 'active' : '' }}">
                    @if ($id)
                        <a href="{{ url('member/feedback/'.$id) }}"><i class="fa fa-envelope"></i>Contact Us</a>
                    @else 
                        <a href="{{ route('member.feedback') }}"><i class="fa fa-envelope"></i>Contact Us</a>
                    @endif
                </li>

                <!-- Affiliate -->
                <li class="{{ $affiliate ? 'active' : '' }}">
                    @if ($id)
                        <a href="{{ url('member/affiliate/'.$id) }}"><i class="fa fa-user"></i>Affiliate</a>
                    @else 
                        <a href="{{ route('member.affiliate') }}"><i class="fa fa-user"></i>Affiliate</a>
                    @endif
                </li>

                <!-- Banners -->
                <li class="{{ $banners ? 'active' : '' }}">
                    @if ($id)
                        <a href="{{ url('member/banners/'.$id) }}"><i class="fa fa-picture-o"></i>Banners</a>
                    @else 
                        <a href="{{ route('member.banners') }}"><i class="fa fa-picture-o"></i>Banners</a>
                    @endif
                </li>

                <!-- Videos -->
                <li class="{{ $videos ? 'active' : '' }}">
                    @if ($id)
                        <a href="{{ url('member/videos/'.$id) }}"><i class="fa fa-video-camera"></i>Videos</a>
                    @else 
                        <a href="{{ route('member.videos') }}"><i class="fa fa-video-camera"></i>Videos</a>
                    @endif
                </li>

                <!-- Digital Download -->
                <li class="{{ $digitalDownload ? 'active' : '' }}">
                    <a href="{{ $id ? url('member/digital-downloads/'.$id) : route('member.digital.download') }}"><i class="fa fa-download"></i>Download</a>
                </li>
                
                <!-- Digital Content -->
                <li class="{{ $digitalContent ? 'active' : '' }}">
                    @if ($id)
                        <a href="{{ url('member/digital-contents/'.$id) }}"><i class="fa fa-folder"></i>Page Content</a>
                    @else 
                        <a href="{{ route('member.digital.content') }}"><i class="fa fa-folder"></i>Page Content</a>
                    @endif
                </li>
                
            </ul>
        </div>
    </nav>
</header>