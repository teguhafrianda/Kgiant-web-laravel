@extends('layouts.guest')

@section('title', 'Register')

@section('content')
<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Bagian Kiri -->
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="mb-4 mb-md-5 text-center">
                                <a href="{{ route('dashboard.index') }}" class="d-block auth-logo">
                                    <img src="{{ asset('template/assets/images/logo-sm.svg') }}" alt="Logo" height="28"> 
                                    <span class="logo-txt">Minia</span>
                                </a>
                            </div>

                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5>Create an Account</h5>
                                    <p class="text-muted">Sign up to get started with Minia.</p>
                                </div>

                                <!-- Form Register -->
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <!-- Input Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <!-- Input Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <!-- Input Password -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <!-- Input Confirm Password -->
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                    </div>

                                    <!-- Tombol Register -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                                    </div>
                                </form>

                                <div class="mt-4 text-center">
                                    <p class="mb-0">Already have an account? <a href="{{ route('login') }}" class="text-primary fw-semibold">Sign in</a></p>
                                </div>
                            </div>

                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">
                                    © <script>document.write(new Date().getFullYear())</script> Minia. 
                                    Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian Kanan -->
            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg pt-md-5 p-4 d-flex">
                    <div class="bg-overlay bg-primary"></div>
                    <ul class="bg-bubbles">
                        <li></li><li></li><li></li><li></li><li></li>
                        <li></li><li></li><li></li><li></li><li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
