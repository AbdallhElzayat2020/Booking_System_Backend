<div class="dropdown">
    <button class="btn btn-primary btn-sm dropdown-toggle"
            type="button"
            id="actionsDropdown{{ $listing->id }}"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false">
        <i class="fas fa-cogs"></i> Actions
    </button>

    <div class="dropdown-menu dropdown-menu-right"
         aria-labelledby="actionsDropdown{{ $listing->id }}">

        {{-- View --}}
        <a class="dropdown-item"
           href="{{ route('admin.listings.show', $listing->id) }}">
            <i class="fas fa-eye text-info mr-2"></i> View
        </a>

        {{-- Edit --}}
        <a class="dropdown-item"
           href="{{ route('admin.listings.edit', $listing->id) }}">
            <i class="fas fa-edit text-primary mr-2"></i> Edit
        </a>

        <div class="dropdown-divider"></div>

        @if($listing->trashed())

            {{-- Restore --}}
            <button type="button"
                    class="dropdown-item text-success"
                    disabled>
                <i class="fas fa-undo mr-2"></i>
                Restore
            </button>

            {{-- Force Delete --}}
            <button type="button"
                    class="dropdown-item text-danger"
                    disabled>
                <i class="fas fa-trash mr-2"></i>
                Force Delete
            </button>

        @else

            {{-- Soft Delete --}}
            <form action="{{ route('admin.listings.destroy', $listing->id) }}"
                  method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this Listing?')">

                @csrf
                @method('DELETE')

                <button type="submit" class="dropdown-item text-danger">
                    <i class="fas fa-trash-alt mr-2"></i>
                    Delete
                </button>
            </form>

        @endif

    </div>
</div>
