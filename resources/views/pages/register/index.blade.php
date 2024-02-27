@extends('layouts.guest.main')

@section('section')
    <section id="register">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-4">
                    <h1 class="h3 mb-3 font-weight-normal text-center">Registration</h1>
                    <form class="form-registration" action="/register" method="POST">
                        @csrf

                        <label for="name" class="sr-only">Full name</label>
                        <input type="text" id="name" name="name"
                            class="form-control rounded-top @error('name') is-invalid rounded @enderror"
                            placeholder="Full name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="username" class="sr-only">Username</label>
                        <input type="text" id="username" name="username"
                            class="form-control @error('username') is-invalid rounded @enderror" placeholder="Username"
                            value="{{ old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="email" class="sr-only">Email address</label>
                        <input type="email" id="email" name="email"
                            class="form-control @error('email') is-invalid rounded @enderror" placeholder="name@example.com"
                            value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="password" class="sr-only">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-control rounded-bottom @error('password') is-invalid rounded @enderror"
                            placeholder="Password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Register</button>
                    </form>
                    <small class="d-block text-center mt-3">Already registered? <a href="/login"
                            data-href="http://e-store.test/login">Login!</a></small>
                </div>
            </div>
        </div>
    </section>
@endsection
