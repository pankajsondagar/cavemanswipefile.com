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
    <title>Reset Password</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">

    <style>
        .simple-footer {
            text-align: center;
            margin-top: 40px;
            margin-bottom: 40px;
        }
        .error {
            color:red;
        }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <img src="{{ asset('images/site_logo.png') }}" width="100" alt="CoolAdmin">
                            <div style="font-size: 24px;">CAVEMAN LEADS</div>
                            @include('includes.message')
                        </div>
                        <div class="login-form">
                            <form action="{{ route('reset_password.update') }}" method="POST" autocomplete="off">
                                @csrf
                                <h5 style="margin-bottom: 30px;color:#1f365c;">Reset Password</h5>
                                <p style="margin-bottom: 15px;">Complete the form below to continue</p>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="au-input au-input--full" type="password" name="new_password">
                                    @error('new_password')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" name="confirm_password">
                                    @error('confirm_password')
                                        <p class="error">{{ $message }}</p>
                                    @enderror
                                </div>
                                <input type="hidden" value="{{ $token }}" name="token"/>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Reset Password</button>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        <div class="text-small">Crafted with <i class="fa fa-fw fa-heart"></i> 2023-{{ date('Y')}} <a href="{{ env('APP_URL') }}">Caveman Leads</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('vendor/slick/slick.min.js') }}">
    </script>
    <script src="{{ asset('vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}">
    </script>
    <script src="{{ asset('vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('vendor/counter-up/jquery.counterup.min.js') }}">
    </script>
    <script src="{{ asset('vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
<!-- end document-->