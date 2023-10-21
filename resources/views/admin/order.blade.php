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
                <li class="majorItem"><a href=""><i class="fas fa-chart-simple"></i>Tổng quan</a>
                </li>
                <li class="majorItem"><a href="/admin/products"><i class="fas fa-list"></i>Danh sách sản phẩm</a>
                </li>
                <li class="majorItem"><a href="/admin/orders" class="active"><i
                            class="fa-solid fa-cart-shopping"></i>Danh sách đặt
                        hàng</a>
                </li>
                <li class="majorItem"><a href=""><i class="fas fa-comment-alt"></i>Phản hồi</a></li>
                <li class="majorItem"><a href="../"><i class="fas fa-home"></i>Trang chủ</a></li>
                <li class="majorItem"><a href=""><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>

            </ul>
        </div>
        <div class="col-lg-10 products">
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Tên khách hàng</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Chi tiết đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            Erik TenHag
                        </td>
                        <td>
                            0999999999
                        </td>
                        <td>
                            2023-05-10
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning orderStatus" data-bs-toggle="modal"
                                data-bs-target="#orderStatus">Chờ xác nhận</button>
                            <div class="modal fade" id="orderStatus" tabindex="-1" aria-labelledby="orderStatusLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            Bạn muốn xác nhận hay huỷ đơn hàng ?
                                            <form action="" method="" class="text-end mt-2">
                                                <button type="button" class="btn btn-danger cancelOrder"
                                                    data-bs-dismiss="modal">Huỷ đơn hàng</button>
                                                <button type="button" class="btn btn-success approveOrder"
                                                    data-bs-dismiss="modal">Xác nhận đơn
                                                    hàng</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#orderDetail">
                                Xem chi tiết
                            </button>

                            <div class="modal fade" id="orderDetail" tabindex="-1" aria-labelledby="orderDetailLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="orderDetailLabel">Chi tiết đơn hàng</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <div class="table table-striped">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">STT</th>
                                                                <th scope="col">Ảnh sản phẩm</th>
                                                                <th scope="col">Tên sản phẩm</th>
                                                                <th scope="col">Số lượng</th>
                                                                <th scope="col">Đơn giá</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>
                                                                    <img src="https://firebasestorage.googleapis.com/v0/b/wibu-image.appspot.com/o/images%2F1652758019517THA%CC%81M%20TU%CC%9B%CC%89%20LU%CC%9B%CC%80NG%20DANH%20CONAN%20-%20TIE%CC%82%CC%89U%20THUYE%CC%82%CC%81T%20-%20HOA%20HU%CC%9BO%CC%9B%CC%81NG%20DU%CC%9BO%CC%9BNG%20TRONG%20BIE%CC%82%CC%89N%20LU%CC%9B%CC%89A.png?alt=media&token=3c9c29cc-80b4-468a-b127-1627f43f1974"
                                                                        alt="" class="productImage">
                                                                </td>
                                                                <td class="productName">
                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit.
                                                                    Odit quasi laboriosam quaerat, in provident eos
                                                                    deleniti
                                                                    incidunt dolore debitis voluptas, cupiditate
                                                                    doloremque et
                                                                    adipisci sit fugit.
                                                                </td>
                                                                <td>15</td>
                                                                <td>20.000 đ</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>
                                                                    <img src="https://firebasestorage.googleapis.com/v0/b/wibu-image.appspot.com/o/images%2F1652758019517THA%CC%81M%20TU%CC%9B%CC%89%20LU%CC%9B%CC%80NG%20DANH%20CONAN%20-%20TIE%CC%82%CC%89U%20THUYE%CC%82%CC%81T%20-%20HOA%20HU%CC%9BO%CC%9B%CC%81NG%20DU%CC%9BO%CC%9BNG%20TRONG%20BIE%CC%82%CC%89N%20LU%CC%9B%CC%89A.png?alt=media&token=3c9c29cc-80b4-468a-b127-1627f43f1974"
                                                                        alt="" class="productImage">
                                                                </td>
                                                                <td class="productName">
                                                                    Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit.
                                                                    Odit quasi laboriosam quaerat, in provident eos
                                                                    deleniti
                                                                    incidunt dolore debitis voluptas, cupiditate
                                                                    doloremque et
                                                                    adipisci sit fugit.
                                                                </td>
                                                                <td>15</td>
                                                                <td>20.000 đ</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            Tổng tiền: 40000 đ
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('.cancelOrder').click(function() {
            $(".orderStatus").removeClass('btn-warning').addClass("btn-secondary").text('Đã huỷ đơn hàng');
        })
        $('.approveOrder').click(function() {
            $(".orderStatus").removeClass('btn-warning').addClass("btn-success").text('Đã xác nhận đơn hàng');
        })
    </script>
</body>

</html>
