@extends('frontend.layouts.app2')
@section('content')
<!-- start page title -->
<section class="ipad-top-space-margin bg-dark-gray cover-background page-title-big-typography" style="background-image: url(http://cavemanswipefile.com/images/register/half-bg.jpg)">
            <div class="background-position-center-top h-100 w-100 position-absolute left-0px top-0" style="background-image: url('images/register/vertical-line-bg-small.svg')"></div>
            <div id="particles-style-01" class="h-100 position-absolute left-0px top-0 w-100" data-particle="true" data-particle-options='{"particles": {"number": {"value": 8,"density": {"enable": true,"value_area": 2000}},"color": {"value": ["#d5d52b", "#d5d52b", "#d5d52b", "#d5d52b", "#d5d52b"]},"shape": {"type": "circle","stroke":{"width":0,"color":"#000000"}},"opacity": {"value": 1,"random": false,"anim": {"enable": false,"speed": 1,"sync": false}},"size": {"value": 8,"random": true,"anim": {"enable": false,"sync": true}},"line_linked":{"enable":false,"distance":0,"color":"#ffffff","opacity":1,"width":1},"move": {"enable": true,"speed":1,"direction": "right","random": false,"straight": false}},"interactivity": {"detect_on": "canvas","events": {"onhover": {"enable": false,"mode": "repulse"},"onclick": {"enable": false,"mode": "push"},"resize": true}},"retina_detect": false}'></div>
            <div class="container">
                <div class="row align-items-center extra-small-screen">
                    <div class="col-xl-6 col-lg-7 col-md-8 col-sm-9 position-relative page-title-extra-small" data-anime='{ "el": "childs", "translateY": [-15, 0], "perspective": [1200,1200], "scale": [1.1, 1], "rotateX": [50, 0], "opacity": [0,1], "duration": 800, "delay": 200, "staggervalue": 300, "easing": "easeOutQuad" }'>
                        <h1 class="mb-20px alt-font style1">Caveman Swipe File</h1>
                        <h2 class="fw-500 m-0 ls-minus-2px alt-font style1">Get Started...</h2>
                    </div>
                </div>
            </div>
    </section>
        <!-- end page title -->
    <section class="register section-padding">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-12 col-xs-12">
            <div class="register-form login-area">
              <h3>
                Register Here
              </h3>
              <form class="login-form">
                <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-user"></i>
                    <input type="text" id="Name" class="form-control" name="email" placeholder="Username">
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-envelope"></i>
                    <input type="text" id="sender-email" class="form-control" name="email" placeholder="Email Address">
                  </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-lock"></i>
                    <input type="password" class="form-control" placeholder="Password">
                  </div>
                </div>  
                <div class="form-group">
                  <div class="input-icon">
                    <i class="lni-lock"></i>
                    <input type="password" class="form-control" placeholder="Retype Password">
                  </div>
                </div>  
                <div class="form-group mb-3">
                  <div class="checkbox">
                    <input type="checkbox" name="rememberme" value="rememberme">
                    <label>By registering, you accept our Terms & Conditions</label>
                  </div>
                </div>   
                <div class="text-center">
                  <button class="btn btn-common log-btn">Click To Register</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection