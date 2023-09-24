<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('/css/cart.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <h1>Giỏ hàng</h1>
        <form action="" method="post" class="form-desk cart table-wrap medium--hide small--hide">
            <table class="cart-table">
                <thead class="cart_row ">
                    <tr>
                        <th colspan="2" class="text-center">Sản phẩm</th>
                        <th class="text-center">Đơn giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-right">Tổng giá</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="cart_row table__section">
                        <td data-label="Sản phẩm">
                            <a href="" class="cart__image">
                                <img src="//product.hstatic.net/200000343865/product/1---lmt_2b5363ec2d6646188a1356ae27d26a66_medium.jpg"
                                    alt="Cô nàng Shimotsuki trót phải lòng nhân vật nền - Tập 1 - Bản giới hạn (Tặng Bookmark + Mini Clearfile + Bìa Áo Limited)">
                            </a>
                        </td>
                        <td>
                            <a href="" class="h4">
                                Cô nàng Shimotsuki trót phải lòng nhân vật nền - Tập 1 - Bản giới hạn (Tặng Bookmark +
                                Mini Clearfile + Bìa Áo Limited)
                            </a>
                            Khuyến mãi:
                            1017960497 - Giảm vô thời hạn 10% cho toàn bộ Sách Kim Đồng
                            <br>
                            <a href="/cart/change?line=1&amp;quantity=0" class="cart__remove">
                                <small>Xóa</small>
                            </a>
                        </td>
                        <td data-label="Đơn giá">
                            <span class="h3">
                                103,500₫
                            </span>
                        </td>
                        <td class="quantity" data-label="Số lượng">
                            <div class="input-group">
                                <button type="button" class="btn btn-icon btn-secondary btn_minus">-</button>
                                <input type="number" class="form-control text-center" id="quantity" value="0">
                                <button type="button" class="btn btn-icon btn-secondary btn_plus">+ </button>
                            </div>
                        </td>
                        <td data-label="Tổng tiền" class="text-right">
                            <span class="h3">
                                103,500₫
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="grid cart_row">
                <div class="row">
                    <div class="grid__item col-8 ">
                        <label for="CartSpecialInstructions">Ghi chú</label><br>
                        <textarea name="note" class="input-full" id="CartSpecialInstructions"></textarea>
                    </div>
                    <div class="grid__item col-4 total">
                        <p>
                            <span class="">Tạm tính</span>
                            <span class="h3">103,500₫</span>
                        </p>
                        <button type="submit" name="update" class="btn update-cart">Cập nhật</button>
                        <button type="submit" name="checkout" class="btn">Thanh toán</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        var quantity = $("#quantity");
        var quantityValue = Number(quantity.val());

        $(".btn_minus").click(() => {
            quantityValue -= 1;
            quantity.val(quantityValue);
        });
        $(".btn_plus").click(() => {
            $('.btn_minus').attr('disabled', false);
            quantityValue += 1;
            quantity.val(quantityValue);
        });
        quantityValue == 0 ? $('.btn_minus').attr('disabled', true) : 0;
    </script>
</body>

</html>
