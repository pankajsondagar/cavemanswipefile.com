<?php 
    $userDetail = App\Models\UserDetail::where('user_id',@$authMember->id ?? Auth::user()->id)->first();
    $memberSetting = App\Models\MemberSetting::first();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="One Time Payment For Genealogy Leads Lists You Can Download Today and use as much as you desire. All Levels Of Membership Contains Over 5 Million Leads. Diamond Members Can Download All Future Leads Lists We Add At No Extra Charge - Life Time Supply Of Quality Leads!">
    <meta name="keywords" content="direct mail leads, email leads, mlm leads, network marketing leads, genealogy leads, hot line leads, buyers leads, opportunity seeker leads, worker leads, builder leads, business minded leads">
    <meta name="author" content="Hau Nguyen">
    <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/assets/image/favicon.png') }}"/>
    <!-- Title Page-->
    <title>{{ env('APP_NAME') . ' | ' }} @yield('title')</title>
    @include('member.layouts.styles')
    @yield('style')
    <style>
        .summary {
            display: inline-block;
            width: 100%;
        }
        .summary .summary-info {
            background-color: #eaf2f4;
            padding: 50px 0;
            text-align: center;
            border-radius: 3px;
        }
        .error {
            color:red;
        }
    </style>
</head>
<body class="animsition1">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('member.layouts.mobile-header')
        <!-- END HEADER MOBILE-->
        <!-- MENU SIDEBAR-->
        @include('member.layouts.sidebar')
        <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('member.layouts.desktop-header')
            <!-- MAIN CONTENT-->
            @yield('content')
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    @include('member.layouts.scripts')
    @yield('script')
</body>
</html>
<!-- end document-->
