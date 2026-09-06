@extends('frontend.layouts.master')

@section('title', 'Order Details')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                {{-- Breadcrumb --}}
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-light p-3 rounded">
                        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.orders.index') }}">My Orders</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order #{{ $order->order_id }}</li>
                    </ol>
                </nav>

                {{-- Invoice Card --}}
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <div class="p-4 p-md-5" id="invoice-print">

                            {{-- Invoice Header --}}
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                                        <h2 class="mb-0">Invoice</h2>
                                        <span class="badge badge-dark fs-5 py-2 px-4">Order #{{ $order->order_id }}</span>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            {{-- Billing & Order Info --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="font-weight-bold">Billed To:</h6>
                                    <p class="mb-1 text-danger font-weight-bold">{{ $order->user->name }}</p>
                                    <p class="mb-0">{{ $order->user->email }}</p>
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <h6 class="font-weight-bold">Order Date:</h6>
                                    <p class="mb-0">{{ date('F d, Y', strtotime($order->created_at)) }}</p>
                                </div>
                            </div>

                            {{-- Payment Method --}}
                            <div class="row mt-2">
                                <div class="col-12">
                                    <h6 class="font-weight-bold">Payment Method:</h6>
                                    <p class="text-danger font-weight-bold">{{ $order->payment_method }}</p>
                                </div>
                            </div>

                            {{-- Order Summary Table --}}
                            <div class="row mt-4">
                                <div class="col-12">
                                    <h5 class="border-bottom pb-2">Order Summary</h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Paid In</th>
                                                <th class="text-right">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>{{ $order->package->name }}</td>
                                                <td class="text-center">{{ $order->base_amount . ' ' . $order->base_currency }}</td>
                                                <td class="text-center">{{ $order->paid_amount . ' ' . $order->paid_currency }}</td>
                                                <td class="text-right font-weight-bold">{{ $order->paid_amount . ' ' . $order->paid_currency }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            {{-- Total & Status --}}
                            <div class="row mt-3 align-items-center">
                                <div class="col-md-8">
                                    {{-- Payment Status Badge --}}
                                    <div class="d-flex align-items-center">
                                        <span class="font-weight-bold mr-3">Payment Status:</span>
                                        @php
                                            $statusColors = [
                                                'pending' => 'warning',
                                                'completed' => 'success',
                                                'failed' => 'danger',
                                            ];
                                            $color = $statusColors[$order->payment_status] ?? 'secondary';
                                        @endphp
                                        <span class="badge badge-{{ $color }} px-3 py-2 text-uppercase">
                                            {{ $order->payment_status }}
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-4 text-md-right mt-3 mt-md-0">
                                    <div class="border-top pt-2">
                                        <h4 class="mb-0">Total: <span class="text-success">{{ $order->paid_amount . ' ' . $order->paid_currency }}</span></h4>
                                    </div>
                                </div>
                            </div>

                        </div> {{-- end invoice-print --}}

                        {{-- Print Button --}}
                        <div class="border-top p-4 bg-light d-flex justify-content-end">
                            <button class="btn btn-warning btn-icon-left" onclick="printPageArea('invoice-print')">
                                <i class="fas fa-print"></i> Print Invoice
                            </button>
                        </div>

                    </div> {{-- end card-body --}}
                </div> {{-- end card --}}

                {{-- Go Back Button --}}
                <div class="mt-3">
                    <a href="{{ route('user.orders.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Orders
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        function printPageArea(areaId) {
            var printContent = document.getElementById(areaId).innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
            // Optionally, reload to reinitialize any JS components
            // location.reload();
        }
    </script>
@endpush
