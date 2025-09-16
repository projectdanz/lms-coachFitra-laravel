@extends('layout.layout')

@php
    $topToBottom = 'true';
@endphp

@section('content')
    <!-- Mobile Menu Section -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
                                <img src="{{ asset('assets/images/dark/logo/logo-light.png') }}"
                                    alt="Education Logo Images">
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

            <div class="mobile-menu-bottom">

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
    <x-sideVav />
    <!-- End Side Vav -->

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <main class="rbt-main-wrapper">
        <!-- Start Banner Area -->
        <div class="rbt-banner-area rbt-banner-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 pb--120 pt--70">
                        <div class="content">
                            <div class="inner">
                                <div class="rbt-new-badge rbt-new-badge-one">
                                    <span class="rbt-new-badge-icon">🏆</span> Sekolah Kaya
                                </div>

                                <h1 class="title">
                                    THE BEST <br> BISNIS ECOURSE <br> YANG PERNAH ADA
                                </h1>
                                <p class="description">
                                    Sekolah Kaya adalah platform e-course bisnis terdepan yang dirancang untuk membantu Anda meraih kebebasan finansial dan mengembangkan keterampilan wirausaha secara praktis.</strong>
                                </p>
                                <div class="slider-btn">
                                    <a class="rbt-btn btn-gradient hover-icon-reverse" href="#popular-course">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">View Course</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            {{-- <div class="shape-wrapper" id="scene">
                                <img src="{{ asset('assets/images/coachFitra/FotoCoachFitra1.jpeg') }}" alt="Hero Image">
                                <div class="hero-bg-shape-1 layer" data-depth="0.4">
                                    <img src="{{ asset('assets/images/shape/shape-01.png') }}" alt="Hero Image Background Shape">
                                </div>
                                <div class="hero-bg-shape-2 layer" data-depth="0.4">
                                    <img src="{{ asset('assets/images/shape/shape-02.png') }}" alt="Hero Image Background Shape">
                                </div>
                            </div> --}}

                            <div class="banner-card pb--60 mb--50 swiper rbt-dot-bottom-center banner-swiper-active">
                                <div class="swiper-wrapper">

                                    <!-- Start Single Card  -->
                                    <div class="swiper-slide">
                                        <div class="rbt-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('courseDetails') }}">
                                                    <img src="{{ asset('assets/images/coachFitra/courses/bg-courses-sales.webp') }}"
                                                        alt="Card image">
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Ruang
                                                        Kelas Menjadi Sales Jago Closing</a>
                                                </h4>

                                                <p class="rbt-card-text">Kenapa banyak sales yang rajin promosi tapi tetap
                                                    gak ada closing?Karena skill closing itu...</p>
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
                                    <!-- End Single Card  -->

                                    <!-- Start Single Card  -->
                                    <div class="swiper-slide">
                                        <div class="rbt-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('courseDetails') }}">
                                                    <img src="{{ asset('assets/images/coachFitra/courses/bg-courses-great-marketing.webp') }}"
                                                        alt="Card image">
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">

                                                <h4 class="rbt-card-title">Protected: Coming Soon</h4>

                                                <p class="rbt-card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Illo, quam expedita! Beatae enim...</p>
                                                <div class="rbt-card-bottom">
                                                    <div class="rbt-price">
                                                        {{-- <span class="current-price">Rp0</span> --}}
                                                    </div>
                                                    <a class="rbt-btn-link" href="#">Coming Soon<i class="feather-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->

                                    <!-- Start Single Card  -->
                                    <div class="swiper-slide">
                                        <div class="rbt-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('courseDetails') }}">
                                                    <img src="{{ asset('assets/images/coachFitra/courses/bg-courses-selling.webp') }}"
                                                        alt="Card image">
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">

                                                <h4 class="rbt-card-title">Protected: Coming Soon</h4>

                                                <p class="rbt-card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Illo, quam expedita! Beatae enim...</p>
                                                <div class="rbt-card-bottom">
                                                    <div class="rbt-price">
                                                        {{-- <span class="current-price">Rp0</span> --}}
                                                    </div>
                                                    <a class="rbt-btn-link" href="#">Coming Soon<i class="feather-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->

                                </div>
                                <div class="rbt-swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Area -->

        <!-- Start Course Area -->
        <div class="rbt-course-area bg-color-extra2 rbt-section-gap">
            <div class="container">
                <div class="row mb--60">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle bg-secondary-opacity" id="popular-course">Top Popular Course</span>
                            <h2 class="title">Siswa Sekolah Kaya <br> bisa bergabung bersama kami!</h2>
                        </div>
                    </div>
                </div>
                <!-- Start Card Area -->
                <div class="row g-5">
                    <!-- Start Single Course  -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('courseDetails') }}">
                                    <img src="{{ asset('assets/images/coachFitra/courses/bg-courses-sales.webp') }}"
                                        alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Menjadi Top
                                        Sales Jago Selling</a>
                                </h4>
                                <p class="rbt-card-text">Kenapa banyak sales yang rajin promosi tapi tetap gak ada
                                    closing?Karena skill closing itu...</p>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        <span class="current-price">Rp299.000</span>
                                    </div>
                                    <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Buy now<i
                                            class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Course  -->

                    <!-- Start Single Course  -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('courseDetails') }}">
                                    <img src="{{ asset('assets/images/coachFitra/courses/bg-courses-selling.webp') }}"
                                        alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Protected: Coming
                                        Soon</a>
                                </h4>
                                <p class="rbt-card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo,
                                    quam expedita! Beatae enim...</p>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        {{-- <span class="current-price">Rp0</span> --}}
                                    </div>
                                    <a class="rbt-btn-link" href="#">Coming Soon<i
                                            class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Course  -->

                    <!-- Start Single Course  -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('courseDetails') }}">
                                    <img src="{{ asset('assets/images/coachFitra/courses/bg-courses-great-marketing.webp') }}"
                                        alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Protected: Coming
                                        Soon</a>
                                </h4>
                                <p class="rbt-card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo,
                                    quam expedita! Beatae enim...</p>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        {{-- <span class="current-price">Rp0</span> --}}
                                    </div>
                                    <a class="rbt-btn-link" href="#">Coming Soon<i
                                            class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Course  -->
                </div>
                <!-- End Card Area -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="load-more-btn mt--60 text-center">
                            <a class="rbt-btn btn-gradient btn-lg hover-icon-reverse"
                                href="{{ route('courseWithTab') }}">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Load More Course</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Event Area  -->
        <div class="rbt-event-area rbt-section-gap bg-gradient-3">
            <div class="container">
                <div class="row mb--55">
                    <div class="section-title text-center">
                        <span class="subtitle bg-white-opacity">Tertarik untuk Ikut?</span>
                        <h2 class="title color-white">Event Seru yang Akan Datang</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            class="swiper event-activation-1 rbt-arrow-between rbt-dot-bottom-center pb--60 icon-bg-primary">

                            <div class="swiper-wrapper">
                                <!-- Start Single Slide  -->
                                <div class="swiper-slide">
                                    <div class="single-slide">
                                        <div class="rbt-card event-grid-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/coachFitra/events/bg-courses-great-marketing.webp') }}"
                                                        alt="Card image">
                                                    <div class="rbt-badge-3 bg-white">
                                                        <span>Default</span>
                                                        {{-- <span>2025</span> --}}
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <ul class="rbt-meta">
                                                    <li><i class="feather-map-pin"></i>Default</li>
                                                    <li><i class="feather-clock"></i>8:00 am - 5:00 pm</li>
                                                </ul>
                                                <h4 class="rbt-card-title"><a href="#">Events:
                                                        Selling Expert with Coach Fitra</a></h4>

                                                <div class="read-more-btn">
                                                    <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round"
                                                        href="#">
                                                        <span class="icon-reverse-wrapper">
                                                            <span class="btn-text">Get Ticket</span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide  -->
                                <!-- Start Single Slide  -->
                                <div class="swiper-slide">
                                    <div class="single-slide">
                                        <div class="rbt-card event-grid-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/coachFitra/events/bg-courses-selling.webp') }}"
                                                        alt="Card image">
                                                    <div class="rbt-badge-3 bg-white">
                                                        <span>Default</span>
                                                        {{-- <span>2025</span> --}}
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <ul class="rbt-meta">
                                                    <li><i class="feather-map-pin"></i>Default</li>
                                                    <li><i class="feather-clock"></i>8:00 am - 5:00 pm</li>
                                                </ul>
                                                <h4 class="rbt-card-title"><a href="#">Events:
                                                        Menjadi Top Sales</a></h4>
                                                <div class="read-more-btn">
                                                    <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round">
                                                        {{-- href="{{ route('eventDetails') }}" --}}
                                                        <span class="icon-reverse-wrapper">
                                                            <span class="btn-text">Get Ticket</span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide  -->

                                <!-- Start Single Slide  -->
                                <div class="swiper-slide">
                                    <div class="single-slide">
                                        <div class="rbt-card event-grid-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/coachFitra/events/bg-courses-great-marketing.webp') }}"
                                                        alt="Card image">
                                                    <div class="rbt-badge-3 bg-white">
                                                        <span>Default</span>
                                                        {{-- <span>2025</span> --}}
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <ul class="rbt-meta">
                                                    <li><i class="feather-map-pin"></i>Default</li>
                                                    <li><i class="feather-clock"></i>8:00 am - 5:00 pm</li>
                                                </ul>
                                                <h4 class="rbt-card-title"><a href="#">Events:
                                                        Great Marketing</a></h4>

                                                <div class="read-more-btn">
                                                    <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round"
                                                        href="#">
                                                        <span class="icon-reverse-wrapper">
                                                            <span class="btn-text">Get Ticket</span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide  -->

                                <!-- Start Single Slide  -->
                                <div class="swiper-slide">
                                    <div class="single-slide">
                                        <div class="rbt-card event-grid-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="#">
                                                    <img src="{{ asset('assets/images/coachFitra/events/bg-courses-selling.webp') }}"
                                                        alt="Card image">
                                                    <div class="rbt-badge-3 bg-white">
                                                        <span>Default</span>
                                                        {{-- <span>2025</span> --}}
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <ul class="rbt-meta">
                                                    <li><i class="feather-map-pin"></i>Default</li>
                                                    <li><i class="feather-clock"></i>8:00 am - 5:00 pm</li>
                                                </ul>
                                                <h4 class="rbt-card-title"><a href="#">Events:
                                                        studying together</a>
                                                </h4>

                                                <div class="read-more-btn">
                                                    <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round"
                                                        href="#">
                                                        <span class="icon-reverse-wrapper">
                                                            <span class="btn-text">Get Ticket</span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide  -->
                            </div>

                            <div class="rbt-swiper-arrow rbt-arrow-left">
                                <div class="custom-overfolow">
                                    <i class="rbt-icon feather-arrow-left"></i>
                                    <i class="rbt-icon-top feather-arrow-left"></i>
                                </div>
                            </div>

                            <div class="rbt-swiper-arrow rbt-arrow-right">
                                <div class="custom-overfolow">
                                    <i class="rbt-icon feather-arrow-right"></i>
                                    <i class="rbt-icon-top feather-arrow-right"></i>
                                </div>
                            </div>

                            <div class="rbt-swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Event area -->

        <!-- Start Testimoni area -->
        <section class="rbt-section-gap bg-color-white overflow-hidden">
    <div class="container text-center">
        <h2 class="title color-heading mb--20">
            Testimonial
        </h2>

        <div class="swiper event-activation-1 rbt-arrow-between rbt-dot-bottom-center pb--60 icon-bg-primary">
            <div class="swiper-wrapper">

                <!-- Video 1 -->
                <div class="swiper-slide">
                    <div class="single-slide">
                        <div style="display:flex; justify-content:center; align-items:center; height:100%;">
                            <iframe 
                                src="https://www.youtube.com/embed/lfLzLBcFKwM?rel=0&modestbranding=1&playsinline=1"
                                title="Testimoni 1"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                                style="width:100%; max-width:500px; height:315px; border-radius:10px;">
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- Video 2 -->
                {{-- <div class="swiper-slide">
                    <div class="single-slide">
                        <div style="display:flex; justify-content:center; align-items:center; height:100%;">
                            <iframe 
                                src="https://www.youtube.com/embed/dQw4w9WgXcQ?rel=0&modestbranding=1&playsinline=1"
                                title="Testimoni 2"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                                style="width:100%; max-width:500px; height:315px; border-radius:10px;">
                            </iframe>
                        </div>
                    </div>
                </div> --}}

            </div>

            <!-- Pagination -->
            <div class="rbt-swiper-pagination"></div>

            <!-- Arrows -->
            <div class="rbt-swiper-arrow rbt-arrow-left">
                <div class="custom-overfolow">
                    <i class="rbt-icon feather-arrow-left"></i>
                    <i class="rbt-icon-top feather-arrow-left"></i>
                </div>
            </div>

            <div class="rbt-swiper-arrow rbt-arrow-right">
                <div class="custom-overfolow">
                    <i class="rbt-icon feather-arrow-right"></i>
                    <i class="rbt-icon-top feather-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- End Testimoni area -->



        <footer class="rbt-footer footer-style-1 bg-color-white overflow-hidden">
            <div class="footer-top">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <div class="logo logo-dark">
                                    <a href="{{ route('mainDemo') }}">
                                        <img src="https://lms.sohibdigi.id/wp-content/uploads/2025/08/logosekolahkaya.webp"
                                            alt="Edu-cause">
                                    </a>
                                </div>
                                <div class="logo d-none logo-light">
                                    <a href="{{ route('mainDemo') }}">
                                        <img src="https://lms.sohibdigi.id/wp-content/uploads/2025/08/logosekolahkaya.webp"
                                            alt="Edu-cause">
                                    </a>
                                </div>

                                <p class="description mt--20">The Best Bisnis Ecourse Yang Pernah Ada
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

<style>
.social-icon {
    display: flex;
    gap: 15px; /* jarak antar ikon */
    align-items: center; /* biar sejajar tengah */
    padding: 0;
    margin: 0;
    list-style: none;
}

.social-icon li a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #f5f5f5; /* warna background bulat */
    color: #333;
    font-size: 18px;
    transition: 0.3s;
}

.social-icon li a:hover {
    background: #007bff; /* ganti warna saat hover */
    color: #fff;
}
</style>


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
        <style>
            .swiper-slide iframe {
                pointer-events: none;
            }

            .swiper-slide.active iframe {
                pointer-events: auto;
            }
           .swiper-slide iframe {
  pointer-events: auto !important;
  z-index: 10;
  position: relative;
}



        </style>
@endsection
<script>
    var swiper = new Swiper('.event-activation-1', {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        navigation: {
            nextEl: '.rbt-arrow-right',
            prevEl: '.rbt-arrow-left',
        },
        pagination: {
            el: '.rbt-swiper-pagination',
            clickable: true,
        },
        // Penting: enable swipe di mobile
        simulateTouch: true,
        grabCursor: true,
    });
    </script>
