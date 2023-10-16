@extends('layout')
@section('body')
    <div class="">
        <div class="m-4">
            <h3 class="text-center">Hồ sơ cá nhân</h3>
            <div class="flex mt-10 justify-items-start">
                <div class="ml-36 border-r-[1px] border-gray-300">
                    <ul>
                        <li class=" w-[240px] h-14 p-3 border-b-[1px] bg-[#f7f3eb] border-gray-300">
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
                    <div class="ml-4 border-b">
                        <p class="text-2xl mb-2">Hồ sơ của tôi</p>
                        <p class="">Quản lí thông tin hồ sơ để bảo mật tài khoản</p>
                    </div>
                    <div class="border-b pb-4">
                        <div class="ml-24 mt-6 w-3/5">
                            <div class="input-group mb-3" style="display: flex; align-items: center">
                                <div class="mr-4 w-24 flex justify-end">
                                    <span id="basic-addon1">Họ Tên</span>
                                </div>
                                <input type="text" class="form-control" style="border-radius:0" placeholder="Username"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3" style="display: flex; align-items: center">
                                <div class="mr-4 w-24 flex justify-end">
                                    <span id="basic-addon1">Email</span>
                                </div>
                                <input type="text" class="form-control" style="border-radius:0" placeholder="email"
                                    aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="input-group mb-3" style="display: flex; align-items: center">
                                <div class="mr-4 w-24 flex justify-end">
                                    <span id="basic-addon1">Số điện thoại</span>
                                </div>
                                <input type="text" class="form-control" style="border-radius:0"
                                    placeholder="Số điện thoại" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <div class="flex">

                                <div class="mr-4 w-24 flex justify-end">
                                    <span id="basic-addon1">Giới tính</span>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1"> Nam </label>
                                </div>
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1"> Nữ </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1"> Khác </label>
                                </div>
                            </div>
                            <button class="ml-10 mt-8 w-[70px] h-[40px] bg-red-700 text-white" type="submit">Lưu</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
