@if($listing->is_approved == 'yes')
    <span class="badge bg-success text-black">Approved</span>
@else
    <span class="badge bg-warning text-white">Pending</span>
@endif
