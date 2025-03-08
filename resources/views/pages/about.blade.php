@extends('layouts.index')

@section('head')
<title>Về Chúng Tôi | SuperCar - Dịch Vụ Thuê Xe Chuyên Nghiệp</title>
<meta name="description" content="SuperCar - Dịch vụ thuê xe hàng đầu Việt Nam với hơn 5,000 đối tác và 100,000+ chuyến đi thành công trên 10+ thành phố. Khám phá câu chuyện của chúng tôi.">
<link rel="icon" type="image/x-icon" href="{{ asset('icons/about-us.png') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
<link rel="stylesheet" href="{{ asset('css/veSuperCar.css') }}" />
@endsection

@section('content')
<!-- Phần Hero -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content" data-aos="fade-up">
            <h1>Đồng Hành Cùng Việt Nam</h1>
            <p>SuperCar - Nền tảng thuê xe hàng đầu Việt Nam kết nối chủ xe và khách hàng với sự an toàn, tiện lợi và truyền cảm hứng.</p>
            <a href="{{ route('pages.thuexe') }}" class="btn btn-lg btn-supercar">Khám Phá Xe Ngay</a>
        </div>
    </div>
</section>

<!-- Phần Về Chúng Tôi -->
<section class="about-section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Câu Chuyện Của Chúng Tôi</h2>

        <div class="row">
            <div class="col-md-6" data-aos="fade-right" data-aos-delay="200">
                <div class="about-card">
                    <h3>Chúng Tôi Là Ai</h3>
                    <p>
                        SuperCar là nền tảng chia sẻ xe hàng đầu Việt Nam, được thành lập với tầm nhìn cách mạng hóa phương thức di chuyển tại Việt Nam. Chúng tôi không chỉ đơn thuần là dịch vụ cho thuê xe - mà còn là một cộng đồng đề cao sự an toàn, tiện lợi và tạo ra những hành trình đáng nhớ.
                    </p>
                    <p>
                        Nền tảng của chúng tôi kết nối liền mạch giữa chủ xe và người cần xe, tạo ra một hệ sinh thái đôi bên cùng có lợi, tối ưu hóa hiệu quả nguồn lực đồng thời cung cấp dịch vụ xuất sắc.
                    </p>
                </div>
            </div>

            <div class="col-md-6" data-aos="fade-left" data-aos-delay="200">
                <img src="https://www.mioto.vn/static/media/aboutus1.4c31a699.png" class="img-fluid rounded shadow" alt="Đội ngũ SuperCar">
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6 order-md-2" data-aos="fade-left" data-aos-delay="200">
                <div class="about-card">
                    <h3>Sứ Mệnh Của Chúng Tôi</h3>
                    <p>
                        Tại SuperCar, chúng tôi tin rằng mỗi hành trình đều quan trọng. Đó là lý do tại sao đội ngũ giàu kinh nghiệm và các đối tác của chúng tôi trong lĩnh vực cho thuê xe, công nghệ, bảo hiểm và du lịch không ngừng nỗ lực để khiến chuyến đi của bạn không chỉ an toàn mà còn thực sự đáng nhớ.
                    </p>
                    <p>
                        Chúng tôi hướng đến việc trở thành cộng đồng người dùng xe số 1 Việt Nam về sự văn minh và uy tín, mang lại giá trị thiết thực cho tất cả thành viên và góp phần cải thiện chất lượng cuộc sống thông qua các giải pháp giao thông sáng tạo.
                    </p>
                </div>
            </div>

            <div class="col-md-6 order-md-1" data-aos="fade-right" data-aos-delay="200">
                <img src="/upload/slides/pic2.jpg" class="img-fluid rounded shadow" alt="Sứ mệnh SuperCar">
            </div>
        </div>
    </div>
</section>

