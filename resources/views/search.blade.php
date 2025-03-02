@extends('master')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Search Results</h2>

        <div class="row">
            <!-- Left Sidebar (Filters) -->
            <div class="col-md-3">
                <div class="bg-light p-3 rounded shadow-sm">
                    <h5>Filter Products</h5>

                    <!-- Category Filter -->
                    <h6 class="mt-3">Category</h6>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="cat1">
                        <label class="form-check-label" for="cat1">Electronics</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="cat2">
                        <label class="form-check-label" for="cat2">Clothing</label>
                    </div>

                    <!-- Price Filter -->
                    <h6 class="mt-3">Price Range</h6>
                    <input type="number" class="form-control mb-2" placeholder="Min Price">
                    <input type="number" class="form-control mb-2" placeholder="Max Price">

                    <!-- Sorting -->
                    <h6 class="mt-3">Sort By</h6>
                    <select class="form-select">
                        <option value="low_high">Price: Low to High</option>
                        <option value="high_low">Price: High to Low</option>
                        <option value="latest">Newest First</option>
                    </select>

                    <button class="btn btn-primary btn-sm mt-3 w-100">Apply Filters</button>
                </div>
            </div>

            <!-- Right Side: Product List -->
            <div class="col-md-9">
                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
                    @foreach ($products as $product)
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0">
                                <a href="detail/{{ $product->id }}" class="text-decoration-none text-dark">
                                    <!-- Product Image -->
                                    <img src="{{ $product->gallery }}" class="card-img-top"
                                        style="height: 200px; object-fit: contain;">

                                    <div class="card-body">
                                        <!-- Product Name -->
                                        <h5 class="card-title">{{ $product->name }}</h5>

                                        <!-- Product Description -->
                                        <p class="card-text text-muted small">
                                            {{ Str::limit($product->description, 50) }}
                                        </p>

                                        <!-- Product Price & Cart Button -->
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="badge bg-success fs-6">₹{{ $product->price }}</span>
                                            <button class="btn btn-primary btn-sm">Add to Cart</button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
