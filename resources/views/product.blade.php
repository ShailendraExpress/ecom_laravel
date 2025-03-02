@extends('master')

@section('content')
    <div id="myCarousel" class="carousel slide carousel-dark bg-light  p-3 mt-2" data-bs-ride="carousel">

        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach ($products as $key => $product)
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $key }}"
                    class="{{ $key == 0 ? 'active' : '' }}" aria-current="true"
                    aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach ($products as $key => $product)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <a href="detail/{{ $product->id }}">
                        <img src="{{ $product->gallery }}" class="d-block w-100"
                            style="max-height: 400px; object-fit: contain;" alt="{{ $product->name }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>{{ $product->name }}</h3>
                            <p>{{ $product->description }}</p>
                    </a>
                </div>
        </div>
        @endforeach
    </div>

    <!-- Left and right controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>

    <div class="trending-wrapper">
        <h1>Trending Products</h1>
        <div class="">
            @foreach ($products as $key => $product)
                <a href="detail/{{ $product->id }}">
                    <div class="trending-item p-3">
                        <img class="trending-image" src="{{ $product->gallery }}">
                        <div class="">
                            <h3>{{ $product->name }}</h3>

                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
