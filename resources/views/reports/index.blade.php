@extends('layouts.app')

@section('title', 'Sales Reports')

@section('content')
    <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Menu</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Reports</a></li>
                                    <li class="breadcrumb-item active">Reports Management</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol kembali ke halaman orders -->
    <div class="mb-3">
        <a href="{{ route('orders.index') }}" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Back to New Order
        </a>
    </div>

    <!-- Membuat tabel responsif -->
    <div class="table-responsive custom-table-container">
        <table class="table table-hover table-striped custom-table">
            <thead class="thead-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Payment Method</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td class="text-center">{{ $order->id }}</td>
                        <td>{{ $order->customer->name ?? 'Guest' }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td class="text-center">{{ $order->quantity }}</td>
                        <td class="text-right">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td class="text-center">{{ strtoupper($order->payment_method) }}</td>
                        <td class="text-center">{{ $order->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No sales data available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

   <!-- Pagination dengan Bootstrap -->
<div class="d-flex justify-content-center mt-4">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            {{-- Tambahkan custom pagination --}}
            @if ($orders->onFirstPage())
                <li class="page-item disabled"><span class="page-link">«</span></li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $orders->previousPageUrl() }}" rel="prev">«</a>
                </li>
            @endif

            @foreach ($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $orders->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            @if ($orders->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $orders->nextPageUrl() }}" rel="next">»</a>
                </li>
            @else
                <li class="page-item disabled"><span class="page-link">»</span></li>
            @endif
        </ul>
    </nav>
</div>


<!-- Tambahkan file CSS & JS yang sesuai -->
@push('styles')
    <link rel="stylesheet" href="{{ asset('template/assets/css/custom.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('template/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('template/assets/libs/feather-icons/feather.min.js') }}"></script>
    <script>
        feather.replace(); // Ensure Feather icons are initialized
    </script>
    <script src="{{ asset('template/assets/js/app.js') }}"></script>
@endpush
@endsection
