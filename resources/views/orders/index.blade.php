@extends('layouts.app')

@section('title', 'New Order')

@section('content')
    <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Menu</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Order</a></li>
                                    <li class="breadcrumb-item active">New Order</li>
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

    <div class="row">
        <div class="col-md-8">
            <h3>Available Products</h3>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Add to Cart</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="number" name="quantity" value="1" min="1" class="form-control d-inline w-50">
                                    <button type="submit" class="btn btn-primary btn-sm">Add</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <h3>Shopping Cart</h3>
            @php $totalCart = $totalCart ?? 0; @endphp
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('cart', []) as $cartItem)
                        @php
                            $itemTotal = $cartItem['price'] * $cartItem['quantity'];
                            $totalCart += $itemTotal;
                        @endphp
                        <tr>
                            <td>{{ $cartItem['name'] }}</td>
                            <td>{{ $cartItem['quantity'] }}</td>
                            <td>Rp {{ number_format($itemTotal, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $cartItem['id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h4 class="text-end">Total: <strong id="total-price">Rp {{ number_format($totalCart, 0, ',', '.') }}</strong></h4>

            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="customer_id">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-control">
                        <option value="" data-total-purchases="0">Guest</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" data-total-purchases="{{ $customer->total_purchases }}">
                                {{ $customer->name }} ({{ $customer->total_purchases }} orders)
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="payment_method">Payment Method</label>
                    <select name="payment_method" id="payment_method" class="form-control" required>
                        <option value="cash">Cash</option>
                        <option value="qris">QRIS</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3 w-100">Checkout</button>
            </form>
        </div>
    </div>
</div>
<!-- Script untuk diskon (1 gratis setelah 5 pembelian) -->
<script>
document.addEventListener('DOMContentLoaded', function () {
        let customerSelect = document.getElementById('customer_id');
        let totalPriceElement = document.getElementById('total-price');

        if (!customerSelect || !totalPriceElement) return;

        let originalPrice = @json($totalCart); // Memastikan nilai ini valid di JavaScript

        customerSelect.addEventListener('change', function () {
            let selectedCustomer = this.options[this.selectedIndex];
            let totalPurchases = parseInt(selectedCustomer.getAttribute('data-total-purchases')) || 0;

            if (totalPurchases > 0 && totalPurchases % 5 === 0) {
                totalPriceElement.innerHTML = "<strong style='color: green;'>Rp 0 (Gratis)</strong>";
            } else {
                totalPriceElement.innerText = "Rp " + new Intl.NumberFormat('id-ID').format(originalPrice);
            }
        });
    });
</script>
@endsection


