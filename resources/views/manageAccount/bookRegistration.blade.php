@extends('layout')
@section('body')
    <div class="">
        <div class="m-4">
            <h3 class="text-center">Account Setting</h3>
            <div class="flex mt-10 justify-items-start">
                <div class="ml-36 border-r-[1px] border-gray-300">
                    <ul>
                        <li class=" w-[240px] h-14 p-3 border-b-[1px] border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs"></i></span>
                                <span class="">Hồ Sơ</span>
                            </a>
                        </li>
                        <li class="p-3 h-14 border-b-[1px] border-gray-300">
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
                        <li class="p-3 h-14 border-b-[1px] border-gray-300 bg-[#f7f3eb] ">
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
                    <div>
                        <p>Đăng ký sách</p>
                        <p>Điền thông tin sách yêu cầu để cửa hàng có thể cập nhật cho bạn</p>
                    </div>
                    <div>
                        <div class="input-group mb-3" style="display: flex; align-items: center">
                            <div class="mr-4 w-24 flex justify-end">
                                <span id="basic-addon1">Tên sách</span>
                            </div>
                            <input type="text" class="form-control" style="border-radius:0" placeholder="Tên sách"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3" style="display: flex; align-items: center">
                            <div class="mr-4 w-24 flex justify-end">
                                <span id="basic-addon1">Tác giả</span>
                            </div>
                            <input type="text" class="form-control" style="border-radius:0" placeholder="Tác giả"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3" style="display: flex; align-items: center">
                            <div class="mr-4 w-24 flex justify-end">
                                <span id="basic-addon1">Số lượng</span>
                            </div>
                            <input type="text" class="form-control" style="border-radius:0" placeholder="Tác giả"
                                aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <button class="ml-10 mt-8 w-[70px] h-[40px] bg-red-700 text-white" type="submit">Lưu</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
