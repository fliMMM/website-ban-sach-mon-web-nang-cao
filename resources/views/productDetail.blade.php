@extends('layout')

@section('body')
    <div class="flex justify-center items-center">
        @if (Session::has('message'))
            <script>
                console.log('hehe')
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '{{ Session::get('message') }}',
                    showConfirmButton: true,
                    timer: 4000
                })
            </script>
        @endif
        @if (Session::has('status_error'))
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: '{{ Session::get('status_error') }}',
                    showConfirmButton: true,
                    timer: 4000
                })
            </script>
        @endif
        <div class="w-8/12 mx-auto my-0">
            @if (count($productDetails) > 0)
                @foreach ($productDetails as $productDetail)
                    @section('title', $productDetail->name)
                    <div class="mt-10">
                        <div class="flex ">
                            <a href="{{ route('home') }}" class="no-underline text-base text-slate-900">Trang chủ</a>
                            <p class="text-base ">
                                / {{ $productDetail->name }}
                            </p>
                        </div>
                    </div>
                    <div class="xl:flex lg:flex md:block mt-6">
                        <img src="{{ $productDetail->image }}" class="lg:w-2/5 lg:h-2/4 xl:h-[600px] xl:w-[500px] md:w-full"
                            alt="">
                        <div class="lg:ml-10 xl:ml-10 md:ml-0 lg:w-3/5 xl:w-3/5 md:w-full">
                            <div class="border-b pt-3 pb-3 ">
                                <h4 class="">{{ $productDetail->name }}</h4>
                                <?php
                                $categories = explode(',', $productDetail->categories);
                                $firstCategory = array_shift($categories);
                                ?>
                                <input type="hidden" name="productName" value="{{ $firstCategory }}">
                            </div>
                            <div class="border-b pt-3 pb-3">
                                <?php
                                $price = number_format($productDetail->price, 0, '', ',');
                                ?>
                                <span class="text-red-600 font-medium text-2xl">{{ $price }}đ</span>
                            </div>
                            <div class="flex justify-between">
                                <div>
                                    <div class="flex items-center mt-2">
                                        <p class="">Tác giả:</p>
                                        <p class="text-red-600 font-medium ml-3">{{ $productDetail->author }}</p>
                                    </div>
                                    <div class="flex items-centers">
                                        <p class="">Đối tượng:</p>
                                        <p class="text-red-600 font-medium ml-2">{{ $productDetail->target }}</p>
                                    </div>

                                    <div class="flex items-centers">
                                        <p class="">Thể loại:</p>
                                        <p class="text-red-600 font-medium ml-2">{{ $productDetail->categories }}</p>
                                    </div>

                                    <p>Ngày Phát Hành: {{ $productDetail->ngayPhatHanh }}</p>
                                    <p>Khuôn Khổ: {{ $productDetail->khuonKho }}</p>
                                    <p>Số Trang: {{ $productDetail->soTrang }} </p>
                                    <p>Trọng Lượng: {{ $productDetail->inStock }}</p>
                                </div>
                                <div class="xl:mt-28 lg:ml-2 lg:mt-40 md:mt-40">
                                    <div class="bg-red-700">
                                        <form action="" method="post">
                                            @csrf
                                            <button type="submit"
                                                class="text-white xl:text-base lg:text-sm lg:px-2 xl:px-5 py-1 md:px-2">
                                                THÊM VÀO GIỎ HÀNG
                                            </button>
                                        </form>

                                    </div>
                                    <div class="bg-red-700 w-24 mt-2 text-center">
                                        <button id="buy_now_btn"
                                            class="text-white xl:py-2 xl:px-1 xl:text-base lg:text-sm lg:py-2 lg:px-1 md:py-2">MUA
                                            NGAY
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
                            <p class="ml-3 mt-2">{{ $productDetail->description }}</p>
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
                        <?php $list = $listProducts; ?>
                        <x-sectiontitle :$list title="SÁCH CÙNG THỂ LOẠI" />
                    </div>
                    <div>
                        <?php $list = $listProducts; ?>
                        <x-sectiontitle :$list title="SẢN PHẨM ĐÃ XEM" />
                    </div>
                @endforeach
            @endif
        </div>
        <x-backtotop />
    </div>
    <script type="text/javascript">
        $('#buy_now_btn').click(() => {
            Swal.fire({
                position: 'center',
                icon: 'warning',
                title: 'Chức năng đang được phát triển',
                showConfirmButton: true,
                timer: 4000
            })
        })
        $('.multiple-items').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            arrow: true,
            focusOnSelect: true,
            responsive: [{
                    breakpoint: 1030,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 770,
                    settings: {
                        slidesToShow: 3,
                    }
                },
            ]
        });
    </script>
@endsection
