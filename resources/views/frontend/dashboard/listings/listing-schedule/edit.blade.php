@extends('frontend.layouts.master')
@section('frontend_title', 'Edit Schedule')
@section('content')
    <section id="dashboard" class="py-4">
        <div class="container">
            <div class="row g-4">

                @include('frontend.dashboard.layouts.sidebar')

                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing">
                            <div class="card shadow-sm border-0">
                                <div class="card-header bg-secondary text-white py-3">
                                    <h4 class="mb-0 fs-5 text-white">
                                        <i class="fas fa-edit me-2"></i>Edit Schedule
                                    </h4>
                                </div>

                                <div class="card-body">
                                    <!-- Error Alerts -->
                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <div class="d-flex">
                                                <i class="fas fa-exclamation-circle me-2 mt-1"></i>
                                                <div>
                                                    <strong>Error!</strong> Please fix the following issues:
                                                    <ul class="mb-0 mt-1">
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <div class="d-flex">
                                                <i class="fas fa-exclamation-circle me-2 mt-1"></i>
                                                <div>
                                                    <strong>Error!</strong> {{ session('error') }}
                                                </div>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <!-- Listing Info -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="mb-1 text-muted">
                                                        <i class="fas fa-info-circle me-1"></i>Editing Schedule For
                                                    </h6>
                                                    <h5 class="mb-0">
                                                        <i class="fas fa-store text-primary me-2"></i>
                                                        {{ $listing->title }}
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Schedule Edit Form -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header bg-light">
                                                    <h5 class="mb-0">
                                                        <i class="fas fa-calendar-edit me-2"></i>Edit Schedule Details
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{ route('user.listings.schedules.update', [$listing->id, $schedule->id]) }}"
                                                          method="POST">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="row g-3">
                                                            <!-- Day -->
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="day" class="form-label">
                                                                        Day <span class="text-danger">*</span>
                                                                    </label>
                                                                    <select name="day"
                                                                            class="form-select @error('day') is-invalid @enderror"
                                                                            id="day">
                                                                        <option value="">Select Day</option>
                                                                        @foreach($days as $day)
                                                                            <option value="{{ $day }}"
                                                                                {{ old('day', $schedule->day) == $day ? 'selected' : '' }}>
                                                                                {{ $day }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('day')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <!-- Status -->
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label">Status</label>
                                                                    <select name="status"
                                                                            class="form-select @error('status') is-invalid @enderror"
                                                                            id="status">
                                                                        <option value="active" {{ old('status', $schedule->status) == 'active' ? 'selected' : '' }}>
                                                                            <i class="fas fa-check-circle"></i> Active
                                                                        </option>
                                                                        <option value="inactive" {{ old('status', $schedule->status) == 'inactive' ? 'selected' : '' }}>
                                                                            <i class="fas fa-times-circle"></i> Inactive
                                                                        </option>
                                                                    </select>
                                                                    @error('status')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <!-- Start Time -->
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="start_time" class="form-label">
                                                                        Start Time <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">
                                                                            <i class="fas fa-clock"></i>
                                                                        </span>
                                                                        <input type="time"
                                                                               name="start_time"
                                                                               class="form-control @error('start_time') is-invalid @enderror"
                                                                               id="start_time"
                                                                               value="{{ old('start_time', $schedule->start_time) }}"
                                                                               step="60">
                                                                    </div>
                                                                    @error('start_time')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <!-- End Time -->
                                                            <div class="col-md-6">
                                                                <div class="mb-3">
                                                                    <label for="end_time" class="form-label">
                                                                        End Time <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text">
                                                                            <i class="fas fa-clock"></i>
                                                                        </span>
                                                                        <input type="time"
                                                                               name="end_time"
                                                                               class="form-control @error('end_time') is-invalid @enderror"
                                                                               id="end_time"
                                                                               value="{{ old('end_time', $schedule->end_time) }}"
                                                                               step="60">
                                                                    </div>
                                                                    @error('end_time')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Form Actions -->
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fas fa-save me-2"></i>Update Schedule
                                                                </button>
                                                                <a href="{{ route('user.listings.schedules.index', $listing->id) }}"
                                                                   class="btn btn-secondary">
                                                                    <i class="fas fa-times me-2"></i>Cancel
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

