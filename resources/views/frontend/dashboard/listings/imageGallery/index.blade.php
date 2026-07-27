@extends('frontend.layouts.master')
@section('frontend_title', 'Create Listing')
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
                                        <i class="fas fa-images me-2"></i>Image Gallery - {{ $listing->title }}
                                    </h4>
                                </div>

                                <div class="card-body">
                                    <!-- Upload Form -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header bg-light">
                                                    <h5 class="mb-0">
                                                        <i class="fas fa-upload me-2"></i>Upload New Images
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <form
                                                        action="{{ route('user.listings.gallery.store', $listing->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="mb-3">
                                                            <label for="images" class="form-label">
                                                                Images <span class="text-muted"><code>(Multi Image
                                                                        Supported)</code></span>
                                                            </label>
                                                            <input type="file"
                                                                   class="form-control @error('images.*') is-invalid @enderror"
                                                                   id="images" name="images[]" multiple="multiple"
                                                                   accept="image/*">
                                                            <small class="text-muted">You can select multiple images at
                                                                once</small>
                                                            @error('images.*')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>

                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-upload me-2"></i>Upload Images
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Images Grid--}}
                                    <div class="row">
                                        <div class="col-12">
                                            <h5 class="mb-3">
                                                <i class="fas fa-images me-2"></i>Gallery Images
                                                <span class="badge bg-secondary">{{ $images->count() }}</span>
                                            </h5>
                                        </div>

                                        @forelse($images as $image)
                                            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                                <div class="card shadow-sm h-100">
                                                    <!-- Image -->
                                                    <div class="position-relative">
                                                        <img src="{{ asset('listing_images/' . $image->image) }}"
                                                             class="card-img-top"
                                                             style="height: 200px; width: 100%; object-fit: cover;"
                                                             alt="{{ $listing->title }}">
                                                    </div>

                                                    <!-- Card Footer with Actions -->
                                                    <div class="card-body text-center">
                                                        <div class="btn-group" role="group">
                                                            <!-- View Image -->
                                                            <a href="{{ asset('listing_images/' . $image->image) }}"
                                                               target="_blank" class="btn btn-info btn-sm">
                                                                <i class="fas fa-eye"></i>
                                                            </a>

                                                            <!-- Delete Image -->
                                                            <form
                                                                action="{{ route('user.listings.gallery.destroy', [$listing, $image]) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('Are you sure you want to delete this image?')">
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
                                                    <i class="fas fa-image fa-3x mb-3 d-block"></i>
                                                    <h5>No Images Found</h5>
                                                    <p class="mb-0">Upload images using the form above</p>
                                                </div>
                                            </div>
                                        @endforelse
                                    </div>

                                    <!-- Pagination (if needed) -->
                                    @if (method_exists($images, 'links'))
                                        <div class="row mt-3">
                                            <div class="col-12">
                                                {{ $images->links() }}
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
