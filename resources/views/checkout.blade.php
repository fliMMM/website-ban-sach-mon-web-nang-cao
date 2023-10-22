@extends('layout')

@section('body')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            /* width */
            div::-webkit-scrollbar {
                width: 5px;

            }

            /* Track */
            div::-webkit-scrollbar-track {
                background: #f1f1f1;
            }

            /* Handle */
            div::-webkit-scrollbar-thumb {
                background: #888;
                border-radius: 10px
            }

            /* Handle on hover */
            div::-webkit-scrollbar-thumb:hover {
                background: #555;
            }
        </style>
        <title>Document</title>
    </head>

    <body>
        <main class="w-screen h-screen flex lg:justify-center items-center flex-col lg:flex-row">

            {{-- left side --}}
            <div class=" h-full space-y-5 pt-10">
                <h3 class="font-semibold">Thông tin thanh toán</h3>
                <div class="flex items-center">
                    <i class="fa-regular fa-user text-white  bg-gray-300 p-3 rounded-md mr-2"></i>
                    <div class="flex flex-col items-start">
                        @if (auth()->user()->name)
                            <p class="text-sm text-gray-500">{{ auth()->user()->name }} ({{ auth()->user()->email }})</p>
                        @else
                            <p class="text-sm text-gray-500">PHP ({{ auth()->user()->email }})</p>
                        @endif
                        <button class="text-blue-500 text-sm">Đăng xuất</button>
                    </div>
                </div>

                <form action="/handle/checkout" method="POST" class="flex flex-col ">
                    @csrf
                    <div class="flex flex-col mb-3 items-end">
                        <a href="/account/address" class="text-xs underline pb-1 text-blue-500">Thay đổi địa chỉ mặc
                            định</a>
                        <input placeholder="Địa chỉ nhận hàng" value="{{ $formatAddress }}"
                            class="w-[500px] rounded-md appearance-none  border py-2 px-3 text-gray-700 leading-tight focus:border-gray-500 focus:outline-none"
                            type="text" id="address" name="address">

                    </div>
                    @if ($address)
                        <input placeholder="Số điện thoại" value="{{ $address->phone }}"
                            class="w-[500px] mb-3 rounded-md appearance-none border py-2 px-3 text-gray-700 leading-tight focus:border-gray-500 focus:outline-none"
                            type="text" id="phoneNumber" name="phoneNumber">
                    @else
                        <input placeholder="Số điện thoại"
                            class="w-[500px] mb-3 rounded-md appearance-none border py-2 px-3 text-gray-700 leading-tight focus:border-gray-500 focus:outline-none"
                            type="text" id="phoneNumber" name="phoneNumber">
                    @endif

                    <select id="payment_method" class=" w-[500px] border rounded-md py-[6px] px-3" name="payment_method">
                        <option value="label">Phương thức thanh toán</option>
                        <option value="cod">COD</option>
                        <option value="QR">QR Code</option>
                    </select>

                    @if ($errors->any())
                        <p class="text-red-600 mt-1 font-bold">Hãy nhập đủ thông tin giao hàng!!</p>
                    @endif

                    <img id="qr_image" class="hidden" width="200px" height="200px"
                        src="https://img.freepik.com/premium-vector/qr-code-sample-smartphone-scanning-qr-code-icon-flat-design-stock-vector-illustration_550395-108.jpg"
                        alt="qr code">
                    <button class="bg-blue-500 w-[500px]  mb-3 rounded-md py-2 mt-3 text-white">Đặt hàng</button>
                    <a class="text-blue-500" href="/cart">Giỏ hàng</a>
                </form>

            </div>

            {{-- right side --}}
            <div class="lg:border-l  h-screen lg:pl-7 lg:ml-7">
                <div class=" lg:h-full max-h-96 overflow-y-auto pt-5 pr-5">
                    @foreach ($cart_items as $item)
                        <div class="flex items-center space-x-3 mb-4">
                            <div class="flex items-center space-x-2 relative">
                                <p
                                    class="absolute text-xs top-[-10px] left-[60px] z-10 bg-gray-400 text-white rounded-full w-5 h-5 flex items-center justify-center">
                                    <span>{{ $item->quantity }}</span>
                                </p>
                                <img width="65px" src="{{ $item->image }}" alt="photo">
                                <p class="text-xs w-64 line-clamp-2">{{ $item->name }}</p>
                            </div>
                            <p class="text-sm">{{ number_format($item->price * $item->quantity) }} đ</p>
                        </div>
                    @endforeach

                </div>
                {{-- <form class="mt-10 border-t border-b pt-3 pb-2 space-x-2 w-full">
                    @csrf
                    <input placeholder="Mã giảm giá" value="{{ old('voucher') }}"
                        class="w-[calc(100%-130px)] mb-2 rounded-md appearance-none border py-2 px-3 text-gray-700 leading-tight focus:border-gray-500 focus:outline-none"
                        type="text" id="voucher" name="voucher">

                    <button class="p-[6px] w-[100px] bg-blue-500 text-white rounded-md">Sử dụng</button>
                </form> --}}

                <div class="mt-5 text-md space-y-2 font-bold  border-t pt-2">
                    <div class="flex justify-between">
                        <p>Tạm tính</p>
                        <p>{{ number_format($total_amount) }} đ</p>
                    </div>
                    <div class="flex justify-between">
                        <p>Phí ship</p>
                        <p>10.000 đ</p>
                    </div>
                </div>

                <div class="flex justify-between border-t mt-5 pt-3 font-bold mb-10">
                    <p>Tổng tiền</p>
                    <p>{{ number_format($total_amount + 10000) }} đ</p>
                </div>
            </div>
        </main>
    </body>
    <script>
        const paymentOption = document.getElementById('payment_method');
        const qr_image = document.getElementById('qr_image');

        paymentOption.addEventListener('change', (e) => {
            if (e.target.value === 'QR') {
                qr_image.style.display = 'block'
            } else {
                qr_image.style.display = 'none'
            }
        })
    </script>

    </html>
@endsection
