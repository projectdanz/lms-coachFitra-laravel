@extends('layout.layout')

@php
    $footer = 'true';
    $topToBottom = 'true';
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
                                <li class="rbt-breadcrumb-item"><a href="{{ route('mainDemo') }}">Home</a></li>
                                <li>
                                    <div class="icon-right"><i class="feather-chevron-right"></i></div>
                                </li>
                                <li class="rbt-breadcrumb-item active">All Courses</li>
                            </ul>
                            <!-- End Breadcrumb Area  -->

                            <div class=" title-wrapper">
                                <h1 class="title mb--0">All Courses</h1>
                            </div>

                            <p class="description">Pelatihan lengkap untuk pemula yang ingin jadi pebisnis kreatif unggul.
                            </p>
                            <div>
                                <a href="https://ecourse.sekolahkaya.com/dashboard" class="nav-link mycourses-btn">
                                    <span class="mycourses-icon">🎓</span>
                                    My Courses
                                </a>
                            </div>
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
                                        <li class="course-switch-item"><button class="rbt-grid-view active"
                                                title="Grid Layout"><i class="feather-grid"></i> <span
                                                    class="text">Grid</span></button></li>
                                        <li class="course-switch-item"><button class="rbt-list-view"
                                                title="List Layout"><i class="feather-list"></i> <span
                                                    class="text">List</span></button></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            {{-- <div 
                                class="rbt-sorting-list d-flex flex-wrap align-items-end justify-content-start justify-content-lg-end">
                                <div class="rbt-short-item">
                                    <form action="#" class="rbt-search-style me-0">
                                        <input type="text" placeholder="Search Your Course..">
                                        <button type="submit" class="rbt-search-btn rbt-round-btn">
                                            <i class="feather-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-lg-12 mt--60">
                            {{-- <ul class="rbt-portfolio-filter filter-tab-button justify-content-start nav nav-tabs"
                                id="rbt-myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                                        type="button" role="tab" aria-controls="all" aria-selected="true"><span
                                            class="filter-text">All
                                            Course</span>
                                <li class="nav-item" role="presentation">
                                    <button id="featured-tab" data-bs-toggle="tab" data-bs-target="#featured"
                                        type="button" role="tab" aria-controls="featured"
                                        aria-selected="false"><span class="filter-text">Featured</span>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button id="popular-tab" data-bs-toggle="tab" data-bs-target="#popular"
                                        type="button" role="tab" aria-controls="popular"
                                        aria-selected="false"><span class="filter-text">Popular</span>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button id="trending-tab" data-bs-toggle="tab" data-bs-target="#trending"
                                        type="button" role="tab" aria-controls="trending"
                                        aria-selected="false"><span class="filter-text">Trending</span>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button id="latest-tab" data-bs-toggle="tab" data-bs-target="#latest" type="button"
                                        role="tab" aria-controls="latest" aria-selected="false"><span
                                            class="filter-text">Latest</span>
                                </li>
                            </ul> --}}
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
                                                <img src="{{ asset('assets/images/coachFitra/courses/bg-courses-sales.webp') }}"
                                                    alt="Card image">
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">
                                                    Menjadi Top
                                                    Sales Jago Selling</a>
                                            </h4>
                                            <p class="rbt-card-text">IKenapa banyak sales yang rajin promosi tapi tetap gak
                                                ada
                                                closing?Karena skill closing itu...</p>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">Rp299.000</span>
                                                </div>
                                                <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Buy Now<i
                                                        class="feather-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Course  -->

                                <!-- Start Single Course  -->
                                {{-- <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/coachFitra/courses/bg-courses-great-marketing.webp') }}"
                                                    alt="Card image">
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <h4 class="rbt-card-title"><a href="#">
                                                    Coming soon</a>
                                            </h4>
                                            <p class="rbt-card-text">Lorem ipsum dolor sit, amet consectetur adipisicing
                                                elit. Omnis commodi veritatis dolorem doloribus eveniet enim?</p>
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
                                {{-- <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/coachFitra/courses/bg-courses-selling.webp') }}"
                                                    alt="Card image">
                                            </a>
                                        </div>
                                        <div class="rbt-card-body">
                                            <h4 class="rbt-card-title"><a href="#">
                                                    Coming soon</a>
                                            </h4>
                                            <p class="rbt-card-text">Lorem ipsum dolor sit, amet consectetur adipisicing
                                                elit. Omnis commodi veritatis dolorem doloribus eveniet enim?</p>
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
                        </div>
                        <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                            <div class="rbt-course-grid-column">

                                <!-- Start Single Course  -->
                                <div class="course-grid-3">
                                    <div class="rbt-card variation-01 rbt-hover">
                                        <div class="rbt-card-img">
                                            <a href="{{ route('courseDetails') }}">
                                                <img src="{{ asset('assets/images/course/language-academy-05.jpg') }}"
                                                    alt="Card image">
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
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">SQL
                                                    Beginner
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
                                                        <img src="{{ asset('assets/images/client/avatar-02.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Angela</a> In <a
                                                        href="#">Development</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$60</span>
                                                    <span class="off-price">$120</span>
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
                                                <img src="{{ asset('assets/images/course/language-academy-06.jpg') }}"
                                                    alt="Card image">
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
                                                        <img src="{{ asset('assets/images/client/avatar-03.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Slaughter</a> In <a
                                                        href="#">Languages</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$80</span>
                                                    <span class="off-price">$100</span>
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
                                                <img src="{{ asset('assets/images/course/language-academy-02.jpg') }}"
                                                    alt="Card image">
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
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">PHP
                                                    Beginner
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
                                                        <img src="{{ asset('assets/images/client/avatar-02.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Angela</a> In <a
                                                        href="#">Development</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$60</span>
                                                    <span class="off-price">$120</span>
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
                                                <img src="{{ asset('assets/images/course/language-academy-03.jpg') }}"
                                                    alt="Card image">
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
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Angular
                                                    Zero to
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
                                                        <img src="{{ asset('assets/images/client/avatar-03.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Slaughter</a> In <a
                                                        href="#">Languages</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$80</span>
                                                    <span class="off-price">$100</span>
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
                                                <img src="{{ asset('assets/images/course/language-academy-04.jpg') }}"
                                                    alt="Card image">
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

                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Web Front
                                                    To
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
                                                        <img src="{{ asset('assets/images/client/avater-01.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Patrick</a> In <a
                                                        href="#">Languages</a>
                                                </div>
                                            </div>

                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$60</span>
                                                    <span class="off-price">$120</span>
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
                                                <img src="{{ asset('assets/images/course/language-academy-05.jpg') }}"
                                                    alt="Card image">
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
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">SQL
                                                    Beginner
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
                                                        <img src="{{ asset('assets/images/client/avatar-02.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Angela</a> In <a
                                                        href="#">Development</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$60</span>
                                                    <span class="off-price">$120</span>
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
                                                <img src="{{ asset('assets/images/course/language-academy-06.jpg') }}"
                                                    alt="Card image">
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
                                                        <img src="{{ asset('assets/images/client/avatar-03.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Slaughter</a> In <a
                                                        href="#">Languages</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$80</span>
                                                    <span class="off-price">$100</span>
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
                                                <img src="{{ asset('assets/images/course/language-academy-02.jpg') }}"
                                                    alt="Card image">
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
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">PHP
                                                    Beginner
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
                                                        <img src="{{ asset('assets/images/client/avatar-02.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Angela</a> In <a
                                                        href="#">Development</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$60</span>
                                                    <span class="off-price">$120</span>
                                                </div>
                                                <a class="rbt-btn-link left-icon"
                                                    href="{{ route('courseDetails') }}"><i
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
                                                <img src="{{ asset('assets/images/course/language-academy-03.jpg') }}"
                                                    alt="Card image">
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
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Angular
                                                    Zero to
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
                                                        <img src="{{ asset('assets/images/client/avatar-03.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Slaughter</a> In <a
                                                        href="#">Languages</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$80</span>
                                                    <span class="off-price">$100</span>
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
                                                <img src="{{ asset('assets/images/course/language-academy-04.jpg') }}"
                                                    alt="Card image">
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

                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Web
                                                    Front To
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
                                                        <img src="{{ asset('assets/images/client/avater-01.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Patrick</a> In <a
                                                        href="#">Languages</a>
                                                </div>
                                            </div>

                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$60</span>
                                                    <span class="off-price">$120</span>
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
                                                <img src="{{ asset('assets/images/course/language-academy-03.jpg') }}"
                                                    alt="Card image">
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
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Angular
                                                    Zero to
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
                                                        <img src="{{ asset('assets/images/client/avatar-03.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Slaughter</a> In <a
                                                        href="#">Languages</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$80</span>
                                                    <span class="off-price">$100</span>
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
                                                <img src="{{ asset('assets/images/course/language-academy-04.jpg') }}"
                                                    alt="Card image">
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

                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Web
                                                    Front To
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
                                                        <img src="{{ asset('assets/images/client/avater-01.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Patrick</a> In <a
                                                        href="#">Languages</a>
                                                </div>
                                            </div>

                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$60</span>
                                                    <span class="off-price">$120</span>
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
                                                <img src="{{ asset('assets/images/course/language-academy-05.jpg') }}"
                                                    alt="Card image">
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
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">SQL
                                                    Beginner
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
                                                        <img src="{{ asset('assets/images/client/avatar-02.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Angela</a> In <a
                                                        href="#">Development</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$60</span>
                                                    <span class="off-price">$120</span>
                                                </div>
                                                <a class="rbt-btn-link left-icon"
                                                    href="{{ route('courseDetails') }}"><i
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
                                                <img src="{{ asset('assets/images/course/language-academy-06.jpg') }}"
                                                    alt="Card image">
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
                                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">JS Zero
                                                    to
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
                                                        <img src="{{ asset('assets/images/client/avatar-03.png') }}"
                                                            alt="Sophia Jaymes">
                                                    </a>
                                                </div>
                                                <div class="rbt-author-info">
                                                    By <a href="{{ route('profile') }}">Slaughter</a> In <a
                                                        href="#">Languages</a>
                                                </div>
                                            </div>
                                            <div class="rbt-card-bottom">
                                                <div class="rbt-price">
                                                    <span class="current-price">$80</span>
                                                    <span class="off-price">$100</span>
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
    <div class="whatsapp-icon" onclick="openWhatsApp()">
        <svg viewBox="0 0 24 24">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.465 3.488" />
        </svg>
        <div class="notification-badge">!</div>
    </div>
    <style>
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

    <x-separator />
@endsection
<script>
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
