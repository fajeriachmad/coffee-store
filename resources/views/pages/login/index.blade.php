@extends('layouts.guest.main')

@section('section')
    <section id="login">
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-md-4">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <h1 class="h3 mb-3 font-weight-normal text-center">Login</h1>
                    <form class="form-signin" action="/login" method="POST">
                        @csrf

                        <label for="username" class="sr-only">Email address</label>
                        <input type="text" id="username" name="username"
                            class="form-control @error('username') is-invalid rounded @enderror" placeholder="username"
                            value="{{ old('username') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="password" class="sr-only">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <button class="btn btn-lg btn-primary btn-block mt-3" type="submit">Login</button>
                    </form>
                    <small class="d-block text-center mt-3">Not registered? <a href="/register"
                            data-href="http://e-store.test/register">Register Now!</a></small>
                </div>
            </div>
        </div>
    </section>
@endsection
