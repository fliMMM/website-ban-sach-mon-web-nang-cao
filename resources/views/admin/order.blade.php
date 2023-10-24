@extends('admin.adminLayout')
@section('adminBody')
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('/css/admin/order.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <table class="table mt-5">
        <thead>
            <tr>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Ngày đặt hàng</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Chi tiết đơn hàng</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($orders as $order)
                <tr>
                    <td>
                        {{ $order->fullname }}
                    </td>
                    <td>
                        {{ $order->phoneNumber }}
                    </td>
                    <td>
                        {{ $order->created_at }}
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
                                        <div class="text-right mt-1">
                                            <button type="button" class="btn btn-danger cancelOrder"
                                                data-bs-dismiss="modal" data-order-id="{{ $order->id }}">Huỷ đơn
                                                hàng</button>
                                            <button type="button" class="btn btn-success approveOrder"
                                                data-bs-dismiss="modal" data-order-id="{{ $order->id }}">Xác nhận đơn
                                                hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                    <td>
                        <button type="button" class="btn btn-primary showDetailOrder" data-order-id="{{ $order->id }}"
                            data-bs-toggle="modal" data-bs-target="#orderDetail">
                            Xem chi tiết
                        </button>

                        <div class="modal fade orderDetailModal" id="orderDetail" tabindex="-1"
                            aria-labelledby="orderDetailLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="orderDetailLabel">Chi tiết đơn hàng</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body ">
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
                                                    <tbody class="orderDetail1">


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <span class="orderPrice">

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
    <script>
        $(".approveOrder, .cancelOrder").click(function() {
            var orderId = $(this).data("order-id");
            var action = $(this).hasClass("approveOrder") ? "approve" : "cancel";
            $.ajax({
                url: '/admin/update-order-status/' + orderId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    [action]: 1
                },
                success: function(data) {
                    (action == 'cancel') ? alert("Huỷ đơn hàng thành công !"): alert(
                        "Xác nhận đơn hàng thành công !");
                    location.reload();
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });
        var currentRequest = null;

        $(".showDetailOrder").click(function() {
            if (currentRequest) {
                currentRequest.abort();
            }
            var orderId = $(this).data("order-id");
            var orderDetail1 = $(".orderDetail1");
            currentRequest = $.ajax({
                url: '/admin/order/' + orderId,
                type: 'GET',
                success: function(data) {
                    var totalPrice = formatVND(data[0].totalPrice);
                    $.each(data, function(index, orderedProduct) {
                        var price = formatVND(orderedProduct.price);
                        orderDetail1.append(`
                        <tr>
                            <th scope="row">${index + 1}</th>
                            <td>
                                <img src="${orderedProduct.image}"
                                    alt="" class="productImage">
                            </td>
                            <td class="productName">
                                ${orderedProduct.name}
                            </td>
                            <td>${orderedProduct.quantity}</td>
                            <td>${price}</td>
                        </tr>
                    `);

                    });
                    $(".orderPrice").append(` 
                Tổng tiền: ${totalPrice }
                `);
                },
                error: function(e) {
                    console.log(e);
                }
            });
            $('.orderDetailModal').on('hidden.bs.modal', function() {
                orderDetail1.empty();
                $(".orderPrice").empty();
            });
        });

        function formatVND(number) {
            return number.toLocaleString('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });
        }
    </script>
@endsection
