<!DOCTYPE html> 
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
      <meta name="description" content="One Time Payment For Genealogy Leads Lists You Can Download Today and use as much as you desire. All Levels Of Membership Contains Over 5 Million Leads. Diamond Members Can Download All Future Leads Lists We Add At No Extra Charge - Life Time Supply Of Quality Leads!">
      <meta name="keywords" content="direct mail leads, email leads, mlm leads, network marketing leads, genealogy leads, hot line leads, buyers leads, opportunity seeker leads, worker leads, builder leads, business minded leads">
      <title>Caveman Leads</title>
      <!-- General CSS Files --> 
      <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/assets/fellow/fontawesome5121/css/all.min.css') }}">
      <link rel="shortcut icon" type="image/png" href="{{ asset('frontend/assets/image/favicon.png') }}"/>
      <!-- CSS Libraries --> <!-- Template CSS --> 
      <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontmuli.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/assets/css/components.css')}}">
      <style> .row { display: contents !important; } </style>
   </head>
   <body>
      <div id="app">
      <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <!-- Main Content --> 
      <div class="container">
      <section class="section">
         <div class="section-header">
            <h1>Caveman Leads<br> Pay Once - Leads For Life!</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('page',['slug' => 'mlm-leads']) }}" target="_self">MLM Leads</a></div>
                <div class="breadcrumb-item"><a href="{{ route('page',['slug' => 'comp-plan']) }}" target="_self">Comp Plan</a></div>
               <div class="breadcrumb-item"><a href="{{ url('member/login') }}" target="_self">Member Log In</a></div>
            </div>
         </div>

         {!! @$page->content !!}
      </section>
      </div> <div class="row">
        <div class="col-md-12">
           <div align="center">
              <span class="style29">
                 @foreach(@$pages as $value)
                    <a href="{{ route('page',['slug' => $value->slug ]) }}" class="gdpr-nostick">{{ @$value->title }}</a> @if(!$loop->last) | @endif 
                 @endforeach
              </span>
              <p></p>
           </div>
            <div class="copyright">
                <div class="simple-footer">
                    <div class="text-small">Crafted with <i class="fa fa-fw fa-heart"></i> 2023-{{ date('Y')}} <a href="{{ env('APP_URL') }}">Caveman Leads</a>
                    </div>
                </div>
            </div>
        </div>
    </div> </div> <!-- General JS Scripts --> <script src="{{ asset('frontend/assets/js/jquery-3.4.1.min.js')}}"></script> <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script> <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script> <script src="{{ asset('frontend/assets/js/jquery.nicescroll.min.js') }}"></script> <script src="{{ asset('frontend/assets/js/moment.min.js')}}"></script> <!-- JS Libraies --> <script src="assets/js/stisla.js"></script> <!-- Template JS File --> <script src="{{ asset('frontend/assets/js/scripts.js') }}"></script> <script src="{{ asset('frontend/assets/js/custom.js')}}"></script> <!-- Page Specific JS File --> 
   </body>
</html>