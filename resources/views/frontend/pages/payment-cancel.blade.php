@extends('frontend.layouts.master')
@section('title', 'Payment Cancelled')

@section('content')
    <!-- Breadcrumb Section -->
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>Payment Cancelled</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Payment Cancelled</li>
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
                    <i style="font-size: 5rem; color: red;" class="fa-solid fa-circle-xmark success-animation"></i>
                    <h2 class="mt-3">Payment Cancelled</h2>
                    <p class="text-muted">Your payment has been cancelled. If you have any questions, please contact our support team.</p>
                    @session('error')
                    <p class="text-muted alert alert-danger my-3">
                        {{ $message }}
                    </p>
                    @endsession

                    <!-- Action Buttons -->
                    <div class="mt-4">
                        <a href="{{ route('home') }}" class="btn btn-primary me-2">
                            <i class="fas fa-home me-1"></i> Go to Home
                        </a>
                        <a href="" class="btn btn-secondary me-2">
                            <i class="fas fa-envelope me-1"></i> Contact Support
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
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
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
