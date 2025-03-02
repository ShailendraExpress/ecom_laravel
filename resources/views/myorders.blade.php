@extends('master')

@section('content')
    <div class="container mt-5 mb-5">
        <h2 class="text-center fw-bold text-primary">📦 My Orders</h2>

        @if (count($orders) > 0)
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0 p-4">
                        <h5 class="fw-bold">🛍 Order History</h5>

                        @foreach ($orders as $order)
                            <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                <img src="{{ $order->gallery }}" class="rounded shadow-sm"
                                    style="width: 100px; height: 100px; object-fit: cover;">

                                <div class="ms-3 flex-grow-1">
                                    <h5 class="fw-bold">{{ $order->name }}</h5>
                                    <p class="text-muted mb-1">Price: ₹{{ $order->price }}</p>
                                    <p class="mb-0">
                                        <strong class="text-success">
                                            📅 Order Date: {{ date('d M, Y', strtotime($order->created_at)) }}
                                        </strong>
                                    </p>
                                    <p class="mb-0">
                                        🚚 <strong>Status:</strong>
                                        <span class="badge bg-warning">{{ $order->status ?? 'Processing' }}</span>
                                    </p>
                                </div>

                                <a href="/order-detail/{{ $order->id }}" class="btn btn-outline-primary btn-sm fw-bold">
                                    <i class="bi bi-eye"></i> View Details
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center shadow-sm mt-4">
                <h5>You haven't placed any orders yet!</h5>
                <a href="/" class="btn btn-primary mt-2">Continue Shopping</a>
            </div>
        @endif
    </div>
@endsection
