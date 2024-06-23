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
      @include('frontend.layouts.styles')
      <style type="text/css">
         .style1 {color: #0000FF}
         .style2 {color: #0000FF}
.style4 {font-weight: bold}
.style5 {font-weight: bold}
.style6 {
	color: #000000;
	font-weight: bold;
}
      </style>
   </head>
   <body data-mobile-nav-trigger-alignment="right" data-mobile-nav-style="modern" data-mobile-nav-bg-color="#313e3b">
      <!-- start header -->
      @include('frontend.layouts.header')  
      <!-- end header --> 
      @yield('content')
      <!-- start footer -->
      @include('frontend.layouts.footer')

      @include('frontend.layouts.scripts')
      <!-- end scroll progress -->
      <!-- javascript libraries -->
      
   </body>
</html>