<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/admin/product.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

</head>

<body>
    <div class="row">
        <div class="col-lg-2 dashboard">
            <h1>Welcome, Admin</h1>
            <ul class="majorList">
                <li class="majorItem"><a href="/admin"><i class="fas fa-chart-simple"></i>Tổng quan</a>
                </li>
                <li class="majorItem"><a href=""><i class="fas fa-list"></i>Danh sách sản phẩm</a>
                </li>
                <li class="majorItem"><a href="/admin/orders"><i class="fa-solid fa-cart-shopping"></i>Danh sách đặt
                        hàng</a>
                </li>
                <li class="majorItem"><a href="" class="active"><i class="fas fa-comment-alt"></i>Sách đăng
                        ký</a></li>
                <li class="majorItem"><a href=""><i class="fas fa-comment-alt"></i>Phản hồi</a></li>
                <li class="majorItem"><a href="../"><i class="fas fa-home"></i>Trang chủ</a></li>
                <li class="majorItem"><a href=""><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
            </ul>
        </div>
        <div class="col-lg-10 products">
            <p>Sách đăng ký chờ duyệt</p>
            <table class="table mt-2">
                <thead class="thead-dark" style="background-color: red">
                    <tr>
                        <th scope="col">Người dùng</th>
                        <th scope="col">Tên sách</th>
                        <th scope="col">Tác giả</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Duyệt</th>
                    </tr>
                </thead>
                @foreach ($bookRegs as $bookReg)
                    @foreach ($users as $user)
                        @if ($user->id == $bookReg->id)
                            <?php $email = $user->email; ?>
                        @endif
                    @endforeach
                    <tbody>
                        <tr>
                            <td scope="row">{{ $email }}</td>
                            <td scope="row">{{ $bookReg->name }}</td>
                            <td>{{ $bookReg->author }}</td>
                            <td>{{ $bookReg->quantity }}</td>
                            <td>
                                <div class="" style="display:flex; align-items: center">
                                    <img style="width: 20px; height: 20px"
                                        src="https://img.icons8.com/ios-glyphs/30/timer.png" alt="timer" />
                                    <p class="mb-0 ml-1">{{ $bookReg->status }}</p>
                                </div>
                            </td>
                            <td>
                                <a href="">Duyệt</a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
