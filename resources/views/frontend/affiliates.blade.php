@extends('frontend.layouts.app')
@section('content')
<!-- start page title -->
<section class="ipad-top-space-margin bg-dark-gray cover-background page-title-big-typography" style="background-image: url(http://cavemanleads.com/images/half-bg.jpg)">
            <div class="background-position-center-top h-100 w-100 position-absolute left-0px top-0" style="background-image: url('images/vertical-line-bg-small.svg')"></div>
            <div id="particles-style-01" class="h-100 position-absolute left-0px top-0 w-100" data-particle="true" data-particle-options='{"particles": {"number": {"value": 8,"density": {"enable": true,"value_area": 2000}},"color": {"value": ["#d5d52b", "#d5d52b", "#d5d52b", "#d5d52b", "#d5d52b"]},"shape": {"type": "circle","stroke":{"width":0,"color":"#000000"}},"opacity": {"value": 1,"random": false,"anim": {"enable": false,"speed": 1,"sync": false}},"size": {"value": 8,"random": true,"anim": {"enable": false,"sync": true}},"line_linked":{"enable":false,"distance":0,"color":"#ffffff","opacity":1,"width":1},"move": {"enable": true,"speed":1,"direction": "right","random": false,"straight": false}},"interactivity": {"detect_on": "canvas","events": {"onhover": {"enable": false,"mode": "repulse"},"onclick": {"enable": false,"mode": "push"},"resize": true}},"retina_detect": false}'></div>
            <div class="container">
                <div class="row align-items-center extra-small-screen">
                    <div class="col-xl-6 col-lg-7 col-md-8 col-sm-9 position-relative page-title-extra-small" data-anime='{ "el": "childs", "translateY": [-15, 0], "perspective": [1200,1200], "scale": [1.1, 1], "rotateX": [50, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <h1 class="mb-20px alt-font  style1">Comp Plan</h1>
                        <h2 class="fw-500 m-0 ls-minus-2px alt-font style1">Instant<br>Daily Payments<br>Direct To YOU.</h2>
                    </div>
                </div>
            </div>
    </section>
        <!-- end page title -->
        <!-- start section -->
        <section class="position-relative z-index-1 background-position-left-top background-no-repeat overflow-hidden"  style="background-image: url('http://cavemanleads.com/images/Money-Cave-F.jpg')">
            <div class="position-absolute right-0px bottom-minus-90px z-index-minus-1 d-none d-md-inline-block" data-bottom-top="transform: translateY(-50px)" data-top-bottom="transform: translateY(50px)">
                <img src="" alt="">
            </div>
            <div class="container">
                <div class="row align-items-end justify-content-center mb-8 xs-mb-12">                    
                    <div class="col-xl-5 col-lg-6 col-md-10 position-relative md-mb-20px text-center text-lg-start" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <div class="icon-with-text-style-08 mb-20px d-inline-block">
                            <div class="feature-box feature-box-left-icon-middle">
                                <i class=""></i>
                          </div>
                                <div class="feature-box-content last-paragraph-no-margin">
                                    <span class="d-inline-block alt-font fs-19 fw-500 ls-minus-05px text-dark-gray"></span>
                                </div>
                      </div>
                  </div>
                        <h2 class="alt-font text-dark-gray fw-600 ls-minus-3px mb-0"></h2>
              </div>
                    <div class="col-xl-6 col-lg-6 col-md-10 offset-xl-1 text-center text-lg-start last-paragraph-no-margin" data-anime='{ "el": "childs", "translateY": [30, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <span class="fw-600 mb-5px d-block fs-18 style1">Daily Commissions Paid Direct To You By: Cash, PayPal, Cash App, Money Orders, Crypto, etc., You Decide How You Get Paid!</span>
                        <p class="w-85 xl-w-95 lg-w-100 style1">Earn Commissions of $50 to $500 or more DAILY!</p>
              </div>
        </div>
                <div class="row g-0 row-cols-1 row-cols-lg-4 row-cols-sm-2 g-0 align-items-center mb-3" data-anime='{ "el": "childs", "translateX": [-15, 0], "opacity": [0,1], "duration": 600, "delay":0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <!-- start features box item -->
                    <div class="col services-box-style-07 text-center last-paragraph-no-margin border-end border-color-transparent-dark-very-light md-mb-50px xs-border-end-0">
                        <div class="pe-50px ps-50px pb-40px xl-ps-30px xl-pe-30px">
                            <div class="position-relative ms-auto me-auto mb-25px">
                                <img src="images-affiliates/2-Level-Comp-Plan.jpg" class="h-75px position-relative z-index-1 mt-35px" alt="">
                          </div>
                            <span class="fs-18 fw-600 text-dark-gray d-block mb-5px">2 Level Comp Plan</span>
                            <p class="lh-30">Instantly Paid Direct To You Commissions Starting TODAY!</p>
                        </div>
                        <div class="d-flex flex-column overflow-hidden w-100 justify-content-center position-relative">
                            <div class="fs-14 fw-700 text-uppercase text-dark-gray border-top border-bottom border-color-transparent-dark-very-light pt-10px pb-10px "><span class="text-down d-block">Start Today! - ></span></div>
                            <div class="btn-hover d-flex align-items-center justify-content-center bg-dark-gray">
                                <a href="{{ route('register') }}" class="inner-link btn btn-link btn-hover-animation-switch btn-extra-large text-white">
                                    <span>
                                        <span class="btn-text">Start Today! -></span>
                                        <span></span>
                                </span> 
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col services-box-style-07 text-center last-paragraph-no-margin border-end border-color-transparent-dark-very-light md-mb-50px md-border-end-0">
                        <div class="pe-50px ps-50px pb-40px xl-ps-30px xl-pe-30px">
                            <div class="position-relative ms-auto me-auto mb-25px">
                                <img src="images-affiliates/100-Percent.jpg" class="h-75px position-relative z-index-1 mt-35px" alt="">
                          </div>
                            <span class="fs-18 fw-600 text-dark-gray d-block mb-5px">100% Commissions Match</span>
                            <p class="lh-30">100% Check Match On Your Referrals.</p>
                        </div>
                        <div class="d-flex flex-column overflow-hidden w-100 justify-content-center position-relative">
                            <div class="fs-14 fw-700 text-uppercase text-dark-gray border-top border-bottom border-color-transparent-dark-very-light pt-10px pb-10px "><span class="text-down d-block">Start Today! -></span></div>
                            <div class="btn-hover d-flex align-items-center justify-content-center bg-dark-gray">
                                <a href="{{ route('register') }}" class="inner-link btn btn-link btn-hover-animation-switch btn-extra-large text-white">
                                    <span>
                                        <span class="btn-text">Start Today! -></span>
                                        <span></span>
                                    </span> 
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col services-box-style-07 text-center last-paragraph-no-margin border-end border-color-transparent-dark-very-light xs-mb-50px xs-border-end-0">
                        <div class="pe-50px ps-50px pb-40px xl-ps-30px xl-pe-30px">
                            <div class="position-relative ms-auto me-auto mb-25px">
                                <img src="images-affiliates/5-Package-Levels.jpg" class="h-75px position-relative z-index-1 mt-35px" alt="">
                          </div>
                            <span class="fs-18 fw-600 text-dark-gray d-block mb-5px">5 Package Levels</span>
                            <p class="lh-30">Start Small & Work Your Way Up As You Build & Earn.</p>
                        </div>
                        <div class="d-flex flex-column overflow-hidden w-100 justify-content-center position-relative">
                            <div class="fs-14 fw-700 text-uppercase text-dark-gray border-top border-bottom border-color-transparent-dark-very-light pt-10px pb-10px "><span class="text-down d-block">Start Today! -></span></div>
                            <div class="btn-hover d-flex align-items-center justify-content-center bg-dark-gray">
                                <a href="{{ route('register') }}" class="inner-link btn btn-link btn-hover-animation-switch btn-extra-large text-white">
                                    <span>
                                        <span class="btn-text">Start Today! -></span>
                                        <span></span>
                                    </span> 
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                    <!-- start features box item -->
                    <div class="col services-box-style-07 text-center last-paragraph-no-margin">
                        <div class="pe-50px ps-50px pb-40px xl-ps-30px xl-pe-30px">
                            <div class="position-relative ms-auto me-auto mb-25px">
                                <img src="images-affiliates/Cash-Block.jpg" class="h-75px position-relative z-index-1 mt-35px" alt="">
                          </div>
                            <span class="fs-18 fw-600 text-dark-gray d-block mb-5px">Earn $ Today</span>
                            <p class="lh-30">Sign Up Today - Earn Cash Today.</p>
                        </div>
                        <div class="d-flex flex-column overflow-hidden w-100 justify-content-center position-relative">
                            <div class="fs-14 fw-700 text-uppercase text-dark-gray border-top border-bottom border-color-transparent-dark-very-light pt-10px pb-10px "><span class="text-down d-block">Start Today! -></span></div>
                            <div class="btn-hover d-flex align-items-center justify-content-center bg-dark-gray">
                                <a href="{{ route('register') }}" class="inner-link btn btn-link btn-hover-animation-switch btn-extra-large text-white">
                                    <span>
                                        <span class="btn-text">Start Today! -></span>
                                        <span></span>
                                    </span> 
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
                </div>
            </div>
            <div class="container-fluid">
                <div class="row position-relative mt-40px xs-mt-20px">
                    <div class="col swiper swiper-width-auto feather-shadow text-center" data-slider-options='{ "slidesPerView": "auto", "spaceBetween":80, "centeredSlides": true, "speed": 30000, "loop": true, "pagination": { "el": ".slider-four-slide-pagination-2", "clickable": false }, "allowTouchMove": false, "autoplay": { "delay":0, "disableOnInteraction": false }, "navigation": { "nextEl": ".slider-four-slide-next-2", "prevEl": ".slider-four-slide-prev-2" }, "keyboard": { "enabled": true, "onlyInViewport": true }, "effect": "slide" }'>
                        <div class="swiper-wrapper marquee-slide">
                            <!-- start slider item -->
                            <div class="swiper-slide">
                                <div class="fs-190 ls-minus-10px pt-10px pb-10px alt-font fw-600 opacity-1">CASH</div>
                            </div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide">
                                <div class="fs-190 ls-minus-10px pt-10px pb-10px alt-font fw-600 opacity-1">DAILY</div>
                            </div>
                            <!-- end slider item -->
                            <!-- start slider item -->
                            <div class="swiper-slide">
                                <div class="fs-190 ls-minus-10px pt-10px pb-10px alt-font fw-600 opacity-1">PAYMENTS</div>
                            </div>
                            <!-- end slider item -->
                        </div> 
                    </div>  
                    <div class="col-12 position-absolute top-0 h-100 d-flex justify-content-center align-items-center left-0px z-index-1 text-center">
                        <h4 class="alt-font text-dark-gray fs-45 fw-600 ls-minus-2px xs-ls-minus-1px mb-0 mt-40px xs-mt-15px">Leads For Life - Share - Get Paid!</h4>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="bg-gradient-tranquil-white pt-0 position-relative align-items-center">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-xl-7 col-lg-6 text-center" data-anime='{ "el": "childs", "opacity": [0,1], "duration": 600, "delay": 100, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <div class="position-relative md-mb-50px xs-mb-30px pe-50px outside-box-left-10 md-outside-box-left-0 lg-pe-0 atropos" data-atropos>
                            <div class="atropos-scale">
                                <div class="atropos-rotate">
                                    <div class="atropos-inner text-center w-100 overflow-visible">
                                        <div data-atropos-offset="-1" class="position-absolute left-0px">
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/ZQeSeYNEwHM?si=tTSyJUDxE1xf4XES" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </div>
                                  </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 position-relative z-index-1">
                        <div class="icon-with-text-style-08 mb-20px" data-anime='{ "el": "childs", "translateY": [-30, 0], "perspective": [1200,1200], "scale": [1.1, 1], "rotateX": [50, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <div class="feature-box feature-box-left-icon-middle">
                                <div class="">
                              </div>
                                <div class="feature-box-content last-paragraph-no-margin">
                                    <span class="d-inline-block alt-font fs-19 fw-500 ls-minus-05px text-dark-gray">Why Caveman Leads Files?</span>
                                </div>
                            </div>
                        </div>
                        <h2 class="alt-font text-dark-gray fw-600 ls-minus-3px mb-40px sm-mb-30px" data-anime='{ "translateY": [-30, 0], "perspective": [1200,1200], "scale": [1.1, 1], "rotateX": [50, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>Earning Makes You Productive & Wise.</h2>
                        <div class="accordion accordion-style-05" id="accordion-style-05" data-anime='{ "el": "childs", "translateY": [-30, 0], "perspective": [1200,1200], "scale": [1.1, 1], "rotateX": [50, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                            <!-- start accordion item -->
                            <div class="accordion-item bg-white active-accordion">
                                <h3 class="number alt-font mb-0 text-base-color fw-400 text-outline text-outline-color-base-color">01</h3>
                                <div class="accordion-header">
                                    <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-05-01" aria-expanded="true" data-bs-parent="#accordion-style-05">
                                        <div class="style1 mb-0 fw-600 text-dark-gray pe-0 position-relative fs-18 accordion-title"><strong>Get Paid DAILY - INSTANTLY!</strong></div>
                                    </a>
                                </div>
                                <div id="accordion-style-05-01" class="accordion-collapse collapse show" data-bs-parent="#accordion-style-05">
                                    <div class="accordion-body last-paragraph-no-margin">
                                        <p>Select How You Get Paid - Cash, Money Order, Cash App, Crypto - It Is YOUR CHOICE.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end accordion item -->
                            <!-- start accordion item -->
                            <div class="accordion-item bg-white">
                                <h3 class="number alt-font mb-0 text-base-color fw-400 text-outline text-outline-color-base-color">02</h3>
                                <div class="accordion-header">
                                    <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-05-02" aria-expanded="false" data-bs-parent="#accordion-style-05">
                                        <div class="style1 mb-0 fw-600 text-dark-gray pe-0 position-relative fs-18 accordion-title"><strong>Earn From Others Efforts!</strong></div>
                                    </a>
                                </div>
                                <div id="accordion-style-05-02" class="accordion-collapse collapse" data-bs-parent="#accordion-style-05">
                                    <div class="accordion-body last-paragraph-no-margin">
                                        <p>Earn Nice 100% Matching Commissions From Those You Refer To Caveman Leads.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end accordion item -->
                            <!-- start accordion item -->
                            <div class="accordion-item bg-white">
                                <h3 class="number alt-font mb-0 text-base-color fw-400 text-outline text-outline-color-base-color">03</h3>
                                <div class="accordion-header">
                                    <a href="#" data-bs-toggle="collapse" data-bs-target="#accordion-style-05-03" aria-expanded="false" data-bs-parent="#accordion-style-05">
                                        <div class="accordion-title fs-18 position-relative pe-0 text-dark-gray fw-600 mb-0 style1">Amazing Pay Days Await You!</div>
                                    </a>
                                </div>
                                <div id="accordion-style-05-03" class="accordion-collapse collapse" data-bs-parent="#accordion-style-05">
                                    <div class="accordion-body last-paragraph-no-margin">
                                        <p>What Could Be Better Than Earning While Building Your Business.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end accordion item -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->
        <!-- start section -->
        <section class="overlap-height">
            <div class="container overlap-gap-section">
                <div class="row justify-content-center align-items-center mb-3 text-center">
                    <div class="col-12" data-anime='{ "el": "childs", "opacity": [0,1], "duration": 600, "delay": 100, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <h2 class="alt-font text-dark-gray fw-600 ls-minus-3px">Great Achievements Await You</h2>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center g-0 mb-5 xs-mb-40px" data-anime='{ "translateY": [30, 0], "perspective": [1200,1200], "scale": [1.1, 1], "rotateX": [50, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-07">
                        <div class="hover-box dark-hover will-change-inherit feature-box p-25 xl-p-17 md-p-19 overflow-hidden border-top border-start border-bottom xs-border-end xs-border-bottom-0 border-color-extra-medium-gray">
                            <div class="feature-box-icon">
                                <span class="alt-font fw-600 fs-17 text-uppercase text-dark-gray position-absolute right-25px top-20px lg-right-15px lg-top-10px">This Year</span>
                                <span><img src="images-affiliates/New-Car.jpg" alt=""></span>
                            </div>
                            <div class="feature-box-content">
                                <span class="fs-18 lh-24 text-dark-gray fw-500 d-block">New Car</span>
                            </div>
                            <div class="feature-box-overlay bg-dark-gray"></div>
                        </div>
                    </div>
                    <!-- end features box item --> 
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-07">
                        <div class="hover-box dark-hover will-change-inherit feature-box p-25 xl-p-17 md-p-19 overflow-hidden border-top md-border-end border-start border-bottom border-color-extra-medium-gray">
                            <div class="feature-box-icon">
                                <span class="alt-font fw-600 fs-17 text-uppercase text-dark-gray position-absolute right-25px top-20px lg-right-15px lg-top-10px">This Year</span>
                                <span><img src="images-affiliates/New-House.jpg" alt=""></span>
                            </div>
                            <div class="feature-box-content">
                                <span class="fs-18 lh-24 text-dark-gray fw-500 d-block">New House</span>
                            </div>
                            <div class="feature-box-overlay bg-dark-gray"></div>
                        </div>
                    </div>
                    <!-- end features box item --> 
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-07">
                        <div class="hover-box dark-hover will-change-inherit feature-box p-25 xl-p-17 md-p-19 overflow-hidden border-top border-start border-bottom md-border-top-0 xs-border-end border-color-extra-medium-gray">
                            <div class="feature-box-icon">
                                <span class="alt-font fw-600 fs-17 text-uppercase text-dark-gray position-absolute right-25px top-20px lg-right-15px lg-top-10px">This Year</span>
                                <span><img src="images-affiliates/Vacation-Trip.jpg" alt=""></span>
                            </div>
                            <div class="feature-box-content">
                                <span class="fs-18 lh-24 text-dark-gray fw-500 d-block">Vacations & Trips</span>
                            </div>
                            <div class="feature-box-overlay bg-dark-gray"></div>
                        </div>
                    </div>
                    <!-- end features box item --> 
                    <!-- start features box item -->
                    <div class="col icon-with-text-style-07">
                        <div class="hover-box dark-hover will-change-inherit feature-box p-25 xl-p-17 md-p-19 overflow-hidden border border-color-extra-medium-gray md-border-top-0">
                            <div class="feature-box-icon">
                                <span class="alt-font fw-600 fs-17 text-uppercase text-dark-gray position-absolute right-25px top-20px lg-right-15px lg-top-10px">This Year</span>
                                <span><img src="images-affiliates/Investments-Retirement.jpg" alt=""></span>
                            </div>
                            <div class="feature-box-content">
                                <span class="fs-18 lh-24 text-dark-gray fw-500 d-block">Investments</span>
                            </div>
                            <div class="feature-box-overlay bg-dark-gray"></div>
                        </div>
                    </div>
                    <!-- end features box item --> 
                </div>
                <div class="row justify-content-center">
                    <!-- start features box item -->
                    <div class="col-auto icon-with-text-style-08 md-mb-10px pe-25px md-pe-15px" data-anime='{ "translateX": [-50, 0], "opacity": [0,1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <div class="feature-box feature-box-left-icon-middle xs-lh-28">
                            <div class="feature-box-icon me-10px">
                                <i class=""></i>
                            </div>
                            <div class="feature-box-content">
                                <span class="text-dark-gray fw-500 fs-20 xs-fs-18 ls-minus-05px">Don't Waste Another Second - <a href="{{ route('register') }}" class="text-decoration-line-bottom-medium text-dark-gray fw-600">Get Started NOW!</a></span>
                            </div>
                        </div>
                    </div>
                    <!-- end features box item -->
					 </div> 
                </div>
                <div class="row row-cols-1 row-cols-lg-5 row-cols-md-3 row-cols-sm-3 text-center justify-content-center clients-style-05 mt-6" data-anime='{ "el": "childs", "opacity": [0, 1], "duration": 600, "delay": 0, "staggervalue": 300, "easing": "easeOutQuad" }'>
              </div>
            </div>
        </section>
        <!-- end section -->
@endsection