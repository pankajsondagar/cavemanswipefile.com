<!-- start footer -->
<footer class="bg-gradient-aztec-green position-relative">
            <div class="position-absolute left-minus-100px top-25px">
                <img src="" alt="" class="w-80">
            </div>
            <div class="background-position-center-top h-100 w-100 position-absolute left-0px top-0" style="background-image: url('images/vertical-line-bg-small.svg')"></div>
            <div class="container overlap-section">
                <div class="r">
              </div>
            </div>
            <div class="container footer-dark text-center text-sm-start position-relative"> 
                <div class="row mb-5 sm-mb-7 xs-mb-30px">
                    <!-- start footer column -->
                    <div class="col-lg-3 col-md-4 col-sm-6 d-flex flex-column last-paragraph-no-margin md-mb-40px xs-mb-30px">
                        <a href="index-temp.html" class="footer-logo mb-15px d-inline-block">
                            <img src="images/misc/Cave-File-L.png" data-at2x="images/misc/Cave-File-L.png" alt="">
                        </a>
                        <p class="lh-28">Providing High-Quality In Demand Swipe Files.</p>
                        <div class="elements-social social-text-style-01 mt-9 xs-mt-15px">
                            <ul class="small-icon light fw-500">
                          </ul>
                        </div>
                    </div>
                    <!-- end footer column -->  
                    <!-- start footer column -->
                    <div class="col-lg-3 col-md-4 col-sm-6 ps-4 last-paragraph-no-margin md-mb-40px xs-mb-30px"> 
                        <span class="mb-10px d-block fs-18 fw-500 style1"><strong>Popular Swipe Files</strong></span>
                        <ul>
                            <li><a href="{{ route('list') }}">Astrology</a></li>
                            <li><a href="{{ route('list') }}">Real Estate</a></li>
                            <li><a href="{{ route('list') }}">Martial Arts</a></li>
                            <li><a href="{{ route('list') }}">Health & Nutrition</a></li>
							<li><a href="{{ route('list') }}">Swipe List</a></li>
                        </ul> 
                  </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-lg-3 col-md-4 col-sm-6 last-paragraph-no-margin xs-mb-30px"> 
                        <span class="fw-500 fs-18 d-block text-white mb-10px"></span>
                        <span class="lh-26 d-block"></span>
                        <span class="text-white d-block mb-10px"><span class="bg-base-color fw-700 text-dark-gray lh-22 text-uppercase border-radius-30px ps-10px pe-10px fs-11 ms-5px d-inline-block align-middle"></span></span>
                        <span class="lh-26 d-block"></span>
                        @foreach(@$pages as $value)
                            <span class="d-block mb-10px style2"><a href="{{ route('page',['slug' => $value->slug ]) }}">{{ @$value->title }}</a></span>
                        @endforeach
                    </div>
                    <!-- end footer column -->
                    <!-- start footer column -->
                    <div class="col-lg-3 col-md-12 col-sm-6 text-md-center text-lg-start">
                        <span class="fs-18 fw-500 d-block text-white mb-20px">Subscribe To Our Newsletter</span> 
                        <div class="d-inline-block w-100 newsletter-style-02 position-relative mb-15px">
                            <form action="email-templates/subscribe-newsletter.php" method="post" class="position-relative w-100">
                                <input class="input-small bg-dark-gray border-color-transparent-white-light w-100 fs-14 form-control required" type="email" name="email" placeholder="Enter your email...">
                                <input type="hidden" name="redirect" value="">
                                <button type="submit" aria-label="submit" class="btn pe-20px text-white fs-13 fw-500 lg-ps-15px lg-pe-15px submit">Submit<span><img src="images/misc/right-arrow-BB.jpg" alt=""></i></span></button>
                                <div class="form-results border-radius-4px pt-5px pb-5px ps-15px pe-15px fs-14 lh-22 mt-10px w-100 text-center position-absolute d-none"></div>
                            </form>
                        </div>
                        <div class="d-flex align-items-center justify-content-center justify-content-md-center justify-content-sm-start justify-content-lg-start fs-14">
                            <div class="d-inline-block"><span class="style1">Protecting your privacy.<br>
                            We will never spam you<br>
                            or sell your information.</span></div> 
                        </div>
                    </div>
                    <!-- end footer column -->
                </div> 
                <div class="row align-items-center footer-bottom border-top border-color-transparent-white-light pt-30px g-0">
                    <!-- start footer menu -->
                    <div class="col-xl-7 ps-0 text-center text-xl-start lg-mb-10px"> 
                        <ul class="footer-navbar fs-16 lh-normal"> 
                            <li class="nav-item active"><a href="{{ route('home') }}" class="nav-link ps-0">Home</a></li>
							<li class="nav-item"><a href="{{ route('affiliates') }}" class="nav-link">Affiliates</a></li>
                            <li class="nav-item"><a href="{{ route('mentors') }}" class="nav-link">Mentors</a></li>
                            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                           <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
                        </ul>
                    </div> 
                    <!-- end footer menu -->
                     <!-- start copyright -->
                    <div class="col-xl-5 last-paragraph-no-margin text-center text-xl-end">
                        <p align="center" class="style5"> <span class="style1">&copy; Copyright 2023-<script type="text/javascript">
  document.write(new Date().getFullYear());
</script></span><span class="style4"> - <a href="cavemanswipefile.com" target="_blank">Crafted with Love. Caveman Swipe Files. All Rights Reserved.</a></span><br>
</p>
                    </div>
                    <!-- end copyright -->
                </div>
            </div> 
        </footer>
        <!-- end footer -->
        <!-- start scroll progress -->
        <div class="scroll-progress d-none d-xxl-block">
            <a href="#" class="scroll-top" aria-label="scroll">
                <span class="scroll-text">Scroll</span><span class="scroll-line"><span class="scroll-point"></span></span>
            </a>
        </div>
        <!-- end scroll progress -->
        <!-- javascript libraries -->