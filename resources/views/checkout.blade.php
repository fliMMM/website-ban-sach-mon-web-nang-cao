@extends('layout')

@section('body')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      /* width */
    div::-webkit-scrollbar {
        width: 5px;
        
    }

    /* Track */
    div::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    div::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px
    }

    /* Handle on hover */
    div::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    </style>
    <title>Document</title>
</head>
<body>
<main class=" w-full h-screen flex lg:justify-center items-center flex-col lg:flex-row">
    <div class=" h-full space-y-5 pt-10">
        <h1 class="text-3xl font-semibold">Nhà xuất bản Kim Đồng</h1>
        <h3 class="font-semibold">Thông tin thanh toán</h3>
        <div class="flex items-center">
            <i class="fa-regular fa-user text-white  bg-gray-300 p-3 rounded-md mr-2"></i>
            <div class="flex flex-col items-start">
                <p class="text-sm text-gray-500">Back (bachkame@gmail.com)</p>
                <button class="text-blue-500 text-sm">Đăng xuất</button>
            </div>
        </div>

        <form action="" class="flex flex-col ">
            @csrf
            <input placeholder="Địa chỉ nhận hàng" value="{{ old('address') }}"
                    class="w-[500px] rounded-md appearance-none mb-3 border py-2 px-3 text-gray-700 leading-tight focus:border-gray-500 focus:outline-none"
                    type="text" id="address" name="address">
            <input placeholder="Số điện thoại" value="{{ old('phone_number') }}"
                    class="w-[500px] mb-3 rounded-md appearance-none border py-2 px-3 text-gray-700 leading-tight focus:border-gray-500 focus:outline-none"
                    type="text" id="phone_number" name="phone_number">

                    <select id="payment_method" class=" w-[500px] border rounded-md py-[6px] px-3" name="payment_method" id="payment_method">
                        <option value="label">Phương thức thanh toán</option>
                        <option value="cod">COD</option>
                        <option value="QR">QR Code</option>
                    </select>
            
                    <img id="qr_image" class="hidden" width="200px" height="200px" src="https://img.freepik.com/premium-vector/qr-code-sample-smartphone-scanning-qr-code-icon-flat-design-stock-vector-illustration_550395-108.jpg" alt="qr code">
            <button class="bg-blue-500 w-[500px]  mb-3 rounded-md py-2 mt-3 text-white">Đặt hàng</button>
            <a class="text-blue-500" href="/cart">Giỏ hàng</a>
        </form>

    </div>

    {{-- right side --}}
    <div class="lg:border-l pt-5 h-screen lg:pl-7 lg:ml-7">
        <div class="max-h-80 lg:max-h-full lg:h-2/4 overflow-y-auto pt-5 pr-5">
            <div class="flex items-center space-x-3 mb-4">
                <div class="flex items-center space-x-2 relative">
                    <p class="absolute text-xs top-[-10px] left-[47px] z-10 bg-gray-400 text-white rounded-full w-5 h-5 flex items-center justify-center"><span>5</span></p>
                    <img width="50px" height="50px" src="https://firebasestorage.googleapis.com/v0/b/wibu-image.appspot.com/o/images%2F1652758019517THA%CC%81M%20TU%CC%9B%CC%89%20LU%CC%9B%CC%80NG%20DANH%20CONAN%20-%20TIE%CC%82%CC%89U%20THUYE%CC%82%CC%81T%20-%20HOA%20HU%CC%9BO%CC%9B%CC%81NG%20DU%CC%9BO%CC%9BNG%20TRONG%20BIE%CC%82%CC%89N%20LU%CC%9B%CC%89A.png?alt=media&token=3c9c29cc-80b4-468a-b127-1627f43f1974" alt="photo">
                    <p class="text-xs w-64 line-clamp-2">THÁM TỬ LỪNG DANH CONAN - TIỂU THUYẾT - HOA HƯỚNG DƯƠNG TRONG BIỂN LỬA</p>
                </div>
                <p class="text-sm">49.500đ</p>
            </div>
            <div class="flex items-center space-x-3 mb-4">
                <div class="flex items-center space-x-2 relative">
                    <p class="absolute text-xs top-[-10px] left-[47px] z-10 bg-gray-400 text-white rounded-full w-5 h-5 flex items-center justify-center"><span>5</span></p>
                    <img width="50px" height="50px" src="https://firebasestorage.googleapis.com/v0/b/wibu-image.appspot.com/o/images%2F1652758019517THA%CC%81M%20TU%CC%9B%CC%89%20LU%CC%9B%CC%80NG%20DANH%20CONAN%20-%20TIE%CC%82%CC%89U%20THUYE%CC%82%CC%81T%20-%20HOA%20HU%CC%9BO%CC%9B%CC%81NG%20DU%CC%9BO%CC%9BNG%20TRONG%20BIE%CC%82%CC%89N%20LU%CC%9B%CC%89A.png?alt=media&token=3c9c29cc-80b4-468a-b127-1627f43f1974" alt="photo">
                    <p class="text-xs w-64 line-clamp-2">THÁM TỬ LỪNG DANH CONAN - TIỂU THUYẾT - HOA HƯỚNG DƯƠNG TRONG BIỂN LỬA</p>
                </div>
                <p class="text-sm">49.500đ</p>
            </div>
            <div class="flex items-center space-x-3 mb-4">
                <div class="flex items-center space-x-2 relative">
                    <p class="absolute text-xs top-[-10px] left-[47px] z-10 bg-gray-400 text-white rounded-full w-5 h-5 flex items-center justify-center"><span>5</span></p>
                    <img width="50px" height="50px" src="https://firebasestorage.googleapis.com/v0/b/wibu-image.appspot.com/o/images%2F1652758019517THA%CC%81M%20TU%CC%9B%CC%89%20LU%CC%9B%CC%80NG%20DANH%20CONAN%20-%20TIE%CC%82%CC%89U%20THUYE%CC%82%CC%81T%20-%20HOA%20HU%CC%9BO%CC%9B%CC%81NG%20DU%CC%9BO%CC%9BNG%20TRONG%20BIE%CC%82%CC%89N%20LU%CC%9B%CC%89A.png?alt=media&token=3c9c29cc-80b4-468a-b127-1627f43f1974" alt="photo">
                    <p class="text-xs w-64 line-clamp-2">THÁM TỬ LỪNG DANH CONAN - TIỂU THUYẾT - HOA HƯỚNG DƯƠNG TRONG BIỂN LỬA</p>
                </div>
                <p class="text-sm">49.500đ</p>
            </div>
            <div class="flex items-center space-x-3 mb-4">
                <div class="flex items-center space-x-2 relative">
                    <p class="absolute text-xs top-[-10px] left-[47px] z-10 bg-gray-400 text-white rounded-full w-5 h-5 flex items-center justify-center"><span>5</span></p>
                    <img width="50px" height="50px" src="https://firebasestorage.googleapis.com/v0/b/wibu-image.appspot.com/o/images%2F1652758019517THA%CC%81M%20TU%CC%9B%CC%89%20LU%CC%9B%CC%80NG%20DANH%20CONAN%20-%20TIE%CC%82%CC%89U%20THUYE%CC%82%CC%81T%20-%20HOA%20HU%CC%9BO%CC%9B%CC%81NG%20DU%CC%9BO%CC%9BNG%20TRONG%20BIE%CC%82%CC%89N%20LU%CC%9B%CC%89A.png?alt=media&token=3c9c29cc-80b4-468a-b127-1627f43f1974" alt="photo">
                    <p class="text-xs w-64 line-clamp-2">THÁM TỬ LỪNG DANH CONAN - TIỂU THUYẾT - HOA HƯỚNG DƯƠNG TRONG BIỂN LỬA</p>
                </div>
                <p class="text-sm">49.500đ</p>
            </div>
            <div class="flex items-center space-x-3 mb-4">
                <div class="flex items-center space-x-2 relative">
                    <p class="absolute text-xs top-[-10px] left-[47px] z-10 bg-gray-400 text-white rounded-full w-5 h-5 flex items-center justify-center"><span>5</span></p>
                    <img width="50px" height="50px" src="https://firebasestorage.googleapis.com/v0/b/wibu-image.appspot.com/o/images%2F1652758019517THA%CC%81M%20TU%CC%9B%CC%89%20LU%CC%9B%CC%80NG%20DANH%20CONAN%20-%20TIE%CC%82%CC%89U%20THUYE%CC%82%CC%81T%20-%20HOA%20HU%CC%9BO%CC%9B%CC%81NG%20DU%CC%9BO%CC%9BNG%20TRONG%20BIE%CC%82%CC%89N%20LU%CC%9B%CC%89A.png?alt=media&token=3c9c29cc-80b4-468a-b127-1627f43f1974" alt="photo">
                    <p class="text-xs w-64 line-clamp-2">THÁM TỬ LỪNG DANH CONAN - TIỂU THUYẾT - HOA HƯỚNG DƯƠNG TRONG BIỂN LỬA</p>
                </div>
                <p class="text-sm">49.500đ</p>
            </div>

            <div class="flex items-center space-x-3 mb-4">
                <div class="flex items-center space-x-2 relative">
                    <p class="absolute text-xs top-[-10px] left-[47px] z-10 bg-gray-400 text-white rounded-full w-5 h-5 flex items-center justify-center"><span>5</span></p>
                    <img width="50px" height="50px" src="https://firebasestorage.googleapis.com/v0/b/wibu-image.appspot.com/o/images%2F1652758019517THA%CC%81M%20TU%CC%9B%CC%89%20LU%CC%9B%CC%80NG%20DANH%20CONAN%20-%20TIE%CC%82%CC%89U%20THUYE%CC%82%CC%81T%20-%20HOA%20HU%CC%9BO%CC%9B%CC%81NG%20DU%CC%9BO%CC%9BNG%20TRONG%20BIE%CC%82%CC%89N%20LU%CC%9B%CC%89A.png?alt=media&token=3c9c29cc-80b4-468a-b127-1627f43f1974" alt="photo">
                    <p class="text-xs w-64 line-clamp-2">THÁM TỬ LỪNG DANH CONAN - TIỂU THUYẾT - HOA HƯỚNG DƯƠNG TRONG BIỂN LỬA</p>
                </div>
                <p class="text-sm">49.500đ</p>
            </div>
        
        </div>
        <form class="mt-10 border-t border-b pt-3 pb-2 space-x-2 w-full">
            @csrf
            <input placeholder="Mã giảm giá" value="{{ old('voucher') }}"
            class="w-[calc(100%-130px)] mb-2 rounded-md appearance-none border py-2 px-3 text-gray-700 leading-tight focus:border-gray-500 focus:outline-none"
            type="text" id="voucher" name="voucher">

            <button class="p-[6px] w-[100px] bg-blue-500 text-white rounded-md">Sử dụng</button>
        </form>

        <div class="mt-5 text-md space-y-2 font-bold">
            <div class="flex justify-between">
                <p>Tạm tính</p>
                <p>100.000.000đ</p>
            </div>
            <div class="flex justify-between">
                <p>Phí ship</p>
                <p>100.000.000đ</p>
            </div>
        </div>

        <div class="flex justify-between border-t mt-5 pt-3 font-bold mb-10">
            <p>Tổng tiền</p>
            <p>1000.000.000đ</p>
        </div>
    </div>
</main>
</body>
<script>
    const paymentOption = document.getElementById('payment_method');
    const qr_image = document.getElementById('qr_image');

    paymentOption.addEventListener('change', (e)=>{
        if(e.target.value === 'QR'){
            qr_image.style.display = 'block'
        }else{
            qr_image.style.display = 'none'
        }
    })
</script>
</html>
@endsection

