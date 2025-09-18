<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<footer class="rbt-footer footer-style-1 bg-color-white overflow-hidden">
    <div class="footer-top">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="footer-widget">
                        <div class="logo logo-dark">
                            <a href="{{ route('mainDemo') }}">
                                <img src="{{ asset('assets/images/coachFitra/logo-sekolah-kaya-trspnt.webp') }}"
                                    alt="Edu-cause">
                            </a>
                        </div>
                        <div class="logo d-none logo-light">
                            <a href="{{ route('mainDemo') }}">
                                <img src="{{ asset('assets/images/coachFitra/logo-sekolah-kaya-trspnt.webp') }}"
                                    alt="Edu-cause">
                            </a>
                        </div>

                        <p class="description mt--20">The Best Bisnis Ecourse Yang Pernah Ada
                        </p>



                        <div class="contact-btn mt--30">
                            <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round"
                                href="{{ route('contact') }}">
                                <div class="icon-reverse-wrapper">
                                    <span class="btn-text">Contact With Us</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <nav class="mainmenu-nav">
                        <ul class="nav-menu-footer">
                            {{-- Home Menu --}}
                            <li>
                                <a href="{{ route('mainDemo') }}" class="nav-link">Home</a>
                            </li>

                            {{-- Courses Menu --}}
                            <li>
                                <a href="{{ route('courseWithTab') }}" class="nav-link">Courses</a>
                            </li>

                            {{-- Courses Menu --}}
                            <li>
                                <a href="https://ecourse.sekolahkaya.com/dashboard" class="nav-link">My Courses</a>
                            </li>

                            {{-- Courses Menu --}}
                            <li>
                                <a href="{{ route('aboutus01') }}" class="nav-link">About</a>
                            </li>

                            {{-- Courses Menu --}}
                            <li>
                                <a href="{{ route('contact') }}" class="nav-link">Contact</a>
                            </li>
                        </ul>
                    </nav>

                    {{-- style --}}
                    <style>
                        .nav-menu-footer {
                            gap: 30px;
                            list-style: none;
                            justify-content: flex-end;
                            align-items: center;
                            margin: 20px;
                        }
                    </style>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <h4 style="text-align: center;">Temukan Kami di Sosial Media</h4>
                    <ul class="social-icon social-default justify-content-around">
                        <li>
                            <a href="https://www.tiktok.com/@sekolahkaya?_t=ZS-8wYaL69rtWD&_r=1">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </li>
                        <li><a href="https://www.instagram.com/sekolahkaya.id?igsh=eHNjNHNoNXoxaG1q">
                                <i class="feather-instagram"></i>
                            </a>
                        </li>
                        <li><a href="https://www.facebook.com/profile.php?id=61576626926556">
                                <i class="feather-facebook"></i>
                            </a>
                        </li>
                        <li><a href="https://t.me/+0dHO0KdBP0g0MzY1">
                                <i class="feather-message-circle"></i>
                            </a>
                        </li>
                        <li><a href="https://www.instagram.com/fitra.saleh?igsh=bXM3anBkaXhjNXp4">
                                <i class="feather-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </div>
    <div class="rbt-separator-mid">
        <div class="container">
            <hr class="rbt-separator m-0">
        </div>
    </div>
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-style-1 ptb--20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <p class="rbt-link-hover text-center text-lg-start">Copyright © 2025 <span
                            style="color: rgb(14, 0, 209);">Sekolah Kaya</span> All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->
</footer>
