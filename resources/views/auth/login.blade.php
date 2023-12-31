@extends('layout')

@section('body')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        @if (Session::has('status_error'))
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: '{{ Session::get('status_error') }}',
                    showConfirmButton: true,
                    timer: 4000
                })
            </script>
        @endif
        <div class="px-10 pb-10 flex items-center space-x-10 justify-center">

            <div class="space-y-3 shadow p-5 rounded-sm mt-32">

                <p class="text-2xl font-bold mb-0">Xin chào,</p>

                <form class=" space-y-2" method="POST" action="/handler/login">
                    @csrf
                    <input placeholder="Email" value="{{ old('email') }}"
                        class="w-96 appearance-none border py-2 px-3 text-gray-700 leading-tight focus:border-gray-500 focus:outline-none"
                        type="text" id="email" name="email"><br>

                    @error('email')
                        <p class="text-red-500 font-bold">Email không hợp lệ!</p>
                    @enderror

                    <div class="relative"> <input placeholder="Mật khẩu" value="{{ old('password') }}"
                            class="w-96 appearance-none border  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="password" id="password" name="password"><br>
                        <i id="eye" class="fa-regular fa-eye absolute right-5 top-3 cursor-pointer"></i>
                        <i id="eye_slash" class="fa-regular fa-eye-slash absolute right-5 top-3 cursor-pointer"></i>
                    </div>
                    @error('password')
                        <p class="text-red-500 font-bold">Hãy nhập mật khẩu dài hơn 8 kí tự</p>
                    @enderror

                    <button type="submit" class="bg-[#D51C24]  p-2 text-white font-bold mt-2 w-96">Đăng
                        nhập</button>

                    <div class="w-96 flex space-x-2">
                        <button type="submit" class="bg-[#DD4B39] w-1/2  p-2 text-white font-bold mt-2 ">Đăng
                            nhập Google</button>
                        <button type="submit" class="bg-[#3B5998] w-1/2  p-2 text-white font-bold mt-2 ">Đăng
                            nhập Facebook</button>
                    </div>
                </form>
                <div class="flex justify-between">
                    <a class="text-red-600 text-lg no-underline" href="/forgot-password"> Quên mật khẩu</a>
                    <a class="text-red-600 text-lg no-underline" href="/register"> Đăng
                        ký</a>
                </div>
            </div>

            {{-- <img class="w-48 h-48"
                    src="data:image/png;base64,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"
                    alt="photo"> --}}
        </div>

    </body>

    <script>
        const eye = document.querySelector('#eye')
        const eye_slash = document.querySelector('#eye_slash')
        const password = document.querySelector('#password')

        eye.style.display = "none";

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
    </script>

    </html>
@endsection
