@extends('frontend.layouts.master')
@section('title','Listing Details-'.$listing->title)

@section('content')
    <!--==========================
        BREADCRUMB PART START
    ===========================-->
    <div id="breadcrumb_part" style="background-image: url({{asset('listings/'.$listing->thumbnail_image)}})">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>{{$listing->title}}</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> listing details - {{$listing->title}}</li>
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
        LISTING DETAILS START
    ===========================-->
    <section id="listing_details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="listing_details_text">
                        <div class="listing_det_header">
                            <div class="listing_det_header_img">
                                <img src="{{asset('listings/'.$listing->thumbnail_image)}}" alt="logo" class="img-fluid w-100">
                            </div>
                            <div class="listing_det_header_text">
                                <h6>{{$listing->title}}</h6>
                                <p class="host_name">Hosted by <a href="#">{{$listing->user->name}}</a></p>
                                <p class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <b>4.5</b>
                                    <span>(12 review)</span>
                                </p>
                                <ul>
                                    @if($listing->is_verified)
                                        <li><a href="javascript:void(0)"><i class="far fa-check"></i> Verified</a></li>
                                    @endif
                                    @if($listing->is_featured)
                                        <li><a href="javascript:void(0)"><i class="far fa-star"></i> Featured</a></li>
                                    @endif

                                    <li><a href="#"><i class="fal fa-heart"></i> Add to Favorite</a></li>

                                    <li><a href="#"><i class="fal fa-eye"></i> {{$listing->views}}</a></li>

                                    <li><a href="#">Open</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="listing_det_text">
                            <p>
                                {!! $listing->description !!}
                            </p>
                        </div>
                        <div class="listing_det_Photo">
                            <div class="row">

                                @foreach($listing->images as $image)
                                    <div class="col-xl-3 col-sm-6">
                                        <a class="venobox" data-gall="gallery01" href="{{asset('listing_images/'.$image->image)}}">
                                            <img src="{{asset('listing_images/'.$image->image)}}" alt="gallery1" class="img-fluid w-100">
                                            <div class="photo_overlay">
                                                <i class="fal fa-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="listing_det_feature">
                            <div class="row">
                                @foreach($listing->amenities as $amenity)
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="listing_det_feature_single">
                                            <i class="{{$amenity->icon}}"></i>
                                            <span>{{$amenity->title}}</span>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="listing_det_video">
                            <div class="row">
                                @foreach($listing->videos as $video)

                                    <div class="col-xl-4 col-sm-6">
                                        <div class="listing_det_video_img">
                                            <img src="https://img.youtube.com/vi/{{ $video->video_url }}/hqdefault.jpg"
                                                 alt="img" class="img-fluid w-100">
                                            <a class="venobox" data-autoplay="true" target="_blank" data-vbtype="video"
                                               href="https://www.youtube.com/watch?v={{ $video->video_url }}">
                                                <i class=" fas fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @if($listing->google_map_embed_code)
                            <div class="listing_det_location">
                                {!! $listing->google_map_embed_code !!}
                            </div>
                        @endif


                        <div class="wsus__listing_review">
                            <h4>reviews 04</h4>
                            <div class="wsus__single_comment">
                                <div class="wsus__single_comment_img">
                                    <img src="../../../../public/assets/client/images/user_large_img.jpg" alt="comment" class="img-fluid w-100">
                                </div>
                                <div class="wsus__single_comment_text">
                                    <h5>sumon ali<span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </span></h5>
                                    <span>01-Dec-2021</span>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad maxime placeat
                                        ducimus.</p>
                                </div>
                            </div>
                            <div class="wsus__single_comment">
                                <div class="wsus__single_comment_img">
                                    <img src="../../../../public/assets/client/images/card_img.jpg" alt="comment" class="img-fluid w-100">
                                </div>
                                <div class="wsus__single_comment_text">
                                    <h5>shimul sign <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </span></h5>
                                    <span>21-Nov-2021</span>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad maxime placeat
                                        ducimus magni facilis delectus.</p>
                                </div>
                            </div>
                            <div class="wsus__single_comment">
                                <div class="wsus__single_comment_img">
                                    <img src="../../../../public/assets/client/images/user_large_img.jpg" alt="comment" class="img-fluid w-100">
                                </div>
                                <div class="wsus__single_comment_text">
                                    <h5>sumon ali<span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </span></h5>
                                    <span>01-Dec-2021</span>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad maxime placeat
                                        ducimus.</p>
                                </div>
                            </div>
                            <div class="wsus__single_comment">
                                <div class="wsus__single_comment_img">
                                    <img src="../../../../public/assets/client/images/card_img.jpg" alt="comment" class="img-fluid w-100">
                                </div>
                                <div class="wsus__single_comment_text">
                                    <h5>shimul sign <span>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </span></h5>
                                    <span>21-Nov-2021</span>
                                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ad maxime placeat
                                        ducimus magni facilis delectus.</p>
                                </div>
                            </div>
                            <form class="input_comment">
                                <h5>add a review</h5>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__select_rating">
                                            <i class="fas fa-star"></i>
                                            <select class="select_2" name="state">
                                                <option value="">select rating</option>
                                                <option value=""> 1</option>
                                                <option value=""> 2</option>
                                                <option value=""> 3</option>
                                                <option value=""> 4</option>
                                                <option value=""> 5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="blog_single_input">
                                            <textarea cols="3" rows="5" placeholder="Comment"></textarea>
                                            <button type="submit" class="read_btn">submit review</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5">
                    <div class="listing_details_sidebar">
                        <div class="row">
                            <div class="col-12">
                                <div class="listing_det_side_address">
                                    @if($listing->phone)
                                        <a href="callto:{{$listing->phone}}"><i class="fal fa-phone-alt"></i>{{$listing->phone}}</a>
                                    @endif
                                    @if($listing->email)
                                        <a href="mailto:{{$listing->email}}"><i class="fal fa-envelope"></i>{{$listing->email}}</a>
                                    @endif
                                    @if($listing->location)
                                        <p><i class="fal fa-map-marker-alt"></i>{{$listing->location->title}}</p>
                                    @endif
                                    @if($listing->website)
                                        <p><i class="fal fa-globe"></i>{{$listing->website}}</p>
                                    @endif
                                    <ul>
                                        @if($listing->facebook_link)
                                            <li>
                                                <a href="{{$listing->facebook_link}}" target="_blank">
                                                    <i class="fab fa-facebook-f"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($listing->x_link)
                                            <li>
                                                <a href="{{$listing->x_link}}" target="_blank">
                                                    <i class="fab fa-twitter"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($listing->linkedin_link)
                                            <li>
                                                <a href="{{$listing->linkedin_link}}" target="_blank">
                                                    <i class="fab fa-linkedin-in"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($listing->whatsapp_link)
                                            <li>
                                                <a href="{{$listing->whatsapp_link}}" target="_blank">
                                                    <i class="fab fa-whatsapp"></i>
                                                </a>
                                            </li>
                                        @endif
                                        @if($listing->instagram_link)
                                            <li>
                                                <a href="{{$listing->instagram_link}}" target="_blank">
                                                    <i class="fab fa-instagram"></i>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="listing_det_side_open_hour">
                                    <h5>Opening Hours</h5>
                                    @foreach($listing->schedules as $schedule)

                                        <p>{{$schedule->day}}
                                            <span>
                                                {{ \Carbon\Carbon::parse($schedule->start_time)->format('g:i A') }} -
                                                {{ \Carbon\Carbon::parse($schedule->end_time)->format('g:i A') }}
                                            </span>
                                        </p>
                                    @endforeach
                                </div>
                            </div>

