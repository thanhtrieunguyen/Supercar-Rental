@extends('layouts.index')

<head>
    <title>Thuê xe</title>
    <link rel="icon" type="image/x-icon" href="upload/slides/car.png">
    <!-- <link rel="stylesheet" href="css/customize1.css"> -->
    <style>
        .advanced-filter {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: none; /* Ẩn bộ lọc mặc định */
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .filter-item {
            display: flex;
            flex-direction: column;
        }

        .filter-item label {
            margin-bottom: 8px;
            font-weight: 600;
        }

        .filter-submit {
            background-color: #5fcf86;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .filter-submit:hover {
            background-color: #4ab36f;
        }

        .price-range {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .price-range input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        /* Search bar styles */
        .search-container {
            margin-bottom: 20px;
        }

        .search-form {
            display: flex;
            max-width: 600px;
            margin: 0 auto;
        }

        .search-input {
            flex-grow: 1;
            padding: 12px 15px;
            border-radius: 8px 0 0 8px;
            border: 1px solid #e2e8f0;
            font-size: 16px;
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: #4299e1;
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
        }

        .search-button {
            background-color: #4299e1;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 0 8px 8px 0;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-button:hover {
            background-color: #3182ce;
        }

        /* Nút hiển thị bộ lọc */
        .toggle-filter-btn {
            display: block;
            margin: 0 auto 20px;
            background-color: #f8f9fa;
            color: #333;
            border: 1px solid #ddd;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .toggle-filter-btn:hover {
            background-color: #e2e6ea;
        }

        .toggle-filter-btn i {
            transition: transform 0.3s ease;
        }

        .toggle-filter-btn.active i {
            transform: rotate(180deg);
        }
    </style>
</head>

@section('content')
    <!-- Search form with the current query value -->
    <div class="search-container">
        <form action="{{ route('pages.timkiem') }}" class="search-form">
            <input class="form-control search-input" type="search" placeholder="Tìm kiếm xe theo tên hoặc biển số..."
                   name="q" id="search" value="{{ $query }}">
            <button class="btn btn-primary search-button w-50" type="submit">
                <i class="fas fa-search"></i> Tìm kiếm
            </button>
        </form>
    </div>

    <div class="col-12 mt-3 mb-2">
        <h3 class="text-center">Tìm kiếm với từ khóa: <small>{{ $query == null ? 'trống' : $query }} ({{ $xes->count() }}
                kết quả)</small></h3>
    </div>

    <!-- Toggle filter button -->
    <button type="button" class="toggle-filter-btn" id="toggleFilter">
        <i class="fas fa-filter"></i> Hiển thị bộ lọc <i class="fas fa-chevron-down ml-2"></i>
    </button>

    <div class="advanced-filter" id="advancedFilter">
        <form action="{{ route('filter') }}" method="GET">
            <div class="filter-grid">
                <div class="filter-item">
                    <label>Dòng xe</label>
                    <select name="dongxe" class="form-control">
                        <option value="">Tất cả dòng xe</option>
                        @foreach ($dongXes as $dongXe)
                            <option value="{{ $dongXe->iddongxe }}" {{ request('dongxe') == $dongXe->iddongxe ? 'selected' : '' }}>{{ $dongXe->tendongxe }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="filter-item">
                    <label>Hãng xe</label>
                    <select name="hangxe" class="form-control">
                        <option value="">Tất cả hãng xe</option>
                        @foreach ($hangXes as $hangXe)
                            <option value="{{ $hangXe->idhangxe }}" {{ request('hangxe') == $hangXe->idhangxe ? 'selected' : '' }}>{{ $hangXe->tenhangxe }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="filter-item">
                    <label>Nhiên liệu</label>
                    <select name="nhienlieu" class="form-control">
                        <option value="">Loại nhiên liệu</option>
                        <option value="Xăng" {{ request('nhienlieu') == 'Xăng' ? 'selected' : '' }}>Xăng</option>
                        <option value="Dầu diesel" {{ request('nhienlieu') == 'Dầu diesel' ? 'selected' : '' }}>Dầu diesel</option>
                        <option value="Điện" {{ request('nhienlieu') == 'Điện' ? 'selected' : '' }}>Điện</option>
                    </select>
                </div>

                <div class="filter-item">
                    <label>Khoảng giá (nghìn đồng/ngày)</label>
                    <div id="price-slider"></div>
                    <div class="price-display" style="margin-top:5px;">
                        <span id="min-price-display"></span> - <span id="max-price-display"></span>
                    </div>
                    <input type="hidden" name="min_price" id="min_price">
                    <input type="hidden" name="max_price" id="max_price">
                </div>
            </div>

            <button type="submit" class="filter-submit mt-3">Áp dụng bộ lọc</button>
        </form>
    </div>

    <div class="m-container">
        <div class="wrapper">
            <ul class="product" style="justify-content: flex-start">
                @foreach ($xes as $xe)
                    @php
                        $array = json_decode($xe->hinhxe->hinhxe, true);
                        $img1 = $array[0] ?? './upload/images/default-image.jpg';
                    @endphp
                    <li>
                        <div class="product-item">
                            <div class="product-top">
                                <span class="label-pos"><span class="rent">Đặt xe nhanh <svg width="16" height="16"
                                            viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.9733 7.70015L8.46667 14.2668C8.29334 14.5268 8.01335 14.6668 7.71335 14.6668C7.62002 14.6668 7.52667 14.6535 7.43334 14.6268C7.05334 14.5068 6.79335 14.1668 6.79335 13.7735V10.0135C6.79335 9.86015 6.64667 9.72682 6.46667 9.72682L3.78001 9.6935C3.44001 9.6935 3.12668 9.50016 2.97335 9.20682C2.82668 8.92016 2.84668 8.5735 3.03335 8.30017L7.53335 1.7335C7.76001 1.40016 8.18001 1.25349 8.56668 1.37349C8.94668 1.49349 9.20668 1.83349 9.20668 2.22682V5.98683C9.20668 6.14017 9.35335 6.2735 9.53335 6.2735L12.22 6.30682C12.56 6.30682 12.8733 6.49349 13.0267 6.79349C13.1733 7.08016 13.1533 7.42682 12.9733 7.70015Z"
                                                fill="#FFC634"></path>
                                        </svg></span></span>
                                <div class="fix-img">
                                    <a href="{{ route('xe.show', ['id' => $xe->idxe]) }}" class="product-thumb">
                                        <img src="{{ $img1 }}" class="" alt="{{ $xe->tenxe }}"
                                            style="width: 100%; height:190px" loading="lazy">
                                    </a>
                                </div>
                                <a class="rent-now">Thuê Xe</a>
                            </div>
                            <div class="product-info">
                                <div class="group-tag">
                                    <span class="tag-item transmission">{{ $xe->truyendong }}</span>
                                    @if ($xe->nhienlieu == 'Xăng')
                                        <span class="tag-item non-mortgage">{{ $xe->nhienlieu }}</span>
                                    @elseif ($xe->nhienlieu == 'Dầu diesel')
                                        <span class="tag-item non-mortgage-oil">{{ $xe->nhienlieu }}</span>
                                    @else
                                        <span class="tag-item non-mortgage-elec">{{ $xe->nhienlieu }}</span>
                                    @endif
                                </div>
                                <div class="product-name">
                                    <p>{{ $xe->tenxe }}</p>
                                </div>
                                <div class="group-total" style="margin-bottom: 14px;">
                                    <div class="info"><i class="ti-car" style=""></i></div>
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
                    </li>
                @endforeach
            </ul>
            {!! $xes->withQueryString()->links('pagination::bootstrap-5') !!}
        </div>
    </div>
@endsection

@section('script')
    @parent
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.6.1/nouislider.min.js"></script>
    <script>
        // Xử lý ẩn hiện bộ lọc
        document.getElementById('toggleFilter').addEventListener('click', function() {
            const filterSection = document.getElementById('advancedFilter');
            const button = this;

            if (filterSection.style.display === 'none' || filterSection.style.display === '') {
                filterSection.style.display = 'block';
                button.classList.add('active');
                button.innerHTML = '<i class="fas fa-filter"></i> Ẩn bộ lọc <i class="fas fa-chevron-up ml-2"></i>';
            } else {
                filterSection.style.display = 'none';
                button.classList.remove('active');
                button.innerHTML = '<i class="fas fa-filter"></i> Hiển thị bộ lọc <i class="fas fa-chevron-down ml-2"></i>';
            }
        });

        // Hiển thị bộ lọc nếu đã có tham số lọc trong URL
        window.addEventListener('DOMContentLoaded', (event) => {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('dongxe') || urlParams.has('hangxe') ||
                urlParams.has('nhienlieu') || urlParams.has('min_price') ||
                urlParams.has('max_price')) {
                document.getElementById('advancedFilter').style.display = 'block';
                const button = document.getElementById('toggleFilter');
                button.classList.add('active');
                button.innerHTML = '<i class="fas fa-filter"></i> Ẩn bộ lọc <i class="fas fa-chevron-up ml-2"></i>';
            }
        });

        // Khởi tạo price slider
        const priceSlider = document.getElementById('price-slider');
        const minPriceInput = document.getElementById('min_price');
        const maxPriceInput = document.getElementById('max_price');
        const minPriceDisplay = document.getElementById('min-price-display');
        const maxPriceDisplay = document.getElementById('max-price-display');

        const startMin = {{ request('min_price') ?? 0 }};
        const startMax = {{ request('max_price') ?? 2000 }};

        noUiSlider.create(priceSlider, {
            start: [startMin, startMax],
            connect: true,
            range: {
                'min': 0,
                'max': 4000
            },
            tooltips: false,
            format: {
                to: function (value) {
                    return Math.round(value);
                },
                from: function (value) {
                    return Number(value);
                }
            }
        });

        minPriceDisplay.innerText = startMin + 'K';
        maxPriceDisplay.innerText = startMax + 'K';
        minPriceInput.value = startMin;
        maxPriceInput.value = startMax;

        priceSlider.noUiSlider.on('update', function(values, handle) {
            const value = Math.round(values[handle]);

            if (handle === 0) {
                minPriceDisplay.innerText = value + 'K';
                minPriceInput.value = value;
            } else {
                maxPriceDisplay.innerText = value + 'K';
                maxPriceInput.value = value;
            }
        });

        document.querySelector('#advancedFilter form').addEventListener('submit', function(e) {
            const minPrice = parseInt(minPriceInput.value);
            const maxPrice = parseInt(maxPriceInput.value);
            if (minPrice && maxPrice && minPrice > maxPrice) {
                e.preventDefault();
                alert('Giá tối thiểu phải nhỏ hơn giá tối đa');
            }
        });
    </script>
@endsection
