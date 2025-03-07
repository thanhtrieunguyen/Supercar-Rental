@extends('layouts.index')

@section('content')
    @include('admin.nav')

    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <div class="card stats-card customer-card border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="stats-value">{{ $totalKhachHang }}</p>
                            <p class="stats-label">Khách hàng</p>
                        </div>
                        <div class="stats-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card stats-card car-card border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="stats-value">{{ $totalXe }}</p>
                            <p class="stats-label">Tổng xe</p>
                        </div>
                        <div class="stats-icon">
                            <i class="fas fa-car"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card stats-card revenue-card border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="stats-value">{{ number_format($totalMoney[0]->total_money) }} đ</p>
                            <p class="stats-label">Doanh thu</p>
                        </div>
                        <div class="stats-icon">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-8 mb-4">
            <div class="card data-table-container border-0">
                <div class="card-body">
                    <h6 class="card-title">Danh sách cho thuê xe ngày {{ date('d/m/Y') }}</h6>
                    <table class="table custom-table table-hover">
                        <thead>
                            <tr>
                                <th scope="col" width="60">STT</th>
                                <th scope="col">Xe</th>
                                <th scope="col">Biển số</th>
                                <th scope="col">Khách hàng</th>
                                <th scope="col" class="text-right">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @forelse ($giaoDichTodays as $giaoDichToday)
                                <tr>
                                    <th scope="row">{{ ++$i }}</th>
                                    <td>{{ $giaoDichToday->xe->tenxe }}</td>
                                    <td>{{ $giaoDichToday->xe->bienso }}</td>
                                    <td>{{ $giaoDichToday->user->hoten }}</td>
                                    <td class="text-right font-weight-bold">{{ number_format($giaoDichToday->tongtien) }} đ</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="5">Không có dữ liệu</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card top-cars-card border-0">
                <div class="card-body">
                    <h6 class="card-title text-center">XE CHO THUÊ NHIỀU NHẤT</h6>
                    <div class="top-cars-list">
                        <div class="d-flex justify-content-between list-header">
                            <span>STT</span>
                            <span>Tên xe</span>
                            <span>Số lần</span>
                        </div>
                        @php
                            $j = 0;
                        @endphp
                        @forelse ($topXes as $topXe)
                            <div class="d-flex justify-content-between align-items-center top-cars-item">
                                <div class="top-cars-number">{{ ++$j }}</div>
                                <a href="{{ route('xe.show', $topXe->idxe) }}" class="mx-2">{{ $topXe->tenxe }}</a>
                                <span class="top-cars-count">{{ $topXe->times }} <small>lần</small></span>
                            </div>
                        @empty
                            <div class="d-flex justify-content-center top-cars-item">
                                <span>Chưa có dữ liệu</span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/thongke.css') }}">
@endpush
