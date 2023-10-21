@extends('layout')

@section('body')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('/css/cart.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    </head>

    <body>

        <div class="container">

            <h1>Giỏ hàng</h1>
            <?php ?>
            <form action="/cart/update" method="POST" class=" cart table-wrap medium--hide ">
                @csrf
                <div class="table-responsive">
                    <table class="cart-table table">
                        <thead class="cart_row ">
                            <tr>
                                <th colspan="2" class="text-center">Sản phẩm</th>
                                <th class="text-center" style="width: 135px;">Đơn giá</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-right" style="width: 135px;">Tổng giá</th>
                                <th class="text-right">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr class="cart_row table__section">
                                    <td data-label="Sản phẩm">
                                        <a href="/productDetail/{{ $product->name }}" class="cart__image">
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                        </a>
                                    </td>

                                    <td>
                                        <a href="/productDetail/{{ $product->name }}" class="h4">
                                            {{ $product->name }}
                                        </a>
                                    </td>
                                    <td data-label="Đơn giá">
                                        <span class="h3">
                                            {{ $product->itemPrice }}
                                        </span>
                                    </td>
                                    <td class="quantity" data-label="Số lượng">
                                        <div class="input-group row">
                                            <button type="button" class="btn btn-icon btn-secondary btn_minus"
                                                data-product-id="{{ $product->id }}">-</button>
                                            <input type="number" class="form-control text-center quantity-input"
                                                id="quantity" name="quantity[]" value="{{ $product->quantity }}">
                                            <button type="button" class="btn btn-icon btn-secondary btn_plus"
                                                data-product-id="{{ $product->id }}">+ </button>
                                        </div>
                                    </td>
                                    <td data-label="Tổng tiền" class="text-right">
                                        <span class="h3">
                                            {{ $product->totalPrice }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="h3">
                                            <a href="#" class="delete-cart-item"
                                                data-product-id="{{ $product->id }}">Xoá</a>
                                        </span>
                                    </td>
                                </tr>
                                <input type="hidden" name="product_ids[]" value="{{ $product->id }}">
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="grid cart_row">
                    <div class="row">
                        <div class="grid__item col-8 ">
                            <label for="CartSpecialInstructions">Ghi chú</label><br>
                            <textarea name="note" class="input-full" id="CartSpecialInstructions"></textarea>
                        </div>
                        <div class="grid__item col-4 total">
                            <p>
                                <span class="">Tạm tính</span>
                                <span class="h3"> {{ $totalCartPrice }}
                                </span>
                            </p>
                            <button type="submit" name="update" class="btn update-cart">Cập nhật</button>
                            <button type="submit" name="checkout" class="btn">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
        <script>
            $(".btn_minus").click(function() {
                let quantityInput = $(this).closest(".input-group").find(".quantity-input");
                let currentQuantity = parseInt(quantityInput.val());
                if (currentQuantity > 0) {
                    quantityInput.val(currentQuantity - 1);
                }
                (currentQuantity == 1) ? $(this).attr('disabled', true): null;
            });
            $(".btn_plus").click(function() {
                let quantityInput = $(this).closest(".input-group").find(".quantity-input");
                let currentQuantity = parseInt(quantityInput.val());
                quantityInput.val(currentQuantity + 1);
                (currentQuantity == 0) ? $(".btn_minus").attr('disabled', false): null;
            });
            $(".quantity-input").keydown((e) => {

                if (e.key === '-') {
                    e.preventDefault();
                }
            });
            $(".delete-cart-item").click(function(e) {
                e.preventDefault();
                var productID = $(this).data("product-id");
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/delete-cart-item/' + productID,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(data) {
                        $(this).closest('tr').remove();
                        location.reload();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
            $(".update-cart").click(function() {
                var quantities = [];
                var productIds = [];

                $(".quantity-input").each(function() {
                    quantities.push($(this).val());
                    productIds.push($(this).data("product-id"));
                });

                var data = {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    quantities: quantities,
                    productIds: productIds
                };

                $.ajax({
                    url: '/cart/update',
                    type: 'POST',
                    data: data,
                    success: function(response) {},
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        </script>
    </body>

    </html>
@endsection