<!-- Phần Tầm Nhìn với Parallax -->
<section class="vision-section" data-aos="fade">
    <div class="container">
        <h2 class="mb-4">Lái Xe. Khám Phá. Truyền Cảm Hứng.</h2>
        <p class="lead mb-4">
            <strong>Nắm lấy vô lăng</strong> và <strong>khám phá</strong> một thế giới tràn đầy <strong>cảm hứng</strong>.
        </p>
        <p>
            Mỗi chuyến đi là một cơ hội để khám phá cuộc sống và thế giới xung quanh,<br>
            một cơ hội để học hỏi và chinh phục những trải nghiệm mới để trở thành những cá nhân tốt hơn.
        </p>
    </div>
</section>

<!-- Phần Dịch Vụ -->
<section class="services-section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Dịch Vụ Của Chúng Tôi</h2>

        <div class="row">
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fa-solid fa-car"></i>
                    </div>
                    <h3>Thuê Xe Tự Lái</h3>
                    <p>Tự do khám phá theo cách của bạn với đa dạng các dòng xe từ phổ thông đến cao cấp. Thủ tục đơn giản, giao nhận xe thuận tiện.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>
                    <h3>Thuê Xe Có Tài Xế</h3>
                    <p>Tận hưởng sự thoải mái với đội ngũ tài xế chuyên nghiệp, am hiểu địa phương và nhiều năm kinh nghiệm lái xe an toàn.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fa-solid fa-coins"></i>
                    </div>
                    <h3>Cho Thuê Xe Của Bạn</h3>
                    <p>Biến chiếc xe nhàn rỗi thành nguồn thu nhập ổn định. Chúng tôi đảm bảo an toàn và bảo hiểm đầy đủ cho xe của bạn.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Phần Thống Kê -->
<section class="stats-section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">SuperCar Qua Những Con Số</h2>

        <div class="row">
            <div class="col-md-4 col-lg-2 mb-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fa-solid fa-cart-flatbed-suitcase"></i>
                    </div>
                    <h3 class="stats-number counter" data-count="100000">100+</h3>
                    <p>Hành Trình Đã Hoàn Thành</p>
                </div>
            </div>

            <div class="col-md-4 col-lg-2 mb-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h3 class="stats-number counter" data-count="50000">50+</h3>
                    <p>Khách Hàng Hài Lòng</p>
                </div>
            </div>

            <div class="col-md-4 col-lg-2 mb-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fa-brands fa-redhat"></i>
                    </div>
                    <h3 class="stats-number counter" data-count="5000">100+</h3>
                    <p>Đối Tác Chủ Xe</p>
                </div>
            </div>

            <div class="col-md-4 col-lg-2 mb-4" data-aos="zoom-in" data-aos-delay="400">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fa-solid fa-car-side"></i>
                    </div>
                    <h3 class="stats-number counter" data-count="100">200+</h3>
                    <p>Mẫu Xe Khác Nhau</p>
                </div>
            </div>

            <div class="col-md-4 col-lg-2 mb-4" data-aos="zoom-in" data-aos-delay="500">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fa-solid fa-globe"></i>
                    </div>
                    <h3 class="stats-number counter" data-count="10">20+</h3>
                    <p>Thành Phố Hoạt Động</p>
                </div>
            </div>

            <div class="col-md-4 col-lg-2 mb-4" data-aos="zoom-in" data-aos-delay="600">
                <div class="stats-card">
                    <div class="stats-icon">
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <h3 class="stats-number">4.95/5</h3>
                    <p>Đánh Giá Trung Bình</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Phần Đối Tác -->
