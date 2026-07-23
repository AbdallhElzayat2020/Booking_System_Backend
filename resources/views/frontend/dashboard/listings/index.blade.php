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
                            <h4 style="justify-content: space-between">
                                My Listings

                                <a href="{{ route('user.listings.create') }}" class="btn btn-success">Create Listing</a>

                            </h4>


                            {{$dataTable->table()}}

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

@endpush
