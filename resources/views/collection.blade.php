{{-- @extends('layout')

@section('body')
    <x-collection />
@endsection --}}

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
                            <select name="SortBy" id="SortBy">
                                <option value="manual">Tùy chọn</option>
                                <option value="best-selling">Bán chạy nhất</option>
                                <option value="title-ascending">Tên A-Z</option>
                                <option value="title-descending">Tên Z-A</option>
                                <option value="price-ascending">Giá tăng dần</option>
                                <option value="price-descending">Giá giảm dần</option>
                                <option value="created-descending">Mới nhất</option>
                                <option value="created-ascending">Cũ nhất</option>
                            </select>
                        </div>
                    </div>
                    <div class="collection-body">
                        <div class="product-list row">
                            <div class="product-item col-lg-3 col-md-4 col-sm-4">
                                <div class="product-img">
                                    <a href="" class="text-center">
                                        <img id="1045175926"
                                            src="//product.hstatic.net/200000343865/product/susu-gogo-di-singapore_bia_7e8c3f9e58e34d05bfb9ab22b367bbc0_large.jpg"
                                            alt="Susu và Gogo đi Singapore">
                                    </a>
                                    <div class="product-tags">
                                        <div class="tag-saleoff text-center">
                                            -70%
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <a href="">Susu và Gogo đi Singapore</a>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">16,800₫</span>
                                        <span class="original-price"><s>56,000₫</s></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item col-lg-3 col-md-4 col-sm-4">
                                <div class="product-img">
                                    <a href="" class="text-center">
                                        <img id="1045175926"
                                            src="https://product.hstatic.net/200000343865/product/alphabet-in-the-kitchen_273f188e91864ce6947b798a08b93147_large.jpg"
                                            alt="Susu và Gogo đi Singapore">
                                    </a>
                                    <div class="product-tags">
                                        <div class="tag-saleoff text-center">
                                            -70%
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <a href="">Susu và Gogo đi Singapore</a>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">16,800₫</span>
                                        <span class="original-price"><s>56,000₫</s></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item col-lg-3 col-md-4 col-sm-4">
                                <div class="product-img">
                                    <a href="" class="text-center">
                                        <img id="1045175926"
                                            src="//product.hstatic.net/200000343865/product/susu-gogo-di-singapore_bia_7e8c3f9e58e34d05bfb9ab22b367bbc0_large.jpg"
                                            alt="Susu và Gogo đi Singapore">
                                    </a>
                                    <div class="product-tags">
                                        <div class="tag-saleoff text-center">
                                            -70%
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <a href="">Susu và Gogo đi Singapore</a>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">16,800₫</span>
                                        <span class="original-price"><s>56,000₫</s></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item col-lg-3 col-md-4 col-sm-4">
                                <div class="product-img">
                                    <a href="" class="text-center">
                                        <img id="1045175926"
                                            src="//product.hstatic.net/200000343865/product/susu-gogo-di-singapore_bia_7e8c3f9e58e34d05bfb9ab22b367bbc0_large.jpg"
                                            alt="Susu và Gogo đi Singapore">
                                    </a>
                                    <div class="product-tags">
                                        <div class="tag-saleoff text-center">
                                            -70%
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <a href="">Susu và Gogo đi Singapore</a>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">16,800₫</span>
                                        <span class="original-price"><s>56,000₫</s></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item col-lg-3 col-md-4 col-sm-4">
                                <div class="product-img">
                                    <a href="" class="text-center">
                                        <img id="1045175926"
                                            src="https://product.hstatic.net/200000343865/product/khung-long-lung-gai_bd1a30b7fec6489582790d753b422182_large.jpg"
                                            alt="Susu và Gogo đi Singapore">
                                    </a>
                                    <div class="product-tags">
                                        <div class="tag-saleoff text-center">
                                            -70%
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <a href="">Susu và Gogo đi Singapore</a>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">16,800₫</span>
                                        <span class="original-price"><s>56,000₫</s></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item col-lg-3 col-md-4 col-sm-4">
                                <div class="product-img">
                                    <a href="" class="text-center">
                                        <img id="1045175926"
                                            src="//product.hstatic.net/200000343865/product/susu-gogo-di-singapore_bia_7e8c3f9e58e34d05bfb9ab22b367bbc0_large.jpg"
                                            alt="Susu và Gogo đi Singapore">
                                    </a>
                                    <div class="product-tags">
                                        <div class="tag-saleoff text-center">
                                            -70%
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <a href="">Susu và Gogo đi Singapore</a>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">16,800₫</span>
                                        <span class="original-price"><s>56,000₫</s></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item col-lg-3 col-md-4 col-sm-4">
                                <div class="product-img">
                                    <a href="" class="text-center">
                                        <img id="1045175926"
                                            src="https://product.hstatic.net/200000343865/product/rung_mua_ff7e9c9a54c147be9fc66a08ce67588d_large.jpg"
                                            alt="Susu và Gogo đi Singapore">
                                    </a>
                                    <div class="product-tags">
                                        <div class="tag-saleoff text-center">
                                            -70%
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <a href="">Susu và Gogo đi Singapore</a>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">16,800₫</span>
                                        <span class="original-price"><s>56,000₫</s></span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-item col-lg-3 col-md-4 col-sm-4">
                                <div class="product-img">
                                    <a href="" class="text-center">
                                        <img id="1045175926"
                                            src="//product.hstatic.net/200000343865/product/susu-gogo-di-singapore_bia_7e8c3f9e58e34d05bfb9ab22b367bbc0_large.jpg"
                                            alt="Susu và Gogo đi Singapore">
                                    </a>
                                    <div class="product-tags">
                                        <div class="tag-saleoff text-center">
                                            -70%
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <a href="">Susu và Gogo đi Singapore</a>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">16,800₫</span>
                                        <span class="original-price"><s>56,000₫</s></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="paginationList d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item invisible">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item"><a class="page-link current" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">...</li>
                                    <li class="page-item"><a class="page-link" href="#">32</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
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
        </script>
    </body>

    </html>
@endsection
