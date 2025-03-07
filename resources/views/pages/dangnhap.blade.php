@extends('layouts.index')

@section('content')
    <style>
        .login-container {
            min-height: 80vh;
            display: flex;
            align-items: center;
            position: relative;
        }

        .container {
            position: relative;
            z-index: 1;
        }

        .login-card {
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            background: #ffffff;
            border-top: 4px solid #5fcf86;
        }

        .login-title {
            color: #333;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 20px;
            font-size: 1.5rem;
            position: relative;
        }

        .login-title:after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: linear-gradient(90deg, #5fcf86, #7ad89b);
        }

        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid #e1e1e1;
            transition: all 0.3s ease;
            background: #f9f9f9;
            font-size: 15px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(95, 207, 134, 0.2);
            border-color: #5fcf86;
            background: #fff;
        }

        .form-group label {
            font-weight: 500;
            color: #505050;
        }

        .login-btn {
            padding: 12px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            background: linear-gradient(45deg, #5fcf86, #7ad89b);
            border: none;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(95, 207, 134, 0.3);
        }

        .sign-up__divider {
            color: #757575;
            font-size: 14px;
            display: flex;
            align-items: center;
            margin: 1.8rem 0;
        }

        .sign-up__divider::before,
        .sign-up__divider::after {
            content: '';
            height: 1px;
            flex: 1;
            background-color: #e2e8f0;
        }

        .sign-up__divider::before {
            margin-right: 1rem;
        }

        .sign-up__divider::after {
            margin-left: 1rem;
        }

        .google-login {
            transition: transform 0.3s ease;
            background: #fff;
            border-radius: 8px;
            padding: 8px 16px;
            /* box-shadow: 0 2px 10px rgba(0,0,0,0.1); */
            display: inline-block;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 15px;
        }

        .forgot-password a {
            color: #5fcf86;
            font-size: 14px;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .register-prompt {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .register-prompt a {
            color: #5fcf86;
            font-weight: 600;
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

        .input-icon input {
            padding-left: 40px;
        }

        /* Car rental themed element */
        .rental-badge {
            position: absolute;
            top: 10px;
            right: 10px;
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

    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card login-card border-0">
                        <div class="rental-badge">SUPERCAR RENTAL</div>
                        <div class="card-body p-4 p-md-5">
                            <h4 class="login-title text-center">ĐĂNG NHẬP</h4>
                            @include('layouts.notification')

                            <form action="{{ route('auth.dangnhap') }}" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="mb-2" for="email">Email</label>
                                    <div class="input-icon">
                                        <i class="fas fa-envelope"></i>
                                        <input type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            id="email" name="email" placeholder="Nhập email của bạn"
                                            value="{{ old('email') }}">
                                    </div>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label class="mb-2" for="password">Mật khẩu</label>
                                    <div class="input-icon">
                                        <i class="fas fa-lock"></i>
                                        <input type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            id="password" name="password" placeholder="Nhập mật khẩu của bạn">
                                    </div>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="forgot-password">
                                    <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                                </div>

                                <button type="submit" class="btn btn-primary login-btn w-100">
                                    <i class="fas fa-sign-in-alt mr-2"></i> Đăng nhập
                                </button>

                                <div class="sign-up__divider">hoặc đăng nhập với</div>

                                <div class="text-center">
                                    <a href="{{ route('auth.google') }}" class="google-login d-inline-block">
                                        <img id="login-gg" width="180" src="./upload/images/login.png"
                                            alt="Login with Google">
                                    </a>
                                </div>

                                <div class="register-prompt">
                                    Bạn chưa có tài khoản? <a href="{{ route('pages.dangky') }}">Đăng ký ngay</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
