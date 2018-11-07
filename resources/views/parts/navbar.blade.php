<nav class="navbar navbar-expand-lg navbar-light bg-blue">
    <a class="navbar-brand" href="{{asset('')}}"><i class="fa fa-home" aria-hidden="true"></i>
        TRANG CHỦ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    GIỚI THIỆU
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ asset('gioi-thieu') }}">LỊCH SỬ HÌNH THÀNH</a>
                    <a class="dropdown-item" href="">TẦM NHÌN, SỨ MỆNH</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">SƠ ĐỒ TỔ CHỨC</a>
                    <a class="dropdown-item" href="#">BAN LÃNH ĐẠO</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    CƠ SỞ VẬT CHẤT VÀ HẠ TẦNG
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{asset('luong-lach')}}">LUỒNG LẠCH</a>
                    <a class="dropdown-item" href="{{asset('cau-cang')}}">CẦU CẢNG</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{asset('kho-bai')}}">KHO BÃI</a>
                    <a class="dropdown-item" href="{{asset('he-thong-thiet-bi')}}">HỆ THỐNG THIẾT BỊ</a>
                    <a class="dropdown-item" href="#">CÁC GIẤY CHỨNG NHẬN ĐÃ ĐƯỢC CẤP</a>
                    <a class="dropdown-item" href="#">NĂNG LỰC TIẾP NHẬN TÀU</a>

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="{{asset('dich-vu')}}">DỊCH VỤ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="{{asset('khach-hang')}}">KHÁCH HÀNG</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="{{asset('bieu-cuoc')}}">BIỂU CƯỚC</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="{{asset('tin-tuc')}}">TIN TỨC</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="{{asset('lien-he')}}">LIÊN HỆ</a>
            </li>
            @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link disabled" href="{{asset('noi-bo')}}">NỘI BỘ</a>
            </li>
            @endif
        </ul>
    </div>
</nav>
