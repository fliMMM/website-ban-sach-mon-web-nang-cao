@extends('layout')

@section('body')
    <div class="px-10 pb-10 flex items-center space-x-10 justify-center">

        <div class="space-y-4 shadow p-5 rounded-sm mt-32">
            @if (session('duplicateEmail'))
                <ul>
                    <li class="text-danger"> {{ session('duplicateEmail') }}</li>
                </ul>
            @endif
            <p class="text-2xl font-bold mb-0">Đặt lại mật khẩu</p>

            <form class=" space-y-3" method="POST" action="/handler/reset-password">
                @csrf

                <input class="hidden" name="token" type="text" value="{{ $token }}">
                <input placeholder="Email" required value="{{ old('email') }}"
                    class="w-96 appearance-none border py-2 px-3 text-gray-700 leading-tight focus:border-gray-500 focus:outline-none"
                    type="email" id="email" name="email"><br>

                @error('email')
                    <p class="text-red-500 font-bold">{{ $error }}</p>
                @enderror

                <div class="relative"> <input placeholder="Mật khẩu" required
                        class="w-96 appearance-none border  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="password" id="password" name="password"><br>
                    <i id="eye" class="fa-regular fa-eye absolute right-5 top-3 cursor-pointer"></i>
                    <i id="eye_slash" class="fa-regular fa-eye-slash absolute right-5 top-3 cursor-pointer"></i>
                </div>
                @error('password')
                    <p class="text-red-500 font-bold">Hãy nhập mật khẩu nhiểu hơn 8 ký tự</p>
                @enderror
                <div class="relative"> <input placeholder="Xác nhận mật khẩu" required
                        class="w-96 appearance-none border  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        type="password" id="confirm_password" name="confirm_password"><br>
                    <i id="eye_confirm" class="fa-regular fa-eye absolute right-5 top-3 cursor-pointer"></i>
                    <i id="eye_slash_confirm" class="fa-regular fa-eye-slash absolute right-5 top-3 cursor-pointer"></i>
                </div>
                @error('confirm_password')
                    <p class="text-red-500 font-bold">Hãy nhập đúng mật khẩu</p>
                @enderror

                <button type="submit" class="bg-[#D51C24]  p-2 text-white font-bold mt-2 w-96">Đặt lại mật khẩu</button>


            </form>
        </div>

        <script>
            const eye = document.querySelector('#eye')
            const eye_slash = document.querySelector('#eye_slash')
            const password = document.querySelector('#password')
            const eye_confirm = document.querySelector('#eye_confirm')
            const eye_slash_confirm = document.querySelector('#eye_slash_confirm')
            const confirm_password = document.querySelector('#confirm_password')

            eye.style.display = "none";
            eye_confirm.style.display = "none";

            eye_slash.addEventListener('click', () => {
                password.type = "text";
                eye.style.display = "block";
                eye_slash.style.display = "none"
            })

            eye.addEventListener('click', () => {
                password.type = "password";
                eye.style.display = "none";
                eye_slash.style.display = "block"
            })

            eye_slash_confirm.addEventListener('click', () => {
                confirm_password.type = "text";
                eye_confirm.style.display = "block";
                eye_slash_confirm.style.display = "none"
            })

            eye_confirm.addEventListener('click', () => {
                confirm_password.type = "password";
                eye.style_confirm.display = "none";
                eye_slash_confirm.style.display = "block"
            })
        </script>
    @endsection
