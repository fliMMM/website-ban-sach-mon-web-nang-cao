<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/admin/dashboard.css') }}">
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
    <div class="row">
        <div class="col-lg-2 dashboard">
            <h1>Welcome, Admin</h1>
            <ul class="majorList">
                <li class="majorItem"><a href="" class="active"><i class="fas fa-home"></i>Overview</a></li>
                <li class="majorItem"><a href=""><i class="fas fa-list"></i>Danh sách sản phẩm</a>
                </li>
                <li class="majorItem"><a href=""><i class="fa-solid fa-cart-shopping"></i>Danh sách đặt hàng</a>
                </li>
                <li class="majorItem"><a href=""><i class="fas fa-comment-alt"></i>Phản hồi</a></li>
                <li class="majorItem"><a href=""><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>

            </ul>
        </div>
        <div class="col-lg-10 overview mt-5">
            <div class="container">
                <div class="row overviewList">
                    <div class="col-lg-5 overviewItem align-middle">
                        <i class="fa-solid fa-users"></i>
                        <p>Số lượng người dùng</p>
                        <p>1</p>
                    </div>
                    <div class="col-lg-5 overviewItem">
                        <i class="fa-solid fa-list"></i>
                        <p>Số lượng sản phẩm</p>
                        <p>1</p>
                    </div>
                    <div class="col-lg-5 overviewItem">
                        <i class="fa-brands fa-microsoft"></i>
                        <p>Số lượng danh mục</p>
                        <p>1</p>
                    </div>
                    <div class="col-lg-5 overviewItem">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <p>Số lượng đặt hàng</p>
                        <p>1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
