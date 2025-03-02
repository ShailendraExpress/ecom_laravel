@extends('master')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
            <!-- Image Section -->
            <div class="col-md-6 text-center">
                <img class="img-fluid rounded shadow-lg border" src="{{ $product->gallery }}" alt="{{ $product->name }}"
                    style="max-width: 80%; height: auto;">
            </div>

            <!-- Product Info Section -->
            <div class="col-md-6">
                <a href="/" class="btn btn-outline-secondary mb-3">⬅ Go Back</a>
                <h2 class="fw-bold">{{ $product->name }}</h2>
                <h3 class="text-danger">Price: ₹{{ $product->price }}</h3>
                <h4 class="text-primary">Category: {{ $product->category }}</h4>
                <p class="text-muted">{{ $product->description }}</p>

                <div class="mt-4">
                    <form action="/add_to_cart" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" id="" value="{{ $product->id }}">
                        <button class="btn btn-primary btn-lg me-2">🛒 Add to Cart</button>

                    </form>
                    <button class="btn btn-success btn-lg">💳 Buy Now</button>
                </div>
            </div>
        </div>
    </div>
@endsection
