<div class="sticky-top admin-navbar" style="top: 60px; z-index: 1020;">
    <ul class="nav nav-pills justify-content-center bg-white rounded-lg shadow-sm py-2 px-2">
        <li class="nav-item mx-1">
            <a class="nav-link {{ Request::routeIs('admin.thongke') ? 'active bg-primary' : 'text-dark hover-effect' }}" href="{{ route('admin.thongke') }}">
                <i class="fas fa-chart-bar mr-1"></i> Thống kê
            </a>
        </li>
        <li class="nav-item mx-1">
            <a class="nav-link {{ Request::routeIs('user.index') ? 'active bg-primary' : 'text-dark hover-effect' }}" href="{{ route('user.index') }}">
                <i class="fas fa-users mr-1"></i> Quản lý khách hàng
            </a>
        </li>
        <li class="nav-item mx-1">
            <div class="dropdown">
                <a class="nav-link dropdown-toggle {{ Request::routeIs('xe.*') || Request::routeIs('dongxe.*') || Request::routeIs('hangxe.*') ? 'active bg-primary text-white' : 'text-dark hover-effect' }}" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-car mr-1"></i> Quản lý xe
                </a>
                <div class="dropdown-menu shadow-sm border-0 mt-1">
                    <a class="dropdown-item {{ Request::routeIs('xe.index') ? 'bg-light' : '' }}" href="{{ route('xe.index') }}">
                        <i class="fas fa-car-side mr-2"></i> Quản lý xe
                    </a>
                    <a class="dropdown-item {{ Request::routeIs('dongxe.index') ? 'bg-light' : '' }}" href="{{ route('dongxe.index') }}">
                        <i class="fas fa-tags mr-2"></i> Quản lý dòng xe
                    </a>
                    <a class="dropdown-item {{ Request::routeIs('hangxe.index') ? 'bg-light' : '' }}" href="{{ route('hangxe.index') }}">
                        <i class="fas fa-building mr-2"></i> Quản lý hãng xe
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item mx-1">
            <a class="nav-link {{ Request::routeIs('giaodich.index') ? 'active bg-primary' : 'text-dark hover-effect' }}" href="{{ route('giaodich.index') }}">
                <i class="fas fa-exchange-alt mr-1"></i> Quản lý giao dịch
            </a>
        </li>
        <li class="nav-item mx-1">
            <a class="nav-link {{ Request::routeIs('hoadon.index') ? 'active bg-primary' : 'text-dark hover-effect' }}" href="{{ route('hoadon.index') }}">
                <i class="fas fa-file-invoice-dollar mr-1"></i> Quản lý hoá đơn
            </a>
        </li>
    </ul>
</div>

<style>
.admin-navbar .nav-link {
    font-weight: 500;
    padding: 0.6rem 1rem;
    border-radius: 4px;
    transition: all 0.2s ease;
}

.admin-navbar .hover-effect:hover {
    background-color: #f8f9fa;
    transform: translateY(-2px);
}

.admin-navbar .dropdown-menu {
    border-radius: 8px;
    padding: 0.5rem 0;
}

.admin-navbar .dropdown-item {
    padding: 0.6rem 1.5rem;
    font-weight: 500;
    transition: all 0.2s ease;
}

.admin-navbar .dropdown-item:hover {
    background-color: #f1f1f1;
    transform: translateX(3px);
}

@media (max-width: 768px) {
    .admin-navbar .nav {
        flex-direction: column;
    }

    .admin-navbar .nav-item {
        margin: 0.2rem 0;
        width: 100%;
    }

    .admin-navbar .dropdown-menu {
        width: 100%;
    }
}
</style>
