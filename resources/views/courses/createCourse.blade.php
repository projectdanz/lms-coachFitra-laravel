@extends('layout.layout')

@php
     $topToBottom='true';
@endphp

@section('content')

    <!-- Mobile Menu Section -->
    <div class="popup-mobile-menu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="content">
                    <div class="logo">
                        <div class="logo logo-dark">
                            <a href="#">
                                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Education Logo Images">
                            </a>
                        </div>

                        <div class="logo d-none logo-light">
                            <a href="#">
                                <img src="{{ asset('assets/images/dark/logo/logo-light.png') }}" alt="Education Logo Images">
                            </a>
                        </div>
                    </div>
                    <div class="rbt-btn-close">
                        <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
                <p class="description">Histudy is a education website template. You can customize all.</p>
                <ul class="navbar-top-left rbt-information-list justify-content-start">
                    <li>
                        <a href="mailto:hello@example.com"><i class="feather-mail"></i>example@gmail.com</a>
                    </li>
                    <li>
                        <a href="#"><i class="feather-phone"></i>(302) 555-0107</a>
                    </li>
                </ul>
            </div>

            <nav class="mainmenu-nav">
                <ul class="mainmenu">
                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">Home <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu menu-skin-dark">
                            <div class="wrapper">
                                <div class="row row--15 home-plesentation-wrapper single-dropdown-menu-presentation">

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('mainDemo') }}"><img src="{{ asset('assets/images/splash/demo/h1.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('mainDemo') }}">Home Demo <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('marketplace') }}"><img src="{{ asset('assets/images/splash/demo/h12.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('marketplace') }}">Marketplace <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('kindergarten') }}"><img src="{{ asset('assets/images/splash/demo/h4.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('kindergarten') }}">kindergarten <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('universityClassic') }}"><img src="{{ asset('assets/images/splash/demo/h13.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('universityClassic') }}">University Classic <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('homeElegant') }}"><img src="{{ asset('assets/images/splash/demo/h14.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('homeElegant') }}">Home Elegant <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('gymCoaching') }}"><img src="{{ asset('assets/images/splash/demo/h9.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('gymCoaching') }}">Gym Coaching <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('onlineSchool') }}"><img src="{{ asset('assets/images/splash/demo/h3.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('onlineSchool') }}">Online School <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('universityStatus') }}"><img src="{{ asset('assets/images/splash/demo/h6.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('universityStatus') }}">University Status <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('homeTechnology') }}"><img src="{{ asset('assets/images/splash/demo/h15.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('homeTechnology') }}">Home Technology <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('instructorPortfolio') }}"><img src="{{ asset('assets/images/splash/demo/h7.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('instructorPortfolio') }}">Instructor Portfolio <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('languageAcademy') }}"><img src="{{ asset('assets/images/splash/demo/h8.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('languageAcademy') }}">Language Academy <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('singleCourse') }}"><img src="{{ asset('assets/images/splash/demo/h11.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('singleCourse') }}">Single Course <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('onlineCourse') }}"><img src="{{ asset('assets/images/splash/demo/h10.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('onlineCourse') }}">Online Course <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('classicLms') }}"><img src="{{ asset('assets/images/splash/demo/h5.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('classicLms') }}">Classic Lms <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('courseSchool') }}"><img src="{{ asset('assets/images/splash/demo/h2.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('courseSchool') }}">Course School <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('udemyAffiliate') }}"><img src="{{ asset('assets/images/splash/demo/h16.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('udemyAffiliate') }}">Udemy Affiliate <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('onlineAcademy') }}"><img src="{{ asset('assets/images/splash/demo/h17.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('onlineAcademy') }}">Online Academy <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('instructorsCoaches') }}"><img src="{{ asset('assets/images/splash/demo/h18.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('instructorsCoaches') }}">Instructor Coaches <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('modernUniversity') }}"><img src="{{ asset('assets/images/splash/demo/h19.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('modernUniversity') }}">Modern University <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('multilingual') }}"><img src="{{ asset('assets/images/splash/demo/h20.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('multilingual') }}">Multilingual <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('artDesignSchool') }}"><img src="{{ asset('assets/images/splash/demo/h21.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('artDesignSchool') }}">Art Design School <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('wishlist') }}"><img src="{{ asset('assets/images/splash/demo/h22.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('wishlist') }}">Wishlist <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('coaching') }}"><img src="{{ asset('assets/images/splash/demo/h23.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('coaching') }}">Coaching <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('healthWellnessInstitute') }}"><img src="{{ asset('assets/images/splash/demo/h24.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('healthWellnessInstitute') }}">Health Institute <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('lifeCoach') }}"><img src="{{ asset('assets/images/splash/demo/h25.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('lifeCoach') }}">Life Coach <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('islamicCenter') }}"><img src="{{ asset('assets/images/splash/demo/h26.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('islamicCenter') }}">Islamic Center <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                </div>

                                <div class="load-demo-btn-wrap">
                                    <div class="load-demo-btn text-center">
                                        <span class="color-white b3">Scroll to view more <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                              </svg></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="with-megamenu has-menu-child-item">
                        <a href="#">Courses <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-2">
                            <div class="wrapper">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mega-top-banner">
                                            <div class="content">
                                                <h4 class="title">Developer hub</h4>
                                                <p class="description">Start building fast, with code samples, key resources and more.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row--15">
                                    <div class="col-lg-12 col-xl-6 col-xxl-6 single-mega-item">
                                        <h3 class="rbt-short-title">Course Layout</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('courseFilterOneToggle') }}">Filter One Toggle</a></li>
                                            <li><a href="{{ route('courseFilterOneOpen') }}">Filter One Open</a></li>
                                            <li><a href="{{ route('courseFilterTwoToggle') }}">Filter Two Toggle</a></li>
                                            <li><a href="{{ route('courseFilterTwoOpen') }}">Filter Two Open</a></li>
                                            <li><a href="{{ route('courseWithTab') }}">Course With Tab</a></li>
                                            <li><a href="{{ route('courseWithTabTwo') }}">Course With Tab Two</a></li>
                                            <li><a href="{{ route('courseCard2') }}">Course Card Two</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 col-xl-6 col-xxl-6 single-mega-item">
                                        <h3 class="rbt-short-title">Course Layout</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('courseCard3') }}">Course Card Three</a></li>
                                            <li><a href="{{ route('courseMasonry') }}">Course Masonry</a></li>
                                            <li><a href="{{ route('courseWithSidebar') }}">Course With Sidebar</a></li>
                                            <li><a href="{{ route('courseDetails') }}">Course Details</a></li>
                                            <li><a href="{{ route('courseDetails2') }}">Course Details Two</a></li>
                                            <li><a href="{{ route('lesson') }}">Course Lesson <span class="rbt-badge-card">New</span></a></li>
                                            <li><a href="{{ route('createCourse') }}">Create Course <span class="rbt-badge-card">New</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="nav-quick-access">
                                            <li><a href="#"><i class="feather-folder-minus"></i> Quick Start Guide</a></li>
                                            <li><a href="#"><i class="feather-folder-minus"></i> For Open Source</a></li>
                                            <li><a href="#"><i class="feather-folder-minus"></i> API Status</a></li>
                                            <li><a href="#"><i class="feather-folder-minus"></i> Support</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="has-dropdown has-menu-child-item">
                        <a href="#">Dashboard
                            <i class="feather-chevron-down"></i>
                        </a>
                        <ul class="submenu">
                            <li class="has-dropdown"><a href="#">Instructor Dashboard</a>
                                <ul class="submenu">
                                    <li><a href="{{ route('instructorDashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('instructorProfile') }}">Profile</a></li>
                                    <li><a href="{{ route('instructorEnrolledCourses') }}">Enrolled Courses</a></li>
                                    <li><a href="{{ route('instructorWishlist') }}">Wishlist</a></li>
                                    <li><a href="{{ route('instructorReviews') }}">Reviews</a></li>
                                    <li><a href="{{ route('instructorMyQuizAttempts') }}">My Quiz Attempts</a></li>
                                    <li><a href="{{ route('instructorOrderHistory') }}">Order History</a></li>
                                    <li><a href="{{ route('instructorCourse') }}">My Course</a></li>
                                    <li><a href="{{ route('instructorAnnouncements') }}">Announcements</a></li>
                                    <li><a href="{{ route('instructorQuizAttempts') }}">Quiz Attempts</a></li>
                                    <li><a href="{{ route('instructorAssignments') }}">Assignments</a></li>
                                    <li><a href="{{ route('instructorSettings') }}">Settings</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown"><a href="#">Student Dashboard</a>
                                <ul class="submenu">
                                    <li><a href="{{ route('studentDashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('studentProfile') }}">Profile</a></li>
                                    <li><a href="{{ route('studentEnrolledCourses') }}">Enrolled Courses</a></li>
                                    <li><a href="{{ route('studentWishlist') }}">Wishlist</a></li>
                                    <li><a href="{{ route('studentReviews') }}">Reviews</a></li>
                                    <li><a href="{{ route('studentMyQuizAttempts') }}">My Quiz Attempts</a></li>
                                    <li><a href="{{ route('studentOrderHistory') }}">Order History</a></li>
                                    <li><a href="{{ route('studentSettings') }}">Settings</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">Pages <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-4">
                            <div class="wrapper">
                                <div class="row row--15">
                                    <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item">
                                        <h3 class="rbt-short-title">Get Started</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('aboutus01') }}">About Us</a></li>
                                            <li><a href="{{ route('aboutus02') }}">About Us 02</a></li>
                                            <li><a href="{{ route('eventGrid') }}">Event Grid</a></li>
                                            <li><a href="{{ route('eventList') }}">Event List</a></li>
                                            <li><a href="{{ route('eventSidebar') }}">Event Sidebar</a></li>
                                            <li><a href="{{ route('eventDetails') }}">Event Details</a></li>
                                            <li><a href="{{ route('academyGallery') }}">Academy Gallery</a></li>
                                            <li><a href="{{ route('admissionGuide') }}">Admission Guide</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item">
                                        <h3 class="rbt-short-title">Get Started</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('profile') }}">Profile</a></li>
                                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                            <li><a href="{{ route('becomeTeacher') }}">Become a Teacher</a></li>
                                            <li><a href="{{ route('instructor') }}">Instructor</a></li>
                                            <li><a href="{{ route('faqs') }}">FAQS</a></li>
                                            <li><a href="{{ route('privacyPolicy') }}">Privacy Policy</a></li>
                                            <li><a href="{{ route('pageError') }}">404 Page</a></li>
                                            <li><a href="{{ route('maintenance') }}">Maintenance</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item">
                                        <h3 class="rbt-short-title">Shop Pages</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('shop') }}">Shop <span class="rbt-badge-card">Sale Anything</span></a></li>
                                            <li><a href="{{ route('singleProduct') }}">Single Product</a></li>
                                            <li><a href="{{ route('cart') }}">Cart Page</a></li>
                                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                            <li><a href="{{ route('wishlist') }}">Wishlist Page</a></li>
                                            <li><a href="{{ route('myAccount') }}">My Acount</a></li>
                                            <li><a href="{{ route('login') }}">Login & Register</a></li>
                                            <li><a href="{{ route('subscription') }}">Subscription</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item">
                                        <div class="mega-category-item">
                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <div class="image"><img src="{{ asset('assets/images/course/category-2.png') }}" alt="Course images"></div>
                                                    <a href="{{ route('courseFilterOneToggle') }}">
                                                        <span>Online Education</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <div class="image"><img src="{{ asset('assets/images/course/category-1.png') }}" alt="Course images"></div>
                                                    <a href="{{ route('courseFilterOneToggle') }}">
                                                        <span>Language Club</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <div class="image"><img src="{{ asset('assets/images/course/category-4.png') }}" alt="Course images"></div>
                                                    <a href="{{ route('courseFilterOneToggle') }}">
                                                        <span>University Status</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <a href="{{ route('courseFilterOneToggle') }}">
                                                        <span>Course School</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <div class="image"><img src="{{ asset('assets/images/course/category-9.png') }}" alt="Course images"></div>
                                                    <a href="{{ route('courseFilterOneToggle') }}">
                                                        <span>Academy</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">Elements <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-3">
                            <div class="wrapper">
                                <div class="row row--15 single-dropdown-menu-presentation">
                                    <div class="col-lg-4 col-xxl-4 single-mega-item">
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('styleGuide') }}">Style Guide <span class="rbt-badge-card">Hot</span></a></li>
                                            <li><a href="{{ route('accordion') }}">Accordion</a></li>
                                            <li><a href="{{ route('advancetab') }}">Advance Tab</a></li>
                                            <li><a href="{{ route('about') }}">About <span class="rbt-badge-card">New</span></a></li>
                                            <li><a href="{{ route('brand') }}">Brand</a></li>
                                            <li><a href="{{ route('button') }}">Button</a></li>
                                            <li><a href="{{ route('badge') }}">Badge</a></li>
                                            <li><a href="{{ route('card') }}">Card</a></li>
                                            <li><a href="#">& More Coming</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-4 col-xxl-4 single-mega-item">
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('callToAction') }}">Call To Action</a></li>
                                            <li><a href="{{ route('counterup') }}">Counter</a></li>
                                            <li><a href="{{ route('category') }}">Categories</a></li>
                                            <li><a href="{{ route('header') }}">Header Style</a></li>
                                            <li><a href="{{ route('newsletter') }}">Newsletter</a></li>
                                            <li><a href="{{ route('team') }}">Team</a></li>
                                            <li><a href="{{ route('social') }}">Social</a></li>
                                            <li><a href="{{ route('listStyle') }}">List Style</a></li>
                                            <li><a href="#">& More Coming</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-4 col-xxl-4 single-mega-item">
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                            <li><a href="{{ route('pricing') }}">Pricing</a></li>
                                            <li><a href="{{ route('progressbar') }}">Progressbar</a></li>
                                            <li><a href="{{ route('testimonial') }}">Testimonial</a></li>
                                            <li><a href="{{ route('service') }}">Service</a></li>
                                            <li><a href="{{ route('split') }}">Split Area</a></li>
                                            <li><a href="{{ route('search') }}">Search Style</a></li>
                                            <li><a href="{{ route('instagram') }}">Instagram Style</a></li>
                                            <li><a href="#">& More Coming</a></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="btn-wrapper">
                                            <a class="rbt-btn btn-gradient hover-icon-reverse square btn-xl w-100 text-center mt--30 hover-transform-none" href="#">
                                                <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Visit Histudy Template</span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">Blog <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-3">
                            <div class="wrapper">
                                <div class="row row--15">
                                    <div class="col-lg-12 col-xl-4 col-xxl-4 single-mega-item">
                                        <h3 class="rbt-short-title">Blog Styles</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('blogList') }}">Blog List</a></li>
                                            <li><a href="{{ route('blog') }}">Blog Grid</a></li>
                                            <li><a href="{{ route('blogGridMinimal') }}">Blog Grid Minimal</a></li>
                                            <li><a href="{{ route('blogWithSidebar') }}">Blog With Sidebar</a></li>
                                            <li><a href="{{ route('blogDetails') }}">Blog Details</a></li>
                                            <li><a href="{{ route('postFormatStandard') }}">Post Format Standard</a></li>
                                            <li><a href="{{ route('postFormatGallery') }}">Post Format Gallery</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-12 col-xl-4 col-xxl-4 single-mega-item">
                                        <h3 class="rbt-short-title">Get Started</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('postFormatQuote') }}">Post Format Quote</a></li>
                                            <li><a href="{{ route('postFormatAudio') }}">Post Format Audio</a></li>
                                            <li><a href="{{ route('postFormatVideo') }}">Post Format Video</a></li>
                                            <li><a href="#">Media Under Title <span class="rbt-badge-card">Coming</span></a></li>
                                            <li><a href="#">Sticky Sidebar <span class="rbt-badge-card">Coming</span></a></li>
                                            <li><a href="#">Auto Masonry <span class="rbt-badge-card">Coming</span></a></li>
                                            <li><a href="#">Meta Overlaid <span class="rbt-badge-card">Coming</span></a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-12 col-xl-4 col-xxl-4 single-mega-item">
                                        <div class="rbt-ads-wrapper">
                                            <a class="d-block" href="#"><img src="{{ asset('assets/images/service/mobile-cat.jpg') }}" alt="Education Images"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>
                </ul>
            </nav>

            <div class="mobile-menu-bottom">
                <div class="rbt-btn-wrapper mb--20">
                    <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center" href="#">
                        <span>Enroll Now</span>
                    </a>
                </div>

                <div class="social-share-wrapper">
                    <span class="rbt-short-title d-block">Find With Us</span>
                    <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                        <li><a href="https://www.facebook.com/">
                                <i class="feather-facebook"></i>
                            </a>
                        </li>
                        <li><a href="https://www.twitter.com">
                                <i class="feather-twitter"></i>
                            </a>
                        </li>
                        <li><a href="https://www.instagram.com/">
                                <i class="feather-instagram"></i>
                            </a>
                        </li>
                        <li><a href="https://www.linkdin.com/">
                                <i class="feather-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- Start Side Vav -->
    <x-sideVav/>
    <!-- End Side Vav -->

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <main class="rbt-main-wrapper">

        <div class="rbt-create-course-area bg-color-white rbt-section-gap">
            <div class="container">
                <div class="row g-5">

                    <div class="col-lg-8">
                        <div class="rbt-accordion-style rbt-accordion-01 rbt-accordion-06 accordion">
                            <div class="accordion" id="tutionaccordionExamplea1">
                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="accOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseOne" aria-expanded="true" aria-controls="accCollapseOne">Course Info
                                        </button>
                                    </h2>
                                    <div id="accCollapseOne" class="accordion-collapse collapse show" aria-labelledby="accOne" data-bs-parent="#tutionaccordionExamplea1">
                                        <div class="accordion-body card-body">
                                            <!-- Start Course Field Wrapper  -->
                                            <div class="rbt-course-field-wrapper rbt-default-form">
                                                <div class="course-field mb--15">
                                                    <label for="field-1">Course Title</label>
                                                    <input id="field-1" type="text" placeholder="New Course">
                                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> Title
                                                        should be 30 charecter.</small>
                                                </div>
                                                <div class="course-field mb--15">
                                                    <label for="field-2">Course Slug</label>
                                                    <input id="field-2" type="text" placeholder="new-course">
                                                    <small class="d-block mt_dec--5"><i class="feather-info"></i>
                                                        Permalink: <a href="https://yourdomain.com/new-course">https://yourdomain.com/new-course</a></small>
                                                </div>

                                                <div class="course-field mb--15">
                                                    <label for="aboutCourse">About Course</label>
                                                    <textarea id="aboutCourse" rows="10"></textarea>
                                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> HTML
                                                        or plain text allowed, no emoji This field is used for search,
                                                        so please be descriptive!</small>
                                                </div>

                                                <div class="course-field mb--15 edu-bg-gray">
                                                    <h6>Course Settings</h6>
                                                    <div class="rbt-course-settings-content">
                                                        <div class="row g-5">
                                                            <div class="col-lg-4">
                                                                <div class="advance-tab-button advance-tab-button-1">
                                                                    <ul class="rbt-default-tab-button nav nav-tabs" id="courseSetting" role="tablist">
                                                                        <li class="nav-item" role="presentation">
                                                                            <a href="#" class="active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general" role="tab" aria-controls="general" aria-selected="true">
                                                                                <span>General</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item" role="presentation">
                                                                            <a href="#" id="content-tab" data-bs-toggle="tab" data-bs-target="#content" role="tab" aria-controls="content" aria-selected="false">
                                                                                <span>Content Drip</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane fade advance-tab-content-1 active show" id="general" role="tabpanel" aria-labelledby="general-tab">
                                                                        <div class="course-field mb--20">
                                                                            <label for="field-3">Maximum
                                                                                Students</label>
                                                                            <div class="pro-quantity">
                                                                                <div class="pro-qty m-0"><input id="field-3" type="text" value="100"></div>
                                                                            </div>
                                                                            <small><i class="feather-info"></i> Number
                                                                                of students that can enrol in this
                                                                                course. Set 0 for no limits.</small>
                                                                        </div>

                                                                        <div class="course-field mb--20">
                                                                            <label for="field-4">Difficulty
                                                                                Level</label>
                                                                            <div class="rbt-modern-select bg-transparent height-45 mb--10">
                                                                                <select class="w-100" id="field-4">
                                                                                    <option>All Levels</option>
                                                                                    <option>Intermediate</option>
                                                                                    <option>Beginner</option>
                                                                                    <option>Advance</option>
                                                                                    <option>Expert</option>
                                                                                </select>
                                                                            </div>
                                                                            <small><i class="feather-info"></i> Course
                                                                                difficulty level</small>
                                                                        </div>

                                                                        <div class="course-field mb--20">
                                                                            <label class="form-check-label d-inline-block" for="flexSwitchCheckDefault">Public
                                                                                Course</label>
                                                                            <div class="form-check form-switch mb--10">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                                                            </div>
                                                                            <small><i class="feather-info"></i> Make
                                                                                This Course Public. No enrollment
                                                                                required.</small>
                                                                        </div>

                                                                        <div class="course-field mb--20">
                                                                            <label class="form-check-label d-inline-block" for="flexSwitchCheckDefault2">Q&A</label>
                                                                            <div class="form-check form-switch mb--10">
                                                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault2">
                                                                            </div>
                                                                            <small><i class="feather-info"></i> Enable
                                                                                Q&A section for your course</small>
                                                                        </div>
                                                                    </div>

                                                                    <div class="tab-pane fade advance-tab-content-1" id="content" role="tabpanel" aria-labelledby="content-tab">
                                                                        <div class="rbt-content-drip-content">
                                                                            <div class="course-field pb--20">
                                                                                <p class="rbt-checkbox-wrapper mb--5">
                                                                                    <input id="rbt-checkbox-1" name="rbt-checkbox-1" type="checkbox" value="yes">
                                                                                    <label for="rbt-checkbox-1">Enable</label>
                                                                                </p>
                                                                                <small><i class="feather-info"></i>
                                                                                    Enable / Disable content
                                                                                    drip</small>
                                                                            </div>
                                                                            <hr class="rbt-separator m-0">

                                                                            <div class="rbt-course-drip-option pt--20">
                                                                                <h6 class="mb--10">Content Drip Type
                                                                                </h6>
                                                                                <p class="mb--10 b3">You can schedule
                                                                                    your
                                                                                    course content using the above
                                                                                    content drip options.</p>
                                                                                <div class="course-drop-option">
                                                                                    <div class="rbt-form-check">
                                                                                        <input class="form-check-input" type="radio" name="rbt-radio" id="rbt-radio-1">
                                                                                        <label class="form-check-label" for="rbt-radio-1"> Schedule
                                                                                            course contents by
                                                                                            date</label>
                                                                                    </div>
                                                                                    <div class="rbt-form-check">
                                                                                        <input class="form-check-input" type="radio" name="rbt-radio" id="rbt-radio-2">
                                                                                        <label class="form-check-label" for="rbt-radio-2"> Content
                                                                                            available after X days from
                                                                                            enrollment</label>
                                                                                    </div>
                                                                                    <div class="rbt-form-check">
                                                                                        <input class="form-check-input" type="radio" name="rbt-radio" id="rbt-radio-3">
                                                                                        <label class="form-check-label" for="rbt-radio-3"> Course
                                                                                            content available
                                                                                            sequentially</label>
                                                                                    </div>
                                                                                    <div class="rbt-form-check">
                                                                                        <input class="form-check-input" type="radio" name="rbt-radio" id="rbt-radio-4">
                                                                                        <label class="form-check-label" for="rbt-radio-4"> Course
                                                                                            content unlocked after
                                                                                            finishing
                                                                                            prerequisites</label>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="course-field mb--15 edu-bg-gray">
                                                    <h6>Course Price</h6>
                                                    <div class="rbt-course-settings-content">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="advance-tab-button advance-tab-button-1">
                                                                    <ul class="rbt-default-tab-button nav nav-tabs" id="coursePrice" role="tablist">
                                                                        <li class="nav-item w-100" role="presentation">
                                                                            <a href="#" class="active" id="paid-tab" data-bs-toggle="tab" data-bs-target="#paid" role="tab" aria-controls="paid" aria-selected="true">
                                                                                <span>Paid</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="nav-item w-100" role="presentation">
                                                                            <a href="#" id="free-tab" data-bs-toggle="tab" data-bs-target="#free" role="tab" aria-controls="free" aria-selected="false">
                                                                                <span>Free</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-8">
                                                                <div class="tab-content">

                                                                    <div class="tab-pane fade advance-tab-content-1 active show" id="paid" role="tabpanel" aria-labelledby="paid-tab">

                                                                        <div class="course-field mb--15">
                                                                            <label for="regularPrice-1">Regular Price
                                                                                ($)</label>
                                                                            <input id="regularPrice-1" type="number" placeholder="$ Regular Price">
                                                                            <small class="d-block mt_dec--5"><i
                                                                                    class="feather-info"></i> The Course
                                                                                Price Includes Your Author Fee.</small>
                                                                        </div>

                                                                        <div class="course-field mb--15">
                                                                            <label for="discountedPrice-1">Discounted
                                                                                Price ($)</label>
                                                                            <input id="discountedPrice-1" type="number" placeholder="$ Discounted Price">
                                                                            <small class="d-block mt_dec--5"><i
                                                                                    class="feather-info"></i> The Course
                                                                                Price Includes Your Author Fee.</small>
                                                                        </div>

                                                                    </div>


                                                                    <div class="tab-pane fade advance-tab-content-1" id="free" role="tabpanel" aria-labelledby="free-tab">
                                                                        <div class="course-field">
                                                                            <p class="b3">This Course is free for
                                                                                everyone.</p>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="course-field mb--20">
                                                    <h6>Choose Categories</h6>
                                                    <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10">
                                                        <select class="w-100" data-live-search="true" title="Search Course Category. ex. Design, Development, Business" multiple data-size="7" data-actions-box="true" data-selected-text-format="count > 2">
                                                            <option>Web Developer</option>
                                                            <option>App Developer</option>
                                                            <option>Javascript</option>
                                                            <option>React</option>
                                                            <option>WordPress</option>
                                                            <option>jQuery</option>
                                                            <option>Vue Js</option>
                                                            <option>Angular</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="course-field mb--20">
                                                    <h6>Course Thumbnail</h6>
                                                    <div class="rbt-create-course-thumbnail upload-area">
                                                        <div class="upload-area">
                                                            <div class="brows-file-wrapper" data-black-overlay="9">
                                                                <!-- actual upload which is hidden -->
                                                                <input name="createinputfile" id="createinputfile" type="file" class="inputfile" />
                                                                <img id="createfileImage" src="{{ asset('assets/images/others/thumbnail-placeholder.svg') }}" alt="file image">
                                                                <!-- our custom upload button -->
                                                                <label class="d-flex" for="createinputfile" title="No File Choosen">
                                                                    <i class="feather-upload"></i>
                                                                    <span class="text-center">Choose a File</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <small><i class="feather-info"></i> <b>Size:</b> 700x430 pixels,
                                                        <b>File
                                                            Support:</b> JPG, JPEG, PNG, GIF, WEBP</small>
                                                </div>


                                            </div>
                                            <!-- End Course Field Wrapper  -->
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="accTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseTwo" aria-expanded="false" aria-controls="accCollapseTwo">
                                            Course Intro Video
                                        </button>
                                    </h2>
                                    <div id="accCollapseTwo" class="accordion-collapse collapse" aria-labelledby="accTwo" data-bs-parent="#tutionaccordionExamplea1">
                                        <div class="accordion-body card-body rbt-course-field-wrapper rbt-default-form">

                                            <div class="course-field mb--20">
                                                <div class="rbt-modern-select bg-transparent height-45 mb--10">
                                                    <select class="w-100" id="field-5">
                                                        <option value="" disabled selected>Select Video Sources</option>
                                                        <option value="youtube">Youtube</option>
                                                        <option value="vimeo">Vimeo</option>
                                                        <option value="local">Local</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="course-field mb--15">
                                                <label for="videoUrl">Add Your Video URL</label>
                                                <input id="videoUrl" type="text" placeholder="Add Your Video URL here.">
                                                <small class="d-block mt_dec--5">Example: <a href="https://www.youtube.com/watch?v=yourvideoid">https://www.youtube.com/watch?v=yourvideoid</a></small>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="accThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseThree" aria-expanded="false" aria-controls="accCollapseThree">
                                            Course Builder
                                        </button>
                                    </h2>
                                    <div id="accCollapseThree" class="accordion-collapse collapse" aria-labelledby="accThree">
                                        <div class="accordion-body card-body">
                                            <div class="accordion-item card mb--20">
                                                <h2 class="accordion-header card-header rbt-course" id="accOne1">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseOne1" aria-expanded="false" aria-controls="accCollapseOne1">Lesson
                                                        One</button>
                                                    <span class="rbt-course-icon rbt-course-edit" data-bs-toggle="modal"
                                                        data-bs-target="#UpdateTopic"></span><span
                                                        class="rbt-course-icon rbt-course-del"></span>
                                                </h2>
                                                <div id="accCollapseOne1" class="accordion-collapse collapse" aria-labelledby="accOne1">
                                                    <div class="accordion-body card-body" id="dnd1">
                                                        <div class="d-flex justify-content-between rbt-course-wrape mb-4">
                                                            <div class="col-10 inner d-flex align-items-center gap-2"><i
                                                                    class="feather-menu cursor-scroll"></i>
                                                                <h6 class="rbt-title mb-0">The Complete Histudy 2024:
                                                                    From Zero to Expert!</h6>
                                                            </div>
                                                            <div class="col-2 inner">
                                                                <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                    <li><i class="feather-trash"></i></li>
                                                                    <li><i class="feather-edit" data-bs-toggle="modal"
                                                                            data-bs-target="#Quiz"></i></li>
                                                                    <li><i class="feather-upload"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between rbt-course-wrape mb-4" role="button">
                                                            <div class="col-10 inner d-flex align-items-center gap-2"><i
                                                                    class="feather-menu cursor-scroll"></i>
                                                                <h6 class="rbt-title mb-0">Difficult Things About
                                                                    Education.</h6>
                                                            </div>
                                                            <div class="col-2 inner">
                                                                <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                    <li><i class="feather-trash"></i></li>
                                                                    <li><i class="feather-edit" data-bs-toggle="modal"
                                                                            data-bs-target="#Quiz"></i></li>
                                                                    <li><i class="feather-upload"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between rbt-course-wrape mb-4" role="button">
                                                            <div class="col-10 inner d-flex align-items-center gap-2"><i
                                                                    class="feather-menu cursor-scroll"></i>
                                                                <h6 class="rbt-title mb-0">Five Things You Should Do In
                                                                    Education.</h6>
                                                            </div>
                                                            <div class="col-2 inner">
                                                                <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                    <li><i class="feather-trash"></i></li>
                                                                    <li><i class="feather-edit" data-bs-toggle="modal"
                                                                            data-bs-target="#Quiz"></i></li>
                                                                    <li><i class="feather-upload"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between rbt-course-wrape mb-4" role="button">
                                                            <div class="col-10 inner d-flex align-items-center gap-2"><i
                                                                    class="feather-menu cursor-scroll"></i>
                                                                <h6 class="rbt-title mb-0">The Complete Histudy 2024:
                                                                    From Zero to Expert!</h6>
                                                            </div>
                                                            <div class="col-2 inner">
                                                                <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                    <li><i class="feather-trash"></i></li>
                                                                    <li><i class="feather-edit" data-bs-toggle="modal"
                                                                            data-bs-target="#Quiz"></i></li>
                                                                    <li><i class="feather-upload"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                            <div class="gap-3 d-flex flex-wrap"><button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" type="button" data-bs-toggle="modal" data-bs-target="#Lesson"><span
                                                                        class="icon-reverse-wrapper"><span
                                                                            class="btn-text">Lesson</span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-plus-square"></i></span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-plus-square"></i></span></span></button>
                                                                <button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" type="button" data-bs-toggle="modal" data-bs-target="#Quiz"><span
                                                                        class="icon-reverse-wrapper"><span
                                                                            class="btn-text">Quiz</span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-plus-square"></i></span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-plus-square"></i></span></span></button>
                                                                <button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" type="button" data-bs-toggle="modal" data-bs-target="#Assignment"><span
                                                                        class="icon-reverse-wrapper"><span
                                                                            class="btn-text">Assignments </span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-plus-square"></i></span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-plus-square"></i></span></span></button>
                                                            </div>
                                                            <div class="mt-3 mt-md-0">
                                                                <button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2"><span
                                                                        class="icon-reverse-wrapper"><span
                                                                            class="btn-text">Import Quiz </span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-download"></i></span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-download"></i></span></span>
                                                                </button>
                                                                <input type="file" style="display: none;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion-item card mb--20">
                                                <h2 class="accordion-header card-header rbt-course" id="accOne2">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseOne2" aria-expanded="false" aria-controls="accCollapseOne2">Lesson
                                                        two</button>
                                                    <span class="rbt-course-icon rbt-course-edit" data-bs-toggle="modal"
                                                        data-bs-target="#UpdateTopic"></span><span
                                                        class="rbt-course-icon rbt-course-del"></span>
                                                </h2>
                                                <div id="accCollapseOne2" class="accordion-collapse collapse" aria-labelledby="accOne2">
                                                    <div class="accordion-body card-body" id="dnd2">
                                                        <div class="d-flex justify-content-between rbt-course-wrape mb-4">
                                                            <div class="col-10 inner d-flex align-items-center gap-2"><i
                                                                    class="feather-menu cursor-scroll"></i>
                                                                <h6 class="rbt-title mb-0">The Complete Histudy 2024:
                                                                    From Zero to Expert!</h6>
                                                            </div>
                                                            <div class="col-2 inner">
                                                                <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                    <li><i class="feather-trash"></i></li>
                                                                    <li><i class="feather-edit" data-bs-toggle="modal"
                                                                            data-bs-target="#Quiz"></i></li>
                                                                    <li><i class="feather-upload"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between rbt-course-wrape mb-4" role="button">
                                                            <div class="col-10 inner d-flex align-items-center gap-2"><i
                                                                    class="feather-menu cursor-scroll"></i>
                                                                <h6 class="rbt-title mb-0">Difficult Things About
                                                                    Education.</h6>
                                                            </div>
                                                            <div class="col-2 inner">
                                                                <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                    <li><i class="feather-trash"></i></li>
                                                                    <li><i class="feather-edit" data-bs-toggle="modal"
                                                                            data-bs-target="#Quiz"></i></li>
                                                                    <li><i class="feather-upload"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between rbt-course-wrape mb-4" role="button">
                                                            <div class="col-10 inner d-flex align-items-center gap-2"><i
                                                                    class="feather-menu cursor-scroll"></i>
                                                                <h6 class="rbt-title mb-0">Five Things You Should Do In
                                                                    Education.</h6>
                                                            </div>
                                                            <div class="col-2 inner">
                                                                <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                    <li><i class="feather-trash"></i></li>
                                                                    <li><i class="feather-edit" data-bs-toggle="modal"
                                                                            data-bs-target="#Quiz"></i></li>
                                                                    <li><i class="feather-upload"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-between rbt-course-wrape mb-4" role="button">
                                                            <div class="col-10 inner d-flex align-items-center gap-2"><i
                                                                    class="feather-menu cursor-scroll"></i>
                                                                <h6 class="rbt-title mb-0">The Complete Histudy 2024:
                                                                    From Zero to Expert!</h6>
                                                            </div>
                                                            <div class="col-2 inner">
                                                                <ul class="rbt-list-style-1 rbt-course-list d-flex gap-2">
                                                                    <li><i class="feather-trash"></i></li>
                                                                    <li><i class="feather-edit" data-bs-toggle="modal"
                                                                            data-bs-target="#Quiz"></i></li>
                                                                    <li><i class="feather-upload"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                            <div class="gap-3 d-flex flex-wrap"><button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" type="button" data-bs-toggle="modal" data-bs-target="#Lesson"><span
                                                                        class="icon-reverse-wrapper"><span
                                                                            class="btn-text">Lesson</span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-plus-square"></i></span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-plus-square"></i></span></span></button>
                                                                <button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" type="button" data-bs-toggle="modal" data-bs-target="#Quiz"><span
                                                                        class="icon-reverse-wrapper"><span
                                                                            class="btn-text">Quiz</span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-plus-square"></i></span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-plus-square"></i></span></span></button>
                                                                <button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2" type="button" data-bs-toggle="modal" data-bs-target="#Assignment"><span
                                                                        class="icon-reverse-wrapper"><span
                                                                            class="btn-text">Assignments </span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-plus-square"></i></span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-plus-square"></i></span></span></button>
                                                            </div>
                                                            <div class="mt-3 mt-md-0">
                                                                <button class="rbt-btn btn-border hover-icon-reverse rbt-sm-btn-2"><span
                                                                        class="icon-reverse-wrapper"><span
                                                                            class="btn-text">Import Quiz </span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-download"></i></span><span
                                                                            class="btn-icon"><i
                                                                                class="feather-download"></i></span></span>
                                                                </button>
                                                                <input type="file" style="display: none;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="rbt-btn btn-md btn-gradient hover-icon-reverse" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <span class="icon-reverse-wrapper">
                                                    <span class="btn-text">Add New Topic</span>
                                                <span class="btn-icon"><i class="feather-plus-circle"></i></span>
                                                <span class="btn-icon"><i class="feather-plus-circle"></i></span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card rbt-course-field-wrapper">
                                    <h2 class="accordion-header card-header" id="accSix">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseSix" aria-expanded="false" aria-controls="accCollapseSix">
                                            Additional Information
                                        </button>
                                    </h2>
                                    <div id="accCollapseSix" class="accordion-collapse collapse" aria-labelledby="accSix" data-bs-parent="#tutionaccordionExamplea1">
                                        <div class="accordion-body card-body rbt-course-field-wrapper rbt-default-form row row-15">

                                            <div class="col-lg-6">
                                                <div class="course-field mb--15">
                                                    <label for="startDate">Start Date</label>
                                                    <input type="date" id="startDate" name="startDate">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="course-field mb--15">
                                                    <label for="language">Language</label>
                                                    <div class="rbt-modern-select bg-transparent height-50 mb--10">
                                                        <select class="w-100" data-live-search="true" title="English" multiple data-size="7" data-actions-box="true" data-selected-text-format="count > 2" id="language">
                                                            <option>English</option>
                                                            <option>Bangla</option>
                                                            <option>Japan</option>
                                                            <option>Hindi</option>
                                                            <option>Frence</option>
                                                            <option>Garmani</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="course-field mb--15">
                                                    <label for="whatLearn">Requirements</label>
                                                    <textarea id="whatLearn" rows="5" placeholder="Add your course benefits here."></textarea>
                                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> Enter
                                                        for per line.</small>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="course-field mb--15">
                                                    <label for="description">Description</label>
                                                    <textarea id="description" rows="5" placeholder="Add your course benefits here."></textarea>
                                                    <small class="d-block mt_dec--5"><i class="feather-info"></i> Enter
                                                        for per line.</small>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <hr class="mt--10 mb--20">
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="course-field mb--15">
                                                    <label>Total Course Duration</label>
                                                    <div class="row row--15">
                                                        <div class="col-lg-6">
                                                            <input type="number" placeholder="00">
                                                            <small class="d-block mt_dec--5"><i
                                                                    class="feather-info"></i> Hour.</small>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <input type="number" placeholder="00">
                                                            <small class="d-block mt_dec--5"><i
                                                                    class="feather-info"></i> Minute.</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <hr class="mt--10 mb--20">
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="course-field mb--15">
                                                    <label for="courseTag">Course Tags</label>
                                                    <textarea id="courseTag" rows="5" placeholder="Add your course tag here."></textarea>
                                                    <small class="d-block mt_dec--5"><i class="feather-info"></i>
                                                        Maximum of 15 keywords covering features, usage, and styling.
                                                        Keywords should all be in lowercase and separated by commas.
                                                        e.g. photography, gallery, modern, jquery, wordpress
                                                        theme.</small>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <hr class="mt--10 mb--20">
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="course-field mb--15">
                                                    <label for="targeted">Targeted Audience</label>
                                                    <textarea id="targeted" rows="5" placeholder="Add your course tag here."></textarea>
                                                    <small class="d-block mt_dec--5"><i class="feather-info"></i>
                                                        Specify the target audience that will benefit the most from the
                                                        course.</small>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="accSeven">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseEight" aria-expanded="false" aria-controls="accCollapseEight">
                                            Certificate Template
                                        </button>
                                    </h2>
                                    <div id="accCollapseEight" class="accordion-collapse collapse" aria-labelledby="accSeven" data-bs-parent="#tutionaccordionExamplea1">
                                        <div class="accordion-body card-body">

                                            <div class="advance-tab-button advance-tab-button-1">
                                                <ul class="rbt-default-tab-button nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a href="#" class="active" id="landscape-tab" data-bs-toggle="tab" data-bs-target="#landscape" role="tab" aria-controls="landscape" aria-selected="true">
                                                            <span>Landscape</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a href="#" id="portrait-tab" data-bs-toggle="tab" data-bs-target="#portrait" role="tab" aria-controls="portrait" aria-selected="false">
                                                            <span>Portrait</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="tab-content">

                                                        <div class="tab-pane fade advance-tab-content-1 active show" id="landscape" role="tabpanel" aria-labelledby="landscape-tab">
                                                            <div class="row g-5 mt--10">


                                                                <!-- Start Single Certificate  -->
                                                                <div class="col-lg-4">
                                                                    <div class="certificate-inner rbt-image-checkbox">
                                                                        <input type="radio" id="option1" name="radio-group" value="option1">
                                                                        <label for="option1"><img src="{{ asset('assets/images/icons/certificate-none.svg') }}" alt="Certificate Image"></label>
                                                                    </div>
                                                                </div>
                                                                <!-- End Single Certificate  -->

                                                                <!-- Start Single Certificate  -->
                                                                <div class="col-lg-4">
                                                                    <div class="certificate-inner rbt-image-checkbox">
                                                                        <input type="radio" id="option2" name="radio-group" value="option2">
                                                                        <label for="option2"><img src="{{ asset('assets/images/others/preview-01.png') }}" alt="Certificate Image"></label>
                                                                    </div>
                                                                </div>
                                                                <!-- End Single Certificate  -->

                                                                <!-- Start Single Certificate  -->
                                                                <div class="col-lg-4">
                                                                    <div class="certificate-inner rbt-image-checkbox">
                                                                        <input type="radio" id="option3" name="radio-group" value="option3">
                                                                        <label for="option3"><img src="{{ asset('assets/images/others/preview-02.png') }}" alt="Certificate Image"></label>
                                                                    </div>
                                                                </div>
                                                                <!-- End Single Certificate  -->

                                                                <!-- Start Single Certificate  -->
                                                                <div class="col-lg-4">
                                                                    <div class="certificate-inner rbt-image-checkbox">
                                                                        <input type="radio" id="option4" name="radio-group" value="option4">
                                                                        <label for="option4"><img src="{{ asset('assets/images/others/preview-03.png') }}" alt="Certificate Image"></label>
                                                                    </div>
                                                                </div>
                                                                <!-- End Single Certificate  -->

                                                                <!-- Start Single Certificate  -->
                                                                <div class="col-lg-4">
                                                                    <div class="certificate-inner rbt-image-checkbox">
                                                                        <input type="radio" id="option5" name="radio-group" value="option5">
                                                                        <label for="option5"><img src="{{ asset('assets/images/others/preview-04.png') }}" alt="Certificate Image"></label>
                                                                    </div>
                                                                </div>
                                                                <!-- End Single Certificate  -->

                                                                <!-- Start Single Certificate  -->
                                                                <div class="col-lg-4">
                                                                    <div class="certificate-inner rbt-image-checkbox">
                                                                        <input type="radio" id="option6" name="radio-group" value="option6">
                                                                        <label for="option6"><img src="{{ asset('assets/images/others/preview-05.png') }}" alt="Certificate Image"></label>
                                                                    </div>
                                                                </div>
                                                                <!-- End Single Certificate  -->
                                                            </div>
                                                        </div>

                                                        <div class="tab-pane fade advance-tab-content-1" id="portrait" role="tabpanel" aria-labelledby="portrait-tab">

                                                            <div class="row g-5 mt--10">

                                                                <!-- Start Single Certificate  -->
                                                                <div class="col-lg-4">
                                                                    <div class="certificate-inner rbt-image-checkbox">
                                                                        <input type="radio" id="optionport1" name="radio-group" value="optionport1">
                                                                        <label for="optionport1"><img src="{{ asset('assets/images/icons/certificate-none-portrait.svg') }}" alt="Certificate Image"></label>
                                                                    </div>
                                                                </div>
                                                                <!-- End Single Certificate  -->

                                                                <!-- Start Single Certificate  -->
                                                                <div class="col-lg-4">
                                                                    <div class="certificate-inner rbt-image-checkbox">
                                                                        <input type="radio" id="optionport2" name="radio-group" value="optionport2">
                                                                        <label for="optionport2"><img src="{{ asset('assets/images/others/preview-port-01.png') }}" alt="Certificate Image"></label>
                                                                    </div>
                                                                </div>
                                                                <!-- End Single Certificate  -->

                                                                <!-- Start Single Certificate  -->
                                                                <div class="col-lg-4">
                                                                    <div class="certificate-inner rbt-image-checkbox">
                                                                        <input type="radio" id="optionport3" name="radio-group" value="optionport3">
                                                                        <label for="optionport3"><img src="{{ asset('assets/images/others/preview-port-02.png') }}" alt="Certificate Image"></label>
                                                                    </div>
                                                                </div>
                                                                <!-- End Single Certificate  -->

                                                                <!-- Start Single Certificate  -->
                                                                <div class="col-lg-4">
                                                                    <div class="certificate-inner rbt-image-checkbox">
                                                                        <input type="radio" id="optionport4" name="radio-group" value="optionport4">
                                                                        <label for="optionport4"><img src="{{ asset('assets/images/others/preview-port-03.png') }}" alt="Certificate Image"></label>
                                                                    </div>
                                                                </div>
                                                                <!-- End Single Certificate  -->

                                                                <!-- Start Single Certificate  -->
                                                                <div class="col-lg-4">
                                                                    <div class="certificate-inner rbt-image-checkbox">
                                                                        <input type="radio" id="optionport5" name="radio-group" value="optionport5">
                                                                        <label for="optionport5"><img src="{{ asset('assets/images/others/preview-port-05.png') }}" alt="Certificate Image"></label>
                                                                    </div>
                                                                </div>
                                                                <!-- End Single Certificate  -->

                                                                <!-- Start Single Certificate  -->
                                                                <div class="col-lg-4">
                                                                    <div class="certificate-inner rbt-image-checkbox">
                                                                        <input type="radio" id="optionport6" name="radio-group" value="optionport6">
                                                                        <label for="optionport6"><img src="{{ asset('assets/images/others/preview-port-06.png') }}" alt="Certificate Image"></label>
                                                                    </div>
                                                                </div>
                                                                <!-- End Single Certificate  -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt--10 row g-5">
                            <div class="col-lg-4">
                                <a class="rbt-btn hover-icon-reverse bg-primary-opacity w-100 text-center" href="{{ route('courseDetails') }}">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Preview</span>
                                    <span class="btn-icon"><i class="feather-eye"></i></span>
                                    <span class="btn-icon"><i class="feather-eye"></i></span>
                                    </span>
                                </a>
                            </div>
                            <div class="col-lg-8">
                                <a class="rbt-btn btn-gradient hover-icon-reverse w-100 text-center" href="#">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Create Course</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="rbt-create-course-sidebar course-sidebar sticky-top rbt-shadow-box rbt-gradient-border">
                            <div class="inner">
                                <div class="section-title mb--30">
                                    <h4 class="title">Course Upload Tips</h4>
                                </div>
                                <div class="rbt-course-upload-tips">
                                    <ul class="rbt-list-style-1">
                                        <li><i class="feather-check"></i> Set the Course Price option or make it free.
                                        </li>
                                        <li><i class="feather-check"></i> Standard size for the course thumbnail is
                                            700x430.</li>
                                        <li><i class="feather-check"></i> Video section controls the course overview
                                            video.</li>
                                        <li><i class="feather-check"></i> Course Builder is where you create & organize
                                            a course.</li>
                                        <li><i class="feather-check"></i> Add Topics in the Course Builder section to
                                            create lessons, quizzes, and assignments.</li>
                                        <li><i class="feather-check"></i> Prerequisites refers to the fundamental
                                            courses to complete before taking this particular course.</li>
                                        <li><i class="feather-check"></i> Information from the Additional Data section
                                            shows up on the course single page.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Modal Area  -->
        <div class="rbt-default-modal modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="rbt-round-btn" data-bs-dismiss="modal" aria-label="Close">
                            <i class="feather-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="inner rbt-default-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="modal-title mb--20" id="exampleModalLabel">Add Topic</h5>
                                    <div class="course-field mb--20">
                                        <label for="modal-field-1">Topic Name</label>
                                        <input id="modal-field-1" type="text">
                                        <small><i class="feather-info"></i> Topic titles are displayed publicly wherever
                                            required. Each topic may contain one or more lessons, quiz and
                                            assignments.</small>
                                    </div>
                                    <div class="course-field mb--20">
                                        <label for="modal-field-2">Topic Summary</label>
                                        <textarea id="modal-field-2"></textarea>
                                        <small><i class="feather-info"></i> Add a summary of short text to prepare
                                            students for the activities for the topic. The text is shown on the course
                                            page beside the tooltip beside the topic name.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-circle-shape"></div>
                    <div class="modal-footer pt--30">
                        <button type="button" class="rbt-btn btn-border btn-md radius-round-10" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal Area  -->

        <!-- Start Topic Area  -->
        <div class="rbt-default-modal modal fade" id="UpdateTopic" tabindex="-1" aria-labelledby="UpdateTopicLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="rbt-round-btn" data-bs-dismiss="modal" aria-label="Close">
                            <i class="feather-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="inner rbt-default-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="modal-title mb--20" id="exampleModalLabel">Update Topic</h5>
                                    <div class="course-field mb--20">
                                        <label for="modal-field-1">Topic Name</label>
                                        <input id="modal-field-1" type="text">
                                        <small><i class="feather-info"></i> Topic titles are displayed publicly wherever
                                            required. Each topic may contain one or more lessons, quiz and
                                            assignments.</small>
                                    </div>
                                    <div class="course-field mb--20">
                                        <label for="modal-field-2">Topic Summary</label>
                                        <textarea id="modal-field-2"></textarea>
                                        <small><i class="feather-info"></i> Add a summary of short text to prepare
                                            students for the activities for the topic. The text is shown on the course
                                            page beside the tooltip beside the topic name.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-circle-shape"></div>
                    <div class="modal-footer pt--30">
                        <button type="button" class="rbt-btn btn-border btn-md radius-round-10" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topic Area  -->

        <!-- Lesson Modal -->
        <div class="rbt-default-modal modal fade" id="Lesson" tabindex="-1" aria-labelledby="LessonLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header"><button type="button" class="rbt-round-btn" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x"></i></button></div>
                    <div class="modal-body">
                        <div class="inner rbt-default-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="modal-title mb--20" id="LessonLabel">Add Lesson</h5>
                                    <div class="course-field mb--20"><label for="modal-field-1">Lesson
                                            Name</label><input id="modal-field-1" type="text"><small><i
                                                class="feather-info"></i> Lesson titles are
                                            displayed publicly wherever required. Each Lesson may contain one or more
                                            lessons, quiz
                                            and assignments.</small></div>
                                    <div class="course-field mb--20"><label for="modal-field-2">Lesson
                                            Summary</label><textarea id="modal-field-2"></textarea><small><i
                                                class="feather-info"></i> Add a summary of short
                                            text to prepare students for the activities for the Lesson. The text is
                                            shown on the
                                            course page beside the tooltip beside the Lesson name.</small></div>
                                    <div class="course-field mb--20">
                                        <h6>Feature Image</h6>
                                        <div class="rbt-create-course-thumbnail upload-area">
                                            <div class="upload-area">
                                                <div class="brows-file-wrapper" data-black-overlay="9">
                                                    <!-- actual upload which is hidden -->
                                                    <input name="createinputfile" id="createinputfile" type="file" class="inputfile" />
                                                    <img id="createfileImage" src="{{ asset('assets/images/others/thumbnail-placeholder.svg') }}" alt="file image">
                                                    <!-- our custom upload button -->
                                                    <label class="d-flex" for="createinputfile" title="No File Choosen">
                                                        <i class="feather-upload"></i>
                                                        <span class="text-center">Choose a File</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <small><i class="feather-info"></i> <b>Size:</b> 700x430 pixels, <b>File
                                                Support:</b>
                                            JPG, JPEG, PNG, GIF, WEBP</small>
                                    </div>
                                    <div class="course-field mb--20">
                                        <h6>Video Source</h6>
                                        <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10"><select class="w-100">
                                                <option>Select Video Source</option>
                                                <option>External URL </option>
                                                <option>Youtube </option>
                                                <option>Vimo</option>
                                                <option>facebook</option>
                                                <option>twitter</option>
                                            </select></div>
                                    </div>
                                    <div class="course-field mb--15"><label>Video playback time</label>
                                        <div class="row row--15">
                                            <div class="col-lg-4"><input type="number" placeholder="00"><small class="d-block mt_dec--5"><i class="feather-info"></i> Hour.</small>
                                            </div>
                                            <div class="col-lg-4"><input type="number" placeholder="00"><small class="d-block mt_dec--5"><i class="feather-info"></i>
                                                    Minute.</small></div>
                                            <div class="col-lg-4"><input type="number" placeholder="00"><small class="d-block mt_dec--5"><i class="feather-info"></i>
                                                    Second.</small></div>
                                        </div>
                                    </div>
                                    <div class="course-field mb--20">
                                        <h6>Upload exercise files to the Lesson</h6>
                                        <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10"><button class="rbt-btn btn-md btn-border hover-icon-reverse"><span
                                                    class="icon-reverse-wrapper"><span class="btn-text">Upload
                                                        Attachments</span><span class="btn-icon"><i
                                                            class="feather-paperclip"></i></span><span
                                                        class="btn-icon"><i
                                                            class="feather-paperclip"></i></span></span></button><input type="file" style="display: none;"></div>
                                    </div>
                                    <div class="course-field mb--20">
                                        <p class="rbt-checkbox-wrapper mb--5 d-flex"><input id="rbt-checkbox-11" name="rbt-checkbox-11" type="checkbox" value="yes"><label for="rbt-checkbox-11">Enable Course Preview</label></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-circle-shape"></div>
                    <div class="modal-footer pt--30 justify-content-between"><button type="button" class="rbt-btn btn-border btn-md radius-round-10" data-bs-dismiss="modal">Cancel</button>
                        <div class="content"><button type="button" class="rbt-btn btn-md">Update Lesson</button></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Lesson Modal -->

        <!-- Quiz Mddal -->
        <div class="rbt-default-modal modal fade" id="Quiz" tabindex="-1" aria-labelledby="QuizLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header"><button type="button" class="rbt-round-btn" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x"></i></button></div>
                    <div class="modal-body">
                        <div class="inner rbt-default-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="modal-title mb--20" id="LessonLabel">Quiz</h5>
                                    <div class="course-field quiz-modal mb--40">
                                        <div class="d-flex justify-content-between"><span>Quiz
                                                info</span><span>Question</span><span>Settings</span></div>
                                        <div class="position-relative m-4">
                                            <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="33.3333" aria-valuemin="0" aria-valuemax="100">
                                                <div class="progress-bar" style="width: 33.3333%;"></div>
                                            </div>
                                            <button type="button" class="position-absolute top-0 start-0 translate-middle btn quiz-modal-btn quiz-modal__active">
                                                <i class="feather-check"></i>
                                            </button>
                                            <button type="button" class="position-absolute top-0 start-50 translate-middle btn quiz-modal-btn">2</button>
                                            <button type="button" class="position-absolute top-0 start-100 translate-middle btn quiz-modal-btn btn-secondary">3</button>
                                        </div>
                                    </div>
                                    <form class="tabs-1" id="quiz-form">
                                        <div id="question-1" class="question">
                                            <div class="course-field mb--20"><label for="modal-field-1">Quiz
                                                    Title</label><input id="modal-field-1" type="text" placeholder="Type your quiz title here"></div>
                                            <div class="course-field mb--20"><label for="modal-field-2">Quiz
                                                    Summary</label><textarea id="modal-field-2"></textarea><small><i
                                                        class="feather-info"></i> Add a summary of short text to prepare
                                                    students for the activities for the Quiz. The text is shown on the
                                                    course page beside the tooltip beside the
                                                    Quiz name.</small></div>
                                        </div>
                                        <div id="question-2" class="question">
                                            <div class="content">
                                                <div class="course-field mb--20">
                                                    <div class="d-flex justify-content-between rbt-course-wrape mb-4" style="cursor: auto;">
                                                        <div class="inner d-flex align-items-center gap-2">
                                                            <h6 class="rbt-title mb-0">Question No.01</h6>
                                                        </div>
                                                        <div class="inner">
                                                            <ul class="rbt-list-style-1 rbt-course-list d-flex gap-3 align-items-center">
                                                                <li><span>Single Choice</span></li>
                                                                <li><button type="button" class="btn quiz-modal__edit-btn dropdown-toggle me-2" data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                            class="feather-edit"></i></button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#" type="button"><i
                                                                                    class="feather-edit-2"></i> Edit</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash"></i>
                                                                                Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between rbt-course-wrape mb-4" style="cursor: auto;">
                                                        <div class="inner d-flex align-items-center gap-2">
                                                            <h6 class="rbt-title mb-0">Question No.02</h6>
                                                        </div>
                                                        <div class="inner">
                                                            <ul class="rbt-list-style-1 rbt-course-list d-flex gap-3 align-items-center">
                                                                <li><span>True/False</span></li>
                                                                <li><button type="button" class="btn quiz-modal__edit-btn dropdown-toggle me-2" data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                            class="feather-edit"></i></button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#" type="button"><i
                                                                                    class="feather-edit-2"></i> Edit</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash"></i>
                                                                                Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between rbt-course-wrape mb-4" style="cursor: auto;">
                                                        <div class="inner d-flex align-items-center gap-2">
                                                            <h6 class="rbt-title mb-0">Question No.03</h6>
                                                        </div>
                                                        <div class="inner">
                                                            <ul class="rbt-list-style-1 rbt-course-list d-flex gap-3 align-items-center">
                                                                <li><span>Multi Choice</span></li>
                                                                <li><button type="button" class="btn quiz-modal__edit-btn dropdown-toggle me-2" data-bs-toggle="dropdown" aria-expanded="false"><i
                                                                            class="feather-edit"></i></button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#" type="button"><i
                                                                                    class="feather-edit-2"></i> Edit</a>
                                                                        </li>
                                                                        <li><a class="dropdown-item delete-item" href="#"><i class="feather-trash"></i>
                                                                                Delete</a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="course-field">
                                                    <button class="rbt-btn btn-active hover-icon-reverse rbt-sm-btn-2 btn-1" type="button" id="next-btn-2">
                                                        <span class="icon-reverse-wrapper"><span class="btn-text">Add
                                                                Question</span><span class="btn-icon"><i
                                                                    class="feather-plus-square"></i></span><span
                                                                class="btn-icon"><i
                                                                    class="feather-plus-square"></i></span></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="question-3" class="question">
                                            <div class="content">
                                                <div class="course-field mb--20"><label for="modal-field-3">Write your
                                                        question here</label><input id="modal-field-3" type="text" placeholder="Question"></div>
                                                <div class="course-field mb--20">
                                                    <h6>Select your question type</h6>
                                                    <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10">
                                                        <select id="questionType" class="w-100">
                                                            <option>True/False</option>
                                                            <option>Single Choice </option>
                                                            <option>Multiple Choice </option>
                                                            <option>Open Ended</option>
                                                            <option>Fill in the Blanks</option>
                                                            <option>Sort Answer</option>
                                                            <option>Matching</option>
                                                            <option>Image Matching</option>
                                                        </select>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-5 mt--20">
                                                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="switchCheckAnswer"><label class="form-check-label" for="switchCheckAnswer">Answer
                                                                Required</label></div>
                                                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="switchCheckRandomize"><label class="form-check-label" for="switchCheckRandomize">Randomize</label></div>
                                                    </div>
                                                </div>
                                                <div class="course-field mb--20"><label for="modal-field-3">Point(s) for
                                                        this answer</label>
                                                    <div class="d-flex align-items-center gap-5 mb--20">
                                                        <div class="content"><input class="mb-0" id="modal-field-3" type="text" placeholder="set the mark ex. 10">
                                                        </div>
                                                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="switchCheckAnswerTwo"><label class="form-check-label" for="switchCheckAnswerTwo">Answer
                                                                Required</label></div>
                                                    </div>
                                                    <h6 class="mb-3">Description (Optional)</h6>
                                                    <textarea id="editor1"></textarea>
                                                    <small><i class="feather-info"></i> Input options for the question
                                                        and select the correct answer.</small>
                                                    <div class="course-field mt--20 d-none"><small><i
                                                                class="feather-info"></i> No option is necessary for
                                                            this
                                                            answer type</small></div>
                                                    <div class="course-field rbt-lesson-rightsidebar d-block mt--20">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="rbt-form-check"><input class="form-check-input" type="radio" name="rbt-radio" id="rbt-single-1"><label class="form-check-label" for="rbt-single-1">True</label></div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="rbt-form-check"><input class="form-check-input" type="radio" name="rbt-radio" id="rbt-single-2"><label class="form-check-label" for="rbt-single-2">False</label></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="course-field mt--20">
                                                        <label for="modal-field-3">Answer title</label><input id="modal-field-3" type="text" placeholder="title">
                                                        <div class="rbt-create-course-thumbnail upload-area mt--20">
                                                            <h6>Upload Image</h6>
                                                            <div class="upload-area mb--20">
                                                                <div class="brows-file-wrapper" data-black-overlay="9">
                                                                    <!-- actual upload which is hidden -->
                                                                    <input name="createinputfile" id="createinputfile" type="file" class="inputfile">
                                                                    <img id="createfileImage" src="{{ asset('assets/images/others/thumbnail-placeholder.svg') }}" alt="file image">
                                                                    <!-- our custom upload button -->
                                                                    <label class="d-flex" for="createinputfile" title="No File Choosen">
                                                                        <i class="feather-upload"></i>
                                                                        <span class="text-center">Choose a File</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <h6 class="mb-2">Display format for options</h6>
                                                            <div class="d-flex gap-4">
                                                                <div class="rbt-form-check"><input class="form-check-input" type="radio" name="rbt-radio" id="rbt-radio1"><label class="form-check-label h-auto" for="rbt-radio1">Only Text</label></div>
                                                                <div class="rbt-form-check"><input class="form-check-input" type="radio" name="rbt-radio" id="rbt-radio2"><label class="form-check-label h-auto" for="rbt-radio2">Image Only</label></div>
                                                                <div class="rbt-form-check"><input class="form-check-input" type="radio" name="rbt-radio" id="rbt-radio3"><label class="form-check-label h-auto" for="rbt-radio3">Text &amp; Image
                                                                        both</label></div>
                                                            </div><button class="rbt-btn rbt-sm-btn-2 mt--20" type="button">Update Answer</button>
                                                        </div>
                                                    </div>

                                                    <div class="course-field mt--20">
                                                        <h6 class="mb-3">Answer Explanation</h6>
                                                        <textarea id="editor2"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="question-4" class="question">
                                            <form class="tabs-3">
                                                <div class="course-field mb--20"><label for="modal-field-3">Time
                                                        Limit</label>
                                                    <div class="d-flex flex-wrap align-items-center gap-5">
                                                        <div class="content"><input class="mb-0" id="modal-field-3" type="number" value="0"></div>
                                                        <div class="content">
                                                            <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10">
                                                                <select class="w-100">
                                                                    <option>Weaks</option>
                                                                    <option>Day </option>
                                                                    <option>Hour </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" role="switch" id="switchCheckAnswerTwo2"><label class="form-check-label" for="switchCheckAnswerTwo2">Hide quiz
                                                                time - display</label></div>
                                                    </div><small><i class="feather-info"></i> Time limit for this quiz.
                                                        0 means no time limit.</small>
                                                </div>
                                                <div class="course-field"><label for="modal-field-3">Quiz Feedback
                                                        Mode</label><small>(Pick the quiz system"s
                                                        behaviour on choice based questions.)</small>
                                                    <div class="d-flex flex-column gap-4 mt--10">
                                                        <div class="rbt-form-check col-12 rbt-border-2 rounded-2 ps-4 py-3">
                                                            <input class="form-check-input ps-5" type="radio" name="rbt-radio" id="rbt-radio1"><label class="form-check-label h-auto" for="rbt-radio1">
                                                                <div class=""><span>Default</span></div>
                                                                <div class=""><span>Answers shown after quiz is finished
                                                                    </span></div>
                                                            </label>
                                                        </div>
                                                        <div class="rbt-form-check col-12 rbt-border-2 rounded-2 ps-4 py-3">
                                                            <input class="form-check-input ps-5" type="radio" name="rbt-radio" id="rbt-radio2"><label class="form-check-label h-auto" for="rbt-radio2">
                                                                <div class=""><span>Reveal Mode</span></div>
                                                                <div class=""><span>Show result after the attempt.
                                                                    </span></div>
                                                            </label>
                                                        </div>
                                                        <div class="rbt-form-check col-12 rbt-border-2 rounded-2 ps-4 py-3">
                                                            <input class="form-check-input ps-5" type="radio" name="rbt-radio" id="rbt-radio3"><label class="form-check-label h-auto" for="rbt-radio3">
                                                                <div class=""><span>Retry Mode</span></div>
                                                                <div class=""><span>Reattempt quiz any number of times.
                                                                        Define Attempts Allowed below.</span></div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="course-field mt--20">
                                                    <div class="col-xl-8"><label for="modal-field-4">Passing Grade
                                                            (%)</label><input class="mb-0" id="modal-field-4" type="number" value="50"><small><i class="feather-info"></i>
                                                            Time limit for this quiz. 0 means no time
                                                            limit.</small></div>
                                                </div>
                                                <div class="course-field mt--20">
                                                    <div class="col-xl-8"><label for="modal-field-5">Max Question
                                                            Allowed to Answer</label><input class="mb-0" id="modal-field-5" type="number" value="10"><small><i
                                                                class="feather-info"></i> This amount of question
                                                            will be available for students to answer, and question will
                                                            comes randomly from all available questions
                                                            belongs with a quiz, if this amount is greater than
                                                            available question, then all questions will be
                                                            available for a student to answer.</small></div>
                                                </div>
                                                <div class="course-field rbt-accordion-style rbt-accordion-01 rbt-accordion-06 accordion mt--30">
                                                    <div class="accordion-item card">
                                                        <h2 class="accordion-header card-header" id="accThree3"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accCollapseThree3" aria-expanded="false" aria-controls="accCollapseThree3"><i
                                                                    class="feather-settings me-3"></i>Advance
                                                                Settings</button>
                                                        </h2>
                                                        <div id="accCollapseThree3" class="accordion-collapse collapse" aria-labelledby="accThree3">
                                                            <div class="accordion-body card-body">
                                                                <div class="form-check form-switch mb--5"><input class="form-check-input" type="checkbox" role="switch" id="autoStart"><label class="form-check-label" for="autoStart">Quiz
                                                                        Auto
                                                                        Start</label></div><small><i
                                                                        class="feather-info"></i> If you enable this
                                                                    option, the quiz
                                                                    will start automatically after the page is
                                                                    loaded.</small>
                                                                <div class="course-field d-sm-flex gap-4 mt--20">
                                                                    <div class="col-sm-6 col-xl-3 mb-4 mb-sm-0"><label class="form-check-label" for="option-1">Question
                                                                            Layout</label>
                                                                        <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10">
                                                                            <select class="w-100 rbt-select-dark">
                                                                                <option value="Random">Random</option>
                                                                                <option value="sorting">Sorting
                                                                                </option>
                                                                                <option value="asc">Ascending </option>
                                                                                <option value="desc">Descending
                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-xl-4"><label class="form-check-label" for="option-1">Questions
                                                                            Order</label>
                                                                        <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10">
                                                                            <select class="w-100 rbt-select-dark">
                                                                                <option value="Set question layout view">Set
                                                                                    question layout view</option>
                                                                                <option value="single_question">Single
                                                                                    Question</option>
                                                                                <option value="question_pagination">
                                                                                    Question
                                                                                    Pagination</option>
                                                                                <option value="question_below_each_other">
                                                                                    Question below each other</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="course-field mt--20">
                                                                    <div class="form-check form-switch mb--5"><input class="form-check-input" type="checkbox" role="switch" id="hideNumber"><label class="form-check-label" for="hideNumber">Hide
                                                                            question number</label></div><small><i
                                                                            class="feather-info"></i>Show/hide question
                                                                        number during attempt.</small>
                                                                </div>
                                                                <div class="course-field d-lg-flex flex-wrap justify-content-between gap-5 mt--20">
                                                                    <div class="col-lg-7 mb-4 mb-lg-0"><label for="modal-field-sort-answer">Short answer
                                                                            characters
                                                                            limit</label><input class="mb-0" id="modal-field-sort-answer" type="number" value="200"><small><i
                                                                                class="feather-info pe-1"></i>Student
                                                                            will place answer in short
                                                                            answer question type within this characters
                                                                            limit.</small></div>
                                                                    <div class="col-lg-7"><label for="modal-field-3">Open-Ended/Essay
                                                                            questions answer character
                                                                            limit</label><input class="mb-0" id="modal-field-7" type="number" value="500"><small><i
                                                                                class="feather-info pe-1"></i>Students
                                                                            will place the answer in the
                                                                            Open-Ended/Essay
                                                                            question type within this character
                                                                            limit.</small></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-circle-shape"></div>
                    <div class="modal-footer pt--30 justify-content-between">
                        <button type="button" class="rbt-btn btn-border btn-md radius-round-10" data-bs-dismiss="modal">Cancel</button>
                        <div class="content">
                            <button type="button" class="rbt-btn btn-border btn-md radius-round-10 mr--10" id="prev-btn">Back</button>
                            <button type="button" class="rbt-btn btn-md radius-round-10 d-inline-block" id="next-btn-2">Save &
                                Next</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Quiz Mddal -->

        <!-- Assignment Modal -->
        <div class="rbt-default-modal modal fade" id="Assignment" tabindex="-1" aria-labelledby="AssignmentLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header"><button type="button" class="rbt-round-btn" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x"></i></button></div>
                    <div class="modal-body">
                        <div class="inner rbt-default-form">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form action="#">
                                        <h5 class="modal-title mb--20" id="LessonLabel">Assignment</h5>
                                        <div class="course-field mb--20"><label for="modal-field-1">Assignment
                                                Title</label><input id="modal-field-1" type="text" placeholder="Assignments"></div>
                                        <div class="course-field mb--30"><label for="modal-field-3">Summary</label>
                                            <textarea id="editor3"></textarea>
                                        </div>
                                        <div class="course-field mb--20">
                                            <h6>Attachments</h6>
                                            <div class="rbt-modern-select bg-transparent height-45 w-100 mb--10"><button class="rbt-btn btn-md btn-border hover-icon-reverse"><span
                                                        class="icon-reverse-wrapper"><span class="btn-text">Upload
                                                            Attachments</span><span class="btn-icon"><i
                                                                class="feather-paperclip"></i></span><span
                                                            class="btn-icon"><i
                                                                class="feather-paperclip"></i></span></span></button><input type="file" style="display: none;"></div>
                                        </div>
                                        <div class="course-field mb--15"><label>Time Limit</label>
                                            <div class="row row--15">
                                                <div class="col-sm-6 col-lg-4"><input class="shadow-none" type="number" placeholder="00"></div>
                                                <div class="col-sm-5 col-lg-4">
                                                    <div class="rbt-modern-select bg-transparent height-45 w-75 mb--10">
                                                        <select class="w-100">
                                                            <option>Weaks</option>
                                                            <option>Day </option>
                                                            <option>Hour </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="course-field mb--15"><label>Total Points</label>
                                            <div class="row row--15">
                                                <div class="col-lg-4"><input class="shadow-none" type="number" placeholder="0"><small><i class="feather-info pr--5"></i>Maximum
                                                        points a
                                                        student can score</small></div>
                                            </div>
                                        </div>
                                        <div class="course-field mb--15"><label>Minimum Pass Points</label>
                                            <div class="row row--15">
                                                <div class="col-lg-4"><input class="shadow-none" type="number" placeholder="0">
                                                </div><small><i class="feather-info pr--5"></i>Minimum points required
                                                    for the
                                                    student to pass this assignment.</small>
                                            </div>
                                        </div>
                                        <div class="course-field mb--15"><label>Allow to upload files</label>
                                            <div class="row row--15">
                                                <div class="col-lg-4"><input class="shadow-none" type="number" placeholder="0">
                                                </div><small><i class="feather-info pr--5"></i>Define the number of
                                                    files that a
                                                    student can upload in this assignment. Input 0 to disable the option
                                                    to
                                                    upload.</small>
                                            </div>
                                        </div>
                                        <div class="course-field mb--15"><label>Maximum file size limit</label>
                                            <div class="row row--15">
                                                <div class="col-lg-4"><input class="shadow-none" type="number" placeholder="0">
                                                </div><small><i class="feather-info pr--5"></i>Define maximum file size
                                                    attachment
                                                    in MB</small>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="top-circle-shape"></div>
                    <div class="modal-footer pt--30 justify-content-between"><button type="button" class="rbt-btn btn-border btn-md radius-round-10" data-bs-dismiss="modal">Cancel</button><button type="button" class="rbt-btn btn-md">Save
                            &amp; Next</button></div>
                </div>
            </div>
        </div>
        <!-- Assignment Modal -->

        <div class="rbt-separator-mid">
            <div class="container">
                <hr class="rbt-separator m-0">
            </div>
        </div>

        <div class="footer-style-2 ptb--60 bg-color-white">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-12">
                        <div class="inner text-center">

                            <div class="logo logo-dark">
                                <a href="#">
                                    <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Education Logo Images">
                                </a>
                            </div>

                            <div class="logo d-none logo-light">
                                <a href="#">
                                    <img src="{{ asset('assets/images/dark/logo/logo-light.png') }}" alt="Education Logo Images">
                                </a>
                            </div>
                            <!-- Social icone Area -->
                            <ul class="social-icon social-default">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                            <!-- End -->
                            <div class="text mt--20">
                                <p>© 2024 <a target="_blank" href="https://themeforest.net/user/pixcelsthemes/portfolio">Pixcels Themes</a>. All
                                    Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </main>

@endsection