@extends('frontend.layouts.master')
@section('title', 'Payment Success')

@section('content')
    <!-- Breadcrumb Section -->
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>Payment Success</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Payment Success</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Section -->
    <section id="wsus__package">
        <div class="wsus__package_overlay">
            <div class="container py-5">
                <div class="text-center">
                    <i style="font-size: 5rem; color: green;" class="fa-solid fa-circle-check success-animation"></i>
                    <h2 class="mt-3">Payment Successful</h2>
                    <p class="text-muted">Thank you for your payment. Your transaction has been completed successfully.</p>

                    <!-- Action Buttons -->
                    <div class="mt-4">
                        <a href="{{ route('home') }}" class="btn btn-primary me-2">
                            <i class="fas fa-home me-1"></i> Go to Home
                        </a>
                        <a href="{{ route('user.dashboard') }}" class="btn btn-secondary me-2">
                            <i class="fas fa-dashboard me-1"></i> Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css')
    <style>
        .success-animation {
            animation: scaleUp 0.5s ease-in-out;
        }

        @keyframes scaleUp {
            0% { transform: scale(0); opacity: 0; }
            50% { transform: scale(1.2); opacity: 0.8; }
            100% { transform: scale(1); opacity: 1; }
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .card-header {
            border-radius: 0 !important;
        }

        hr {
            margin: 8px 0;
            opacity: 0.3;
        }

        .btn {
            border-radius: 25px;
            padding: 10px 25px;
            font-weight: 500;
        }
    </style>
@endpush