<section class="partners-section">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Đối Tác Của Chúng Tôi</h2>

        <div class="row align-items-center justify-content-center partners-row">
            <div class="col-4 col-md-2 mb-4" data-aos="fade-up">
                <img src="/upload/partners/partner1.png" class="img-fluid partner-logo" alt="Partner 1">
            </div>
            <div class="col-4 col-md-2 mb-4" data-aos="fade-up" data-aos-delay="100">
                <img src="/upload/partners/partner2.png" class="img-fluid partner-logo" alt="Partner 2">
            </div>
            <div class="col-4 col-md-2 mb-4" data-aos="fade-up" data-aos-delay="200">
                <img src="/upload/partners/partner3.png" class="img-fluid partner-logo" alt="Partner 3">
            </div>
            <div class="col-4 col-md-2 mb-4" data-aos="fade-up" data-aos-delay="300">
                <img src="/upload/partners/partner4.png" class="img-fluid partner-logo" alt="Partner 4">
            </div>
            <div class="col-4 col-md-2 mb-4" data-aos="fade-up" data-aos-delay="400">
                <img src="/upload/partners/partner5.png" class="img-fluid partner-logo" alt="Partner 5">
            </div>
            <div class="col-4 col-md-2 mb-4" data-aos="fade-up" data-aos-delay="500">
                <img src="/upload/partners/partner6.png" class="img-fluid partner-logo" alt="Partner 6">
            </div>
        </div>
    </div>
</section>

<!-- Phần Đánh Giá -->
<section class="testimonial-section mt-5">
    <div class="container">
        <h2 class="section-title" data-aos="fade-up">Khách Hàng Nói Gì Về Chúng Tôi</h2>

        <div class="row">
            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-card">
                    <div class="testimonial-rating mb-3">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="testimonial-textdiv">
                        <p class="testimonial-text">"SuperCar đã giúp chuyến công tác của tôi đến Đà Nẵng hoàn toàn không gặp trở ngại. Xe ở tình trạng hoàn hảo và chủ xe rất chuyên nghiệp."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/men/42.jpg" class="rounded-circle" alt="Khách hàng">
                        <div>
                            <h5>Đoàn Huy Thiện</h5>
                            <p>TP. Hồ Chí Minh</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-card">
                    <div class="testimonial-rating mb-3">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <div class="testimonial-textdiv">
                        <p class="testimonial-text">"Là chủ xe, tham gia SuperCar đã là một trải nghiệm tuyệt vời. Nền tảng của họ dễ sử dụng và tôi đã kiếm được khoản thu nhập đáng kể từ chiếc xe của mình."</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/men/24.jpg" class="rounded-circle" alt="Khách hàng">
                        <div>
                            <h5>Nguyễn Đức Thức</h5>
                            <p>Hà Nội</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial-card">
                    <div class="testimonial-rating mb-3">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <div class="testimonial-textdiv">
                        <p class="testimonial-text">"Gia đình tôi thuê xe 7 chỗ cho kỳ nghỉ ở Nha Trang. Quá trình từ đặt xe đến trả xe diễn ra suôn sẻ. Chắc chắn sẽ sử dụng SuperCar lần nữa!"</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/men/67.jpg" class="rounded-circle" alt="Khách hàng">
                        <div>
                            <h5>Trần Khánh Tuyên</h5>
                            <p>Đà Nẵng</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial-card">
                    <div class="testimonial-rating mb-3">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <div class="testimonial-textdiv">
                        <p class="testimonial-text">"Dịch vụ tuyệt vời, xe mới và sạch sẽ. Thủ tục nhanh gọn, nhân viên nhiệt tình. Chắc chắn sẽ quay lại ủng hộ SuperCar!"</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="https://randomuser.me/api/portraits/women/42.jpg" class="rounded-circle" alt="Khách hàng">
                        <div>
                            <h5>Văn Trương Thùy Dung</h5>
                            <p>Đà Nẵng</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container" data-aos="fade-up">
        <h2 class="mb-4">Sẵn Sàng Trải Nghiệm SuperCar?</h2>
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-lg-4 mb-3 justify-content-center">
                <a href="{{ route('pages.thuexe') }}" class="btn btn-lg btn-supercar btn-block">Thuê Xe Ngay</a>
            </div>
            <div class="col-md-6 col-lg-4 mb-3 justify-content-center">
                <a href="{{ route('pages.dangky') }}" style="color: #5fcf86;" class="btn btn-lg btn-outline-white btn-block">Trở Thành Đối Tác</a>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Counter animation
        $('.counter').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count');

            $({
                countNum: 0
            }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum) + '+');
                },
                complete: function() {
                    $this.text(this.countNum + '+');
                }
            });
        });
    });
</script>
@endpush
@endsection
