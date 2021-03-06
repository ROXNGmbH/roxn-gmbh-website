<footer class="main">
    <section class="section-padding footer-mid">
        <div class="container pt-15 pb-20">
            <div class="row">
                <div class="col">
                    <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                        <div class="logo">
                            <a href="/" ><img class="w-50" src="{{asset('images/logo-main.png')}}" alt="logo" /></a>
                        </div>
                        <ul class="contact-infor">
                            <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                            <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Call Us:</strong><span>(+91) - 540-025-124553</span></li>
                            <li><img src="assets/imgs/theme/icons/icon-email-2.svg" alt="" /><strong>Email:</strong><span>sale@Nest.com</span></li>
                            <li><img src="assets/imgs/theme/icons/icon-clock.svg" alt="" /><strong>Hours:</strong><span>10:00 - 18:00, Mon - Sat</span></li>
                        </ul>
                    </div>
                </div>
                <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                        <h4 class="widget-title">Pages</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="{{route('contact_us.index')}}">Contact Us</a></li>
                    @foreach($pages as $page)
                    <li><a href="/pages/{{$page->slug}}">{{$page->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                <h4 class="widget-title">{{__('home.Account')}}</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="#">Sign In</a></li>
                    <li><a href="#">View Cart</a></li>
                </ul>
            </div>
            <div class="footer-link-widget col wow animate__animated animate__fadeInUp" data-wow-delay=".4s">
                <h4 class="widget-title">{{__('home.Popular')}}</h4>
                <ul class="footer-list mb-sm-5 mb-md-0">
                    <li><a href="#">Milk & Flavoured Milk</a></li>
                    <li><a href="#">Butter and Margarine</a></li>
                    <li><a href="#">Eggs Substitutes</a></li>
                    <li><a href="#">Marmalades</a></li>
                    <li><a href="#">Sour Cream and Dips</a></li>
                    <li><a href="#">Tea & Kombucha</a></li>
                    <li><a href="#">Cheese</a></li>
                </ul>
            </div>
            <div class="footer-link-widget widget-install-app col wow animate__animated animate__fadeInUp" data-wow-delay=".5s">
                <h4 class="widget-title">Install App</h4>
                <p class="">From App Store or Google Play</p>
                <div class="download-app">
                    <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active" src="{{asset('assets/user/imgs/theme/app-store.jpg')}}" alt="" /></a>
                    <a href="#" class="hover-up mb-sm-2"><img src="{{asset('assets/imgs/theme/google-play.jpg')}}" alt="" /></a>
                </div>
                <p class="mb-20">Secured Payment Gateways</p>
                <img class="" src="{{asset('assets/user/imgs/theme/payment-method.png')}}" alt="" />
            </div>
        </div>
    </section>
    <div class="container pb-30 wow animate__animated animate__fadeInUp" data-wow-delay="0">
        <div class="row align-items-center">
            <div class="col-12 mb-30">
                <div class="footer-bottom"></div>
            </div>
            <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                <div class="hotline d-lg-inline-flex mr-30">
                    <img src="{{asset('assets/user/imgs/theme/icons/phone-call.svg')}}" alt="hotline" />
                    <p>1900 - 6666<span>Working 8:00 - 22:00</span></p>
                </div>
                <div class="hotline d-lg-inline-flex">
                    <img src="{{asset('assets/user/imgs/theme/icons/phone-call.svg')}}" alt="hotline" />
                    <p>1900 - 8888<span>24/7 Support Center</span></p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                <div class="mobile-social-icon">
                    <h6>{{__('home.Follow Us')}}</h6>
                    <a href="#"><img src="{{asset('assets/user/imgs/theme/icons/icon-facebook-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('assets/user/imgs/theme/icons/icon-twitter-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('assets/user/imgs/theme/icons/icon-instagram-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('assets/user/imgs/theme/icons/icon-pinterest-white.svg')}}" alt="" /></a>
                    <a href="#"><img src="{{asset('assets/user/imgs/theme/icons/icon-youtube-white.svg')}}" alt="" /></a>
                </div>
                <p class="font-sm">Up to 15% discount on your first subscribe</p>
            </div>
        </div>
    </div>
</footer>
