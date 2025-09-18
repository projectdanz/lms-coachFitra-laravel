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
                                    Sekolah Kaya adalah platform e-course bisnis terdepan yang dirancang untuk membantu Anda
                                    meraih kebebasan finansial dan mengembangkan keterampilan wirausaha secara
                                    praktis.</strong>
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
                                    {{-- <div class="swiper-slide">
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
                                                        <span class="current-price">Rp0</span>
                                                    </div>
                                                    <a class="rbt-btn-link" href="#">Coming Soon<i
                                                            class="feather-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!-- End Single Card  -->

                                    <!-- Start Single Card  -->
                                    {{-- <div class="swiper-slide">
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
                                                        <span class="current-price">Rp0</span>
                                                    </div>
                                                    <a class="rbt-btn-link" href="#">Coming Soon<i
                                                            class="feather-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
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
                    {{-- <div class="col-lg-4 col-md-6 col-12">
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
                                        <span class="current-price">Rp0</span>
                                    </div>
                                    <a class="rbt-btn-link" href="#">Coming Soon<i
                                            class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- End Single Course  -->

                    <!-- Start Single Course  -->
                    {{-- <div class="col-lg-4 col-md-6 col-12">
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
                                        <span class="current-price">Rp0</span>
                                    </div>
                                    <a class="rbt-btn-link" href="#">Coming Soon<i
                                            class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
        {{-- <div class="rbt-event-area rbt-section-gap bg-gradient-3">
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
                                                        <span>2025</span> 
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
                                                        <span>2025</span> 
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
                                                         href="{{ route('eventDetails') }}" 
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
                                                        <span>2025</span> 
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
                                                         <span>2025</span> 
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
        </div> --}}
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
                                        title="Testimoni 1" frameborder="0"
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
                            <!-- WhatsApp Floating Icon -->
                            <div class="whatsapp-icon" onclick="openWhatsApp()">
                                <svg viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.465 3.488" />
                                </svg>
                                <div class="notification-badge">!</div>
                            </div>
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
                                        <a href="https://ecourse.sekolahkaya.com/dashboard" class="nav-link">My
                                            Courses</a>
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
        <style>
            .social-icon {
                display: flex;
                gap: 15px;
                /* jarak antar ikon */
                align-items: center;
                /* biar sejajar tengah */
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
                background: #f5f5f5;
                /* warna background bulat */
                color: #333;
                font-size: 18px;
                transition: 0.3s;
            }

            .social-icon li a:hover {
                background: #007bff;
                /* ganti warna saat hover */
                color: #fff;
            }

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

            .whatsapp-icon {
                position: fixed;
                bottom: 20px;
                right: 20px;
                width: 60px;
                height: 60px;
                background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
                transition: all 0.3s ease;
                z-index: 1000;
            }

            .whatsapp-icon:hover {
                transform: scale(1.1);
                box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
            }

            .whatsapp-icon svg {
                width: 32px;
                height: 32px;
                fill: white;
            }

            .notification-badge {
                position: absolute;
                top: -2px;
                right: -2px;
                width: 20px;
                height: 20px;
                background-color: #ff4757;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 12px;
                font-weight: bold;
                color: white;
                border: 2px solid white;
            }

            /* Demo content */
            .demo-content {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                background: white;
                border-radius: 10px;
                margin-bottom: 100px;
            }

            .demo-content h1 {
                color: #333;
                margin-bottom: 20px;
            }

            .demo-content p {
                color: #666;
                line-height: 1.6;
                margin-bottom: 15px;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .whatsapp-icon {
                    width: 50px;
                    height: 50px;
                    bottom: 15px;
                    right: 15px;
                }

                .whatsapp-icon svg {
                    width: 26px;
                    height: 26px;
                }

                .notification-badge {
                    width: 16px;
                    height: 16px;
                    font-size: 10px;
                }
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

        function openWhatsApp() {
            // Ganti nomor ini dengan nomor WhatsApp Anda
            const phoneNumber = '6285135904447'; // Format: 62 untuk Indonesia + nomor tanpa 0 di depan
            const message =
            'halo! saya ingin bertanya mengenai sekolah kaya.'; // Pesan default

            // Encode pesan untuk URL
            const encodedMessage = encodeURIComponent(message);

            // Buat URL WhatsApp
            const whatsappURL = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

            // Buka WhatsApp di tab/window baru
            window.open(whatsappURL, '_blank');
        }

        // Efek animasi saat page load
        window.addEventListener('load', function() {
            const icon = document.querySelector('.whatsapp-icon');
            icon.style.transform = 'scale(0)';
            setTimeout(() => {
                icon.style.transform = 'scale(1)';
            }, 500);
        });

        // Pulsing effect setiap 3 detik
        setInterval(() => {
            const icon = document.querySelector('.whatsapp-icon');
            icon.style.animation = 'pulse 0.6s ease-in-out';
            setTimeout(() => {
                icon.style.animation = '';
            }, 600);
        }, 3000);

        // CSS untuk animasi pulse
        const style = document.createElement('style');
        style.textContent = `
            @keyframes pulse {
                0% { transform: scale(1); }
                50% { transform: scale(1.2); }
                100% { transform: scale(1); }
            }
        `;
        document.head.appendChild(style);
    </script>
