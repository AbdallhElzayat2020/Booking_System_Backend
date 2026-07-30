<div class="row">
    <div class="col-12 col-xl-12 col-md-12">
        <div class="map_popup_content">
            <div class="img">
                <img src="{{asset('listings/'.$listing->thumbnail_image)}}" alt="images" class="img-fluid w-100">
            </div>
            <div class="map_popup_text">
                @if($listing->is_featured)
                    <span><i class="far fa-star"></i> Featured</span>
                @endif
                @if($listing->is_verified)
                    <span class="red"><i class="far fa-check"></i> verified</span>
                @endif
                <h5>
                    {{$listing->title}}
                </h5>
                <a class="call" href="callto:{{$listing->phone}}">
                    <i class="fal fa-phone-alt"></i> {{$listing->phone}}
                </a>
                <a class="mail" href="mailto:{{$listing->email}}">
                    <i class="fal fa-envelope"></i> {{$listing->email}}
                </a>
                <p>
                    {!! $listing->description !!}
                </p>
                <a class="read_btn" href="#">read more</a>
            </div>
        </div>
    </div>
    @if($listing->google_map_embed_code)
        <div class="col-12 col-xl-12 col-md-12">
            <div class="map_popup_content_map">
                <iframe
                    src="{{$listing->google_map_embed_code}}"
                    width="1000" height="800" style="border:0;" allowfullscreen=""
                    loading="lazy"></iframe>
            </div>
        </div>
    @endif
</div>
