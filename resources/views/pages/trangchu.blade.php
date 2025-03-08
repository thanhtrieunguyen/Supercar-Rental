@extends('layouts.index')

<head>
    <link rel="icon" type="image/x-icon" href="upload/slides/car.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/trangchu.css">
</head>
@section('content')
<!-- Banner Section -->
<div class="hero-banner">
    <div class="hero-banner__background">
        <div class="overlay"></div>
    </div>
    <div class="hero-banner__content">
        <h1>SuperCar - Cùng Bạn Đến Mọi Hành Trình</h1>
        <div class="horizontal-line"></div>
        <h6>Trải nghiệm sự khác biệt từ <span class="highlight">hơn 1000</span> xe gia đình đời mới khắp Việt Nam</h6>
        <div class="hero-banner__contact">
            <div class="hotline">
                <i class="fas fa-phone-alt"></i> Hotline: <strong>19000000</strong>
            </div>
        </div>
        <div class="hero-banner__actions">
            <a href="/thuexe" class="btn-primary">Thuê Xe Ngay</a>
            <a href="#how-it-works" class="btn-secondary">Xem Hướng Dẫn</a>
        </div>
    </div>
    <div class="hero-banner__scroll">
        <span>Cuộn xuống</span>
        <i class="fas fa-chevron-down"></i>
    </div>
</div>

<!-- Best Cars Section with Slider -->
<div class="best-cars-section container">
    <div class="row">
        <div class="col-12 text-center mb-1">
            <h4 class="text-uppercase lead display-4">Xe Dành Cho Bạn</h4>
        </div>
    </div>

    <div class="car-slider-container">
        <div class="car-slider">
            @php $count = 0; @endphp
            @foreach ($xes as $xe)
            @php
            $count++;
            if($count > 8) continue; // Limit to 8 items
            $array = json_decode($xe->hinhxe->hinhxe, true);
            $img1 = $array[0] ?? './upload/images/default-image.jpg';
            @endphp

            <div class="car-slide">
                <div class="product-item">
                    <div class="product-top">
                        <span class="label-pos">
                            <span class="rent">Đặt xe nhanh
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.9733 7.70015L8.46667 14.2668C8.29334 14.5268 8.01335 14.6668 7.71335 14.6668C7.62002 14.6668 7.52667 14.6535 7.43334 14.6268C7.05334 14.5068 6.79335 14.1668 6.79335 13.7735V10.0135C6.79335 9.86015 6.64667 9.72682 6.46667 9.72682L3.78001 9.6935C3.44001 9.6935 3.12668 9.50016 2.97335 9.20682C2.82668 8.92016 2.84668 8.5735 3.03335 8.30017L7.53335 1.7335C7.76001 1.40016 8.18001 1.25349 8.56668 1.37349C8.94668 1.49349 9.20668 1.83349 9.20668 2.22682V5.98683C9.20668 6.14017 9.35335 6.2735 9.53335 6.2735L12.22 6.30682C12.56 6.30682 12.8733 6.49349 13.0267 6.79349C13.1733 7.08016 13.1533 7.42682 12.9733 7.70015Z" fill="#FFC634"></path>
                                </svg>
                            </span>
                        </span>
                        <div class="fix-img">
                            <a href="{{ route('xe.show', ['id' => $xe->idxe]) }}" class="product-thumb">
                                <img src="{{ $img1 }}" alt="{{ $xe->tenxe }}" style="width: 100%; height:190px">
                            </a>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="group-tag">
                            <span class="tag-item transmission">{{ $xe->truyendong }}</span>
                            <span class="tag-item non-mortgage">{{ $xe->nhienlieu }}</span>
                        </div>
                        <div class="product-name">
                            <p>{{ $xe->tenxe }}</p>
                        </div>
                        <div class="group-total" style="margin-bottom: 14px;">
                            <div class="info"><i class="ti-car"></i></div>
                            <span class="info">{{ $xe->dongxe->tendongxe }}</span>
                            <span class="info">•</span>
                            <span class="info">{{ $xe->hangxe->tenhangxe }}</span>
                        </div>
                        <div class="line-page"></div>
                        <div class="product-price">
                            <div class="price">
                                <span class="price-special">{{ number_format($xe->gia) }}K</span>/&nbsp;ngày
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Slider Controls -->
        <div class="slider-controls">
            <button class="slider-btn slider-prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="slider-btn slider-next">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <!-- Slider Dots -->
        <div class="slider-dots">
            <span class="slider-dot active"></span>
            <span class="slider-dot"></span>
        </div>
    </div>

    <div class="text-center mt-4">
        <a href="/thuexe" class="btn btn-primary view-more-btn">Xem thêm</a>
    </div>
