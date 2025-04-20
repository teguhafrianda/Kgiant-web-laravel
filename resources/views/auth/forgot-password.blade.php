@extends('layouts.guest')

@section('title', 'Forgot Password')

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
                                    <h5>Forgot Your Password?</h5>
                                    <p class="text-muted">
                                        No problem. Just let us know your email address, and we will send you a password reset link.
                                    </p>
                                </div>

                                <!-- Session Status -->
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <!-- Form Reset Password -->
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <!-- Input Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <!-- Tombol Kirim -->
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary w-100">Send Password Reset Link</button>
                                    </div>
                                </form>

                                <div class="mt-4 text-center">
                                    <p class="mb-0">Remembered your password? 
                                        <a href="{{ route('login') }}" class="text-primary fw-semibold">Sign in</a>
                                    </p>
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
