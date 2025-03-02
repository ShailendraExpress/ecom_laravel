@extends('master')

@section('content')
    <div class="container mt-5 mb-5">
        <h2 class="text-center fw-bold text-primary">📄 Order Details</h2>

        <div class="row mt-4">
            <!-- Order Information -->
            <div class="col-md-7">
                <div class="card shadow border-0 p-4">
                    <h5 class="fw-bold">📦 Order Information</h5>
                    <p><strong>Order ID:</strong> {{ $order->id }}</p>
                    <p><strong>Product Name:</strong> {{ $order->name }}</p>
                    <p><strong>Price:</strong> ₹{{ $order->price }}</p>
                    <p><strong>Quantity:</strong> {{ $order->quantity ?? '1' }}</p>
                    <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                    <p><strong>Order Status:</strong>
                        <span
                            class="badge 
                        {{ $order->status == 'Delivered' ? 'bg-success' : 'bg-warning' }}">
                            {{ $order->status }}
                        </span>
                    </p>
                    <p><strong>Order Date:</strong> {{ date('d M, Y', strtotime($order->created_at)) }}</p>
                </div>

                <!-- Shipping Address -->
                <div class="card shadow border-0 p-4 mt-4">
                    <h5 class="fw-bold">📍 Shipping Address</h5>

                    <p><strong>Address:</strong> {{ $order->address }}</p>


                </div>
            </div>

            <!-- Product Image & Actions -->
            <div class="col-md-5">
                <div class="card shadow border-0 p-4 bg-light">
                    <h5 class="fw-bold">🖼 Product Image</h5>
                    <img src="{{ $order->gallery }}" class="img-fluid rounded shadow-sm"
                        style="width: 100%; max-height: 250px; object-fit: cover;">

                    <h5 class="text-success fw-bold mt-3">Total: ₹{{ $order->price }}</h5>

                    @if ($order->status != 'Delivered')
                        <a href="/cancel-order/{{ $order->id }}" class="btn btn-danger w-100 fw-bold mt-3">
                            ❌ Cancel Order
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
