@extends('frontend.layouts.master')
@section('content')
    <!--==========================
    BANNER PART START
===========================-->
    @include('frontend.sections.hero-banner')
    <!--==========================
        BANNER PART END
    ===========================-->


    <!--==========================
        CATEGORY SLIDER START
    ===========================-->
    @include('frontend.sections.category-slider-section')
    <!--==========================
        CATEGORY SLIDER END
    ===========================-->


    <!--==========================
        FEATURES PART START
    ===========================-->
    @include('frontend.sections.features-section')
    <!--==========================
        FEATURES PART END
    ===========================-->


    <!--==========================
        COUNTER PART START
    ===========================-->
    @include('frontend.sections.counter-section')
    <!--==========================
        COUNTER PART END
    ===========================-->


    <!--==========================
        OUR CATEGORY START
    ===========================-->
    @include('frontend.sections.featured-category-section')
    <!--==========================
        OUR CATEGORY END
    ===========================-->


    <!--==========================
        OUR LOCATION START
    ===========================-->
    @include('frontend.sections.featured-location-section')
    <!--==========================
        OUR LOCATION END
    ===========================-->


    <!--==========================
        FEATURED LISTING START
    ===========================-->
    @include('frontend.sections.featured-listing-section')
    <!--==========================
        FEATURED LISTING END
    ===========================-->


    <!--==========================
        OUR PACKAGE START
    ===========================-->
    @include('frontend.sections.featured-package-section')
    <!--==========================
        OUR PACKAGE END
    ===========================-->


    <!--============================
        TESTIMONIAL PART START
    ==============================-->
    @include('frontend.sections.testimonial-section')
    <!--============================
        TESTIMONIAL PART END
    ==============================-->


    <!--==========================
        BLOG PART START
    ===========================-->
    @include('frontend.sections.blog-section')
    <!--==========================
        BLOG PART END
    ===========================-->

@endsection
