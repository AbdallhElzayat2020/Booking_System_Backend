@extends('frontend.layouts.master')
@section('frontend_title', 'Edit Listing')
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
                                    <h4 class="mb-0 fs-5 text-white"><i class="fas fa-edit me-2"></i>Edit Listing</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('user.listings.update', $listing->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <!-- Images Section -->
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="card-title">Main Image</h6>
                                                        @if($listing->image)
                                                            <div class="text-center mb-2">
                                                                <img src="{{ asset('listings/'.$listing->image) }}"
                                                                     alt="Main Image"
                                                                     class="img-fluid rounded"
                                                                     style="max-height: 150px; width: auto; background: #f8f9fa;">
                                                            </div>
                                                        @endif
                                                        <div class="mb-3">
                                                            <label for="image" class="form-label">Upload New Main Image</label>
                                                            <input type="file"
                                                                   name="image"
                                                                   class="form-control @error('image') is-invalid @enderror"
                                                                   id="image"
                                                                   accept="image/*">
                                                            <small class="text-muted">Recommended: 800x600px</small>
                                                            @error('image')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="card-title">Thumbnail Image</h6>
                                                        @if($listing->thumbnail_image)
                                                            <div class="text-center mb-2">
                                                                <img src="{{ asset('listings/'.$listing->thumbnail_image) }}"
                                                                     alt="Thumbnail Image"
                                                                     class="img-fluid rounded"
                                                                     style="max-height: 150px; width: auto; background: #f8f9fa;">
                                                            </div>
                                                        @endif
                                                        <div class="mb-3">
                                                            <label for="thumbnail_image" class="form-label">Upload New Thumbnail</label>
                                                            <input type="file"
                                                                   name="thumbnail_image"
                                                                   class="form-control @error('thumbnail_image') is-invalid @enderror"
                                                                   id="thumbnail_image"
                                                                   accept="image/*">
                                                            <small class="text-muted">Recommended: 300x300px</small>
                                                            @error('thumbnail_image')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Basic Information -->
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                                                    <select name="category_id"
                                                            class="form-select @error('category_id') is-invalid @enderror"
                                                            id="category_id">
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ old('category_id', $listing->category_id) == $category->id ? 'selected' : '' }}>
                                                                {{ $category->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="location_id" class="form-label">Location <span class="text-danger">*</span></label>
                                                    <select name="location_id"
                                                            class="form-select @error('location_id') is-invalid @enderror"
                                                            id="location_id">
                                                        <option value="">Select Location</option>
                                                        @foreach($locations as $location)
                                                            <option value="{{ $location->id }}"
                                                                {{ old('location_id', $listing->location_id) == $location->id ? 'selected' : '' }}>
                                                                {{ $location->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('location_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                           name="title"
                                                           class="form-control @error('title') is-invalid @enderror"
                                                           id="title"
                                                           placeholder="Enter listing title"
                                                           value="{{ old('title', $listing->title) }}">
                                                    @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                                                    <textarea name="description"
                                                              rows="6"
                                                              class="form-control summernote @error('description') is-invalid @enderror"
                                                              id="description"
                                                              placeholder="Enter detailed description">{!! old('description', $listing->description) !!}</textarea>
                                                    @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Contact Information -->
                                        <h5 class="mb-3">Contact Information</h5>
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                           name="phone"
                                                           class="form-control @error('phone') is-invalid @enderror"
                                                           id="phone"
                                                           placeholder="Enter phone number"
                                                           value="{{ old('phone', $listing->phone) }}">
                                                    @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                    <input type="email"
                                                           name="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           id="email"
                                                           placeholder="Enter email address"
                                                           value="{{ old('email', $listing->email) }}">
                                                    @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="website" class="form-label">Website (Optional)</label>
                                                    <input type="url"
                                                           name="website"
                                                           class="form-control @error('website') is-invalid @enderror"
                                                           id="website"
                                                           placeholder="https://example.com"
                                                           value="{{ old('website', $listing->website) }}">
                                                    @error('website')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                                    <textarea name="address"
                                                              rows="2"
                                                              class="form-control @error('address') is-invalid @enderror"
                                                              id="address"
                                                              placeholder="Enter full address">{{ old('address', $listing->address) }}</textarea>
                                                    @error('address')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Social Media Links -->
                                        <h5 class="mb-3">Social Media Links</h5>
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="facebook_link" class="form-label">Facebook Link</label>
                                                    <input type="url"
                                                           name="facebook_link"
                                                           class="form-control @error('facebook_link') is-invalid @enderror"
                                                           id="facebook_link"
                                                           placeholder="https://facebook.com/..."
                                                           value="{{ old('facebook_link', $listing->facebook_link) }}">
                                                    @error('facebook_link')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="x_link" class="form-label">X (Twitter) Link</label>
                                                    <input type="url"
                                                           name="x_link"
                                                           class="form-control @error('x_link') is-invalid @enderror"
                                                           id="x_link"
                                                           placeholder="https://x.com/..."
                                                           value="{{ old('x_link', $listing->x_link) }}">
                                                    @error('x_link')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="instagram_link" class="form-label">Instagram Link</label>
                                                    <input type="url"
                                                           name="instagram_link"
                                                           class="form-control @error('instagram_link') is-invalid @enderror"
                                                           id="instagram_link"
                                                           placeholder="https://instagram.com/..."
                                                           value="{{ old('instagram_link', $listing->instagram_link) }}">
                                                    @error('instagram_link')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="linkedin_link" class="form-label">LinkedIn Link</label>
                                                    <input type="url"
                                                           name="linkedin_link"
                                                           class="form-control @error('linkedin_link') is-invalid @enderror"
                                                           id="linkedin_link"
                                                           placeholder="https://linkedin.com/..."
                                                           value="{{ old('linkedin_link', $listing->linkedin_link) }}">
                                                    @error('linkedin_link')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="whatsapp_link" class="form-label">WhatsApp Link</label>
                                                    <input type="url"
                                                           name="whatsapp_link"
                                                           class="form-control @error('whatsapp_link') is-invalid @enderror"
                                                           id="whatsapp_link"
                                                           placeholder="https://wa.me/..."
                                                           value="{{ old('whatsapp_link', $listing->whatsapp_link) }}">
                                                    @error('whatsapp_link')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="google_map_embed_code" class="form-label">Google Map Embed Code</label>
                                                    <textarea name="google_map_embed_code"
                                                              rows="2"
                                                              class="form-control @error('google_map_embed_code') is-invalid @enderror"
                                                              id="google_map_embed_code"
                                                              placeholder="<iframe src='...'></iframe>">{{ old('google_map_embed_code', $listing->google_map_embed_code) }}</textarea>
                                                    @error('google_map_embed_code')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Attachments -->
                                        <div class="row g-3 mb-3">
                                            <div class="col-12">
                                                @if($listing->attachments)
                                                    <div class="mb-2">
                                                        <i class="fa-regular fa-file me-2"></i>
                                                        <a href="{{ asset('listings/'.$listing->attachments) }}"
                                                           target="_blank"
                                                           class="text-decoration-none">
                                                            {{ $listing->attachments }}
                                                        </a>
                                                    </div>
                                                @endif
                                                <div class="mb-3">
                                                    <label for="attachments" class="form-label">Attachments Files</label>
                                                    <input type="file"
                                                           name="attachments"
                                                           class="form-control @error('attachments') is-invalid @enderror"
                                                           id="attachments"
                                                           multiple>
                                                    @error('attachments')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Amenities -->
                                        <div class="row g-3 mb-3">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label for="amenities" class="form-label">Amenities</label>
                                                    <select class="form-select select2 @error('amenities') is-invalid @enderror"
                                                            id="amenities"
                                                            multiple
                                                            name="amenities[]">
                                                        @foreach($amenities as $amenity)
                                                            <option value="{{ $amenity->id }}"
                                                                {{ in_array($amenity->id, old('amenities', $selectedAmenities)) ? 'selected' : '' }}>
                                                                {{ $amenity->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('amenities')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Status & Settings -->
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="expired_date" class="form-label">Expired Date <span class="text-danger">*</span></label>
                                                    <input type="date"
                                                           name="expired_date"
                                                           class="form-control @error('expired_date') is-invalid @enderror"
                                                           id="expired_date"
                                                           value="{{ old('expired_date', $listing->expired_date) }}">
                                                    @error('expired_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                                    <select name="status"
                                                            class="form-select @error('status') is-invalid @enderror"
                                                            id="status">
                                                        <option value="active" {{ old('status', $listing->status) == 'active' ? 'selected' : '' }}>Active</option>
                                                        <option value="inactive" {{ old('status', $listing->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                    @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="is_verified" class="form-label">Verified <span class="text-danger">*</span></label>
                                                    <select name="is_verified"
                                                            class="form-select @error('is_verified') is-invalid @enderror"
                                                            id="is_verified">
                                                        <option value="no" {{ old('is_verified', $listing->is_verified) == 'no' ? 'selected' : '' }}>No</option>
                                                        <option value="yes" {{ old('is_verified', $listing->is_verified) == 'yes' ? 'selected' : '' }}>Yes</option>
                                                    </select>
                                                    @error('is_verified')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="is_featured" class="form-label">Featured <span class="text-danger">*</span></label>
                                                    <select name="is_featured"
                                                            class="form-select @error('is_featured') is-invalid @enderror"
                                                            id="is_featured">
                                                        <option value="no" {{ old('is_featured', $listing->is_featured) == 'no' ? 'selected' : '' }}>No</option>
                                                        <option value="yes" {{ old('is_featured', $listing->is_featured) == 'yes' ? 'selected' : '' }}>Yes</option>
                                                    </select>
                                                    @error('is_featured')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SEO Information -->
                                        <h5 class="mb-3">SEO Information</h5>
                                        <div class="row g-3 mb-3">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="seo_title" class="form-label">SEO Title</label>
                                                    <input type="text"
                                                           name="seo_title"
                                                           class="form-control @error('seo_title') is-invalid @enderror"
                                                           id="seo_title"
                                                           placeholder="Meta title (max 255 chars)"
                                                           value="{{ old('seo_title', $listing->seo_title) }}">
                                                    @error('seo_title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="seo_description" class="form-label">SEO Description</label>
                                                    <input type="text"
                                                           name="seo_description"
                                                           class="form-control @error('seo_description') is-invalid @enderror"
                                                           id="seo_description"
                                                           placeholder="Meta description (max 255 chars)"
                                                           value="{{ old('seo_description', $listing->seo_description) }}">
                                                    @error('seo_description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Form Actions -->
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save me-2"></i>Update Listing
                                                </button>
                                                <a href="{{ route('admin.listings.index') }}" class="btn btn-secondary">
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
    </section>
@endsection
