@extends('frontend.layouts.master')
@section('frontend_title', 'Manage Schedules')
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
                                        <i class="fas fa-calendar-alt me-2"></i>Manage Schedules
                                    </h4>
                                </div>

                                <div class="card-body">
                                    <!-- Listing Info & Add Button -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                                                        <div>
                                                            <h6 class="mb-1 text-muted">Managing Schedule For</h6>
                                                            <h5 class="mb-0">
                                                                <i class="fas fa-store text-primary me-2"></i>
                                                                {{ $listing->title }}
                                                            </h5>
                                                        </div>
                                                        <a href="{{ route('user.listings.schedules.create', $listing->id) }}"
                                                           class="btn btn-success">
                                                            <i class="fas fa-plus-circle me-2"></i>Add New Schedule
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Schedules Table -->
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header bg-light">
                                                    <h5 class="mb-0">
                                                        <i class="fas fa-list me-2"></i>All Schedules
                                                        <span class="badge bg-secondary ms-2">{{ $listing->schedules->count() }}</span>
                                                    </h5>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-hover mb-0">
                                                            <thead class="table-secondary">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Day</th>
                                                                <th>Start Time</th>
                                                                <th>End Time</th>
                                                                <th>Status</th>
                                                                <th class="text-center">Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @forelse($listing->schedules as $schedule)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>
                                                                        <i class="fas fa-calendar-day me-1 text-muted"></i>
                                                                        {{ $schedule->day }}
                                                                    </td>
                                                                    <td>
                                                                        <i class="fas fa-clock me-1 text-muted"></i>
                                                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}
                                                                    </td>
                                                                    <td>
                                                                        <i class="fas fa-clock me-1 text-muted"></i>
                                                                        {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}
                                                                    </td>
                                                                    <td>
                                                                        @if($schedule->status == 'active')
                                                                            <span class="badge bg-success">
                                                                                    <i class="fas fa-check-circle me-1"></i>Active
                                                                                </span>
                                                                        @else
                                                                            <span class="badge bg-danger">
                                                                                    <i class="fas fa-times-circle me-1"></i>Inactive
                                                                                </span>
                                                                        @endif
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <div class="btn-group" role="group">
                                                                            <!-- Edit Button -->
                                                                            <a href="{{ route('user.listings.schedules.edit', [$listing->id, $schedule->id]) }}"
                                                                               class="btn btn-warning btn-sm"
                                                                               title="Edit Schedule">
                                                                                <i class="fas fa-edit"></i>
                                                                            </a>

                                                                            <!-- Delete Form -->
                                                                            <form action="{{ route('user.listings.schedules.destroy', [$listing->id, $schedule->id]) }}"
                                                                                  method="POST"
                                                                                  class="d-inline">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit"
                                                                                        class="btn btn-danger btn-sm"
                                                                                        title="Delete Schedule"
                                                                                        onclick="return confirm('⚠️ Are you sure you want to delete this schedule?\n\nThis action cannot be undone!');">
                                                                                    <i class="fas fa-trash"></i>
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @empty
                                                                <tr>
                                                                    <td colspan="6" class="text-center py-5">
                                                                        <div class="empty-state">
                                                                            <i class="fas fa-calendar-times fa-4x text-muted mb-3 d-block"></i>
                                                                            <h5 class="text-muted">No Schedules Found</h5>
                                                                            <p class="text-muted mb-0">Click the "Add New Schedule" button to create one.</p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforelse
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Back Button -->
                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <a href="{{ route('user.listings.index') }}" class="btn btn-secondary">
                                                <i class="fas fa-arrow-left me-2"></i>Back to Listings
                                            </a>
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
