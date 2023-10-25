@extends('layout')
@section('body')
    <div class="">
        <div class="m-4">
            <h3 class="text-center">Đổi mật khẩu</h3>
            <div class="flex mt-10 justify-items-start">
                <x-menubar title="Đổi mật khẩu" />
                <div class="ml-8 w-3/5">
                    <div class="ml-4 border-b">
                        <p class="text-2xl mb-2">Đổi mật khẩu</p>
                        <p class="">Quản lí thông tin hồ sơ để bảo mật tài khoản</p>
                    </div>
                    <div class="border-b pb-4">
                        <div class="ml-24 mt-6">
                            @if (Session::has('success'))
                                <script>
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'success',
                                        title: '{{ Session::get('success') }}',
                                        showConfirmButton: true,
                                        timer: 4000
                                    })
                                </script>
                            @endif
                            @if (Session::has('errorrr'))
                                <script>
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        title: '{{ Session::get('error') }}',
                                        text: 'Hãy nhập đúng thông tin!',
                                        showConfirmButton: true,
                                        timer: 4000
                                    })
                                </script>
                            @endif

                            <form class="space-y-3 w-fit" method="POST" action="/account/handler/change-password">
                                @csrf

                                <div class="relative"> <input placeholder="Mật khẩu cũ" required
                                        class="w-96 appearance-none border  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        type="password" id="old_password" name="old_password"><br>
                                    <i id="eye_old_password"
                                        class="fa-regular fa-eye absolute right-5 top-3 cursor-pointer"></i>
                                    <i id="eye_slash_old_password"
                                        class="fa-regular fa-eye-slash absolute right-5 top-3 cursor-pointer"></i>
                                </div>
                                @error('old_password')
                                    <p class="text-red-500 font-bold">Hãy nhập mật khẩu nhiểu hơn 8 ký tự</p>
                                @enderror

                                <div class="relative"> <input placeholder="Mật khẩu mới" required
                                        class="w-96 appearance-none border  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        type="password" id="new_password" name="new_password"><br>
                                    <i id="eye_new_password"
                                        class="fa-regular fa-eye absolute right-5 top-3 cursor-pointer"></i>
                                    <i id="eye_slash_new_password"
                                        class="fa-regular fa-eye-slash absolute right-5 top-3 cursor-pointer"></i>
                                </div>
                                @error('new_password')
                                    <p class="text-red-500 font-bold">Hãy nhập mật khẩu nhiểu hơn 8 ký tự</p>
                                @enderror
                                <div class="relative"> <input placeholder="Xác nhận mật khẩu" required
                                        class="w-96 appearance-none border  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        type="password" id="confirm_password" name="confirm_password"><br>
                                    <i id="eye_confirm" class="fa-regular fa-eye absolute right-5 top-3 cursor-pointer"></i>
                                    <i id="eye_slash_confirm"
                                        class="fa-regular fa-eye-slash absolute right-5 top-3 cursor-pointer"></i>
                                </div>
                                @error('confirm_password')
                                    <p class="text-red-500 font-bold">Hãy nhập đúng mật khẩu</p>
                                @enderror

                                <button type="submit" class="bg-[#D51C24]  p-2 text-white font-bold mt-2 w-96">Đăng
                                    ký</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const eye_old_password = document.querySelector('#eye_old_password')
        const eye_slash_old_password = document.querySelector('#eye_slash_old_password')

        const eye_new_password = document.querySelector('#eye_new_password')
        const eye_slash_new_password = document.querySelector('#eye_slash_new_password')

        const eye_confirm = document.querySelector('#eye_confirm')
        const eye_slash_confirm = document.querySelector('#eye_slash_confirm')

        const old_password = document.querySelector('#old_password')
        const new_password = document.querySelector('#new_password')
        const confirm_password = document.querySelector('#confirm_password')

        eye_old_password.style.display = "none";
        eye_new_password.style.display = "none";
        eye_confirm.style.display = "none";

        eye_slash_old_password.addEventListener('click', () => {
            old_password.type = "text";
            eye_old_password.style.display = "block";
            eye_slash_old_password.style.display = "none"
        })

        eye_slash_new_password.addEventListener('click', () => {
            new_password.type = "text";
            eye_new_password.style.display = "block";
            eye_slash_new_password.style.display = "none"
        })

        eye_slash_confirm.addEventListener('click', () => {
            confirm_password.type = "text";
            eye_confirm.style.display = "block";
            eye_slash_confirm.style.display = "none"
        })

        eye_old_password.addEventListener('click', () => {
            old_password.type = "password";
            eye_old_password.style.display = "none";
            eye_slash_old_password.style.display = "block"
        })

        eye_new_password.addEventListener('click', () => {
            new_password.type = "password";
            eye_new_password.style.display = "none";
            eye_slash_new_password.style.display = "block"
        })

        eye_confirm.addEventListener('click', () => {
            confirm_password.type = "password";
            eye_confirm.style.display = "none";
            eye_slash_confirm.style.display = "block"
        })
    </script>
@endsection
