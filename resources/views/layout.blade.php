<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title> 
    <link rel="stylesheet" href="{{asset('assets/clients/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <head>
        <div class="flex justify-content items-center h-5 bg-red-700">
            <i class="fa-brands fa-facebook-f ml-32 mr-6" style="color: #ffffff;"></i>
            <i class="fa-brands fa-instagram mr-6" style="color: #ffffff;"></i>
            <i class="fa-brands fa-youtube mr-6" style="color: #ffffff;"></i>
            <i class="fa fa-rss ml-20 mr-2" style="color: #ffffff;"></i>
            <marquee behavior="scroll" direction="left" class="w-96 text-white" >
             
                    Chào mừng bạn đến với NXB KIM ĐỒNG. Nếu bạn cần giúp đỡ, hãy liên hệ với chúng tôi qua hotline: (+84) 1900571595 hoặc email: cskh_online@nxbkimdong.com.vn.
               
            </marquee>
        </div>
        <div class="flex w-100vw justify-around items-center mb-2">
               <div>
                <div class="input-group" >
                    <input type="text" class="form-control h-6" >
                        <button class="border-1  bg-red-600 text-white w-7  h-6" type="button" >
                            <i class="fa fa-search "></i>         
                          </button>
                  </div>
               </div>
        <img src="https://theme.hstatic.net/200000343865/1001052087/14/logo.png?v=320" alt="">
        <div class="flex justify-center "> 
            <ul class="flex w-100vw justify-between items-center space-x-4 mt-2 mb-2" >   
                @auth
                    <li>{{ auth()->user()->email }}</li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="">Đăng xuất</button>
                    </form>
                @else
                    <li class="">
                        <a href="/register" class="text-secondary ml-3"> <i class="fa-regular fa-pen-to-square fa-xs"></i>Đăng ký</a>
                    </li> 
                    <li><a href="/login" class="text-secondary ml-3"><i class="fa-solid fa-right-to-bracket fa-xs"></i>Đăng nhập</a></li>
                @endauth
            </ul>
            <button>
                <i class="fa-regular fa-heart fa-xl ml-3 " ></i>
            </button>
                <button>
                    <i class="fa-solid fa-bag-shopping fa-xl ml-3"></i>
                </button>
          </div>
    </div>
    </head>
    <main>
        @yield('body')
    </main>
    <script src="{{asset('assets/clients/js/bootstrap.min.js')}}"></script>
</body>

</html>