</div>

<!-- Popular Destinations Section -->
<section class="popular-destinations">
    <div class="container">
        <div class="section-title">
            <h2>Địa Điểm Nổi Bật</h2>
            <p>Khám phá các điểm du lịch hấp dẫn nhất Việt Nam với dịch vụ thuê xe SuperCar</p>
        </div>

        <div class="destinations-grid">
            <a href="/thuexe?location=hanoi" class="destination-card">
                <div class="destination-img">
                    <img src="/upload/slides/destination-hanoi.jpg" alt="Hà Nội">
                </div>
                <div class="destination-overlay">
                    <div class="destination-name">Hà Nội</div>
                    <div class="destination-count">280 xe</div>
                </div>
            </a>

            <a href="/thuexe?location=hcm" class="destination-card">
                <div class="destination-img">
                    <img src="/upload/slides/destination-hcm.jpg" alt="TP. Hồ Chí Minh">
                </div>
                <div class="destination-overlay">
                    <div class="destination-name">TP. Hồ Chí Minh</div>
                    <div class="destination-count">420 xe</div>
                </div>
            </a>

            <a href="/thuexe?location=danang" class="destination-card">
                <div class="destination-img">
                    <img src="/upload/slides/destination-danang.jpg" alt="Đà Nẵng">
                </div>
                <div class="destination-overlay">
                    <div class="destination-name">Đà Nẵng</div>
                    <div class="destination-count">160 xe</div>
                </div>
            </a>

            <a href="/thuexe?location=nhatrang" class="destination-card">
                <div class="destination-img">
                    <img src="/upload/slides/destination-nhatrang.jpg" alt="Nha Trang">
                </div>
                <div class="destination-overlay">
                    <div class="destination-name">Nha Trang</div>
                    <div class="destination-count">120 xe</div>
                </div>
            </a>

            <a href="/thuexe?location=dalat" class="destination-card">
                <div class="destination-img">
                    <img src="/upload/slides/destination-dalat.jpg" alt="Đà Lạt">
                </div>
                <div class="destination-overlay">
                    <div class="destination-name">Đà Lạt</div>
                    <div class="destination-count">150 xe</div>
                </div>
            </a>

            <a href="/thuexe?location=vungtau" class="destination-card">
                <div class="destination-img">
                    <img src="/upload/slides/destination-vungtau.jpg" alt="Vũng Tàu">
                </div>
                <div class="destination-overlay">
                    <div class="destination-name">Vũng Tàu</div>
                    <div class="destination-count">90 xe</div>
                </div>
            </a>

            <a href="/thuexe?location=quynhon" class="destination-card">
                <div class="destination-img">
                    <img src="/upload/slides/destination-quynhon.jpg" alt="Quy Nhơn">
                </div>
                <div class="destination-overlay">
                    <div class="destination-name">Quy Nhơn</div>
                    <div class="destination-count">70 xe</div>
                </div>
            </a>

            <a href="/thuexe?location=hue" class="destination-card">
                <div class="destination-img">
                    <img src="/upload/slides/destination-hue.jpg" alt="Huế">
                </div>
                <div class="destination-overlay">
                    <div class="destination-name">Huế</div>
                    <div class="destination-count">80 xe</div>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Horizontal Line Separator -->
