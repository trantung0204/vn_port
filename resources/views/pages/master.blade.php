<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          type="text/css">
    <link rel="stylesheet" href="{{ asset('css/pages/theme.css') }}" type="text/css">
    @yield('header')
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between bg-secondary border sticky-top style="
     background-color: #e3f2fd;
"">
<div class="container">
    <div class="row widthheader">
        <div class="col-sm-12 col-xs-12">
            <div class="head1">
                <div id="idnavigate"></div>
            </div>
            @include('parts.navbar')
            <!--            </div>-->
        </div>
    </div>
</div>
</nav>
@yield('slide')
<div class="container">
    <div class="row">
        @yield('body')
        <div class="col-md-4 col-sm-12 col-xs-12 paddingtop">
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <h2>Giới thiệu để chỗ này nè</h2>
            <p><a>Cảng Sài Gòn trong hệ thống Cảng biển của ngành Hàng hải Việt nam là một cảng có sản lượng và năng
                    suất xếp dỡ
                    hàng đầu của Quốc gia.</a></p>
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <p><a href="#" title="" style="text-align: left; font-size: 20px;">LIÊN HỆ</a></p>
                <div class="lienhe">
                    <p><a>Công ty TNHH MTV Cảng tổng hợp quốc tế Nghi Sơn - NSIP</a></p>
                    <p><a>Trụ sở chính: Hà Tân, Hải Hà, Tĩnh Gia, Thanh Hóa</a></p>
                    <p><a>Điện Thoại: (84) 237 361 3938 – Fax: (84) 237 361 3939</a></p>
                    <p><a href="email:aaa@gmail.com" style="color: black">Email: aaa@gmail.com</a></p>
                    <p><a>Văn Phòng Đại Diện : Phòng 406, Tầng 4, Tòa nhà Citilight, 45 Võ Thị Sáu, Quận 1, Tp.HCM</a>
                    </p>
                    <p><a>Website: canghaiphong.com</a></p>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
            </div>
        </div>
    </div>
</footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
@yield('footer')
</body>
</html>