<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('/css/admin/dashboard.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="row h-screen">
        <div class="col-lg-2 dashboard">
            <h1>Welcome, Admin</h1>
            <ul class="majorList">
                <li class="majorItem"><a href="" class="active"><i class="fas fa-chart-simple"></i>Tổng quan</a>
                </li>
                <li class="majorItem"><a href="/admin/products"><i class="fas fa-list"></i>Danh sách sản phẩm</a>
                </li>
                <li class="majorItem"><a href="/admin/orders"><i class="fa-solid fa-cart-shopping"></i>Danh sách đặt
                        hàng</a>
                </li>
                <li class="majorItem"><a href=""><i class="fas fa-comment-alt"></i>Phản hồi</a></li>
                <li class="majorItem"><a href="../"><i class="fas fa-home"></i>Trang chủ</a></li>
                <li class="majorItem"><a href=""><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>

            </ul>
        </div>
        <div class="col-lg-10 ">
            @yield('adminBody')
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

</html>