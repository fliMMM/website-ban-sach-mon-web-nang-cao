@extends('layout')
@section('body')

    <script type="text/javascript">
        window.onload = () => {
            const myModal = new bootstrap.Modal('#onload');
            myModal.show();
            setTimeout(function() {
                myModal.hide();
            }, 5000);
        }     
    </script>
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
                    @if (session('message'))
                            <div class="modal" style="display:flex" tabindex="-1" id="onload">
                                <div class="modal-dialog" style="top: 40% ">
                                    <div class="modal-content">
                                        <div class="modal-body text-center">
                                            <i class="mt-2 fa-regular fa-circle-check "
                                                style="font-size:50px; color:#79D220"></i>
                                            <p class="text-xl mt-3">{{ session('message') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       
                    @endif
                    <div class="border-b pb-4">
                        <div class="ml-24 mt-6 w-3/5">
                            <form action="" method="post">
                                <div class="input-group" style="display: flex; align-items: center">
                                    <div class="mr-4 w-24 flex justify-end">
                                        <span id="basic-addon1">Họ Tên</span>
                                    </div>
                                    <input type="text" class="form-control" style="border-radius:0" name="username"
                                        placeholder="Username" value="{{ $user[0]->name }}">
                                </div>
                                @error('username')
                                    <p class="mb-0 text-red-400 ml-28">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <div class="input-group mt-3" style="display: flex; align-items: center">
                                    <div class="mr-4 w-24 flex justify-end">
                                        <span id="basic-addon1">Email</span>
                                    </div>
                                    <input type="text" class="form-control" style="border-radius:0" placeholder="email"
                                        name="email" value="{{ $user[0]->email }}">
                                </div>
                                @error('email')
                                    <p class="mb-0 text-red-400 ml-28 ">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <div class="input-group mt-3" style="display: flex; align-items: center">
                                    <div class="mr-4 w-24 flex justify-end">
                                        <span id="basic-addon1">Số điện thoại</span>
                                    </div>
                                    <input type="text" class="form-control" style="border-radius:0"
                                        placeholder="Số điện thoại" name="phone" value="{{ $user[0]->phone }}">
                                </div>
                                @error('phone')
                                    <p class="text-red-400 ml-28">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <div class="flex mt-3">
                                    <div class="mr-4  w-24 flex justify-end">
                                        <span>Giới tính</span>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" name="gender" id="genderM"
                                            value="Nam" {{ $user[0]->gender == 'Nam' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="genderM"> Nam </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" name="gender" id="genderF"
                                            value="Nữ" {{ $user[0]->gender == 'Nữ' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="genderF"> Nữ </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="genderI"
                                            value="Khác" {{ $user[0]->gender == 'Khác' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="genderI"> Khác </label>
                                    </div>
                                </div>
                                @error('gender')
                                <p class="mb-0 text-red-400 ml-28 ">
                                    {{ $message }}
                                </p>
                            @enderror
                                <button class="ml-10 mt-8 w-[70px] h-[40px] bg-red-700 text-white"
                                    type="submit">Lưu</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
