<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    
                </form>
                <div class="header-button">

                    <div class="noti-wrap">
                        
                        <div class="noti__item js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            @if(auth()->user()->unreadNotifications->count())
                                <span class="quantity">{{auth()->user()->unreadNotifications->count()}}</span>
                            @endif
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    @if(auth()->user()->unreadNotifications->count())
                                        <p>You have {{auth()->user()->unreadNotifications->count()}} Notifications</p>
                                    @else
                                        <p>No notifications available</p>
                                    @endif
                                </div>
                                    @if (auth()->user()->unreadNotifications->count() > 0)
                                    <li class="d-flex justify-content-end mx-1 my-2">
                                        <a href="{{route('mark-as-read')}}" class="btn btn-primary btn-sm">Mark All as Read</a>
                                    </li>
                                    @endif
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                        <div class="notifi__item">
                                            <div class="bg-c1 img-cir img-40">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            
                                            <div class="content">
                                                <p><a href="#" class="text-success">{{$notification->data['data']}}</a></p>
                                                <span class="date">{{$notification->created_at->diffForHumans()}}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                <div class="notifi__footer">
                                    {{-- <a href="#">All notifications</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <img src="{{ asset('storage/uploads/' . $accountSetting->admin_pic) }}" alt="{{ Auth::user()->username}}" />
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{ Auth::user()->username}}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="{{ asset('storage/uploads/' . $accountSetting->admin_pic) }}" alt="{{ Auth::user()->username}}" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{ Auth::user()->username}}</a>
                                        </h5>
                                        <span class="email">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="{{ route('admin.account.settings') }}">
                                            <i class="zmdi zmdi-account"></i>Profile</a>
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