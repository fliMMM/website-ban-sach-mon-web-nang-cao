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
</head>

<body>

    <div class="row">
        <div class="col-lg-2 dashboard">
            <h1>Welcome, Admin</h1>
            <ul class="majorList">
                <li class="majorItem"><a href=""><i class="fas fa-home"></i>Overview</a></li>
                <li class="majorItem"><a href="" class="active"><i class="fas fa-list"></i>Danh sách sản phẩm</a>
                </li>
                <li class="majorItem"><a href=""><i class="fa-solid fa-cart-shopping"></i>Danh sách đặt hàng</a>
                </li>
                <li class="majorItem"><a href=""><i class="fas fa-comment-alt"></i>Phản hồi</a></li>
                <li class="majorItem"><a href=""><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>

            </ul>
        </div>
        <div class="col-lg-10 products">
            <table class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <img class="productImage"
                                src="https://firebasestorage.googleapis.com/v0/b/wibu-image.appspot.com/o/images%2F1652758019517THA%CC%81M%20TU%CC%9B%CC%89%20LU%CC%9B%CC%80NG%20DANH%20CONAN%20-%20TIE%CC%82%CC%89U%20THUYE%CC%82%CC%81T%20-%20HOA%20HU%CC%9BO%CC%9B%CC%81NG%20DU%CC%9BO%CC%9BNG%20TRONG%20BIE%CC%82%CC%89N%20LU%CC%9B%CC%89A.png?alt=media&token=3c9c29cc-80b4-468a-b127-1627f43f1974"
                                alt="">
                        </td>
                        <td class="productName">THÁM TỬ LỪNG DANH CONAN - TIỂU THUYẾT - HOA HƯỚNG DƯƠNG TRONG BIỂN LỬA
                        </td>
                        <td class="productDescription">“Chết tiệt!” Shinichi vận hết
                            sức lay thanh sắt.
                            “Nếu không nhanh
                            lên thì chẳng những bức
                            tranh mà cả mình cũng sẽ…” Thế nhưng, dù thử đủ cách, cậu không thể nạy được cây cọc nằm lèn
                            chặt giữa tường phòng và bức tranh. Cậu thở khó nhọc. Sau lưng cậu vang lên tiếng gạch vụn
                            lộp độp rơi. Phòng triển lãm chìm trong khói bụi, ngọn lửa đã đuổi sát nút. “Kid!” Đột
                            nhiên, một tiếng gọi vang lên. Khi quay đầu lại, cậu nhìn thấy Conan chạy vào phòng. Tập
                            đoàn Suzuki đấu giá thành công kiệt tác Hoa hướng dương mộng ảo tưởng chừng thất lạc của
                            danh họa van Gogh với số tiền kỉ lục và dự định tổ chức một triển lãm vô tiền khoáng hậu.
                            Không ngờ, tai họa kinh hoàng liên tiếp giáng xuống bức tranh có số phận chìm nổi cùng những
                            người liên quan. Bí ẩn đằng sau bức họa là gì? Danh tính kẻ thủ ác liệu có được vạch trần?
                        </td>
                        <td>2132131$</td>
                        <td colspan="2">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editProduct">Sửa</button>
                            <div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="editProductLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editProductLabel">Chỉnh sửa sản phẩm</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group">
                                                    <label for="productName">Tên sản phẩm:</label>
                                                    <input type="text" class="form-control" id="productName">
                                                </div>
                                                <div class="form-group">
                                                    <label for="productName">Ảnh:</label>
                                                    <img src="https://firebasestorage.googleapis.com/v0/b/wibu-image.appspot.com/o/images%2F1652758019517THA%CC%81M%20TU%CC%9B%CC%89%20LU%CC%9B%CC%80NG%20DANH%20CONAN%20-%20TIE%CC%82%CC%89U%20THUYE%CC%82%CC%81T%20-%20HOA%20HU%CC%9BO%CC%9B%CC%81NG%20DU%CC%9BO%CC%9BNG%20TRONG%20BIE%CC%82%CC%89N%20LU%CC%9B%CC%89A.png?alt=media&token=3c9c29cc-80b4-468a-b127-1627f43f1974"
                                                        alt="">
                                                    <input type="file" class="form-control" id="productName">
                                                </div>
                                                <div class="form-group">
                                                    <label for="productPrice">Giá tiền:</label>
                                                    <input type="text" class="form-control" id="productPrice">
                                                </div>
                                                <div class="form-group">
                                                    <label for="productDescription">Mô tả:</label>
                                                    <textarea class="form-control" id="productDescription" rows="5"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Huỷ</button>
                                            <button type="button" class="btn btn-primary">Lưu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#removeProduct">Xoá</button>
                            <div class="modal fade" id="removeProduct" tabindex="-1"
                                aria-labelledby="removeProductLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <form action="" method="">
                                                Bạn có chắc chắn muốn xoá sản phẩm?
                                                <button type="button" class="btn btn-danger">Xoá</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Huỷ</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                        <td>@fat</td>
                        <td>@fat</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
