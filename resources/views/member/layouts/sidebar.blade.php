@php 
    $currentRouteName = Route::currentRouteName();
    $id = @$isNormal ? '' : @$authMember->id;
    $menusArr = [
        [
            'title'  => __('Dashboard'),
            'route'  => $id ? url('member/dashboard/'.$id) : route('member.dashboard'),
            'icon'   => 'fa fa-home',
            'active' => $currentRouteName == 'member.dashboard' ? 'active' : '',
        ],
        [
            'title'  => __('Genealogy View'),
            'route'  => $id ? url('member/genealogy/'.$id) : route('member.genealogy'),
            'icon'   => 'fa fa-sitemap',
            'active' => $currentRouteName == 'member.genealogy' ? 'active' : '',
        ],
        [
            'title'  => __('Profile'),
            'route'  => '',
            'icon'   => 'fa fa-user',
            'active' => $currentRouteName == 'member.genealogy' ? 'active' : '',
            'has-sub'=> true,
            'arrow'  => $currentRouteName == 'member.profile' || $currentRouteName == 'member.password' ? 'open' : '',
            'display' => $currentRouteName == 'member.profile' || $currentRouteName == 'member.password' ? 'display:block;' : '',
            'sub_menus' => [
                [
                    'title'  => __('Profile'),
                    'route'  => $id ? url('member/profile/'.$id) : route('member.profile'),
                    'active' => $currentRouteName == 'member.profile' ? 'active' : '',
                ],
                [
                    'title'  => __('Password'),
                    'route'  => $id ? url('member/password/'.$id) : route('member.password'),
                    'active' => $currentRouteName == 'member.password' ? 'active' : '',
                ]
            ],
        ],
        [
            'title'  => __('Manual Payment'),
            'route'  => $id ? url('member/account/'.$id) : route('member.account'),
            'icon'   => 'fa fa-money',
            'active' => $currentRouteName == 'member.account' ? 'active' : '',
        ],
        [
            'title'  => __('Affiliate'),
            'route'  => $id ? url('member/affiliate/'.$id) : route('member.affiliate'),
            'icon'   => 'fa fa-users',
            'active' => $currentRouteName == 'member.affiliate' ? 'active' : '',
        ],
        [
            'title'  => __('Banners'),
            'route'  => $id ? url('member/banners/'.$id) : route('member.banners'),
            'icon'   => 'fa fa-picture-o',
            'active' => $currentRouteName == 'member.banners' ? 'active' : '',
        ],
        [
            'title'  => __('Videos'),
            'route'  => $id ? url('member/videos/'.$id) : route('member.videos'),
            'icon'   => 'fa fa-video-camera',
            'active' => $currentRouteName == 'member.videos' ? 'active' : '',
        ],
        [
            'title'  => __('Download'),
            'route'  => $id ? url('member/digital-downloads/'.$id) : route('member.digital.download'),
            'icon'   => 'fa fa-download',
            'active' => $currentRouteName == 'member.digital.download' ? 'active' : '',
        ],
        [
            'title'  => __('Page Content'),
            'route'  => $id ? url('member/digital-contents/'.$id) : route('member.digital.content'),
            'icon'   => 'fa fa-folder',
            'active' => $currentRouteName == 'member.digital.content' ? 'active' : '',
        ],
        [
            'title'  => __('Contact Us'),
            'route'  => $id ? url('member/feedback/'.$id) : route('member.feedback'),
            'icon'   => 'fa fa-envelope',
            'active' => $currentRouteName == 'member.feedback' ? 'active' : '',
        ],
    ];  
@endphp

<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('images/icon/logo.jpg') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                @foreach($menusArr as $menu)
                    @if(isset($menu['has-sub']))
                        <li class="has-sub">
                            <a class="js-arrow {{ $menu['arrow'] }}" href="#">
                                <i class="fa fa-user"></i>Profile
                            </a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" style="{{ $menu['display'] }}">
                                @foreach($menu['sub_menus'] as $subMenu)
                                    <li class="{{ $subMenu['active'] }}">
                                        <a href="{{ $subMenu['route'] }}">{{ $subMenu['title'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @else 
                        <li class="{{ $menu['active'] }}">
                            <a href="{{ $menu['route'] }}"><i class="{{ $menu['icon'] }}"></i>{{ $menu['title'] }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</aside>