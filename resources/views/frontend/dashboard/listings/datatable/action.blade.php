<div class="dropdown">
    <button class="btn btn-primary btn-sm dropdown-toggle"
            type="button"
            id="actionsDropdown{{ $listing->id }}"
            data-bs-toggle="dropdown"
            aria-expanded="false">
        <i class="fas fa-cogs"></i> Actions
    </button>

    <ul class="dropdown-menu dropdown-menu-end"
        aria-labelledby="actionsDropdown{{ $listing->id }}">

        {{-- View --}}
        <li>
            <a class="dropdown-item"
               href="{{ route('admin.listings.show', $listing->id) }}">
                <i class="fas fa-eye text-info me-2"></i>
                View
            </a>
        </li>

        {{-- Edit --}}
        <li>
            <a class="dropdown-item"
               href="{{ route('user.listings.edit', $listing->id) }}">
                <i class="fas fa-edit text-primary me-2"></i>
                Edit
            </a>
        </li>

        {{-- Image Gallery --}}
        <li>
            <a class="dropdown-item"
               href="{{ route('admin.listings.gallery.index', $listing->id) }}">
                <i class="fas fa-images text-primary me-2"></i>
                Image Gallery
            </a>
        </li>

        {{-- Video Gallery --}}
        <li>
            <a class="dropdown-item"
               href="{{ route('admin.listings.videos-gallery.index', $listing->id) }}">
                {{--                <i class="fas fa-video-camera text-primary me-2"></i>--}}
                <i class="fa-solid fa-video text-primary me-2"></i>
                Video Gallery
            </a>
        </li>

        {{-- Schedule --}}
        <li>
            <a class="dropdown-item"
               href="{{ route('admin.listings.schedules.index', $listing) }}">
                <i class="fas fa-calendar-alt text-primary me-2"></i>
                Schedule
            </a>
        </li>

        <li>
            <hr class="dropdown-divider">
        </li>

        @if($listing->trashed())

            {{-- Restore --}}
            <li>
                <button type="button"
                        class="dropdown-item text-success"
                        disabled>
                    <i class="fas fa-undo me-2"></i>
                    Restore
                </button>
            </li>

            {{-- Force Delete --}}
            <li>
                <button type="button"
                        class="dropdown-item text-danger"
                        disabled>
                    <i class="fas fa-trash me-2"></i>
                    Force Delete
                </button>
            </li>

        @else

            {{-- Soft Delete --}}
            <li>
                <form action="{{ route('admin.listings.destroy', $listing->id) }}"
                      method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this Location?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-trash-alt me-2"></i>
                        Delete
                    </button>
                </form>
            </li>

        @endif

    </ul>
</div>
