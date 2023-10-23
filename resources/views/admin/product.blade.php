@extends('admin.adminLayout')
@section('adminBody')
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('/css/admin/product.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="flex items-center space-x-2">
        <form action="{{ route('products.search') }}" method="get">
            <div class="input-group flex-nowrap mt-3 w-fit">
                <span class="input-group-text" id="addon-wrapping"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg></span>
                <input type="text" id="searchTerm" name="searchTerm" class="form-control" placeholder="Tìm kiếm sản phẩm"
                    aria-label="Tìm kiếm sản phẩm" aria-describedby="addon-wrapping">
            </div>
        </form>

        <a href="/admin/addProd/" class="block no-underline bg-blue-600 px-2 py-[0.4rem] rounded-md text-white mt-3">Thêm
            sản
            phẩm</a>
    </div>
    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">Ảnh</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng sản phẩm còn lại</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody class="productList">
            @foreach ($products as $product)
                <?php
                $formattedPrice = number_format($product->price, 0, ',', '.') . ' ₫';
                ?>
                <tr>
                <tr>
                    <td>
                        <img class="productImage" src="{{ $product->image }}" alt="">
                    </td>
                    <td class="truncate-text">
                        <div>{{ $product->name }}</div>
                    </td>
                    <td>
                        {{ $product->inStock }} sản phẩm

                    </td>
                    <td>{{ $formattedPrice }}</td>
                    <td colspan="2">
                        <div class="flex space-x-2">
                            <a class='bg-blue-600 block mt-2 w-fit text-white no-underline px-[0.6rem] py-1 rounded-md'
                                href="/admin/editProd/{{ $product->id }}">Sửa</a>
                            <button type="button"
                                class="mt-2 bg-red-600 w-fit text-white no-underline px-[0.6rem] py-1 rounded-md"
                                data-bs-toggle="modal" data-bs-target="#removeProduct">Xoá</button>
                        </div>
                        <div class="modal fade" id="removeProduct" tabindex="-1" aria-labelledby="removeProductLabel"
                            aria-hidden="true">
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
                </tr>
            @endforeach



        </tbody>
    </table>
    <script>
        $('#searchTerm').on('input', function() {
            var searchTerm = $(this).val();

            $.ajax({
                url: "{{ route('products.search') }}",
                method: 'GET',
                data: {
                    searchTerm: searchTerm
                },
                dataType: 'json',
                success: function(data) {
                    let productList = $(".productList");
                    productList.empty();
                    $.each(data.data, function(index, product) {
                        productList.append(`
                <tr>
                    <td>
                        <img class="productImage" src="${product.image}" alt="">
                    </td>
                    <td class="truncate-text">
                        <div>${product.name}</div>
                    </td>
                    <td>
                        ${product.inStock} sản phẩm

                    </td>
                    <td>${product.price}</td>
                    <td colspan="2">
                        <button type="button" class="btn btn-primary editProductBtn" data-bs-toggle="modal"
                            data-bs-target="#editProduct" data-product-id="${product.id}">Sửa</button>
                        <div class="modal fade productModal" id="editProduct" tabindex="-1"
                            aria-labelledby="editProductLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editProductLabel">Chỉnh sửa sản phẩm</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">

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
                </tr>`);
                    });

                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    </script>
    {{ $products->links() }}
@endsection
