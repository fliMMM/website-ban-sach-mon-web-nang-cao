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

        <div class="container mt-2">
            <h1>Giỏ hàng</h1>

            @if ($cartItemQuantity > 0)
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

                                @foreach ($cartItems as $cartItem)
                                    <tr class="cart_row table__section">
                                        <td data-label="Sản phẩm">
                                            <a href="/productDetail/{{ $cartItem->name }}" class="cart__image">
                                                <img src="{{ $cartItem->image }}" alt="{{ $cartItem->name }}">
                                            </a>
                                        </td>

                                        <td>
                                            <a href="/productDetail/{{ $cartItem->name }}" class="h4">
                                                {{ $cartItem->name }}
                                            </a>
                                        </td>
                                        <td data-label="Đơn giá">
                                            <span class="h3">
                                                {{ $cartItem->itemPrice }}
                                            </span>
                                        </td>
                                        <td class="quantity" data-label="Số lượng">
                                            <div class="input-group row">
                                                <button type="button" class="btn btn-icon btn-secondary btn_minus"
                                                    data-cart-item-id="{{ $cartItem->id }}">-</button>
                                                <input type="number" class="form-control text-center quantity-input"
                                                    id="quantity" name="quantity[]" value="{{ $cartItem->quantity }}">
                                                <button type="button" class="btn btn-icon btn-secondary btn_plus"
                                                    data-cart-item-id="{{ $cartItem->id }}">+ </button>
                                            </div>
                                        </td>
                                        <td data-label="Tổng tiền" class="text-right">
                                            <span class="h3">
                                                {{ $cartItem->totalPrice }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="h3">
                                                <a href="#" class="delete-cart-item"
                                                    data-cart-item-id="{{ $cartItem->cartItemId }}">Xoá</a>
                                            </span>
                                        </td>
                                    </tr>
                                    <input type="hidden" name="product_ids[]" value="{{ $cartItem->id }}">
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
                                <div class="flex justify-end space-x-2 ">
                                    <button type="submit" name="update" class="btn update-cart">Cập nhật</button>
                                    <a id="checkoutBtn" class=" bg-red-600 py-1  px-2 font-bold" href="/checkout">Thanh
                                        toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <div class="d-flex flex-column align-items-center mt-10">
                    <div>
                        <img src="https://cdni.iconscout.com/illustration/free/thumb/free-empty-cart-4085814-3385483.png"
                            width="400" height="300" class="img-fluid mb-4 mr-3">
                    </div>
                    <h2><strong>Giỏ hàng trống</strong></h2>
                </div>
            @endif
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
                var cartItemID = $(this).data("cart-item-id");
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/cart/delete-cart-item/' + cartItemID,
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
                    productIds.push($(this).data("cart-item-id"));
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
