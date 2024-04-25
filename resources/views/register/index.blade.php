@extends('layouts.main')
@section('title', 'Login')
@section('container')
<div class="row justify-content-center">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
            <form action="register" method="post">
                @csrf
                <div class="form-floating">
                    <input value="{{old('name')}}" required type="text" name="name" class="form-control rounded-top @error('name')
                        is-invalid
                    @enderror" id="name" placeholder="Name">
                    <label for="name">Name</label>
                    <div class="invalid-feedback">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-floating">
                    <input value="{{old('username')}}" required type="text" name="username" class="form-control @error('username')
                        is-invalid
                    @enderror" id="username" placeholder="Username">
                    <label for="username">Username</label>
                    <div class="invalid-feedback">
                        @error('username')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-floating">
                    <input value="{{old('email')}}" required type="email" name="email" class="form-control @error('email')
                        is-invalid
                    @enderror" id="floatingInput" placeholder="Email">
                    <label for="floatingInput">Email address</label>
                    <div class="invalid-feedback">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-floating">
                    <input required type="password" name="password" class="form-control rounded-bottom @error('password')
                        is-invalid
                    @enderror" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <div class="invalid-feedback">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>

            <!-- //note: Registration -->
            <small class="d-block text-center mt-3">Already registered? <a href="login">Login</a></small>
        </main>
    </div>
</div>
@endsection