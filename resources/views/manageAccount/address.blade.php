@extends('layout')
@section('body')
    <div class="">
        <div class="m-4">
            <h3 class="text-center">Địa Chỉ</h3>
            <div class="flex mt-10 justify-items-start">
                <div class="ml-36 border-r-[1px] border-gray-300">
                    <ul>
                        <li class=" w-[240px] h-14 p-3 border-b-[1px]  border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs"></i></span>
                                <span class="">Hồ Sơ</span>
                            </a>
                        </li>
                        <li class="p-3 h-14 border-b-[1px] bg-[#f7f3eb] border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color:aqua"></i></span>
                                <span class="">Địa chỉ</span>
                            </a>
                        </li>
                        <li class=" p-3 h-14 border-b-[1px]  border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color:red"></i></span>
                                <span class="">Đổi mật khẩu</span>
                            </a>
                        </li>
                        <li class="p-3 h-14 border-b-[1px] border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color:blue"></i></span>
                                <span class="">ListRegisterBook</span>
                            </a>
                        </li>
                        <li class="p-3 h-14 border-b-[1px] border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color: bisque"></i></span>
                                <span class="">Membership</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="ml-8 w-3/5">
                    <div class="flex justify-between border-b pb-4">
                        <p class="text-xl pt-3">Địa chỉ của tôi</p>
                        <div class="flex bg-red-700 items-center">
                            <i class="fa-solid fa-plus pl-2" style="color: white"></i>
                            <button class="p-2 text-white ">Thêm địa chỉ mới</button>
                        </div>
                    </div>
                    <div>
                        <p class="mt-4">Địa chỉ</p>
                        <div class="flex justify-between">
                            <div>
                                <div class="flex h-[30px]">
                                    <p class="border-r pr-2 border-black">Lê Đức</p>
                                    <p class="ml-2 text-[#757575]">0326428199</p>
                                </div>
                                <div class="mb-0">
                                    <p class="mb-0 text-[#757575]">Số 01 đường Hai Bà Trưng</p>
                                </div>
                                <div class="flex ">
                                    <p class="text-[#757575] mr-1.5">Phường Đại Mỗ</p>
                                    <p class="text-[#757575] mr-1.5">Quận Nam Từ Liêm</p>
                                    <p class="text-[#757575]">Hà Nội</p>
                                </div>
                            </div>
                            <div class="columns-1">
                                <button class="ml-10 mb-3 text-[#84D0FF]">Cập nhật</button>
                                <button  class="text-[#84D0FF]">Xoá</button>
                                <div class="border border-black pl-2 pr-2">
                                    <button>Thiết lập mặc định</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
