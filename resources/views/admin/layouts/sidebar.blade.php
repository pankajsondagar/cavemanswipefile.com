@php 
    $currentRouteName = Route::currentRouteName();
    $payplanStructure = $currentRouteName == 'admin.payplan.structure';
    $payplanLeaders   = $currentRouteName == 'admin.payplan.leaders';
    $websiteSettings  = $currentRouteName == 'admin.website.settings';
    $memberSettings   = $currentRouteName == 'admin.member.settings';
    $accountSettings  = $currentRouteName == 'admin.account.settings';
    $memberList       = $currentRouteName == 'admin.member.list';
    $memberView       = $currentRouteName == 'admin.member.view';
    $memberEdit       = $currentRouteName == 'admin.member.edit';
    $memberCreate       = $currentRouteName == 'admin.member.create';
    $paymentOptions  = $currentRouteName == 'admin.paymentoptions.edit';
    $bannerList       = $currentRouteName == 'admin.banner.list';
    $bannerView       = $currentRouteName == 'admin.banner.view';
    $bannerEdit       = $currentRouteName == 'admin.banner.edit';
    $bannerCreate       = $currentRouteName == 'admin.banner.create';
    $bannerSizeList       = $currentRouteName == 'admin.banner.size.list';
    $bannerSizeView       = $currentRouteName == 'admin.banner.size.view';
    $bannerSizeEdit       = $currentRouteName == 'admin.banner.size.edit';
    $bannerSizeCreate       = $currentRouteName == 'admin.banner.size.create';
    $pageList       = $currentRouteName == 'admin.page.list';
    $pageEdit       = $currentRouteName == 'admin.page.edit';
    $digitalDownloadList       = $currentRouteName == 'admin.digital.download.list';
    $digitalDownloadEdit       = $currentRouteName == 'admin.digital.download.edit';
    $digitalDownloadCreate       = $currentRouteName == 'admin.digital.download.create';
    $digitalContentList       = $currentRouteName == 'admin.digital.content.list';
    $digitalContentEdit       = $currentRouteName == 'admin.digital.content.edit';
    $digitalContentCreate       = $currentRouteName == 'admin.digital.content.create';
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
                <li class="{{ $currentRouteName == 'admin.dashboard' ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li class="{{ $memberList || $memberView || $memberCreate || $memberEdit ? 'active' : '' }}">
                    <a href="{{ route('admin.member.list')}}">
                        <i class="fas fa-users"></i>Manage Member
                    </a>
                </li>
                <li class="{{ $currentRouteName == 'admin.waiting.payments.list' ? 'active' : '' }}">
                    <a href="{{ route('admin.waiting.payments.list')}}">
                        <i class="fas fa-money-bill-alt"></i>Waiting Payments
                    </a>
                </li>
                <li class="{{ $currentRouteName == 'admin.member.genealogy' ? 'active' : '' }}">
                    <a href="{{ route('admin.member.genealogy')}}">
                        <i class="fa fa-fw fa-sitemap"></i>Member Genealogy
                    </a>
                </li>

                <li class="{{ $currentRouteName == 'admin.notification.list' ? 'active' : '' }}">
                    <a href="{{ route('admin.notification.list')}}">
                        <i class="fas fa-envelope"></i>Email Templates
                    </a>
                </li>

                <li class="has-sub">
                    <a class="js-arrow {{ $websiteSettings || $memberSettings || $accountSettings ? 'open' : '' }}" href="#">
                        <i class="fas fa-wrench"></i>General Settings
                    </a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" style="{{ $websiteSettings || $memberSettings || $accountSettings ? 'display:block;' : '' }}">
                        <li class="{{ $websiteSettings ? 'active' : '' }}">
                            <a href="{{ route('admin.website.settings')}}">Website</a>
                        </li>
                        <li class="{{ $memberSettings ? 'active' : '' }}">
                            <a href="{{ route('admin.member.settings')}}">Members</a>
                        </li>
                        <li class="{{ $accountSettings ? 'active' : '' }}">
                            <a href="{{ route('admin.account.settings')}}">Account</a>
                        </li>
                    </ul>
                </li>
                
                <li class="has-sub">
                    <a class="js-arrow {{ $payplanStructure || $payplanLeaders ? 'open' : '' }}" href="#">
                        <i class="fas fa fa-fw fa-gem"></i>Payplan Settings
                    </a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" style="{{ $payplanStructure || $payplanLeaders ? 'display:block;' : '' }}">
                        <li class="{{ $payplanStructure ? 'active' : '' }}">
                            <a href="{{ route('admin.payplan.structure')}}">Structure</a>
                        </li>
                        <li class="{{ $payplanLeaders && request()->route('type') == 1 ? 'active' : '' }}">
                            <a href="{{ route('admin.payplan.leaders',['type' => 1])}}">Bronze Leader</a>
                        </li>
                        <li class="{{ $payplanLeaders && request()->route('type') == 2 ? 'active' : '' }}">
                            <a href="{{ route('admin.payplan.leaders',['type' => 2])}}">Silver Leader</a>
                        </li>
                        <li class="{{ $payplanLeaders && request()->route('type') == 3 ? 'active' : '' }}">
                            <a href="{{ route('admin.payplan.leaders',['type' => 3])}}">Gold Leader</a>
                        </li>
                        <li class="{{ $payplanLeaders && request()->route('type') == 4 ? 'active' : '' }}">
                            <a href="{{ route('admin.payplan.leaders',['type' => 4])}}">Platinum Leader</a>
                        </li>
                        <li class="{{ $payplanLeaders && request()->route('type') == 5 ? 'active' : '' }}">
                            <a href="{{ route('admin.payplan.leaders',['type' => 5])}}">Diamond Leader</a>
                        </li>
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="js-arrow {{ $paymentOptions ? 'open' : '' }}" href="#">
                        <i class="fas fa fa-fw fa-money-bill-alt"></i>Payment Options
                    </a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" style="{{ $paymentOptions ? 'display:block;' : '' }}">
                        <li class="{{ $paymentOptions ? 'active' : '' }}">
                            <a href="{{ route('admin.paymentoptions.edit')}}">Manual Payment</a>
                        </li>
                        
                    </ul>
                </li>

                <li class="has-sub">
                    <a class="js-arrow {{ $bannerList || $bannerView || $bannerCreate || $bannerEdit || $bannerSizeList || $bannerSizeView || $bannerSizeCreate || $bannerSizeEdit ? 'active' : '' }}" href="#">
                        <i class="fas fa-fw fa-puzzle-piece"></i>Banner Promotion
                    </a>
                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list" style="{{ $bannerList || $bannerView || $bannerCreate || $bannerEdit || $bannerSizeList || $bannerSizeView || $bannerSizeCreate || $bannerSizeEdit ? 'display:block;' : '' }}">
                        <li class="{{ $bannerList || $bannerView || $bannerCreate || $bannerEdit ? 'active' : '' }}">
                            <a href="{{ route('admin.banner.list')}}">Manage Banners</a>
                        </li>
                        <li class="{{ $bannerSizeList || $bannerSizeView || $bannerSizeCreate || $bannerSizeEdit ? 'active' : '' }}">
                            <a href="{{ route('admin.banner.size.list')}}">Manage Sizes</a>
                        </li>
                    </ul>
                </li>

                <li class="{{ $pageList || $pageEdit ? 'active' : '' }}">
                    <a href="{{ route('admin.page.list')}}">
                        <i class="fas fa-fw fa-files-o"></i>Manage Pages
                    </a>
                </li>

                <li class="{{ $currentRouteName == 'admin.feedback.list' || $currentRouteName == 'admin.feedback.reply' ? 'active' : '' }}">
                    <a href="{{ route('admin.feedback.list')}}">
                        <i class="fas fa-envelope"></i>Manage Feedbacks
                    </a>
                </li>

                <li class="{{ $currentRouteName == 'admin.content.list' ? 'active' : '' }}">
                    <a href="{{ route('admin.content.list')}}">
                        <i class="fas fa-globe"></i>Website Settings
                    </a>
                </li>

                <li class="{{ $digitalDownloadList || $digitalDownloadEdit || $digitalDownloadCreate ? 'active' : '' }}">
                    <a href="{{ route('admin.digital.download.list')}}">
                        <i class="fas fa-download"></i>Digital Download
                    </a>
                </li>

                <li class="{{ $digitalContentList || $digitalContentEdit || $digitalContentCreate ? 'active' : '' }}">
                    <a href="{{ route('admin.digital.content.list')}}">
                        <i class="fas fa-folder"></i>Digital Content
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>