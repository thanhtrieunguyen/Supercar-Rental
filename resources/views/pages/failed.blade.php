@extends('layouts.index')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/payment-result.css') }}">
@endpush

@section('content')
    <div class="payment-result-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="payment-card payment-failed">
                        <div class="payment-card-header">Thanh toán thất bại</div>

                        <div class="payment-card-body">
                            <div class="failed-icon">
                                <i class="fas fa-times-circle"></i>
                            </div>
                            <div class="failed-message">
                                {{ $message }}
                            </div>
                            <div class="d-flex flex-wrap justify-content-center">
                                <a href="{{ url()->previous() }}" class="btn btn-retry">Thử lại</a>
                                <a href="{{ route('home') }}" class="btn btn-home">Về trang chủ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
