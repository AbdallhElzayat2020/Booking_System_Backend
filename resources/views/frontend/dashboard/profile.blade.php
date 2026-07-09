@extends('frontend.layouts.master')
@section('frontend_title', 'Profile-Dashboard')
@section('content')
    <section id="dashboard">
        <div class="container">
            <div class="row">

                @include('frontend.dashboard.layouts.sidebar')

                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing">
                            <h4>basic information</h4>
                            <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-8 col-md-12">
                                        <div class="row">
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>Name</label>
                                                    <div class="input_area">
                                                        <input type="text" placeholder="Name" name="name" value="{{$user->name}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>phone</label>
                                                    <div class="input_area">
                                                        <input type="text" placeholder="Please enter Your Phone" name="phone" value="{{$user->phone}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>email</label>
                                                    <div class="input_area">
                                                        <input type="Email" placeholder="Email" name="email" value="{{$user->email}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>Facebook</label>
                                                    <div class="input_area">
                                                        <input type="text" placeholder="Facebook URL" name="facebook_link" value="{{$user->facebook_link}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>X Link</label>
                                                    <div class="input_area">
                                                        <input type="text" placeholder="X URL" name="x_link" value="{{$user->x_link}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>WhatsApp</label>
                                                    <div class="input_area">
                                                        <input type="text" placeholder="WhatsApp Number" name="whatsapp" value="{{$user->whatsapp}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-md-6">
                                                <div class="my_listing_single">
                                                    <label>LinkedIn</label>
                                                    <div class="input_area">
                                                        <input type="text" placeholder="LinkedIn URL" name="linkedin_link" value="{{$user->linkedin_link}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12 col-md-12">
                                                <div class="my_listing_single">
                                                    <label>Instagram</label>
                                                    <div class="input_area">
                                                        <input type="text" placeholder="Instagram URL" name="instagram_link" value="{{$user->instagram_link}}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-12">
                                                <div class="my_listing_single">
                                                    <label>About Me</label>
                                                    <div class="input_area">
                                                        <textarea cols="3" rows="3" placeholder="Your Text" name="about">{!! $user->about !!}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-5">
                                        <div class="profile_pic_upload">
                                            {{--                                            <img src="{{asset('avatars/'.$user->avatar)}}" alt="img" class="imf-fluid w-100">--}}
                                            <img
                                                src="{{ file_exists(public_path('avatars/' . $user->avatar))
                                                ? asset('avatars/' . $user->avatar)
                                                : asset('default_avatar/avatar.png') }}" alt="logo" class="img-fluid">
                                            <input type="file" name="avatar">
                                        </div>

                                        <div class="profile_pic_upload">
                                            {{--                                            <img src="{{asset('banners/'.$user->banner)}}" alt="img" class="imf-fluid w-100">--}}
                                            <img src="{{ ($user->banner && file_exists(public_path('banners/' . $user->banner)))
                                              ? asset('banners/' . $user->banner)
                                               : asset('default_avatar/breadcroumb_bg.jpg') }}" alt="banner" class="img-fluid">
                                            <input type="file" name="banner">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="read_btn">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="my_listing list_mar">
                            <h4>change password</h4>
                            <form action="{{ route('user.password.update') }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="my_listing_single">
                                            <label>current password</label>
                                            <div class="input_area">
                                                <input type="password" name="current_password" placeholder="Current Password">
                                                @error('current_password')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="my_listing_single">
                                            <label>new password</label>
                                            <div class="input_area">
                                                <input type="password" name="new_password" placeholder="New Password">
                                                @error('new_password')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="my_listing_single">
                                            <label>confirm password</label>
                                            <div class="input_area">
                                                <input type="password" name="new_password_confirmation" placeholder="Confirm Password">
                                                @error('new_password_confirmation')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="read_btn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
