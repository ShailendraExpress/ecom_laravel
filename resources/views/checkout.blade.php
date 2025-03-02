@extends('master')

@section('content')
    <div class="container mt-5 mb-5">
        <h2 class="text-center fw-bold text-primary">🛒 Checkout</h2>

        <div class="row mt-4">
            <!-- Shipping Details -->
            <div class="col-md-7">
                <div class="card shadow border-0 p-4">
                    <h5 class="fw-bold">📍 Shipping Address</h5>
                    <form action="/place_order" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" name="mobile" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Complete Address</label>
                            <textarea class="form-control" name="address" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Pincode</label>
                            <input type="text" class="form-control" name="pincode" required>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-md-5">
                <div class="card shadow border-0 p-4 bg-light">
                    <h5 class="fw-bold">🛍 Order Summary</h5>
                    <ul class="list-group mb-3">
                        @foreach ($products as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    {{-- <h6 class="fw-bold">{{ $item->name }}</h6>
                                    <p class="text-muted mb-0">₹{{ $item->price }}</p> --}}
                                </div>
                                {{-- <span class="badge bg-primary fs-6">Qty: {{ $item->quantity }}</span> --}}
                            </li>
                        @endforeach
                    </ul>
                    {{-- <h5 class="text-success fw-bold">Total: ₹{{ $totalPrice }}</h5> --}}
                    <button type="submit" class="btn btn-warning w-100 fw-bold mt-3">💳 Place Order</button>
                </div>
            </div>
        </div>
    </div>
@endsection
