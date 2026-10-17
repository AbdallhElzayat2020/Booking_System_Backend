@extends('frontend.layouts.master')
@section('frontend_title', 'Login Page')
@section('content')
    <!--==========================
        BREADCRUMB PART START
    ===========================-->
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>sign in</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page">Login</li>
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


    <!--=========================
        SIGN IN START
    ==========================-->
    <section class="wsus__login_page">
        <div class="container">
            <div class="row">
                <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                    <div class="wsus__login_area">
                        <h2>Welcome back!</h2>
                        <p>sign in to continue</p>
                        <br>
                        <br>

                        @session('status')
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endsession
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="row">
                                {{--  Email  --}}
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label>email</label>
                                        <input type="email" placeholder="Email" value="{{ old('email') }}" name="email" autofocus>
                                    </div>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{--  Password  --}}
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label>password</label>
                                        <input type="password" placeholder="Password" name="password">
                                    </div>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{--  Remember Me  --}}
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput wsus__login_check_area">
                                        <div class="form-check">
                                            <input class="form-check-input" name="remember" type="checkbox" value=""
                                                   id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember Me
                                            </label>
                                        </div>
                                        <a href="{{ route('password.request') }}">Forget Password ?</a>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <button type="submit">login</button>
                                    </div>
                                </div>

                                {{-- Divider --}}
                                <div class="col-xl-12 my-3 text-center">
                                    <span class="text-muted position-relative px-2 bg-white" style="z-index: 1;">or sign in with</span>
                                    <hr class="mt-n2" style="margin-top: -11px;">
                                </div>

                                {{-- Social Login Buttons --}}
                                <div class="col-xl-12">
                                    <div class="d-flex flex-column gap-2 mb-3">
                                        {{-- Google Button --}}
                                        <a href="{{route('socialite.social-login',['provider' => 'google'])}}" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center py-2" style="font-weight: 500;">
                                            <i class="fab fa-google me-2"></i> Continue with Google
                                        </a>

                                        {{-- GitHub Button --}}
                                        <a href="{{route('socialite.social-login',['provider' => 'github'])}}" class="btn btn-dark w-100 d-flex align-items-center justify-content-center py-2" style="font-weight: 500;">
                                            <i class="fab fa-github me-2"></i> Continue with GitHub
                                        </a>
                                    </div>
                                </div>

                                <p class="create_account">Don’t have an account ? <a href="{{ route('register') }}">Create Account</a></p>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        SIGN IN END
    ==========================-->
@endsection
