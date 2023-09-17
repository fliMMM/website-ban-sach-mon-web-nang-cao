@extends('layout')

@section('body')
    <div class=" w-screen h-screen pt-2 flex justify-center">


        <form method="POST" action="/users/login">
            @csrf
            <label class="w-20 inline-block" for="email">Email: </label>
            <input
                class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="email" id="email" name="email"><br>
            <label class="w-20 inline-block" for="password">Password: </label>
            <input
                class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="password" id="password" name="password"><br>

            <button type="submit" class="bg-green-400 rounded p-2 text-white font-bold mt-2">Đăng nhập</button>
        </form>
    </div>
@endsection
