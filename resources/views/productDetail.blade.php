@extends('layout')

@section('body')
    <div class="flex justify-center items-center">
        <div class="w-8/12 mx-auto my-0">
            <div class="mt-10">
                <div class="flex ">
                    <a href="{{ route('home') }}" class="no-underline text-base text-slate-900">Trang chủ</a>
                    <p class="text-base ">/ Mẹ Việt Dạy Con Kiểu Bắc Âu</p>
                </div>
            </div>
            <div class="flex mt-6">
                <img src="https://product.hstatic.net/200000343865/product/me-viet-day-con-kieu-bac-au_f0818b5e988e4b96bc0314a8c41aad80_bea2c59e3a56485e9f77c53123b18177_large.jpg"
                    alt="">
                <div class="ml-10 w-3/5">
                    <div class="border-b pt-3 pb-3 ">
                        <h4 class="">Mẹ Việt Dạy Con Kiểu Bắc Âu</h4>
                    </div>
                    <div class="border-b pt-3 pb-3">
                        <span class="text-red-600 font-medium text-2xl">30,000đ</span>
                    </div>
                    <div class="flex justify-between">
                        <div>
                            <div class="flex items-center mt-2">
                                <p class="">Tác giả:</p>
                                <p class="text-red-600 font-medium ml-3">Phan Linh</p>
                            </div>
                            <div class="flex items-centers">
                                <p class="">Đối tượng:</p>
                                <p class="text-red-600 font-medium ml-2">Cha mẹ đọc cùng con</p>
                            </div>
                            <p>Khuôn Khổ: 14,5x20,5 cm</p>
                            <p>Số trang: 280 </p>
                            <p>Định dạng: bìa mềm</p>
                            <p>Trọng lượng: 320 gram</p>
                        </div>
                        <div class="mt-28">
                            <div class="bg-red-700">
                                <button class="text-white px-5 py-1">
                                    THÊM VÀO GIỎ HÀNG
                                </button>
                            </div>
                            <div class="bg-red-700 w-24 mt-2">
                                <button class="text-white py-2 px-1">MUA NGAY
                                </button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="mt-10">
                <div class="bg-red-600 w-full">
                    <span class="text-white font-medium ml-3">MÔ TẢ - ĐÁNH GIÁ</span>
                </div>
                <div class="border ">
                    <p class="ml-3 mt-2">hehe</p>
                </div>
                <div class="border mt-3 ">
                    <p class="ml-3 mt-2 text-xl">Đánh giá sản phẩm</p>
                    <div class="flex justify-between">
                        <div class="ml-3">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <div class="flex items-center border-2  border-rose-600 p-2 mr-16">
                            <i class="fa-solid fa-pencil"></i>
                            <p class="ml-1 text-red-600 mb-0">Viết đánh giá</p>
                        </div>
                    </div>
                    <div class="ml-3 w-22 flex">
                        <p class="mr-2 border-b-2 border-rose-600 font-medium">Đánh giá</p>
                        <p class="bg-slate-100 px-2">0</p>
                    </div>
                    <div class="ml-2">
                        <p>hay</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="flex justify-center mt-10 items-center">
                    <p class="mt-2 font-bold text-3xl ">SÁCH CÙNG THỂ LOẠI</p>
                </div>
                <div class="">
                    <x-sectiontitle :$listProducts />
                </div>
            </div>
            <div>
                <div class="flex justify-center mt-10 items-center">
                    <p class="mt-2 font-bold text-3xl ">SẢN PHẨM ĐÃ XEM</p>
                </div>
                <div class="">
                    <x-sectiontitle :$listProducts />
                </div>
            </div>
        </div>
        <x-backtotop />
    </div>
    <script type="text/javascript">
        $('.multiple-items').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            arrow:true,
            focusOnSelect: true
        });
    </script>
@endsection