<div class="container">
    <div class="horizontal-line" style="margin: 50px auto;"></div>
</div>

<!-- Features Section -->
<section class="features-section space sec">
    <div class="m-container">
        <h2>Ưu điểm của SuperCar</h2>
        <h5 class="title">Những tính năng giúp bạn dễ dàng hơn khi thuê xe trên SuperCar</h5>
        <div class="features-container">
            <div class="features-item point">
                <div class="features-item__img">
                    <img src="/upload/slides/laixe.svg" alt="Lái xe an toàn">
                </div>
                <h5>Lái xe an toàn cùng SuperCar</h5>
                <p>Chuyến đi trên SuperCar được bảo vệ với Gói bảo hiểm thuê xe tự lái từ MIC & VNI.<br>
                    Khách thuê sẽ chỉ bồi thường tối đa 2,000,000VNĐ trong trường hợp có sự cố ngoài ý muốn.</p>
            </div>
            <div class="features-item point">
                <div class="features-item__img">
                    <img src="/upload/slides/datxe.svg" alt="An tâm đặt xe">
                </div>
                <h5>An tâm đặt xe</h5>
                <p>Không tính phí huỷ chuyến trong vòng 1h sau khi đặt cọc.
                    Hoàn cọc và bồi thường 100% nếu chủ xe huỷ chuyến trong vòng 7 ngày trước chuyến đi</p>
            </div>
            <div class="features-item point">
                <div class="features-item__img">
                    <img src="/upload/slides/thutuc.svg" alt="Thủ tục đơn giản">
                </div>
                <h5>Thủ tục đơn giản</h5>
                <p>Chỉ cần có CCCD gắn chip (Hoặc Passport) &
                    Giấy phép lái xe là bạn đã đủ điều kiện thuê xe trên SuperCar.</p>
            </div>
            <div class="features-item point">
                <div class="features-item__img">
                    <img src="/upload/slides/thanhtoan.svg" alt="Thanh toán dễ dàng">
                </div>
                <h5>Thanh toán dễ dàng</h5>
                <p>Đa dạng hình thức thanh toán: ATM, thẻ Visa & Ví điện tử (Momo, VnPay, ZaloPay).</p>
            </div>
            <div class="features-item point">
                <div class="features-item__img">
                    <img src="/upload/slides/giaoxe.svg" alt="Giao xe tận nơi">
                </div>
                <h5>Giao xe tận nơi</h5>
                <p>Bạn có thể lựa chọn giao xe tận nhà/sân bay... Phí tiết kiệm chỉ từ 15k/km.</p>
            </div>
            <div class="features-item point">
                <div class="features-item__img">
                    <img src="/upload/slides/dongxe.svg" alt="Dòng xe đa dạng">
                </div>
                <h5>Dòng xe đa dạng</h5>
                <p>Hơn 100 dòng xe cho bạn tuỳ ý lựa chọn: Mini, Sedan, CUV, SUV, MPV, Bán tải.</p>
            </div>
        </div>
    </div>
</section>

<!-- How to Rent Section -->
<div id="wrapper1" style="
    margin-top: 6rem;
">
    <div id="title_wrapper">
        <h2>Hướng Dẫn Thuê Xe</h2>
        <h5 class="title">Chỉ với 4 bước đơn giản để trải nghiệm thuê xe SuperCar một cách nhanh chóng</h5>
    </div>
    <div id="container_wrapper1">
        <div class="container_item">
            <div class="item_pic">
                <img loading="lazy" src="/upload/slides/item1.svg" alt="Đặt xe">
            </div>
            <div class="item_content">
                <h5 class="text_primary">01</h5>
                <h5>
                    Đặt xe trên
                    <br>
                    web SuperCar
                </h5>
            </div>
        </div>
        <div class="container_item">
            <div class="item_pic">
                <img loading="lazy" src="/upload/slides/item2.svg" alt="Nhận xe">
            </div>
            <div class="item_content">
                <h5 class="text_primary">02</h5>
                <h5>
                    Nhận xe
                </h5>
            </div>
        </div>
        <div class="container_item">
            <div class="item_pic">
                <img loading="lazy" src="/upload/slides/item3.svg" alt="Bắt đầu hành trình">
            </div>
            <div class="item_content">
                <h5 class="text_primary">03</h5>
                <h5>
                    Bắt đầu
                    <br>
                    hành trình
                </h5>
            </div>
        </div>
        <div class="container_item">
            <div class="item_pic">
                <img loading="lazy" src="/upload/slides/item4.svg" alt="Trả xe">
            </div>
            <div class="item_content">
                <h5 class="text_primary">04</h5>
                <h5>
                    Trả xe & kết thúc
                    <br>
                    chuyến đi
                </h5>
            </div>
        </div>
    </div>
