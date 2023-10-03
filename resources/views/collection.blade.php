@extends('layout')
@section('body')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('/css/collection.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

    </head>

    <body>
        {{-- @foreach ($collection as $collection)
            <div class=" w-[120px]">
                <img src="{{ $collection->image }}" alt="" class="cursor-pointer w-48 h-72 ml-4 mt-4 mr-4 ">
                <p class="cursor-pointer w-48 ml-4 mr-4 text-sm font-semibold">{{ $collection->name }}</p>
                <p class="ml-4" style="color: #d51c24">{{ $collection->price }}đ</p>
            </div>
        @endforeach --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-md-2 order-sm-2">
                    <div class="collection-sidebar-wrapper">
                        <div class="grid">
                            <div class="grid__item medium--one-half ">
                                <div class="collection-filter-price">
                                    <button class="accordion ">
                                        <span>khoảng giá</span>
                                    </button>
                                    <div class="panel sidebar-sort">
                                        <ul class="no-bullets filter-price clearfix">
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="price_filter" data-price="0:max"
                                                        value="((price:product>=0))">
                                                    <span>Tất cả</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="price_filter" data-price="0:100000"
                                                        value="((price:product<100000))">
                                                    <span>Nhỏ hơn 100,000₫</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="price_filter" data-price="100000:200000"
                                                        value="((price:product>=100000)&&(price:product<200000))">
                                                    <span>Từ 100,000₫ - 200,000₫</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="price_filter" data-price="200000:300000"
                                                        value="((price:product>=200000)&&(price:product<300000))">
                                                    <span>Từ 200,000₫ - 300,000₫</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="price_filter" data-price="300000:400000"
                                                        value="((price:product>=300000)&&(price:product<400000))">
                                                    <span>Từ 300,000₫ - 400,000₫</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="price_filter" data-price="400000:500000"
                                                        value="((price:product>=400000)&&(price:product<500000))">
                                                    <span>Từ 400,000₫ - 500,000₫</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" name="price_filter" data-price="500000:max"
                                                        value="((price:product>=500000))">
                                                    <span>Lớn hơn 500,000₫</span>
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="grid__item medium--one-half ">
                                <div class="collection-filter-vendor">
                                    <button class="accordion">
                                        <span>Tác giả</span>
                                    </button>
                                    <div class="panel sidebar-sort">
                                        <ul class="no-bullets filter-vendor clearfix pl-0 mt-2">
                                            <li>
                                                <label data-filter="Khác" class="filter-vendor__item khac">
                                                    <input type="checkbox" value="">
                                                    <span>Khác</span>
                                                </label>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="grid__item medium--one-half ">
                                <div class="collection-filter-type">
                                    <button class="accordion  ">
                                        <span>Thể loại</span>
                                    </button>
                                    <div class="panel sidebar-sort">
                                        <ul class="no-bullets filter-type clearfix">

                                            <li>
                                                <label data-filter="Kiến thức - khoa học"
                                                    class="filter-vendor__item kien-thuc-khoa-hoc">
                                                    <input type="checkbox" value="">
                                                    <span>Kiến thức - khoa học</span>
                                                </label>
                                            </li>

                                            <li>
                                                <label data-filter="Manga - comic" class="filter-vendor__item manga-comic">
                                                    <input type="checkbox" value="">
                                                    <span>Manga - comic</span>
                                                </label>
                                            </li>

                                            <li>
                                                <label data-filter="Văn học Việt Nam"
                                                    class="filter-vendor__item van-hoc-viet-nam">
                                                    <input type="checkbox" value="">
                                                    <span>Văn học Việt Nam</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label>
                                                    <input type="checkbox" value="">
                                                    <span>Truyện tranh</span>
                                                </label>
                                            </li>

                                            <li>
                                                <label data-filter="Văn học nước ngoài"
                                                    class="filter-vendor__item van-hoc-nuoc-ngoai">
                                                    <input type="checkbox" value="">
                                                    <span>Văn học nước ngoài</span>
                                                </label>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-lg-2 order-md-1 order-sm-1">
                    <div class="collection-head row mb-3">
                        <h1 class="col-lg-6">Đón trung thu tới - Khuyến mãi 70%</h1>
                        <div class="text-right col-lg-6 sortBy">
                            <label for="SortBy">Sắp xếp</label>
                            <form action="/filter-products" method="GET">
                                <select name="SortBy" id="SortBy">
                                    <option value="manual">Tùy chọn</option>
                                    <option value="title-ascending">Tên A-Z</option>
                                    <option value="title-descending">Tên Z-A</option>
                                    <option value="price-ascending">Giá tăng dần</option>
                                    <option value="price-descending">Giá giảm dần</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="collection-body">
                        <div class="product-list row">
                            @foreach ($collections as $collection)
                                <div class="product-item col-lg-3 col-md-4 col-sm-4">
                                    <div class="product-img">
                                        <a href="" class="text-center">
                                            <img id="1045175926" src="{{ $collection->image }}">
                                        </a>
                                        {{-- <div class="product-tags">
                                            <div class="tag-saleoff text-center">
                                                -70%
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="product-info">
                                        <div class="product-title">
                                            <a href="">{{ $collection->name }}</a>
                                        </div>
                                        <div class="product-price">
                                            <span class="current-price">{{ $collection->price }}₫</span>
                                            {{-- <span class="original-price"><s>56,000₫</s></span> --}}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $collections->links() }}



                    </div>
                </div>
            </div>
        </div>
        <script>
            $('input[name="price_filter"]').click(function() {
                $('input[name="price_filter"]').not(this).prop('checked', false);
            });
            $('.accordion').click(function() {
                $(this).toggleClass("active_accordion");
                $(this).siblings(".panel").toggleClass("active");
            });
            $('#SortBy').on('change', function() {
                var selectedOption = $(this).val();
                updateUrl(selectedOption);

                filterProducts(selectedOption);
            });

            function updateUrl(selectedOption) {
                var newUrl = window.location.pathname + '?sortBy=' + selectedOption;
                window.history.pushState({
                    path: newUrl
                }, '', newUrl);
            }

            function filterProducts(sortBy) {
                $.ajax({
                    url: '/filter-collection',
                    type: 'GET',
                    data: {
                        SortBy: sortBy
                    },
                    success: function(data) {
                        let filteredProducts = $('.product-list');
                        filteredProducts.empty();
                        $.each(data.data, function(index, product) {
                            filteredProducts.append(
                                `
                        <div class="product-item col-lg-3 col-md-4 col-sm-4">
                            <div class="product-img">
                                <a href="" class="text-center">
                                    <img id="1045175926" src="${product.image}">    
                                </a>
                                {{-- <div class="product-tags">
                                            <div class="tag-saleoff text-center">
                                                -70%
                                            </div>
                                        </div> --}}
                            </div>
                            <div class="product-info">
                                <div class="product-title">
                                    <a href="">${product.name}</a>
                                </div>
                                <div class="product-price">
                                    <span class="current-price">${product.price}₫</span>
                                    {{-- <span class="original-price"><s>56,000₫</s></span> --}}
                                </div>
                            </div>
                        </div>

                        `
                            );

                        });
                    },
                    error: function() {
                        console.error('An error occurred while fetching filtered products.');
                    }
                });
            }
        </script>
    </body>

    </html>
@endsection
