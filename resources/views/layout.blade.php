<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>

</head>

<body>

    <head>
        <ul class="flex w-100vw justify-center space-x-4 mt-2 mb-2">
            @auth
                <li>{{ auth()->user()->email }}</li>

                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit" class="bg-green-400 rounded  text-white font-bold ">Đăng xuất</button>
                </form>
            @else
                <li>
                    <a class="bg-green-500 rounded p-2 text-white font-bold" href="/register">Đăng ký</a>
                </li>
                <li><a class="bg-green-500 rounded p-2 text-white font-bold" href="/login">Đăng nhập</a></li>
            @endauth
        </ul>
    </head>

    <main>
        @yield('body')
    </main>
</body>

</html>
