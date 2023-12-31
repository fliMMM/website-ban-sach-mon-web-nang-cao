<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/buttontop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/clients/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/css/slide.css') }}">
    @stack('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body class="relative">
    {{-- <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "110790918372700");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v18.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script> --}}

    <head>
        <div class="flex justify-content items-center h-5 bg-red-700">
            <i class="fa-brands fa-facebook-f ml-52 mr-6" style="color: #ffffff;"></i>
            <i class="fa-brands fa-instagram mr-6" style="color: #ffffff;"></i>
            <i class="fa-brands fa-youtube mr-6" style="color: #ffffff;"></i>
            <i class="fa fa-rss ml-40 mr-2" style="color: #ffffff;"></i>
            <marquee behavior="scroll" direction="left" class="w-96 text-white">
                Chào mừng bạn đến với NXB BookAM. Nếu bạn cần giúp đỡ, hãy liên hệ với chúng tôi qua hotline: (+84)
                1900571595 hoặc email: cskh_online@bookam.com.vn.
            </marquee>
        </div>
        <div class="flex w-100vw justify-around items-center pb-3 mt-3 border-b">
            <div class="lg:w-1/3 md:w-2/5 xl:w-[330px]">
                <div class="form-group w-[300px] flex md:w-[200px] lg:w-[260px]">
                    <input type="text" name="search" id="search" class="form-control h-6 rounded-0 "
                        placeholder="Tìm kiếm..." onfocus="this.value">
                    <button class="border-1  bg-red-600 text-white w-7  h-6" type="button">
                        <i class="fa fa-search "></i>
                    </button>
                </div>
                <div class="absolute z-10 w-[300px] md:w-[200px] lg:w-[260px]">
                    <div class="search_list">
                    </div>
                </div>
            </div>


            <a class="py-2" href="{{ route('home') }}"><img width="160px" src="{{ asset('assets/logo.png') }}"
                    alt="" class=""></a>

            <div class="flex justify-center items-center">
                @auth
                    @if (auth()->user()->isAdmin == 1)
                        <a href="/admin" class="no-underline text-black border p-2 bg-red-500">Admin</a>
                    @endif
                @endauth
                <ul class="flex w-100vw justify-between items-center space-x-4 mt-2 mb-2">
                    <a href="{{ route('cart') }}" class="text-black flex items-center"><i
                            class="fa-solid fa-bag-shopping fa-xl ml-3" style="color:red"></i></a>
                    <div id="countCartItem" style="margin-left: 0"> </div>
                    @auth
                        <div class="dropdown ">
                            <a class="btn d-flex border-0 items-center bg-white " href="#" role="button"
                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="flex items-center">
                                    <img src="{{ asset('assets/user.png') }}" alt=""
                                        class="w-10 h-10 rounded-circle">
                                    <p class="mt-1 mb-0 text-black font-normal">
                                        {{ auth()->user()->email }}
                                    </p>
                                </div>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item text-black" href="/account">Trang cá nhân</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-black" href="/account/bookRegistration">Đăng kí sách</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-black" href="/account/order/?tab=0">Theo dõi đơn hàng</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="/logout">
                                        @csrf
                                        <button type="submit" class=" h-[32px] px-3 py-1">Đăng xuất</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <li class="">
                            <a href="/register" class="text-secondary ml-3"> <i
                                    class="fa-regular fa-pen-to-square fa-xs"></i>Đăng ký</a>
                        </li>
                        <li><a href="/login" class="text-secondary ml-3"><i
                                    class="fa-solid fa-right-to-bracket fa-xs"></i>Đăng nhập</a></li>
                    @endauth
                </ul>

            </div>
        </div>
    </head>


    <main class=" min-h-screen">
        @yield('body')
    </main>

    <footer class="flex justify-center space-x-10 border-t p-10  mt-7">
        <div>
            <ul class="space-y-1">
                <li class="text-lg font-semibold uppercase mb-1">Dịch vụ</li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Điều khoản sử dụng</a>
                </li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Chính sách bảo mật</a>
                </li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Liên hệ</a>
                </li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Hệ thống nhà sách</a>
                </li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Tra cứu đơn hàng</a>
                </li>
            </ul>
        </div>
        <div>
            <ul>
                <li class="text-lg font-semibold uppercase mb-2">Hỗ trợ</li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Hướng dẫn đặt hàng</a>
                </li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Chính sách đổi trả - hoàn tiền</a>
                </li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Phương thức vận chuyển</a>
                </li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Chính sách khách háng mua sỉ</a>
                </li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Chính sách khách hàng cho trường học</a>
                </li>
            </ul>
        </div>
        <div class="w-60">
            <ul>
                <li class="text-lg font-semibold uppercase mb-2">Nhà xuất bản</li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Giám đốc: Bùi Tuấn Nghĩa</a>
                </li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Địa chỉ: Số 55 Quang Trung, Nguyễn Du,
                        Hai Bà Trưng,
                        Hà
                        Nội</a>
                </li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Số điện thoại: (+84) 1900571595 </a>
                </li>
                <li>
                    <a class="text-black text-sm no-underline" href="/">Email: bach@gmail.com</a>
                </li>
            </ul>
        </div>
        <div>
            <p class="text-lg font-semibold uppercase mb-2">Kết nối mạng xã hội</p>
            <ul class="flex space-x-3 pl-0 text-lg">

                <li>
                    <a class="text-red-600" target="__blank"
                        href="https://canvas.phenikaa-uni.edu.vn/login/canvas"><i
                            class="fa-brands fa-facebook-f"></i></a>
                </li>
                <li>
                    <a class="text-red-600" target="__blank"
                        href="https://canvas.phenikaa-uni.edu.vn/login/canvas"><i
                            class="fa-brands fa-youtube"></i></a>
                </li>
                <li>
                    <a class="text-red-600" target="__blank"
                        href="https://canvas.phenikaa-uni.edu.vn/login/canvas"><i
                            class="fa-brands fa-instagram"></i></a>
                </li>

            </ul>
        </div>
    </footer>

</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script>
    $(document).ready(function() {
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                url: "{{ URL::to('search') }}",
                type: "GET",
                data: {
                    'search': $value
                },
                success: function(data) {
                    console.log($value)
                    $('.search_list').html(data);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "/layout",
            type: "GET",
            success: function(response) {
                if (response.countCartItem > 0) {
                    // $('#countCartItem').text(response.countCartItem);
                    $('#countCartItem').html(
                        '<p class="text-white border rounded-full w-6 text-center bg-red-500" style="margin-left: 0" id ="count"></p>'
                    )
                    $('#count').text(response.countCartItem)
                }
            }
        });
    });
</script>

</html>
