<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    
                </form>
                <div class="header-button">
                    <div class="noti-wrap">

                    </div>
                    @php    
                        $avatar = @$userDetail->avatar ?? @$memberSetting->default_pic;
                    @endphp 
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{ asset('storage/uploads/' . $avatar) }}" alt="{{ @$authMember->username ?? Auth::user()->username}}" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{ @$authMember->username ?? Auth::user()->username}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="{{ asset('storage/uploads/' . $avatar) }}" alt="{{ @$authMember->username ?? Auth::user()->username}}" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{ @$authMember->username ?? Auth::user()->username}}</a>
                                        </h5>
                                        <span class="email">{{ @$authMember->email ?? Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        @if($authMember)
                                        <a href="{{ url('member/profile/'.$authMember->id ) }}">
                                            <i class="zmdi zmdi-account"></i>Profile</a>
                                        @else 
                                        <a href="{{ route('member.profile') }}">
                                            <i class="zmdi zmdi-account"></i>Profile</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>