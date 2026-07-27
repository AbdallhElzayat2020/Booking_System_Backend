@extends('frontend.layouts.master')
@section('frontend_title', 'Video Gallery')
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
                                        <i class="fas fa-video me-2"></i>Video Gallery - {{ $listing->title }}
                                    </h4>
                                </div>

                                <div class="card-body">
                                    <!-- Upload Video Form -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header bg-light">
                                                    <h5 class="mb-0">
                                                        <i class="fas fa-plus-circle me-2"></i>Add New Video
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <form action="{{ route('user.listings.videos-gallery.store', $listing->id) }}"
                                                          method="POST">
                                                        @csrf

                                                        <div class="mb-3">
                                                            <label for="video_url" class="form-label">
                                                                YouTube Video URL <span class="text-danger">*</span>
                                                            </label>
                                                            <textarea name="video_url"
                                                                      class="form-control @error('video_url') is-invalid @enderror"
                                                                      id="video_url"
                                                                      rows="2"
                                                                      placeholder="Paste your YouTube video link here (Public or Unlisted)">{{ old('video_url') }}</textarea>
                                                            <small class="text-muted">
                                                                <i class="fas fa-info-circle me-1"></i>
                                                                Paste the YouTube video link (Public or Unlisted).
                                                                Example: https://www.youtube.com/watch?v=VIDEO_ID
                                                            </small>
                                                            @error('video_url')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-plus-circle me-2"></i>Add Video
                                                        </button>
                                                        <a href="{{ route('user.listings.index') }}" class="btn btn-secondary">
                                                            <i class="fas fa-times me-2"></i>Cancel
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Videos Grid -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="mb-3">
                                                <i class="fas fa-video me-2"></i>All Videos
                                                <span class="badge bg-secondary">{{ $videos->count() }}</span>
                                            </h5>
                                        </div>

                                        @forelse($videos as $video)
                                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                                <div class="card shadow-sm h-100">
                                                    <!-- Video Thumbnail -->
                                                    <div class="position-relative">
                                                        <img src="https://img.youtube.com/vi/{{ $video->video_url }}/hqdefault.jpg"
                                                             class="card-img-top"
                                                             style="height: 200px; width: 100%; object-fit: cover;"
                                                             alt="{{ $listing->title }} - Video">

                                                        <!-- Play Button Overlay -->
                                                        <div class="position-absolute top-50 start-50 translate-middle">
                                                            <div class="bg-dark bg-opacity-50 rounded-circle p-2" style="width: 50px; height: 50px;">
                                                                <i class="fas fa-play text-white" style="font-size: 20px; margin-left: 4px; margin-top: 3px;"></i>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Card Footer with Actions -->
                                                    <div class="card-body text-center">
                                                        <div class="btn-group" role="group">
                                                            <!-- View Video -->
                                                            <a href="https://www.youtube.com/watch?v={{ $video->video_url }}"
                                                               target="_blank"
                                                               class="btn btn-info btn-sm">
                                                                <i class="fas fa-play"></i> Watch
                                                            </a>

                                                            <!-- Delete Video -->
                                                            <form action="{{ route('user.listings.videos-gallery.destroy', [$listing->id, $video->id]) }}"
                                                                  method="POST"
                                                                  class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('Are you sure you want to delete this video?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <div class="alert alert-info text-center py-5">
                                                    <i class="fas fa-video fa-3x mb-3 d-block"></i>
                                                    <h5>No Videos Found</h5>
                                                    <p class="mb-0">Add videos using the form above</p>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>

                                    <!-- Pagination -->
                                    @if(method_exists($videos, 'links'))
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                {{ $videos->links() }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
