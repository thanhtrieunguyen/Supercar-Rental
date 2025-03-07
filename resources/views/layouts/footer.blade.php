<style>
    .footer {
        padding: 4rem 3rem 2rem;
        position: relative;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 3rem;
        margin-bottom: 2.5rem;
    }

    .footer-column {
        display: flex;
        flex-direction: column;
    }

    .footer-logo {
        max-width: 120px;
        border-radius: 10px;
        margin-bottom: 1.2rem;
        transition: transform 0.3s ease;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
    }

    .footer-logo:hover {
        transform: scale(1.05);
    }

    .footer-description {
        color: #666;
        line-height: 1.8;
        margin-bottom: 1.8rem;
        font-size: 0.95rem;
    }

    .footer-title {
        color: #3db968;
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 1.8rem;
        position: relative;
        padding-bottom: 0.8rem;
    }

    .footer-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 50px;
        height: 3px;
        background: linear-gradient(to right, #5fcf86, #3db968);
        border-radius: 2px;
    }

    .footer-links {
        display: flex;
        flex-direction: column;
        gap: 1.2rem;
    }

    .footer-link {
        color: #555;
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        padding-left: 15px;
        font-weight: 500;
    }

    .footer-link:before {
        content: '›';
        position: absolute;
        left: 0;
        color: #5fcf86;
        font-size: 18px;
        font-weight: bold;
        transition: transform 0.3s ease;
    }

    .footer-link:hover {
        color: #3db968;
        transform: translateX(5px);
    }

    .footer-link:hover:before {
        transform: translateX(3px);
    }

    .social-icons {
        display: flex;
        gap: 1.2rem;
        margin-top: 1.5rem;
    }

    .social-icon {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        transition: all 0.3s ease;
        filter: drop-shadow(0 3px 5px rgba(0, 0, 0, 0.1));
    }

    .social-icon:hover {
        transform: translateY(-5px) rotate(5deg);
        filter: drop-shadow(0 5px 8px rgba(0, 0, 0, 0.15));
    }

    .footer-bottom {
        border-top: 1px solid #e9ecef;
        padding-top: 2.5rem;
        margin-top: 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .payment-methods {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        margin-top: 1.2rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    .payment-icon {
        width: 50px;
        height: 35px;
        object-fit: contain;
        transition: all 0.3s ease;
        filter: grayscale(20%) opacity(0.9);
    }

    .payment-icon:hover {
        transform: translateY(-3px);
        filter: grayscale(0%) opacity(1);
    }

    #top-up {
        position: fixed;
        bottom: 25px;
        right: 25px;
        background: linear-gradient(145deg, #5fcf86, #3db968);
        color: white;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 4px 15px rgba(95, 207, 134, 0.4);
        z-index: 999;
        opacity: 0;
        visibility: hidden;
    }

    #top-up.visible {
        opacity: 1;
        visibility: visible;
    }

    #top-up:hover {
        background: linear-gradient(145deg, #3db968, #2a9550);
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 6px 20px rgba(95, 207, 134, 0.6);
    }

    #top-up i {
        font-size: 1.2rem;
    }

    .certification-badge {
        display: inline-block;
        transition: all 0.3s ease;
        margin: 0.5rem 0;
    }

    .certification-badge:hover {
        transform: scale(1.05);
    }

    .footer-contact {
        display: inline-block;
        padding: 0.5rem 1.5rem;
        background: linear-gradient(145deg, #f8f9fa, #e9ecef);
        border-radius: 30px;
        color: #444;
        font-weight: 600;
        margin: 0.5rem 0 1rem;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    }

    @media (max-width: 768px) {
        .footer {
            padding: 2.5rem 1.5rem 2rem;
        }

        .footer-content {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .footer-title {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
        }

        .footer-content, .footer-column, .footer-bottom p {
            font-size: 0.9rem;
        }

        .footer-description {
            line-height: 1.6;
        }

        #top-up {
            width: 45px;
            height: 45px;
            bottom: 20px;
            right: 20px;
        }
    }
</style>

<footer class="footer container">
    <div class="footer-content">
        <div class="footer-column">
            <img class="footer-logo" src="/upload/slides/logo.png" alt="SuperCar Logo">
            <p class="footer-description">
                Trang Đăng tin và Tìm kiếm thông tin về thuê xe. Chúng tôi kết nối dễ dàng giữa người thuê và người cho
                thuê, cung cấp những bộ lọc tìm kiếm thông minh để tìm kiếm xe phù hợp với nhu cầu của bạn.
            </p>
            <div class="social-icons">
                <a href="#" class="footer-link" aria-label="Twitter">
                    <img class="social-icon" src="upload/slides/t.png" alt="Twitter">
                </a>
                <a href="#" class="footer-link" aria-label="YouTube">
                    <img class="social-icon" src="upload/slides/youtube.png" alt="YouTube">
                </a>
                <a href="#" class="footer-link" aria-label="Facebook">
                    <img class="social-icon" src="upload/slides/facebook.png" alt="Facebook">
                </a>
            </div>
        </div>

        <div class="footer-column">
            <h4 class="footer-title">Công ty</h4>
            <div class="footer-links">
                <a href="#" class="footer-link">Kinh doanh</a>
                <a href="#" class="footer-link">Kênh truyền hình</a>
                <a href="#" class="footer-link">Nhà tài trợ</a>
                <a href="#" class="footer-link">Đội ngũ</a>
            </div>
        </div>

        <div class="footer-column">
            <h4 class="footer-title">Về chúng tôi</h4>
            <div class="footer-links">
                <a href="#" class="footer-link">Tính thông dụng</a>
                <a href="#" class="footer-link">Quan hệ đối tác</a>
                <a href="#" class="footer-link">Nhà phát triển</a>
                <a href="#" class="footer-link">Giới thiệu</a>
            </div>
        </div>

        <div class="footer-column">
            <h4 class="footer-title">Liên hệ</h4>
            <div class="footer-links">
                <a href="#" class="footer-link">Liên hệ chúng tôi</a>
                <a href="https://thuvienphapluat.vn/van-ban/Cong-nghe-thong-tin/Luat-an-ninh-mang-2018-351416.aspx"
                    class="footer-link">Chính sách quyền riêng tư</a>
                <a href="https://icontract.com.vn/tin-tuc/cac-quy-dinh-ve-dieu-khoan-bao-mat-thong-tin-trong-hop-dong"
                    class="footer-link">Điều khoản và điều kiện</a>
                <a href="#" class="footer-link">Trợ giúp</a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <span class="footer-contact">
            <i class="fas fa-phone-alt"></i> Hotline: 1900 0000
        </span>

        <a href="#" class="certification-badge">
            <img width="120" src="./upload/slides/logobocongthuong.png" alt="Logo Bộ Công Thương">
        </a>

        <p style="color: #666; margin-top: 1.5rem; font-weight: 500;">Phương thức thanh toán</p>
        <div class="payment-methods">
            <img class="payment-icon" src="./upload/images/momo.png" alt="MoMo">
            <img class="payment-icon" src="./upload/images/vnpay.png" alt="VNPay">
            <img class="payment-icon" src="./upload/images/visa.png" alt="Visa">
            <img class="payment-icon" src="./upload/images/zalopay.png" alt="ZaloPay">
        </div>

        <p style="color: #888; margin-top: 2rem; font-size: 0.9rem; text-align: center;">
            © 2025 SuperCar. Tất cả các quyền được bảo lưu.
        </p>
    </div>
</footer>

<div id="top-up" title="Về đầu trang">
    <i class="fas fa-arrow-up"></i>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var offset = 400;
        var topUpButton = document.getElementById('top-up');

        window.addEventListener('scroll', function() {
            if (window.pageYOffset > offset) {
                topUpButton.classList.add('visible');
            } else {
                topUpButton.classList.remove('visible');
            }
        });

        topUpButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    });
</script>
