@extends('layout')
@section('title', 'Bộ sưu tập')
@section('body')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('/css/collection.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

    </head>

    <body>

        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-md-2 order-sm-2">
                    <div class="collection-sidebar-wrapper">
                        <div class="grid">
                            <div class="grid__item medium--one-half ">
                                <div class="collection-filter-type">
                                    <button class="accordion">
                                        <span>Thể loại</span>
                                    </button>
                                    <div class="panel sidebar-sort">
                                        <form action="/filter-products" method="GET" id="filterForm">
                                            <ul class="no-bullets filter-type clearfix">
                                                <li>
                                                    <label data-filter="SchoolLife" class="filter-vendor__item schoolLife">
                                                        <input name="typeFilter" type="checkbox" value="SchoolLife">
                                                        <span>SchoolLife</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label data-filter="Hài hước" class="filter-vendor__item comedy">
                                                        <input name="typeFilter" type="checkbox" value="Comedy">
                                                        <span>Hài hước</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label data-filter="Kịch tính" class="filter-vendor__item fantasy">
                                                        <input name="typeFilter" type="checkbox" value="Fantasy">
                                                        <span>Kịch tính</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label data-filter="Shounen" class="filter-vendor__item shounen">
                                                        <input name="typeFilter" type="checkbox" value="Shounen">
                                                        <span>Shounen</span>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label data-filter="Phiêu lưu" class="filter-vendor__item mystery">
                                                        <input name="typeFilter" type="checkbox" value="Mystery">
                                                        <span>Phiêu lưu</span>
                                                    </label>
                                                </li>
                                            </ul>
                                        </form>
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
                            <form action="/sort-products" method="GET">
                                <select name="SortBy" id="SortBy">
                                    <option value="manual">Tùy chọn</option>
                                    <option value="name-ascending">Tên A-Z</option>
                                    <option value="name-descending">Tên Z-A</option>
                                    <option value="price-ascending">Giá tăng dần</option>
                                    <option value="price-descending">Giá giảm dần</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="collection-body">
                        <div class="product-list row">
                            @foreach ($products as $product)
                                <div class="product-item col-lg-3 col-md-4 col-sm-4">
                                    <div class="product-img">
                                        <a href="/productDetail/{{ $product->name }}">
                                            <img src="{{ $product->image }}">
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <div class="product-title">
                                            <a href="/productDetail/{{ $product->name }}"><span
                                                    class="truncate-text">{{ $product->name }}</span></a>
                                        </div>
                                        <div class="product-price">
                                            <span class="current-price">{{ $product->price }}₫</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
        <script>
            $('#SortBy').on('change', function() {
                var selectedOption = $(this).val();
                updateUrlWhenSorted(selectedOption);
                sortProduct(selectedOption);
            });

            function updateUrlWhenSorted(selectedOption) {
                var newUrl = window.location.pathname + '?sortBy=' + selectedOption;
                window.history.pushState({
                    path: newUrl
                }, '', newUrl);
            }

            function sortProduct(sortBy) {
                $.ajax({
                    url: '/sort-products',
                    type: 'GET',
                    data: {
                        SortBy: sortBy
                    },
                    success: function(data) {
                        let sortedProducts = $('.product-list');
                        sortedProducts.empty();
                        $.each(data.data, function(index, product) {
                            sortedProducts.append(
                                `
                <div class="product-item col-lg-3 col-md-4 col-sm-4">
                    <div class="product-img">
                        <a href="/productDetail/${product.name}" class="text-center">
                            <img id="1045175926" src="${product.image}">    
                        </a>
                      
                    </div>
                    <div class="product-info">
                        <div class="product-title">
                            <a href="/productDetail/${product.name}"><span class="truncate-text">${product.name}</span></a>
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
                        console.error('An error occurred while fetching sorted products.');
                    }
                });
            }
            $('input[type="checkbox"]').on('change', function() {
                var categorySelected = $(this).val();
                updateUrlWhenFiltered(categorySelected);
                updateProductList();
            });


            function updateUrlWhenFiltered() {
                var selectedCategories = $('input[type="checkbox"]:checked').map(function() {
                    return $(this).val();
                }).get();

                var newURL = '/collection/category?' + $.param({
                    categories: selectedCategories
                });
                history.pushState({}, '', newURL);
            }

            function updateProductList() {
                var selectedCategories = $('input[type="checkbox"]:checked').map(function() {
                    return $(this).val();
                }).get();
                console.log(selectedCategories);
                $.ajax({
                    url: '/filter-products',
                    method: 'GET',
                    data: {
                        categories: selectedCategories
                    },
                    success: function(data) {
                        console.log(data);
                        let filteredProducts = $('.product-list');
                        filteredProducts.empty();
                        $.each(data, function(index, product) {
                            filteredProducts.append(`                      
                            <div class="product-item col-lg-3 col-md-4 col-sm-4">
                                <div class="product-img">
                                    <a href="" class="text-center">
                                        <img id="1045175926" src="${product.image}">    
                                    </a>
                                   
                                </div>
                                <div class="product-info">
                                    <div class="product-title">
                                        <a href=""><span class="truncate-text">${product.name}</span></a>
                                    </div>
                                    <div class="product-price">
                                        <span class="current-price">${product.price}₫</span>
                                        {{-- <span class="original-price"><s>56,000₫</s></span> --}}
                                    </div>
                                </div>
                            </div>
                            `);
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        </script>
    </body>

    </html>
@endsection
