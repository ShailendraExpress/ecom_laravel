@extends('master')

@section('content')
    <div class="container mt-5 mb-5">
        <h2 class="text-center fw-bold text-primary">🛒 Checkout</h2>

        <div class="row mt-4">
            <!-- Shipping Details -->
            <div class="col-md-7">
                <div class="card shadow border-0 p-4">
                    <h5 class="fw-bold">📍 Shipping Address</h5>
                    <form action="/orderplace" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Complete Address</label>
                            <textarea class="form-control" name="address" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Payment Method</label>
                            <div class="form-check">
                                <input type="radio" name="payment" value="online" class="form-check-input" required>
                                <label class="form-check-label">Online Payment</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="payment" value="emi" class="form-check-input">
                                <label class="form-check-label">EMI</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="payment" value="cod" class="form-check-input">
                                <label class="form-check-label">COD (Cash on Delivery)</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-warning w-100 fw-bold mt-3">💳 Place Order</button>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-md-5">
                <div class="card shadow border-0 p-4 bg-light">
                    <h5 class="fw-bold">🛍 Order Summary</h5>
                    <h5 class="text-success fw-bold">Total: ₹{{ $totalPrice }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
