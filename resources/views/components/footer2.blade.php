<footer class="rbt-footer footer-style-1">
    <div class="footer-top">
        <div class="container">
            <div class="row row--15 mt_dec--30">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <div class="logo logo-dark">
                            <a href="#">
                                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Edu-cause">
                            </a>
                        </div>
                        <div class="logo d-none logo-light">
                            <a href="#">
                                <img src="{{ asset('assets/images/dark/logo/logo-light.png') }}" alt="Edu-cause">
                            </a>
                        </div>

                        <p class="description mt--20">We’re always in search for talented
                            and motivated people. Don’t be shy introduce yourself!
                        </p>

                        <div class="contact-btn mt--30">
                            <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round" href="#">
                                <div class="icon-reverse-wrapper">
                                    <span class="btn-text">Contact With Us</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <h5 class="ft-title">Useful Links</h5>
                        <ul class="ft-link">
                            <li>
                                <a href="{{ route('marketplace') }} ">Marketplace</a>
                            </li>
                            <li>
                                <a href="{{ route('kindergarten') }}">kindergarten</a>
                            </li>
                            <li>
                                <a href="{{ route('universityClassic') }}">University</a>
                            </li>
                            <li>
                                <a href="{{ route('gymCoaching') }}">GYM Coaching</a>
                            </li>
                            <li>
                                <a href="{{ route('faqs') }}">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <h5 class="ft-title">Our Company</h5>
                        <ul class="ft-link">
                            <li>
                                <a href="{{ route('contact') }}">Contact Us</a>
                            </li>
                            <li>
                                <a href="{{ route('becomeTeacher') }}">Become Teacher</a>
                            </li>
                            <li>
                                <a href="{{ route('eventList') }}">Events</a>
                            </li>
                        </ul>
                    </div>
                </div>

               
            </div>
        </div>
    </div>
</footer>