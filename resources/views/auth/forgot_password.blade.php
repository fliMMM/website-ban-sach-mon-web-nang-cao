@extends('layout')

@section('body')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Quên mật khẩu</title>
    </head>

    <body>
        <div class="px-10 pb-10 flex items-center space-x-10 justify-center">

            <div class="space-y-3 shadow p-5 rounded-sm mt-32">
                @if (session('status'))
                    <ul>
                        <li class="text-danger"> {{ session('status') }}</li>
                    </ul>
                @endif

                <p class="text-2xl font-bold mb-0">Quên mật khẩu</p>

                <form class=" space-y-2" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <input placeholder="Email" value="{{ old('email') }}"
                        class="w-96 appearance-none border mb-2 py-2 px-3 text-gray-700 leading-tight focus:border-gray-500 focus:outline-none"
                        type="email" id="email" name="email"><br>

                    @error('email')
                        <p class="text-red-500 font-bold">Email không hợp lệ!</p>
                    @enderror

                    <button type="submit" class="bg-[#D51C24]  p-2 text-white font-bold mt-2 w-96">Gửi mã</button>
                </form>
            </div>
        </div>

    </body>

    </html>
@endsection
