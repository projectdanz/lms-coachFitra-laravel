@extends('layout.layout')

@php
     $footer='true';
     $topToBottom='true';
@endphp

@section('content')

    <!-- Mobile Menu Section -->
    <div class="popup-mobile-menu">
        <div class="inner-wrapper">
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
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Start Side Vav -->
    <x-sideVav/>
    <!-- End Side Vav -->

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-page-banner-wrapper">
        <!-- Start Banner BG Image  -->
        <div class="rbt-banner-image"></div>
        <!-- End Banner BG Image  -->
        <div class="rbt-banner-content">

            <!-- Start Banner Content Top  -->
            <div class="rbt-banner-content-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Start Breadcrumb Area  -->
                            <ul class="page-list">
                                <li class="rbt-breadcrumb-item"><a href="#">Home</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">All Courses</li>
                            </ul>
                            <!-- End Breadcrumb Area  -->

                            <div class=" title-wrapper">
                                <h1 class="title mb--0">All Courses</h1>
                            </div>

                            <p class="description">Courses that help beginner designers become true unicorns. </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Banner Content Top  -->
            <!-- Start Course Top  -->
            <div class="rbt-course-top-wrapper mt--40">
                <div class="container">
                    <div class="row g-5 align-items-center">

                        <div class="col-lg-5 col-md-12">
                            <div class="rbt-sorting-list d-flex flex-wrap align-items-center">
                                <div class="rbt-short-item switch-layout-container">
                                    <ul class="course-switch-layout">
                                        <li class="course-switch-item"><button class="rbt-grid-view active" title="Grid Layout"><i class="feather-grid"></i> <span class="text">Grid</span></button></li>
                                        <li class="course-switch-item"><button class="rbt-list-view" title="List Layout"><i class="feather-list"></i> <span class="text">List</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt--60">
                            <ul class="rbt-portfolio-filter filter-tab-button justify-content-start nav nav-tabs" id="rbt-myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true"><span class="filter-text">All
                                            Course</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button id="featured-tab" data-bs-toggle="tab" data-bs-target="#featured" type="button" role="tab" aria-controls="featured" aria-selected="false"><span
                                            class="filter-text">Featured</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button id="popular-tab" data-bs-toggle="tab" data-bs-target="#popular" type="button" role="tab" aria-controls="popular" aria-selected="false"><span
                                            class="filter-text">Popular</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button id="trending-tab" data-bs-toggle="tab" data-bs-target="#trending" type="button" role="tab" aria-controls="trending" aria-selected="false"><span
                                            class="filter-text">Trending</span></button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button id="latest-tab" data-bs-toggle="tab" data-bs-target="#latest" type="button" role="tab" aria-controls="latest" aria-selected="false"><span
                                            class="filter-text">Latest</span></button>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Course Top  -->
        </div>
    </div>

    <div class="rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <!-- Start Card Area -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content" id="rbt-myTabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="rbt-course-grid-column">

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="https://sekolahkaya.com/wp-content/uploads/2025/07/5.webp" alt="Card image">
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Protected: Menjadi Top Sales Jago Selling</a>
                                            </h4>

                                            <p class="rbt-card-text">Kenapa banyak sales yang rajin promosi tapi tetap gak ada closing?Karena skill closing itu...</p>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">Rp299.000</span>
                                                </div>
                                                <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Buy 
                                                Now<i class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="https://lms.sohibdigi.id/wp-content/uploads/2025/08/1.webp" alt="Card image">
                                            </a>
                                        </div>

                                        <div class="rbt-card-body">

                                            <h4 class="rbt-card-title">Protected: Coming Soon</h4>

                                            <p class="rbt-card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, quam expedita! Beatae enim...</p>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">Rp0</span>
                                                </div>
                                                <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Coming Soon<i class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="https://lms.sohibdigi.id/wp-content/uploads/2025/08/2.webp" alt="Card image">
                                            </a>
                                        </div>

                                        <div class="rbt-card-body">

                                            <h4 class="rbt-card-title">Protected: Coming Soon</h4>

                                            <p class="rbt-card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, quam expedita! Beatae enim...</p>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">Rp0</span>
                                                </div>
                                                <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Coming Soon<i class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                            <div class="rbt-course-grid-column">

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-05.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (15 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">SQL Beginner
                                                    Advanced</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>12 Lessons</li>
                                                <li><i class="feather-users"></i>50 Students</li>
                                            </ul>
                                            <p class="rbt-card-text">It is a long established fact that a reader will be
                                                distracted
                                                by the readable.</p>
                                            <div class="rbt-author-meta mb--20">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avatar-02.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Angela</a> In <a href="#">Development</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">Rp1</span>
                                                </div>
                                                <a class="rbt-btn-link left-icon" href="{{ route('courseDetails') }}"><i
                                                        class="feather-shopping-cart"></i> Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-06.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (5 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">JS Zero to
                                                    Mastery</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>8 Lessons</li>
                                                <li><i class="feather-users"></i>30 Students</li>
                                            </ul>
                                            <p class="rbt-card-text">Angular Js long fact that a reader will be
                                                distracted by
                                                the readable.</p>

                                            <div class="rbt-author-meta mb--20">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avatar-03.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Slaughter</a> In <a href="#">Languages</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">Rp1</span>
                                                </div>
                                                <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Learn
                                                    More<i class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                            </div>
                        </div>
                        <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                            <div class="rbt-course-grid-column">
                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-02.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (15 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">PHP Beginner
                                                    Advanced</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>12 Lessons</li>
                                                <li><i class="feather-users"></i>50 Students</li>
                                            </ul>

                                            <p class="rbt-card-text">It is a long established fact that a reader will be
                                                distracted.</p>
                                            <div class="rbt-author-meta mb--10">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avatar-02.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Angela</a> In <a href="#">Development</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">Rp1</span>
                                                </div>
                                                <a class="rbt-btn-link left-icon" href="{{ route('courseDetails') }}"><i
                                                        class="feather-shopping-cart"></i> Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-03.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (5 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Angular Zero to
                                                    Mastery</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>8 Lessons</li>
                                                <li><i class="feather-users"></i>30 Students</li>
                                            </ul>
                                            <p class="rbt-card-text">Angular Js long fact that a reader will be
                                                distracted by
                                                the readable.</p>

                                            <div class="rbt-author-meta mb--20">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avatar-03.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Slaughter</a> In <a href="#">Languages</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">Rp1</span>
                                                </div>
                                                <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Learn
                                                    More<i class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-04.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (15 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>

                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Web Front To
                                                    Back</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>20 Lessons</li>
                                                <li><i class="feather-users"></i>40 Students</li>
                                            </ul>
                                            <p class="rbt-card-text">Web Js long fact that a reader will be distracted
                                                by
                                                the readable.</p>
                                            <div class="rbt-author-meta mb--20">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avater-01.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Patrick</a> In <a href="#">Languages</a>
                                                </div>
                                            </div>

                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">Rp1</span>
                                                </div>
                                                <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Learn
                                                    More<i class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-05.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (15 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">SQL Beginner
                                                    Advanced</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>12 Lessons</li>
                                                <li><i class="feather-users"></i>50 Students</li>
                                            </ul>
                                            <p class="rbt-card-text">It is a long established fact that a reader will be
                                                distracted
                                                by the readable.</p>
                                            <div class="rbt-author-meta mb--20">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avatar-02.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Angela</a> In <a href="#">Development</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">Rp1</span>
                                                </div>
                                                <a class="rbt-btn-link left-icon" href="{{ route('courseDetails') }}"><i
                                                        class="feather-shopping-cart"></i> Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-06.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (5 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">JS Zero to
                                                    Mastery</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>8 Lessons</li>
                                                <li><i class="feather-users"></i>30 Students</li>
                                            </ul>
                                            <p class="rbt-card-text">Angular Js long fact that a reader will be
                                                distracted by
                                                the readable.</p>

                                            <div class="rbt-author-meta mb--20">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avatar-03.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Slaughter</a> In <a href="#">Languages</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">Rp1</span>
                                                </div>
                                                <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Learn
                                                    More<i class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="trending" role="tabpanel" aria-labelledby="trending-tab">
                            <div class="rbt-course-grid-column">
                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-02.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (15 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">PHP Beginner
                                                    Advanced</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>12 Lessons</li>
                                                <li><i class="feather-users"></i>50 Students</li>
                                            </ul>

                                            <p class="rbt-card-text">It is a long established fact that a reader will be
                                                distracted.</p>
                                            <div class="rbt-author-meta mb--10">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avatar-02.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Angela</a> In <a href="#">Development</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$60</span>
                                                </div>
                                                <a class="rbt-btn-link left-icon" href="{{ route('courseDetails') }}"><i
                                                        class="feather-shopping-cart"></i> Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-03.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (5 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Angular Zero to
                                                    Mastery</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>8 Lessons</li>
                                                <li><i class="feather-users"></i>30 Students</li>
                                            </ul>
                                            <p class="rbt-card-text">Angular Js long fact that a reader will be
                                                distracted by
                                                the readable.</p>

                                            <div class="rbt-author-meta mb--20">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avatar-03.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Slaughter</a> In <a href="#">Languages</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$80</span>
                                                </div>
                                                <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Learn
                                                    More<i class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-04.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (15 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>

                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Web Front To
                                                    Back</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>20 Lessons</li>
                                                <li><i class="feather-users"></i>40 Students</li>
                                            </ul>
                                            <p class="rbt-card-text">Web Js long fact that a reader will be distracted
                                                by
                                                the readable.</p>
                                            <div class="rbt-author-meta mb--20">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avater-01.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Patrick</a> In <a href="#">Languages</a>
                                                </div>
                                            </div>

                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$60</span>
                                                </div>
                                                <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Learn
                                                    More<i class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->
                            </div>
                        </div>
                        <div class="tab-pane fade" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                            <div class="rbt-course-grid-column">
                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-03.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (5 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Angular Zero to
                                                    Mastery</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>8 Lessons</li>
                                                <li><i class="feather-users"></i>30 Students</li>
                                            </ul>
                                            <p class="rbt-card-text">Angular Js long fact that a reader will be
                                                distracted by
                                                the readable.</p>

                                            <div class="rbt-author-meta mb--20">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avatar-03.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Slaughter</a> In <a href="#">Languages</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$80</span>
                                                </div>
                                                <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Learn
                                                    More<i class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-04.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (15 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>

                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Web Front To
                                                    Back</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>20 Lessons</li>
                                                <li><i class="feather-users"></i>40 Students</li>
                                            </ul>
                                            <p class="rbt-card-text">Web Js long fact that a reader will be distracted
                                                by
                                                the readable.</p>
                                            <div class="rbt-author-meta mb--20">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avater-01.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Patrick</a> In <a href="#">Languages</a>
                                                </div>
                                            </div>

                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$60</span>
                                                </div>
                                                <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Learn
                                                    More<i class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-05.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (15 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">SQL Beginner
                                                    Advanced</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>12 Lessons</li>
                                                <li><i class="feather-users"></i>50 Students</li>
                                            </ul>
                                            <p class="rbt-card-text">It is a long established fact that a reader will be
                                                distracted
                                                by the readable.</p>
                                            <div class="rbt-author-meta mb--20">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avatar-02.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Angela</a> In <a href="#">Development</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$60</span>
                                                </div>
                                                <a class="rbt-btn-link left-icon" href="{{ route('courseDetails') }}"><i
                                                        class="feather-shopping-cart"></i> Add To Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-06.jpg') }}" alt="Card image">
                                                <div class="rbt-badge-3 bg-white">
                                                    <span>-40%</span>
                                                    <span>Off</span>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <div class="rbt-card-top">
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (5 Reviews)</span>
                                                </div>
                                                <div class="rbt-bookmark-btn">
                                                    <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                            class="feather-bookmark"></i></a>
                                                </div>
                                            </div>
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">JS Zero to
                                                    Mastery</a>
                                            </h4>
                                            <ul class="rbt-meta">
                                                <li><i class="feather-book"></i>8 Lessons</li>
                                                <li><i class="feather-users"></i>30 Students</li>
                                            </ul>
                                            <p class="rbt-card-text">Angular Js long fact that a reader will be
                                                distracted by
                                                the readable.</p>

                                            <div class="rbt-author-meta mb--20">
                                                <div class="rbt-avater">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/images/client/avatar-03.png') }}" alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Slaughter</a> In <a href="#">Languages</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$80</span>
                                                </div>
                                                <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Learn
                                                    More<i class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-separator/>

@endsection
