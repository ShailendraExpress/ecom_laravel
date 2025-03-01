@extends('master')
@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 66vh;">
        <div class="col-md-4 col-sm-6">
            <div class="card shadow-lg p-4">
                <h3 class="text-center mb-4">Login</h3>
                <form action="login" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email"
                            name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="pwd" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control" id="pwd"
                            placeholder="Enter password" name="pswd" required>
                    </div>
                    <div class="form-check mb-3">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
