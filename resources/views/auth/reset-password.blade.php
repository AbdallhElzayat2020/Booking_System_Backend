{{--<x-guest-layout>--}}
{{--    <form method="POST" action="{{ route('password.store') }}">--}}
{{--        @csrf--}}

{{--        <!-- Password Reset Token -->--}}
{{--        <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}

{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')"/>--}}
{{--            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username"/>--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2"/>--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')"/>--}}
{{--            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password"/>--}}
{{--            <x-input-error :messages="$errors->get('password')" class="mt-2"/>--}}
{{--        </div>--}}

{{--        <!-- Confirm Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>--}}

{{--            <x-text-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                          type="password"--}}
{{--                          name="password_confirmation" required autocomplete="new-password"/>--}}

{{--            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            <x-primary-button>--}}
{{--                {{ __('Reset Password') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{--</x-guest-layout>--}}


@extends('frontend.layouts.master')
@section('frontend_title', 'Reset Password')
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
                                <li class="breadcrumb-item active" aria-current="page">Reset Password</li>
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
                        <h2>Reset Password</h2>
                        <p>Enter your email to reset your password</p>
                        <form action="{{ route('password.store') }}" method="POST">

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            @csrf
                            <div class="row">
                                {{--  Email  --}}
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label>email</label>
                                        <input type="email" placeholder="Email" value="{{ old('email',$request->email) }}" name="email" autofocus>
                                    </div>
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{--  Password  --}}
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label>Password</label>
                                        <input type="password" placeholder="Password" name="password" required autocomplete="new-password">
                                    </div>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{--  PasswordConfirm  --}}
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <label>Confirm Password</label>
                                        <input type="password" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    @error('password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <button type="submit">Reset Password</button>
                                    </div>
                                </div>


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
