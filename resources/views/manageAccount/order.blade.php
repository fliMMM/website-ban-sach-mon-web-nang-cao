@extends('layout')
@section('body')
    <div class="">
        @if (Session::has('success'))
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '{{ Session::get('success') }}',
                    showConfirmButton: true,
                    timer: 4000
                })
            </script>
        @endif
        <div class="m-4">
            <h3 class="text-center">Theo dõi đơn hàng</h3>
            <div class="flex mt-10 justify-items-start">
                <x-menubar title="Danh sách đơn hàng" />
                <div class="ml-8 w-3/5">
                    <div class="ml-4 border-b">
                        <p class="text-2xl mb-2">Danh sách đơn hàng</p>
                    </div>
                    <div class="pb-4">
                        <div class=" mt-6">
                            <ul class="nav nav-tabs space-x-2">
                                @if ($tab == '0')
                                    <li class="nav-item mb-2">
                                        <a class="no-underline border py-1 px-2  block rounded-md text-white bg-red-500"
                                            href="/account/order/?tab=0">Chờ
                                            xác
                                            nhận</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="no-underline border py-1 px-2    block rounded-md text-black"
                                            href="/account/order/?tab=1">Chờ
                                            giao
                                            hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="no-underline border py-1 px-2  block rounded-md text-black"
                                            href="/account/order/?tab=2">Đã
                                            nhận
                                            hàng</a>
                                    </li>
                                @endif

                                @if ($tab == '1')
                                    <li class="nav-item mb-2">
                                        <a class="no-underline border py-1 px-2  block rounded-md text-black "
                                            href="/account/order/?tab=0">Chờ
                                            xác
                                            nhận</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="no-underline border py-1 px-2  bg-red-500 text-white  block rounded-md "
                                            href="/account/order/?tab=1">Chờ
                                            giao
                                            hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="no-underline border py-1 px-2  block rounded-md text-black"
                                            href="/account/order/?tab=2">Đã
                                            nhận
                                            hàng</a>
                                    </li>
                                @endif

                                @if ($tab == '2')
                                    <li class="nav-item mb-2">
                                        <a class="no-underline border py-1 px-2  block rounded-md text-black "
                                            href="/account/order/?tab=0">Chờ
                                            xác
                                            nhận</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="no-underline border py-1 px-2    block rounded-md text-black"
                                            href="/account/order/?tab=1">Chờ
                                            giao
                                            hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="no-underline border py-1 px-2  block rounded-md text-white bg-red-500"
                                            href="/account/order/?tab=2">Đã
                                            nhận
                                            hàng</a>
                                    </li>
                                @endif
                            </ul>
                        </div>

                        @if (count($orders) > 0)
                            @foreach ($orders as $order)
                                <div class="border-b">
                                    <div class="flex  mt-4 justify-between">
                                        <div class="text-lg">
                                            <p>Ngày đặt hàng: {{ $order->created_at }}</p>
                                            <p>Số điện thoại: {{ $order->phoneNumber }}</p>
                                            <p>Địa chỉ: {{ $order->address }}</p>
                                            <p>Hình thức thanh toán: <span
                                                    class="uppercase">{{ $order->payment_method }}</span></p>
                                        </div>
                                    </div>
                                    <p class="text-lg text-red-600">Danh sách sản phẩm</p>
                                    @foreach ($order->products as $product)
                                        <p>{{ $product->name }} x {{ $product->quantity }}</p>
                                    @endforeach

                                    <p>Tổng tiền: {{ number_format($order->total) }} đ </p>
                                </div>
                            @endforeach
                        @else
                            <p>Bạn chưa có đơn hàng nào</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