{{--                            <div class="col-12">--}}
{{--                                <div class="listing_det_side_contact">--}}
{{--                                    <h5>quick contact</h5>--}}
{{--                                    <form>--}}
{{--                                        <form type="text" placeholder="Name*">--}}
{{--                                            <input type="email" placeholder="Email*">--}}
{{--                                            <input type="text" placeholder="Phone*">--}}
{{--                                            <input type="text" placeholder="Subject*">--}}
{{--                                            <textarea cols="3" rows="5" placeholder="Message*"></textarea>--}}
{{--                                            <button type="submit" class="read_btn">send</button>--}}
{{--                                        </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            {{--  $similarListings --}}
                            <div class="col-12">
                                <div class="listing_det_side_list">
                                    <h5>Similar Listing</h5>
                                    @foreach($similarListings as $similarListing)
                                        <a href="{{ route('listing-details',$similarListing->slug) }}" class="sidebar_blog_single">
                                            <div class="sidebar_blog_img">
                                                <img src="{{asset('listings/'.$similarListing->image)}}"
                                                     alt="blog" class="imgofluid w-100">
                                            </div>
                                            <div class="sidebar_blog_text">
                                                <h5>{{truncate($similarListing->title)}}</h5>
                                                <p>{!! truncate($similarListing->description,30) !!}</p>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--==========================
        LISTING DETAILS END
    ===========================-->
@endsection
