@if($order->payment_status == 'completed')
    <span class="badge bg-success text-black">completed</span>
@elseif($order->payment_status == 'pending')
    <span class="badge bg-danger text-white">Pending</span>
@else
    <span class="badge bg-warning text-black">Failed</span>
@endif
