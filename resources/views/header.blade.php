<?php
use App\Http\Controllers\ProductController;
$totalCartItems = 0;
if (Session::has('user')) {
    $totalCartItems = ProductController::cartItem();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Official E-Commerce Header</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container-fluid px-4">
            <!-- 🔹 Brand Logo -->
            <a class="navbar-brand fw-bold text-primary" href="/">E-Comm Project</a>

            <!-- 🔹 Mobile Menu Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- 🔹 Navbar Items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="categoriesDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="categoriesDropdown">
                            <li><a class="dropdown-item" href="#">Electronics</a></li>
                            <li><a class="dropdown-item" href="#">Fashion</a></li>
                            <li><a class="dropdown-item" href="#">Home & Kitchen</a></li>
                            <li><a class="dropdown-item" href="#">Beauty & Health</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#">Deals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="#">Support</a>
                    </li>
                </ul>

                <!-- 🔹 Search Bar -->
                <form action="/search" class="d-flex mx-auto" style="max-width: 500px; width: 100%;" role="search">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search for products..."
                        aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>

                <!-- 🔹 Cart Button -->
                <a href="#" class="btn btn-outline-dark position-relative ms-3">
                    🛒 Cart
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        {{ $totalCartItems }}
                    </span>
                </a>

                @if (Session::has('user'))
                    <div class="dropdown ms-3">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="userDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            👤 {{ Session::get('user')['name'] }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </div>
                @else
                    <a href="/login" class="btn btn-outline-dark ms-3">🔑 Login</a>
                @endif
                <!-- 🔹 User Profile Dropdown -->
                {{-- <div class="dropdown ms-3">

                    <button class="btn btn-outline-dark dropdown-toggle" type="button" id="userDropdown"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        👤 Account
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#">Login</a></li>
                        <li><a class="dropdown-item" href="#">Register</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Orders</a></li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </nav>

    <!-- Bootstrap Bundle (Includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
