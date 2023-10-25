@extends('layout')
@section('body')
    @push('css')
        <link href="{{ asset('/css/input.css') }}" rel="stylesheet" />
    @endpush
    <div class="">
        <div class="m-4">
            <h3 class="text-center">Địa Chỉ</h3>
            <div class="flex mt-10 justify-items-start">
                <x-menubar title="Địa Chỉ" />
                <div class="ml-8 w-3/5">
                    <div class="flex justify-between border-b pb-1">
                        <p class="text-lg font-semibold pt-3">Địa chỉ của tôi</p>
                        <div class="flex bg-red-700 h-[40px] items-center">
                            <i class="fa-solid fa-plus pl-2" style="color: white"></i>
                            <button class="p-2 text-white" data-bs-toggle="modal" data-bs-target="#addAddress">Thêm địa
                                chỉ mới</button>
                        </div>
                    </div>
                    <div>
                        <p class="text-lg font-semibold mt-2 ">Địa chỉ</p>
                        @foreach ($address as $adr)
                            <div class="flex justify-between border-b mt-3 items-center">
                                <div class="mt-3">
                                    <div class="flex h-[30px]">
                                        <p class="border-r h-[20px] pr-2 border-black">{{ $adr->name }}</p>
                                        <p class="ml-2 text-[#757575]">{{ $adr->phone }}</p>
                                    </div>
                                    <div class="mb-0 h-[30px]">
                                        <p class="mb-0 text-[#757575]">{{ $adr->locationSpecific}}</p>
                                    </div>
                                    <div class="flex h-[30px]">
                                        <p class="text-[#757575] mr-1.5">{{ $adr->city }},</p>
                                        <p class="text-[#757575] mr-1.5">{{ $adr->district}},</p>
                                        <p class="text-[#757575]">{{ $adr->village }}</p>
                                    </div>
                                    @if ($adr ->isDefault == 1)
                                    <p class="text-center border text-red-500 w-[80px]" style="border-color: red !important">Mặc định</p>
                                @endif
                                </div>
                                <div class="columns-1">
                                    <button type="button" class="ml-10 mb-3 text-red-700 font-bold" id="editAddress"
                                        value="{{ $adr->id }}">Cập nhật</button>
                                    <button class="text-red-700 font-bold ml-2" value="{{ $adr->id }}"
                                        id="deleteAddress">Xoá</button>
                                        @if ($adr ->isDefault == 1)
                                        <div class="border border-black pl-2 pr-2 bg-white">
                                            <button class="mb-0 text-[#A2A2A2]" disabled>Thiết lập mặc định</button>
                                        </div>
                                        @else
                                        <div class="border border-black pl-2 pr-2">
                                            <a href="address/checkDefault/{{$adr->id}}" class= "no-underline text-black" id ="setDefault" value="{{$adr->id}}">Thiết lập mặc định</a>
                                        </div>
                                        @endif
                                  
                                </div>

                            </div>
                        @endforeach
                    </div>
                    {{-- Add Modal --}}
                    <div>
                        <form action="{{ url('/account/address/addAddress') }}" method="post">
                            <div class="modal fade" id="addAddress" tabindex="-1" aria-hidden="true" style="top: 20%"
                                data-bs-backdrop="static">
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
                                            @error('name')
                                            <p class="text-red-400 ml-28 mb-0">
                                                {{ $message }}
                                            </p>
                                             @enderror
                                            <div>
                                                <div class="flex justify-between items-center">
                                                    <select class="form-select form-select-base mb-3" id="city"
                                                        name="city" aria-label=".form-select-sm"
                                                        style="width: 170px; height: 50px">
                                                        <option value="" selected>Chọn tỉnh thành</option>
                                                    </select>
                                                    <select class="form-select form-select-base mb-3" id="district"
                                                        name="district" aria-label=".form-select-sm"
                                                        style="width: 170px; height: 50px">
                                                        <option value="" selected>Chọn quận huyện</option>
                                                    </select>
                                                    <select class="form-select form-select-base mb-3" id="ward"
                                                        name="village" style="width: 170px; height: 50px">
                                                        <option value="" selected>Chọn phường xã</option>
                                                    </select>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="locationSpecific"
                                                        value="" placeholder="name@example.com"
                                                        style="border-radius: 0">
                                                    <label for="floatingInput">Địa chỉ cụ thể</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href = "" class="btn btn-secondary" data-bs-dismiss="modal">Trở
                                                lại</a>
                                            <button type="submit" class="btn btn-primary">Hoàn thành</button>
                                            @csrf
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- End add Modal --}}
                    {{-- Edit Modal --}}
                    <div>
                        <form action="{{ url('/account/address/updateAddress') }}" method="post">
                            <div class="modal fade" id="edit-address" tabindex="-1" aria-hidden="true"
                                style="top: 20%" data-bs-backdrop="static">
                                <div class="modal-dialog modal-fullscreen-sm-down">
                                    <div class="modal-content" style="width: 560px">
                                        <div class="modal-body">
                                            <h5 class="modal-title" id="exampleModalLabel">Địa chỉ mới</h5>
                                            <div class="flex justify-between mt-2">
                                                <input type="hidden" name = "idAddress" id ="idAddress" value="">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="name"
                                                        id="name" value="" placeholder="name@example.com"
                                                        style="border-radius: 0">
                                                    <label for="floatingInput">Họ và tên</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="phone"
                                                        id="phone" placeholder="name@example.com"
                                                        style="border-radius: 0">
                                                    <label for="floatingInput">Số điện thoại</label>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="flex justify-between items-center">
                                                    <select class="form-select form-select-base mb-3" id="city2"
                                                        name="city" aria-label=".form-select-sm"
                                                        style="width: 170px; height: 50px">
                                                        <option value="" selected>Chọn tỉnh thành</option>
                                                    </select>
                                                    <select class="form-select form-select-base mb-3" id="district2"
                                                        name="district" aria-label=".form-select-sm"
                                                        style="width: 170px; height: 50px">
                                                        <option value="" selected>Chọn quận huyện</option>
                                                    </select>
                                                    <select class="form-select form-select-base mb-3" id="ward2"
                                                        name="village" style="width: 170px; height: 50px">
                                                        <option value="" selected>Chọn phường xã</option>
                                                    </select>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="locationSpecific"
                                                        id="locationSpecific" value=""
                                                        placeholder="name@example.com" style="border-radius: 0">
                                                    <label for="floatingInput">Địa chỉ cụ thể</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a href = "" class="btn btn-secondary" data-bs-dismiss="modal">Trở
                                                lại</a>
                                            <button type="submit" class="btn btn-primary">Hoàn thành</button>
                                            @csrf
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- End Edit Modal --}}
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script>
        var citis = document.getElementById("city");
        var citis2 = document.getElementById("city2");
        var districts = document.getElementById("district");
        var districts2 = document.getElementById("district2");
        var wards = document.getElementById("ward");
        var wards2 = document.getElementById("ward2");
        console.log(citis2.value)
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name);
                citis2.options[citis2.options.length] = new Option(x.Name);
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
            citis2.onchange = function() {
                district.length = 1;
                ward.length = 1;
                const result = data.filter(n => n.Name === this.value);
                if (this.value != "") {
                    for (const k of result[0].Districts) {
                        district2.options[district2.options.length] = new Option(k.Name);
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
            district2.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Name === citis2.value);
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards2.options[wards2.options.length] = new Option(w.Name);
                    }
                }
            };
        }
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#editAddress', function() {
                $idAddress = $(this).val();
                console.log($idAddress)
                $('#edit-address').modal('show');
                $.ajax({
                    url: "address/editAddress/" + $idAddress,
                    type: "GET",
                    success: function(response) {
                        $('#name').val(response.address.name)
                        $('#phone').val(response.address.phone)
                        $('#city2').val(response.address.city)
                        $('#district2').val(response.address.district)
                        $('#ward2').val(response.address.village)
                        $('#locationSpecific').val(response.address.locationSpecific)
                        $('#idAddress').val($idAddress)
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#deleteAddress', function(e) {
                e.preventDefault();
                $idAddress = $(this).val();
                console.log($idAddress)
                Swal.fire({
                    title: 'Bạn có chắc muốn xoá địa chỉ này',
                    text: "Thao tác sẽ không thể khôi phục!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xoá'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "address/deleteAddress/" + $idAddress,
                            success: function(response) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Địa chỉ đã được xoá',
                                    showConfirmButton: true,
                                    timer: 2000
                                }).then((confirmed)=>{
                                    // console.log(window.location)
                                    window.location.reload();
                                })
                               
                            }
                        });

                    }
                })
            });
        });
    </script>
@endsection
