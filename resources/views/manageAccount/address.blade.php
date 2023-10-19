@extends('layout')
@section('body')
    @push('css')
        <link href="{{ asset('/css/input.css') }}" rel="stylesheet" />
    @endpush
    <div class="">
        <div class="m-4">
            <h3 class="text-center">Địa Chỉ</h3>
            <div class="flex mt-10 justify-items-start">
                <div class="ml-36 border-r-[1px] border-gray-300">
                    <ul>
                        <li class=" w-[240px] h-14 p-3 border-b-[1px]  border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs"></i></span>
                                <span class="">Hồ Sơ</span>
                            </a>
                        </li>
                        <li class="p-3 h-14 border-b-[1px] bg-[#f7f3eb] border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color:aqua"></i></span>
                                <span class="">Địa chỉ</span>
                            </a>
                        </li>
                        <li class=" p-3 h-14 border-b-[1px]  border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color:red"></i></span>
                                <span class="">Đổi mật khẩu</span>
                            </a>
                        </li>
                        <li class="p-3 h-14 border-b-[1px] border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color:blue"></i></span>
                                <span class="">ListRegisterBook</span>
                            </a>
                        </li>
                        <li class="p-3 h-14 border-b-[1px] border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color: bisque"></i></span>
                                <span class="">Membership</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="ml-8 w-3/5">
                    <div class="flex justify-between border-b pb-4">
                        <p class="text-xl pt-3">Địa chỉ của tôi</p>
                        <div class="flex bg-red-700 items-center">
                            <i class="fa-solid fa-plus pl-2" style="color: white"></i>
                            <button class="p-2 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Thêm địa
                                chỉ mới</button>
                        </div>
                    </div>
                    <div>
                        <p class="mt-4">Địa chỉ</p>
                        <div class="flex justify-between">
                            <div>
                                <div class="flex h-[30px]">
                                    <p class="border-r pr-2 border-black">Lê Đức</p>
                                    <p class="ml-2 text-[#757575]">0326428199</p>
                                </div>
                                <div class="mb-0">
                                    <p class="mb-0 text-[#757575]">Số 01 đường Hai Bà Trưng</p>
                                </div>
                                <div class="flex ">
                                    <p class="text-[#757575] mr-1.5">Phường Đại Mỗ</p>
                                    <p class="text-[#757575] mr-1.5">Quận Nam Từ Liêm</p>
                                    <p class="text-[#757575]">Hà Nội</p>
                                </div>
                            </div>
                            <div class="columns-1">
                                <button class="ml-10 mb-3 text-[#84D0FF]">Cập nhật</button>
                                <button class="text-[#84D0FF]">Xoá</button>
                                <div class="border border-black pl-2 pr-2">
                                    <button>Thiết lập mặc định</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <form action="" method="post">
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true" style="top: 20%" data-bs-backdrop="static">
                                <div class="modal-dialog modal-fullscreen-sm-down">
                                    <div class="modal-content" style="width: 560px">
                                        <div class="modal-body">
                                            <h5 class="modal-title" id="exampleModalLabel">Địa chỉ mới</h5>
                                            <div class="flex justify-between mt-2">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="name" value=""
                                                        placeholder="name@example.com" style="border-radius: 0">
                                                    <label for="floatingInput">Họ và tên</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="phone"
                                                        placeholder="name@example.com" style="border-radius: 0">
                                                    <label for="floatingInput">Số điện thoại</label>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex justify-between items-center">
                                                    <select class="form-select form-select-base mb-3" id="city" name="city"
                                                        aria-label=".form-select-sm" style="width: 170px; height: 50px">
                                                        <option value="" selected>Chọn tỉnh thành</option>
                                                    </select>
                                                    <select class="form-select form-select-base mb-3" id="district" name="district"
                                                        aria-label=".form-select-sm" style="width: 170px; height: 50px">
                                                        <option value="" selected>Chọn quận huyện</option>
                                                    </select>
                                                    <select class="form-select form-select-base mb-3" id="ward" name="village"
                                                        style="width: 170px; height: 50px">
                                                        <option value="" selected>Chọn phường xã</option>
                                                    </select>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="locationSpecific" value=""
                                                        placeholder="name@example.com" style="border-radius: 0">
                                                    <label for="floatingInput">Địa chỉ cụ thể</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Trở
                                                lại</button>
                                            <button type="submit" class="btn btn-primary">Hoàn thành</button>
                                            @csrf
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>      
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            console.log(result.data)
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name);
            }
            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Name === this.value);

                    for (const k of result[0].Districts) {
                        district.options[district.options.length] = new Option(k.Name);
                    }
                }
            };
            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Name === citis.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name);
                    }
                }
            };
        }
    </script>
@endsection