</div>

<!-- Blog Section -->
<section class="blog-section">
    <div class="container">
        <div class="section-title">
            <h2>Blog & Kinh Nghiệm</h2>
            <p>Cập nhật thông tin và kinh nghiệm hữu ích về thuê xe tự lái</p>
        </div>

        <div class="blog-container">
            <div class="featured-blog">
                <a href="/blog" class="blog-card featured">
                    <div class="blog-image">
                        <img loading="lazy" src="/upload/slides/blog1.jpg" alt="Thuê xe ô tô tự lái dịp Tết">
                        <div class="blog-category">Kinh nghiệm</div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date"><i class="far fa-calendar-alt"></i> 24-01-2024</span>
                            <span class="blog-read-time"><i class="far fa-clock"></i> 5 phút đọc</span>
                        </div>
                        <h3 class="blog-title">Thuê xe ô tô tự lái: An tâm đưa gia đình đi muôn nơi dịp Tết Nguyên Đán</h3>
                        <p class="blog-excerpt">Tìm hiểu những lưu ý khi thuê xe dịp Tết để có chuyến đi an toàn, tiết kiệm và trọn vẹn cùng gia đình.</p>
                        <div class="blog-link">Xem chi tiết <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>
            </div>

            <div class="blog-grid">
                <a href="/blog" class="blog-card">
                    <div class="blog-image">
                        <img loading="lazy" src="/upload/slides/blog2.jpg" alt="Thuê xe ô tô tự lái dịp Giáng sinh">
                        <div class="blog-category">Lễ hội</div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date"><i class="far fa-calendar-alt"></i> 29-11-2023</span>
                        </div>
                        <h3 class="blog-title">Thuê xe ô tô tự lái: Tự do trải nghiệm lễ Giáng sinh đáng nhớ</h3>
                        <div class="blog-link">Xem chi tiết <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>

                <a href="/blog" class="blog-card">
                    <div class="blog-image">
                        <img loading="lazy" src="/upload/slides/blog3.jpg" alt="Thuê xe ô tô tự lái quận 3">
                        <div class="blog-category">Địa điểm</div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date"><i class="far fa-calendar-alt"></i> 30-11-2023</span>
                        </div>
                        <h3 class="blog-title">Thuê xe ô tô tự lái giá rẻ tại quận 3: sự lựa chọn không giới hạn</h3>
                        <div class="blog-link">Xem chi tiết <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>

                <a href="/blog" class="blog-card">
                    <div class="blog-image">
                        <img loading="lazy" src="/upload/slides/destination-dalat.jpg" alt="Du lịch Đà Lạt thuê xe gì">
                        <div class="blog-category">Du lịch</div>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date"><i class="far fa-calendar-alt"></i> 15-12-2023</span>
                        </div>
                        <h3 class="blog-title">Du lịch Đà Lạt nên thuê xe gì? Top 5 dòng xe phù hợp nhất</h3>
                        <div class="blog-link">Xem chi tiết <i class="fas fa-arrow-right"></i></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="blog-action">
            <a href="/blog" class="btn-secondary">Xem tất cả bài viết <i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="/js/car-slider.js"></script>
@endsection
