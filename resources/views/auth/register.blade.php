@extends('layout')

@section('body')
    <div class=" w-screen h-screen pt-2 flex justify-center">


        <form method="POST" action="/users">
            @csrf
            <label class="w-20 inline-block" for="email">Email: </label>
            <input
                class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="email" id="email" name="email"><br>
            @error('email')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
            <label class="w-20 inline-block" for="password">Password: </label>
            <input
                class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="password" id="password" name="password"><br>
            @error('password')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
            <button type="submit" class="bg-green-400 rounded p-2 text-white font-bold mt-2 ">Đăng ký</button>
        </form>
    </div>
@endsection
