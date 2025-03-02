@extends('master')

@section('content')
    <div class="container mt-5 mb-5 text-center">
        <div class="card shadow border-0 p-5">
            <h2 class="fw-bold text-success">✅ Order Placed Successfully!</h2>
            <p class="text-muted">Thank you for shopping with us. Your order is being processed.</p>

            <div class="mt-4">
                <a href="/" class="btn btn-primary fw-bold px-4">🛍 Continue Shopping</a>
                <a href="/myorders" class="btn btn-outline-dark fw-bold px-4">📦 View My Orders</a>
            </div>
        </div>
    </div>
@endsection
