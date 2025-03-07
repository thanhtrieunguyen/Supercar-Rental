@extends('layouts.index')

@section('content')
    <style>
        .register-container {
            min-height: 80vh;
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }

        .register-card {
            border-radius: 15px;
            box-shadow: 0 0 25px rgba(0,0,0,0.1);
            background: #ffffff;
            border-top: 4px solid #5fcf86;
            position: relative;
            overflow: hidden;
        }

        .register-card::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, transparent 50%, rgba(95, 207, 134, 0.1) 50%);
            z-index: 0;
        }

        .register-title {
            color: #333;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            position: relative;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .register-title:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #5fcf86, #7ad89b);
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e1e1e1;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
            background: #f9f9f9;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(95, 207, 134, 0.2);
            border-color: #5fcf86;
            background: #fff;
        }

        .form-group label {
            color: #505050;
            font-weight: 500;
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

        .register-btn {
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            background: linear-gradient(45deg, #5fcf86, #7ad89b);
            border: none;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 15px;
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(95, 207, 134, 0.3);
        }

        .form-section-title {
            font-size: 16px;
            font-weight: 600;
            color: #5fcf86;
            margin: 20px 0 15px;
            border-bottom: 1px dashed #e0e0e0;
            padding-bottom: 8px;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .login-link a {
            color: #5fcf86;
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 15px;
            color: #aaa;
        }

        .input-icon input,
        .input-icon textarea {
            padding-left: 40px;
        }

        /* Car rental themed element */
        .rental-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #5fcf86;
            color: white;
            padding: 5px 15px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 1px;
            z-index: 2;
        }
    </style>

    <div class="register-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card register-card border-0">
                        <div class="rental-badge">SUPERCAR RENTAL</div>
                        <div class="card-body p-4 p-md-5">
                            <h4 class="register-title text-center">ĐĂNG KÝ TÀI KHOẢN</h4>
                            @include('layouts.notification')

                            <form action="{{ route('auth.dangky') }}" method="POST">
                                @csrf

                                <div class="form-section-title">
                                    <i class="fas fa-user-circle mr-2"></i> Thông tin tài khoản
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-icon">
                                        <i class="fas fa-envelope"></i>
                                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            id="email" name="email" placeholder="Nhập địa chỉ email" value="{{ old('email') }}">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Mật khẩu</label>
                                            <div class="input-icon">
                                                <i class="fas fa-lock"></i>
                                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                    id="password" name="password" placeholder="Tạo mật khẩu">
                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password_confirmation">Xác nhận mật khẩu</label>
                                            <div class="input-icon">
                                                <i class="fas fa-lock"></i>
                                                <input type="password" class="form-control"
                                                    id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-section-title">
                                    <i class="fas fa-id-card mr-2"></i> Thông tin cá nhân
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="hoten">Họ và tên</label>
                                            <div class="input-icon">
                                                <i class="fas fa-user"></i>
                                                <input type="text" class="form-control{{ $errors->has('hoten') ? ' is-invalid' : '' }}"
                                                    id="hoten" name="hoten" placeholder="Họ và tên đầy đủ" value="{{ old('hoten') }}">
                                            </div>
                                            @if ($errors->has('hoten'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('hoten') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cccd">Căn cước công dân</label>
                                            <div class="input-icon">
                                                <i class="fas fa-id-card"></i>
                                                <input type="text" class="form-control{{ $errors->has('cccd') ? ' is-invalid' : '' }}"
                                                    id="cccd" name="cccd" placeholder="Số CCCD/CMND" value="{{ old('cccd') }}">
                                            </div>
                                            @if ($errors->has('cccd'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('cccd') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ngaysinh">Ngày sinh</label>
                                            <div class="input-icon">
                                                <i class="fas fa-calendar"></i>
                                                <input type="date" class="form-control" id="ngaysinh" name="ngaysinh"
                                                    value="{{ old('ngaysinh') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="sdt">Số điện thoại</label>
                                            <div class="input-icon">
                                                <i class="fas fa-phone"></i>
                                                <input type="text" class="form-control{{ $errors->has('sdt') ? ' is-invalid' : '' }}"
                                                    id="sdt" name="sdt" placeholder="Số điện thoại" value="{{ old('sdt') }}">
                                            </div>
                                            @if ($errors->has('sdt'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('sdt') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="diachi">Địa chỉ</label>
                                    <div class="input-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <textarea class="form-control{{ $errors->has('diachi') ? ' is-invalid' : '' }}"
                                            id="diachi" name="diachi" rows="2" placeholder="Địa chỉ đầy đủ">{{ old('diachi') }}</textarea>
                                    </div>
                                    @if ($errors->has('diachi'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('diachi') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary register-btn w-100">
                                    <i class="fas fa-user-plus mr-2"></i> Đăng ký tài khoản
                                </button>

                                <div class="login-link">
                                    Đã có tài khoản? <a href="{{ route('pages.dangnhap') }}">Đăng nhập</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
