@extends('frontend.layouts.master')
@section('title', 'All Packages')

@section('content')

    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>Packages</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> All Packages</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="wsus__package">
        <div class="wsus__package_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 m-auto">
                        <div class="wsus__heading_area">
                            <h2>Our pricing </h2>
                            <p>Lorem ipsum dolor sit amet, qui assum oblique praesent te. Quo ei erant essent scaevola
                                estut clita dolorem ei est mazim fuisset scribentur.</p>
                        </div>
                    </div>
                </div>
                <div class="procing_area">
                    <div class="row">
                        @foreach ($packages as $package)
                            <div class="col-xl-4 col-md-6 col-lg-4">
                                <div class="member_price">
                                    <h4>{{ $package->name }}</h4>
                                    <h5> {{ $package->price }}

                                        @if ($package->number_of_days == -1)
                                            <span>/ Lifetime</span>
                                        @else
                                            <span>/ {{ $package->number_of_days }} Days</span>
                                        @endif

                                    </h5>

                                    @foreach ($package->features as $feature)
                                        <p>{{ $feature->feature }}</p>
                                    @endforeach

                                    <a href="">Order now</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
