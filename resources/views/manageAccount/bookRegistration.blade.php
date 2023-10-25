@extends('layout')
@section('title', 'Đăng ký sách')
@section('body')
    <div class="">
        <div class="m-4">
            <h3 class="text-center">Đăng ký sách</h3>
            <div class="flex mt-10 justify-items-start">
                <x-menubar title="Đăng ký sách" />
                <div class="ml-8 w-3/5">
                    <div>
                        <p>Đăng ký sách</p>
                        <p>Điền thông tin sách yêu cầu để cửa hàng có thể cập nhật cho bạn</p>
                        <span>Xem tình trạng sách đăng ký:</span>
                        <a href="/account/listBookReg">Tại đây</a>
                    </div>
                    <div class="mt-4">
                        <form action="{{ url('account/bookRegistration/addBookRegistration') }}" method="post">
                            <div class="input-group " style="display: flex; align-items: center">
                                <div class="mr-4 w-24 flex justify-end">
                                    <span id="basic-addon1">Tên sách</span>
                                </div>
                                <input type="text" class="form-control" style="border-radius:0" placeholder="Tên sách"
                                    value="{{ old('name') ?? '' }}" name="name">
                            </div>
                            @error('name')
                                <p class="text-red-400 ml-28 mb-0">
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="input-group mt-3" style="display: flex; align-items: center">
                                <div class="mr-4 w-24 flex justify-end">
                                    <span id="basic-addon1">Tác giả</span>
                                </div>
                                <input type="text" class="form-control" value="{{ old('author') ?? '' }}"
                                    style="border-radius:0" placeholder="Tác giả" name="author">
                            </div>
                            @error('author')
                                <p class="text-red-400 ml-28 mb-0">
                                    {{ $message }}
                                </p>
                            @enderror
                            <div class="input-group mt-3" style="display: flex; align-items: center">
                                <div class="mr-4 w-24 flex justify-end">
                                    <span id="basic-addon1">Số lượng</span>
                                </div>
                                <input type="text" class="form-control" value="{{ old('quantity') ?? '' }}"
                                    style="border-radius:0" placeholder="Số lượng" name="quantity">
                            </div>
                            @error('quantity')
                                <p class="text-red-400 ml-28 mb-0">
                                    {{ $message }}
                                </p>
                            @enderror
                            <button class="ml-10 mt-4 w-[100px] h-[40px] bg-red-700 text-white" id="save"
                                type="submit">Lưu</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
@endsection
