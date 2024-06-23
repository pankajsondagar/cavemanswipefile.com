@php 
    $currentRouteName = Route::currentRouteName();
@endphp
<!doctype html>
<html class="no-js" lang="en">
   <head>
   <title>Caveman Swipe Files - The Ultimate Collection!</title>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="author" content="Galaxy Commander - Kaliptor">
      <meta name="viewport" content="width=device-width,initial-scale=1.0" />
      <meta name="description" content="Elevate your prospecting with the Ultimate Leads File Collection.">
      <!-- favicon icon -->
      <link rel="shortcut icon" href="images/favicon-16x16.png">
      <link rel="apple-touch-icon" href="">
      <link rel="apple-touch-icon" sizes="72x72" href="">
      <link rel="apple-touch-icon" sizes="114x114" href="">
      @include('frontend.layouts.styles')
      <style type="text/css">
         .style1 {color: #0000FF}
      </style>
   </head>
   <body data-mobile-nav-trigger-alignment="right" data-mobile-nav-style="modern" data-mobile-nav-bg-color="#313e3b">
      <!-- start header -->
      @include('frontend.layouts.header')
      <!-- end header --> 
      @yield('content')
      @if ($currentRouteName == 'contact')
         @include('frontend.layouts.footer3')
      @elseif ($currentRouteName == 'spam-policy' || $currentRouteName == 'cookie-policy' || $currentRouteName == 'terms-conditions' || $currentRouteName == 'list' || $currentRouteName == 'register')
         @include('frontend.layouts.footer4')
      @else 
         @include('frontend.layouts.footer2')
      @endif
      <!-- javascript libraries -->
      @include('frontend.layouts.scripts')
   </body>
</html>
