@extends('layouts.index')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/payment-result.css') }}">
@endpush

@section('content')
    <div class="payment-result-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="payment-card payment-success">
                        <div class="payment-card-header">Thanh toán thành công</div>

                        <div class="payment-card-body">
                            <div class="success-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="success-message">
                                {{ $message }}
                            </div>
                            <a href="{{ route('pages.trangchu') }}" class="btn btn-back">Trở về trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
