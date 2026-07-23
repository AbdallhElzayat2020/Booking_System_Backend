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
                                <div class="card-header bg-secondary  text-white py-3">
                                    <h4 class="mb-0 fs-5 text-white"><i class="fas fa-plus-circle me-2"></i>Create New Listing</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('user.listings.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row g-3">

                                            {{-- Images --}}
                                            <div class="col-12">
                                                <div class="row g-3">

                                                    {{-- Main Image --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label fw-semibold">Main Image <span class="text-danger">*</span></label>
                                                            <input type="file" name="image"
                                                                   class="form-control @error('image') is-invalid @enderror"
                                                                   accept="image/*">
                                                            <div class="form-text">Recommended: 800x600px</div>
                                                            @error('image')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Thumbnail Image --}}
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label fw-semibold">Thumbnail Image <span class="text-danger">*</span></label>
                                                            <input type="file" name="thumbnail_image"
                                                                   class="form-control @error('thumbnail_image') is-invalid @enderror"
                                                                   accept="image/*">
                                                            <div class="form-text">Recommended: 300x300px</div>
                                                            @error('thumbnail_image')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            {{-- Category --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                                                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                                                {{ $category->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Location --}}
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label fw-semibold">Location <span class="text-danger">*</span></label>
                                                    <select name="location_id" class="form-select @error('location_id') is-invalid @enderror">
                                                        <option value="">Select Location</option>
                                                        @foreach($locations as $location)
                                                            <option value="{{ $location->id }}" @selected(old('location_id') == $location->id)>
                                                                {{ $location->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('location_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Title --}}
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                                                    <input type="text"
                                                           name="title"
                                                           class="form-control @error('title') is-invalid @enderror"
                                                           placeholder="Enter listing title"
                                                           value="{{ old('title') }}">
                                                    @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Description --}}
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label fw-semibold">Description <span class="text-danger">*</span></label>
                                                    <textarea name="description" id="summernote" rows="6" class="form-control summernote @error('description') is-invalid @enderror"
                                                              placeholder="Enter detailed description">{{ old('description') }}</textarea>
                                                    @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Contact Information --}}
                                            <div class="col-12">
                                                <h5 class="border-bottom pb-2 mb-3 text-primary">Contact Information</h5>
                                                <div class="row g-3">

                                                    {{-- Phone --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label fw-semibold">Phone <span class="text-danger">*</span></label>
                                                            <input type="text"
                                                                   name="phone"
                                                                   class="form-control @error('phone') is-invalid @enderror"
                                                                   placeholder="Enter phone number"
                                                                   value="{{ old('phone') }}">
                                                            @error('phone')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Email --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                                                            <input type="email"
                                                                   name="email"
                                                                   class="form-control @error('email') is-invalid @enderror"
                                                                   placeholder="Enter email address"
                                                                   value="{{ old('email') }}">
                                                            @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Website --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label fw-semibold">Website</label>
                                                            <input type="url"
                                                                   name="website"
                                                                   class="form-control @error('website') is-invalid @enderror"
                                                                   placeholder="https://example.com"
                                                                   value="{{ old('website') }}">
                                                            @error('website')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            {{-- Address --}}
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label fw-semibold">Address <span class="text-danger">*</span></label>
                                                    <textarea name="address" rows="2" class="form-control @error('address') is-invalid @enderror"
                                                              placeholder="Enter full address">{{ old('address') }}</textarea>
                                                    @error('address')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Social Media Links --}}
                                            <div class="col-12">
                                                <h5 class="border-bottom pb-2 mb-3 text-primary">Social Media Links</h5>
                                                <div class="row g-3">

                                                    {{-- Facebook Link --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"><i class="fab fa-facebook text-primary me-1"></i>Facebook</label>
                                                            <input type="url" name="facebook_link"
                                                                   class="form-control @error('facebook_link') is-invalid @enderror"
                                                                   placeholder="https://facebook.com/..."
                                                                   value="{{ old('facebook_link') }}">
                                                            @error('facebook_link')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- X (Twitter) Link --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"><i class="fab fa-x-twitter text-dark me-1"></i>X (Twitter)</label>
                                                            <input type="url" name="x_link"
                                                                   class="form-control @error('x_link') is-invalid @enderror"
                                                                   placeholder="https://x.com/..."
                                                                   value="{{ old('x_link') }}">
                                                            @error('x_link')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Instagram Link --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"><i class="fab fa-instagram text-danger me-1"></i>Instagram</label>
                                                            <input type="url" name="instagram_link"
                                                                   class="form-control @error('instagram_link') is-invalid @enderror"
                                                                   placeholder="https://instagram.com/..."
                                                                   value="{{ old('instagram_link') }}">
                                                            @error('instagram_link')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- LinkedIn Link --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"><i class="fab fa-linkedin text-primary me-1"></i>LinkedIn</label>
                                                            <input type="url" name="linkedin_link"
                                                                   class="form-control @error('linkedin_link') is-invalid @enderror"
                                                                   placeholder="https://linkedin.com/..."
                                                                   value="{{ old('linkedin_link') }}">
                                                            @error('linkedin_link')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- WhatsApp Link --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"><i class="fab fa-whatsapp text-success me-1"></i>WhatsApp</label>
                                                            <input type="url" name="whatsapp_link"
                                                                   class="form-control @error('whatsapp_link') is-invalid @enderror"
                                                                   placeholder="https://wa.me/..."
                                                                   value="{{ old('whatsapp_link') }}">
                                                            @error('whatsapp_link')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Google Map Embed Code --}}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="form-label"><i class="fas fa-map-marker-alt text-danger me-1"></i>Google Map</label>
                                                            <textarea name="google_map_embed_code" rows="2" class="form-control @error('google_map_embed_code') is-invalid @enderror"
                                                                      placeholder="<iframe src='...'></iframe>">{{ old('google_map_embed_code') }}</textarea>
                                                            @error('google_map_embed_code')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            {{-- Attachment File --}}
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label fw-semibold">Attachment File</label>
                                                    <input type="file" name="attachments" class="form-control @error('attachments') is-invalid @enderror">
                                                    @error('attachments')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Amenities Section --}}
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label fw-semibold">Amenities</label>
                                                    <select class="form-select select2 @error('amenities') is-invalid @enderror" multiple name="amenities[]">
                                                        @foreach($amenities as $amenity)
                                                            <option value="{{ $amenity->id }}" @selected(in_array($amenity->id, old('amenities', [])))>
                                                                {{ $amenity->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="form-text">Hold Ctrl/Cmd to select multiple</div>
                                                    @error('amenities')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- Status & Settings --}}
                                            <div class="col-12">
                                                <h5 class="border-bottom pb-2 mb-3 text-primary">Listing Settings</h5>
                                                <div class="row g-3">

                                                    {{-- Expired Date --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label fw-semibold">Expired Date <span class="text-danger">*</span></label>
                                                            <input type="date" name="expired_date"
                                                                   class="form-control @error('expired_date') is-invalid @enderror"
                                                                   value="{{ old('expired_date') }}">
                                                            @error('expired_date')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Status --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                                                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                                                <option value="active" @selected(old('status') == 'active')>Active</option>
                                                                <option value="inactive" @selected(old('status') == 'inactive')>Inactive</option>
                                                            </select>
                                                            @error('status')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Verified --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label fw-semibold">Verified <span class="text-danger">*</span></label>
                                                            <select name="is_verified" class="form-select @error('is_verified') is-invalid @enderror">
                                                                <option value="no" @selected(old('is_verified') == 'no')>No</option>
                                                                <option value="yes" @selected(old('is_verified') == 'yes')>Yes</option>
                                                            </select>
                                                            @error('is_verified')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    {{-- Featured --}}
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label class="form-label fw-semibold">Featured <span class="text-danger">*</span></label>
                                                            <select name="is_featured" class="form-select @error('is_featured') is-invalid @enderror">
                                                                <option value="no" @selected(old('is_featured') == 'no')>No</option>
                                                                <option value="yes" @selected(old('is_featured') == 'yes')>Yes</option>
                                                            </select>
                                                            @error('is_featured')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            {{-- SEO Section --}}
                                            <div class="col-12">
                                                <h5 class="border-bottom pb-2 mb-3 text-primary">SEO Information</h5>
                                                <div class="row g-3">

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label fw-semibold">SEO Title</label>
                                                            <input type="text" name="seo_title"
                                                                   class="form-control @error('seo_title') is-invalid @enderror"
                                                                   placeholder="Meta title (max 255 chars)"
                                                                   value="{{ old('seo_title') }}">
                                                            @error('seo_title')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label fw-semibold">SEO Description</label>
                                                            <input type="text" name="seo_description"
                                                                   class="form-control  @error('seo_description') is-invalid @enderror"
                                                                   placeholder="Meta description (max 255 chars)"
                                                                   value="{{ old('seo_description') }}">
                                                            @error('seo_description')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        {{-- Form Actions --}}
                                        <div class="form-group mt-4 pt-3 border-top">
                                            <button class="btn btn-primary px-4" type="submit">
                                                <i class="fas fa-save me-1"></i> Create Listing
                                            </button>
                                            <a href="{{ route('user.listings.index') }}" class="btn btn-outline-secondary px-4">
                                                <i class="fas fa-times me-1"></i> Cancel
                                            </a>
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
