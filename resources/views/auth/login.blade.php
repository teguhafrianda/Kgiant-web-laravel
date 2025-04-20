@extends('layouts.guest')

@section('title', 'Login')

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
                                    <span class="logo-txt">Kgiant</span>
                                </a>
                            </div>

                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5>Welcome Back!</h5>
                                    <p class="text-muted">Sign in to continue to Kgiant.</p>
                                </div>

                                <!-- Form Login -->
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Input Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
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

                                    <!-- Remember Me -->
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                        <label class="form-check-label" for="remember">Remember me</label>
                                    </div>

                                    <!-- Tombol Login -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-100">Sign In</button>
                                    </div>
                                </form>

                                <div class="mt-4 text-center">
                                    <p class="mb-1"><a href="{{ route('password.request') }}" class="text-muted">Forgot Password?</a></p>
                                    <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-primary fw-semibold">Sign up</a></p>
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
