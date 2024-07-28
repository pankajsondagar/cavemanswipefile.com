@extends('frontend.layouts.app2')
@section('content')
<section class="ipad-top-space-margin bg-dark-gray cover-background page-title-big-typography" style="background-image: url(http://cavemanswipefile.com/images/register/half-bg.jpg)">
            <div class="background-position-center-top h-100 w-100 position-absolute left-0px top-0" style="background-image: url('images/register/vertical-line-bg-small.svg')"></div>
            <div id="particles-style-01" class="h-100 position-absolute left-0px top-0 w-100" data-particle="true" data-particle-options='{"particles": {"number": {"value": 8,"density": {"enable": true,"value_area": 2000}},"color": {"value": ["#d5d52b", "#d5d52b", "#d5d52b", "#d5d52b", "#d5d52b"]},"shape": {"type": "circle","stroke":{"width":0,"color":"#000000"}},"opacity": {"value": 1,"random": false,"anim": {"enable": false,"speed": 1,"sync": false}},"size": {"value": 8,"random": true,"anim": {"enable": false,"sync": true}},"line_linked":{"enable":false,"distance":0,"color":"#ffffff","opacity":1,"width":1},"move": {"enable": true,"speed":1,"direction": "right","random": false,"straight": false}},"interactivity": {"detect_on": "canvas","events": {"onhover": {"enable": false,"mode": "repulse"},"onclick": {"enable": false,"mode": "push"},"resize": true}},"retina_detect": false}'></div>
            <div class="container">
                <div class="row align-items-center extra-small-screen">
                    <div class="col-xl-6 col-lg-7 col-md-8 col-sm-9 position-relative page-title-extra-small" data-anime='{ "el": "childs", "translateY": [-15, 0], "perspective": [1200,1200], "scale": [1.1, 1], "rotateX": [50, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <h1 class="mb-20px alt-font style1">Caveman Swipe File</h1>
                        <h2 class="fw-500 m-0 ls-minus-2px alt-font style1">{{ $page->title }}</h2>
                    </div>
                </div>
            </div>
    </section>
        <!-- end page title -->
	    <!-- start section -->
        <section>
            <div class="container"> 
                <div class="row align-items-center">
                    <div class="col-lg-5 md-mb-50px" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    {!! @$page->content !!}
						<div class="row row-cols-1 justify-content-center mt-30px">                  
                        </div>
                    </div>
                    <div class="col-lg-7 ps-50px lg-ps-15px">
                        <div class="row row-cols-1 row-cols-sm-2 justify-content-center">
                            <div class="col xs-mb-30px" data-anime='{ "translateY": [50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                          </div>
                      </div>
                            <div class="col" data-anime='{ "translateY": [-50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                                <div class="">
                              </div>
                            </div>

                  </div>
              </div>
        </div>
            </div>
        </section>
        <!-- end section -->
		@endsection