<section id="wsus__location">
    <div class="wsus__location_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__heading_area">
                        <h2>Our location </h2>
                        <p>Lorem ipsum dolor sit amet, qui assum oblique praesent te. Quo ei erant essent scaevola
                            estut clita dolorem ei est mazim fuisset scribentur.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="wsus__location_filter">
                        <button class="active" data-filter="*">All City</button>
                        @foreach($featuredLocation as $location)
                            <button data-filter=".{{$location->slug}}">
                                {{$location->title}}
                            </button>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="row grid">
                @foreach($featuredLocation as $location)

                    @foreach($location->listings->take(8) as $listing)

                        <div class="col-xl-3 col-sm-6 col-lg-4 {{$location->slug}}">
                            <div class="wsus__featured_single">
                                <a href="{{ route('listing-details', $listing->slug) }}">
                                    <div class="wsus__featured_single_img">
                                        <img src="{{asset('listings/'.$listing->thumbnail_image)}}" alt="images" class="img-fluid w-100">
                                        <a href="#" class="love"><i class="fas fa-heart"></i></a>
                                        <a href="#" class="small_text">
                                            {{$listing->category->title}}
                                        </a>
                                    </div>
                                </a>
                                <div class="wsus__featured_single_text">
                                    <p class="list_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(5 review)</span>
                                    </p>
                                    <a href="#">{{truncate($listing->title, 30)}}</a>
                                    <p class="address">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{$location->title}}
                                    </p>
                                </div>
                            </div>
                        </div>

                    @endforeach

                @endforeach

            </div>
        </div>
    </div>
</section>
