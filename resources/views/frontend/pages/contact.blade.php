@extends('frontend.layouts.master')
@section('title', 'Contact Us')
@section('content')
    <!--==========================
        BREADCRUMB PART START
    ===========================-->
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>Contact us</h4>
                        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==========================
        BREADCRUMB PART END
    ===========================-->


    <!--==========================
        GET IN TOUCH START
    ===========================-->
    <section id="get_in_touch">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact_box">
                        <div class="contact_box_icon">
                            <i class="fal fa-phone-square-alt"></i>
                        </div>
                        <div class="contact_box_text">
                            <a href="callto: +96582462545425">+ 96582462545425</a>
                            <a href="callto: +96582462545425">+ 96582462545425</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact_box">
                        <div class="contact_box_icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact_box_text">
                            <a href="mailto: example@gmail.com">example@gmail.com</a>
                            <a href="mailto: example@gmail.com">example@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact_box">
                        <div class="contact_box_icon">
                            <i class="fal fa-map-marker-alt"></i>
                        </div>
                        <div class="contact_box_text">
                            <p>535 Talbot Street (at Kent Street) London, Ontario</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h2>message here</h2>
                    <form action="{{ route('contact.store') }}" method="POST" novalidate>
                        @csrf

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <strong>Please fix the following errors:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <div class="row my-5">

                            {{-- Name --}}
                            <div class="col-xl-6 mb-3">
                                <div class="contact_input">
                                    <input name="name" type="text"
                                           value="{{ old('name') }}"
                                           placeholder="Name"
                                           class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Email --}}
                            <div class="col-xl-6 mb-3">
                                <div class="contact_input">
                                    <input type="email" name="email"
                                           value="{{ old('email') }}"
                                           placeholder="Email"
                                           class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Phone --}}
                            <div class="col-xl-12 mb-3">
                                <div class="contact_input">
                                    <input type="text" name="phone"
                                           value="{{ old('phone') }}"
                                           placeholder="Phone"
                                           class="form-control @error('phone') is-invalid @enderror">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Message --}}
                            <div class="col-xl-12 mb-3">
                                <div class="contact_input">
                                    <textarea cols="3" rows="5" name="message" placeholder="Message" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Button --}}
                            <div class="col-12">
                                <button class=" btn btn-primary" type="submit">send message</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        GET IN TOUCH END
    ===========================-->

@endsection
