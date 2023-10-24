@extends('admin.adminLayout')
@section('adminBody')
    <link rel="stylesheet" href="{{ asset('/css/admin/dashboard.css') }}">
    <div class="container mt-5">
        <div class="row overviewList">
            <div class="col-lg-5 overviewItem align-middle">
                <i class="fa-solid fa-users"></i>
                <p>Số lượng người dùng</p>
                <p>{{ $userCount }}</p>
            </div>
            <div class="col-lg-5 overviewItem">
                <i class="fa-solid fa-list"></i>
                <p>Số lượng sản phẩm</p>
                <p>{{ $productCount }}</p>
            </div>

            <div class="col-lg-5 overviewItem">
                <i class="fa-solid fa-cart-shopping"></i>
                <p>Số lượng đặt hàng</p>
                <p>{{ $orderQuantity }}</p>
            </div>
        </div>
    </div>
@endsection
