<nav class="navbar navbar-expand-lg navbar-light bg-blue">
    <a class="navbar-brand" href="{{asset('')}}"><i class="fa fa-home" aria-hidden="true" style="padding-left: 30px;"></i>
        TRANG CHỦ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navbar-shadows" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    GIỚI THIỆU
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ asset('thong-tin/lich-su') }}">LỊCH SỬ HÌNH THÀNH</a>
                    <a class="dropdown-item" href="{{ asset('thong-tin/tam-nhin') }}">TẦM NHÌN, SỨ MỆNH</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ asset('thong-tin/to-chuc') }}">SƠ ĐỒ TỔ CHỨC</a>
                    <a class="dropdown-item" href="{{ asset('thong-tin/lanh-dao') }}">BAN LÃNH ĐẠO</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle navbar-shadows" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    CƠ SỞ VẬT CHẤT VÀ HẠ TẦNG
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ asset('thong-tin/luong-lach') }}">LUỒNG LẠCH</a>
                    <a class="dropdown-item" href="{{ asset('thong-tin/cau-cang') }}">CẦU CẢNG</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{asset('thong-tin/kho-bai')}}">KHO BÃI</a>
                    <a class="dropdown-item" href="{{asset('thong-tin/thiet-bi')}}">HỆ THỐNG THIẾT BỊ</a>
                    <a class="dropdown-item" href="{{asset('thong-tin/chung-nhan')}}">CÁC GIẤY CHỨNG NHẬN ĐÃ ĐƯỢC CẤP</a>
                    <a class="dropdown-item" href="{{asset('thong-tin/nang-luc')}}">NĂNG LỰC TIẾP NHẬN TÀU</a>

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled navbar-shadows" href="{{asset('thong-tin/dich-vu')}}">DỊCH VỤ</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link disabled navbar-shadows" href="{{asset('khach-hang')}}">KHÁCH HÀNG</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link disabled navbar-shadows" href="{{asset('bieu-cuoc')}}">BIỂU CƯỚC</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link disabled navbar-shadows" href="{{asset('tin-tuc')}}">TIN TỨC</a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link disabled navbar-shadows" href="{{asset('lien-he')}}">LIÊN HỆ</a>
            </li>
            @if (Auth::check())
            <li class="nav-item">
                <a class="nav-link disabled navbar-shadows" href="{{asset('noi-bo')}}">NỘI BỘ</a>
            </li>
            @endif
        </ul>
    </div>
</nav>
