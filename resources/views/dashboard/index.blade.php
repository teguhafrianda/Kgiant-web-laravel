@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Title -->

                <!-- Dashboard Stats -->
                <div class="row">
                    <!-- Total Products -->
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-box"></i> Total Products</h5>
                                <p class="card-text fs-3">{{ $totalProducts }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Customers -->
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-users"></i> Total Customers</h5>
                                <p class="card-text fs-3">{{ $totalCustomers }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Orders -->
                    <div class="col-md-3">
                        <div class="card text-white bg-warning mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-shopping-cart"></i> Total Orders</h5>
                                <p class="card-text fs-3">{{ $totalOrders }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Revenue -->
                    <div class="col-md-3">
                        <div class="card text-white bg-danger mb-3">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-money-bill-wave"></i> Total Revenue</h5>
                                <p class="card-text fs-3">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Dashboard Stats -->

                <!-- Navigation Buttons -->
                <div class="text-center mt-4">
                    <a href="{{ route('orders.index') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Create New Order
                    </a>
                    <a href="{{ route('reports.index') }}" class="btn btn-secondary">
                        <i class="fas fa-file-alt"></i> View Reports
                    </a>
                </div>
                <!-- End Navigation Buttons -->

                
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->
        
        @endsection