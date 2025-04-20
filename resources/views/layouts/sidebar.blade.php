<!-- Left Sidebar Start -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <!-- Semua Role Bisa Akses Dashboard -->
                <li>
                    <a href="{{ route('dashboard.index') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <!-- Admin Only -->
                @if(auth()->user()->role === 'admin')
                    <li>
                        <a href="{{ route('category.index') }}">
                            <i data-feather="file-text"></i>
                            <span data-key="t-categories">Categories</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('product.index') }}">
                            <i data-feather="box"></i>
                            <span data-key="t-products">Products</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('settings.index') }}">
                            <i data-feather="settings"></i>
                            <span data-key="t-settings">Settings</span>
                        </a>
                    </li>
                @endif

                <!-- Kasir & Admin Bisa Akses Orders, Customers, Reports -->
                @if(auth()->user()->role === 'kasir' || auth()->user()->role === 'admin')
                    <li>
                        <a href="{{ route('orders.index') }}">
                            <i data-feather="shopping-cart"></i>
                            <span data-key="t-orders">Orders</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('customers.index') }}">
                            <i data-feather="users"></i>
                            <span data-key="t-customers">Customers</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('reports.index') }}">
                            <i data-feather="bar-chart-2"></i>
                            <span data-key="t-reports">Reports</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<!-- Left Sidebar End -->
