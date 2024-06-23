<?php 
    $accountSetting = App\Models\AccountSetting::first();
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
    @include('admin.layouts.styles')
    @yield('style')
    <style>
        .simple-footer {
            text-align: center;
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .error {
            color:red;
        }
        .user-profile {
            background: #1f365c;
            border-radius: 50%;
            color: #F8F9FA;
            display: inline-block;
            font-size: 16px;
            font-weight: 300;
            margin: 0;
                margin-right: 10px;
            position: relative;
            vertical-align: middle;
            line-height: 1.28;
            height: 40px;
            width: 40px;
        }

        .user-profile2 {
            border-radius: 50%;
            color: #F8F9FA;
            display: inline-block;
            font-size: 16px;
            font-weight: 300;
            margin: 0;
                margin-right: 10px;
            position: relative;
            vertical-align: middle;
            line-height: 1.28;
            height: 150px;
            width: 150px;
        }
        .text-danger-glow {
            color: green;
            text-shadow: green;
        }

        .blink {
            animation: blinker 1s cubic-bezier(.5, 0, 1, 1) infinite alternate;  
        }
        @keyframes blinker {  
            from { opacity: 1; }
            to { opacity: 0; }
        }
    </style>
</head>
<body class="animsition1">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        @include('admin.layouts.mobile-header',['accountSetting' => $accountSetting])
        <!-- END HEADER MOBILE-->
        <!-- MENU SIDEBAR-->
        @include('admin.layouts.sidebar')
        <!-- END MENU SIDEBAR-->
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            @include('admin.layouts.desktop-header',['accountSetting' => $accountSetting])
            <!-- MAIN CONTENT-->
            @yield('content')
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->
    </div>
    @include('admin.layouts.scripts')
    @yield('script')
</body>
</html>
<!-- end document-->
