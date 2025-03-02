@extends('master')

@section('content')
    <div class="container mt-5 mb-5">
        <h2 class="text-center fw-bold text-primary">🛒 Your Shopping Cart</h2>

        @if (!empty($products) && count($products) > 0)
            <div class="row mt-4">
                <!-- Cart Items -->
                <div class="col-md-8">
                    <!-- 🟢 Order Now Button on Top -->
                    <div class="d-flex justify-content-end mb-3">
                        <a href="/ordernow" class="btn btn-warning fw-bold px-4 shadow">
                            <i class="bi bi-bag-check"></i> Order Now
                        </a>
                    </div>

                    <div class="card shadow border-0 p-3">
                        @foreach ($products as $item)
                            <div class="d-flex align-items-center border-bottom pb-3 mb-3">
                                <img src="{{ $item->gallery }}" class="rounded shadow-sm"
                                    style="width: 100px; height: 100px; object-fit: cover;">

                                <div class="ms-3 flex-grow-1">
                                    <h5 class="fw-bold">{{ $item->name }}</h5>
                                    <p class="text-muted mb-1">₹{{ $item->price }}</p>
                                </div>

                                <a href="/removecart/{{ $item->cart_id }}" class="btn btn-outline-danger btn-sm fw-bold">
                                    <i class="bi bi-trash"></i> Remove
                                </a>
                            </div>
                        @endforeach
                    </div>

                    <!-- 🟢 Order Now Button at Bottom (For Mobile View) -->
                    <div class="d-md-none mt-3">
                        <a href="/ordernow" class="btn btn-warning w-100 fw-bold shadow">
                            <i class="bi bi-bag-check"></i> Order Now
                        </a>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="col-md-4">
                    <div class="card p-4 shadow border-0 bg-light">
                        <h5 class="fw-bold">Order Summary</h5>
                        <p>Total Items: <strong>{{ count($products) }}</strong></p>
                        <p class="fs-5 text-success fw-bold">Total: ₹{{ $totalPrice ?? '0' }}</p>
                        <a href="/ordernow" class="btn btn-warning w-100 fw-bold shadow">
                            <i class="bi bi-bag-check"></i> Order Now
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-warning text-center shadow-sm mt-4">
                <h5>Your cart is empty!</h5>
                <a href="/" class="btn btn-primary mt-2">Continue Shopping</a>
            </div>
        @endif
    </div>
@endsection
