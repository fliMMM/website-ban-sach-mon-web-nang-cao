@extends('layout')

@section('body')
<div>
    <a href="{{route('home')}}" class = "no-underline text-sm text-slate-900" >Trang chủ</a>
    <div class = "flex justify-center mt-6 w-4/5">
    <img src="https://product.hstatic.net/200000343865/product/me-viet-day-con-kieu-bac-au_f0818b5e988e4b96bc0314a8c41aad80_bea2c59e3a56485e9f77c53123b18177_large.jpg" alt="">
        <div class ="ml-10">  
        <div class = "border-b pd-2 width-[320px]">
        <h4 class = "">Mẹ Việt Dạy Con Kiểu Bắc Âu</h4>
        </div>
        <div class = "border-b pd-2">
        <span class = "text-red-500 text-2xl">30,000đ</span>
        </div>
        <div class="flex items-center mt-2">
          <p class="">Tác giả:</p>
          <p class="text-red-500 ml-2">Phan Linh</p>
        </div>
        <div class="flex items-centers">
          <p class="">Đối tượng:</p>
          <p class="text-red-500 ml-2">Cha mẹ đọc cùng con</p>
        </div>
        <p>Khuôn Khổ: 14,5x20,5 cm</p>
        <p>Số trang: 280 </p>
        <p>Định dạng: bìa mềm</p>
        <p>Trọng lượng: 320 gram</p>
</div>        
    </div>
</div>
@endsection