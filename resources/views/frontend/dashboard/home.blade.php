@extends('frontend.layouts.master')
@section('title', 'Dashboard')

@section('content')

    <section id="dashboard">
        <div class="container">
            <div class="row">

                @include('frontend.dashboard.layouts.sidebar')

                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="manage_dasboard">
                            <div class="row">
                                <div class="col-xl-6 col-12 col-sm-6 col-lg-6 col-xxl-3">
                                    <div class="manage_dashboard_single">
                                        <i class="far fa-star"></i>
                                        <h3>
                                            @php
                                                echo  $userListingCount = $user->listings()->count();
                                            @endphp
                                        </h3>
                                        <p>Active Listings</p>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-12 col-sm-6 col-lg-6 col-xxl-3">
                                    <div class="manage_dashboard_single orange">
                                        <i class="fas fa-list-ul"></i>
                                        <h3>
                                            @php
                                                echo $pendingListingCount = $user->listings()->where('is_approved', 'no')
                                                ->where('user_id',$user->id)->count();
                                            @endphp
                                        </h3>
                                        <p>Pending listing</p>
                                    </div>
                                </div>
                                @if($subscription->package)
                                    <div class="col-xl-12">
                                        <div class="active_package">
                                            <h4>Active Package</h4>
                                            <div class="table-responsive">
                                                <table class="table dashboard_table">
                                                    <tbody>
                                                    <tr>
                                                        <td class="active_left">Package name</td>
                                                        <td class="package_right">
                                                            {{$subscription?->package->name}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Price</td>
                                                        <td class="package_right">
                                                            {{currencyPosition($subscription?->package->price)}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Purchase Date</td>
                                                        <td class="package_right">
                                                            {{date('d F Y', strtotime($subscription->created_at))}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Expired Date</td>
                                                        <td class="package_right">
                                                            @if($subscription?->expire_date == null)
                                                                Forever
                                                            @else
                                                                {{date('d F Y', strtotime($subscription?->expire_date))}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Maximum Listing</td>
                                                        <td class="package_right">
                                                            @if($subscription?->package->number_of_listings == -1)
                                                                Unlimited
                                                            @else
                                                                {{$subscription?->package->number_of_listings}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Maximum Aminities</td>
                                                        <td class="package_right">
                                                            @if($subscription?->package->number_of_amenities == -1)
                                                                Unlimited
                                                            @else
                                                                {{$subscription?->package->number_of_amenities}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Maximum Photo</td>
                                                        <td class="package_right">
                                                            @if($subscription?->package->number_of_photos == -1)
                                                                Unlimited
                                                            @else
                                                                {{$subscription?->package->number_of_photos}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Maximum Video</td>
                                                        <td class="package_right">
                                                            @if($subscription?->package->number_of_videos == -1)
                                                                Unlimited
                                                            @else
                                                                {{$subscription?->package->number_of_videos}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="active_left">Featured Listing Available</td>
                                                        <td class="package_right">
                                                            @if($subscription?->package->number_of_featured_listings == -1)
                                                                Unlimited
                                                            @else
                                                                {{$subscription?->package->number_of_featured_listings}}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-xl-12">
                                        <div class="active_package">
                                            <h4>Active Package</h4>
                                            <div class="table-responsive">
                                                <table class="table dashboard_table">
                                                    <tbody>
                                                    <tr>
                                                        <td class="active_left">Package name</td>
                                                        <td class="package_right">
                                                            No Active Package
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
