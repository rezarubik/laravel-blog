@extends('layouts.main')
@section('title', 'Login')
@section('container')
<div class="row justify-content-center">
    <div class="col-md-4">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please login </h1>
            <form action="login" method="post">
                @csrf
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" autofocus required>
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>

            <!-- //note: Registration -->
            <small class="d-block text-center mt-3">Not registerd? <a href="register">Register Now!</a></small>
        </main>
    </div>
</div>
@endsection