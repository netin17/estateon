<div class="container">
                <div class="row">
                    <div class="footer-logo-col col-md-4 mb-md-0 mb-5">
                        <div class="pe-lg-5">
                            <div class="site-logo">
                                <img src="{{ url('estate/images/footer-logo.png')}}" alt="logo" class="w-100" />
                            </div>
                            <p style="font-size: 14px; color: #fff;">We’re reimagining how you buy, sell and rent. It’s
                                now
                                easier to get
                                into a place you love.
                                So let’s do this, together</p>
                        </div>
                    </div>
                    <div class="footer-link-col col-md-2 footer-link mb-md-0 mb-5">
                        <ul class="footer-link-list">
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('page.aboutus') }}">About Us</a></li>
                            <li><a href="{{ route('page.tandc') }}">Terms & Conditions</a></li>
                            <li><a href="{{ route('page.faq') }}">FAQs</a></li>
                        </ul>
                    </div>
                    <div class="footer-sub-link-col col-md-3 mb-md-0 mb-5">
                        <ul class="footer-link-list">
                            <li><a href="{{route('property.list')}}">Properties</a></li>
                            <li><a href="/">Explore Our Builders</a></li>
                            @auth('frontuser')
                            <li><a href="{{ route('frontuser.property.create') }}">Post Property Now </a></li>
                            @endauth
                            <li><a href="/">Create Your Builder Profile</a></li>
                        </ul>
                    </div>
                    <div class="footer-social-link-col col-md-3 ps-xl-5 mb-md-0 mb-2">
                        <span class="d-block mb-4 footer-col-title">Follow Us</span>
                        <ul class="social-link-list d-flex">
                            <li><a href="https://www.instagram.com/estateonofficial/"><img src="{{ url('estate/images/instagram.svg')}}" alt=""></a></li>
                            <li><a href="https://twitter.com/EstateOn_"><img src="{{ url('estate/images/twitter.svg')}}" alt=""></a></li>
                            <li><a href="https://www.linkedin.com/company/estateon"><img src="{{ url('estate/images/linkedin.svg')}}" alt=""></a></li>
                            <li><a href="https://facebook.com/EstateOnOfficial"><img src="{{ url('estate/images/fb.svg')}}" alt=""></a></li>
                        </ul>
                    </div>
                </div>
                <div class="text-center copyright-text mt-5">
                    Copyright@2023 All Rights Resaved By Estateon
                </div>
            </div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<script src="https://kit.fontawesome.com/1625cb88aa.js" crossorigin="anonymous"></script>
<script src="{{ url('estate/js/min/jquery-3.4.1.min.js')}}" integrity="" crossorigin="anonymous"></script>
<script src="{{ url('estate/js/popper.min.js')}}"></script>
<script src="{{ url('estate/js/bootstrap.min.js')}}"></script>
<script src="{{ url('estate/js/slick.js')}}"></script>
<script src="{{ url('estate/js/wow.min.js')}}"></script>
<script src="{{ url('estate/js/min/main-min.js')}}"></script>
<script src="{{ url('estate/js/main.js')}}"></script>