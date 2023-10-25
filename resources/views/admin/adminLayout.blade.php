<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('/css/admin/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/admin/table.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

</head>

<body>
    <div class="row d-flex page w-full h-fit">
        <div class="col-lg-2 dashboard">
            <h1>Welcome Admin</h1>
            <ul class="majorList">
                <li class="majorItem"><a href="{{ route('admin.dashboard') }}"
                        class="@if (request()->routeIs('admin.dashboard')) active @endif"><i class="fas fa-chart-simple"></i>Tổng
                        quan</a>
                </li>
                <li class="majorItem"><a href="{{ route('admin.product') }}"
                        class="@if (request()->routeIs('admin.product')) active @endif"><i class="fas fa-list"></i>Danh sách sản
                        phẩm</a>
                </li>
                <li class="majorItem"><a href="{{ route('admin.order') }}"
                        class="@if (request()->routeIs('admin.order')) active @endif"><i class="fas fa-list"></i>Danh sách đặt
                        hàng</a>
                </li>

                <li class="majorItem"><a href="{{ route('admin.solvedOrder') }}"
                        class="@if (request()->routeIs('admin.solvedOrder')) active @endif"><i class="fas fa-comment-alt"></i>Danh
                        sách đơn hàng đã duyệt</a></li>


                <li class="majorItem"><a href="{{ route('admin.userManage') }}"
                        class="@if (request()->routeIs('admin.userManage')) active @endif"><i class="fa-regular fa-user"></i>Quản
                        lí người dùng</a>
                </li>
                <li class="majorItem"><a href="{{ route('bookReg') }}"
                        class="@if (request()->routeIs('bookReg')) active @endif"><i class="fa-solid fa-bookmark"></i>Sách
                        đăng ký</a>
                </li>
                <li class="majorItem"><a href="{{ route('bookConfirm') }}"
                        class="@if (request()->routeIs('bookConfirm')) active @endif"><i class="fa-solid fa-receipt"></i>Duyệt
                        sách</a>
                </li>
                <li class="majorItem"><a href=""><i class="fas fa-comment-alt"></i>Phản hồi</a></li>


                <li class="majorItem"><a href="../"><i class="fas fa-home"></i>Trang chủ</a></li>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="majorItem text-white fonr-bold text-xl"><i
                            class="fas fa-sign-out-alt"></i>Đăng xuất</button>
                </form>

            </ul>
        </div>
        <div class="col-lg-10" style="overflow: auto">
            @yield('adminBody')
        </div>
    </div>
</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>


</html>
