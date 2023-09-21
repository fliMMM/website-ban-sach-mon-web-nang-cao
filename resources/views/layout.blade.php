<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

                    <button class="btn btn-primary" data-bs-target="#loginModal" data-bs-toggle="modal">Open first
                        modal</button>

                </li>
                <li><button class="btn btn-primary" data-bs-target="#registerModal" data-bs-toggle="modal">Open first
                        modal</button></li>
            @endauth
        </ul>
    </head>

    <main>
        @yield('body')
        <x-register />
        <x-login />

    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<script>
    // var myModal = new bootstrap.Modal(document.getElementById('loginModal'), {})
    // myModal.toggle()
</script>

</html>
