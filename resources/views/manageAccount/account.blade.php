@extends('layout')
@section('body')
    <div class="">
        <div class="m-4">
            <h3 class="text-center">Hồ sơ cá nhân</h3>
            <div class="flex mt-10 justify-items-start">
                <x-menubar title="Hồ Sơ" />
                <div class="ml-8 w-3/5">
                    <div class="ml-4 border-b">
                        <p class="text-2xl mb-2">Hồ sơ của tôi</p>
                        <p class="">Quản lí thông tin hồ sơ để bảo mật tài khoản</p>
                    </div>
                    @if (Session::has('message'))
                        <script>
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: '{{ Session::get('message') }}',
                                showConfirmButton: true,
                                timer: 4000
                            })
                        </script>
                    @endif
                    <div class="border-b pb-4">
                        <div class="ml-24 mt-6 w-3/5">
                            <form action="" method="post">
                                <div class="input-group" style="display: flex; align-items: center">
                                    <div class="mr-4 w-24 flex justify-end">
                                        <span id="basic-addon1">Họ Tên</span>
                                    </div>
                                    <input type="text" class="form-control" style="border-radius:0" name="username"
                                        placeholder="Username" value="{{ $user[0]->name }}">
                                </div>
                                @error('username')
                                    <p class="mb-0 text-red-400 ml-28">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <div class="input-group mt-3" style="display: flex; align-items: center">
                                    <div class="mr-4 w-24 flex justify-end">
                                        <span id="basic-addon1">Email</span>
                                    </div>
                                    <input type="text" class="form-control" style="border-radius:0" placeholder="email"
                                        name="email" value="{{ $user[0]->email }}">
                                </div>
                                @error('email')
                                    <p class="mb-0 text-red-400 ml-28 ">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <div class="input-group mt-3" style="display: flex; align-items: center">
                                    <div class="mr-4 w-24 flex justify-end">
                                        <span id="basic-addon1">Số điện thoại</span>
                                    </div>
                                    <input type="text" class="form-control" style="border-radius:0"
                                        placeholder="Số điện thoại" name="phone" value="{{ $user[0]->phone }}">
                                </div>
                                @error('phone')
                                    <p class="text-red-400 ml-28">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <div class="flex mt-3">
                                    <div class="mr-4  w-24 flex justify-end">
                                        <span>Giới tính</span>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" name="gender" id="genderM"
                                            value="Nam" {{ $user[0]->gender == 'Nam' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="genderM"> Nam </label>
                                    </div>
                                    <div class="form-check mr-3">
                                        <input class="form-check-input" type="radio" name="gender" id="genderF"
                                            value="Nữ" {{ $user[0]->gender == 'Nữ' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="genderF"> Nữ </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gender" id="genderI"
                                            value="Khác" {{ $user[0]->gender == 'Khác' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="genderI"> Khác </label>
                                    </div>
                                </div>
                                @error('gender')
                                    <p class="mb-0 text-red-400 ml-28 ">
                                        {{ $message }}
                                    </p>
                                @enderror
                                <button class="ml-10 mt-8 w-[70px] h-[40px] bg-red-700 text-white"
                                    type="submit">Lưu</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
