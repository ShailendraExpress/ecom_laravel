@extends('master')

@section('content')
    <div class="container my-5">
        <div class="row g-4">
            <!-- Image Section -->
            <div class="col-md-5 text-center">
                <div class="bg-white border rounded shadow-sm p-3">
                    <img class="img-fluid rounded" src="{{ $product->gallery }}" alt="{{ $product->name }}"
                        style="max-width: 90%; height: auto;">
                </div>
            </div>

            <!-- Product Info Section -->
            <div class="col-md-7">
                <div class="p-4 border rounded shadow bg-white">
                    <a href="/" class="btn btn-light btn-sm mb-3">⬅ Back to Shopping</a>

                    <h2 class="fw-bold">{{ $product->name }}</h2>

                    <div class="d-flex align-items-center">
                        <h3 class="text-danger me-3">₹{{ $product->price }}</h3>
                        <span class="badge bg-success p-2">In Stock</span>
                    </div>

                    <h5 class="text-primary mt-2">Category: <span class="text-dark">{{ $product->category }}</span></h5>
                    <p class="text-muted">{{ $product->description }}</p>

                    <!-- Action Buttons -->
                    <div class="mt-4">
                        <form action="/add_to_cart" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button class="btn btn-warning btn-lg fw-bold">
                                🛒 Add to Cart
                            </button>
                        </form>

                        <button class="btn btn-danger btn-lg fw-bold ms-2">
                            💳 Buy Now
                        </button>
                    </div>

                    <!-- Delivery & Offers -->
                    <div class="mt-4 p-3 border rounded bg-light">
                        <p class="mb-1"><i class="bi bi-truck"></i> Free Delivery in 2-5 Days</p>
                        <p class="mb-1"><i class="bi bi-arrow-return-left"></i> 7 Days Replacement Policy</p>
                        <p class="mb-1"><i class="bi bi-credit-card"></i> Cash on Delivery Available</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
