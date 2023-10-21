@extends('layout')
@section('body')
    <div class="">
        <div class="m-4">
            <h3 class="text-center">Danh sách đăng ký sách</h3>
            <div class="flex mt-10 justify-items-start">
                <x-menubar title="Danh sách đăng ký sách"/>    
                <div class="ml-8 w-3/5">
                    <p class="text-xl font-semibold">Danh sách đăng ký sách</p>
                    <div class="mt-6">
                        <table class="table mt-2">
                            <thead class="thead-dark" style="background-color: red">
                                <tr>
                                    <th scope="col">Tên sách</th>
                                    <th scope="col">Tác giả</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Trạng thái</th>
                                </tr>
                            </thead>
                            @foreach ($bookregistrations as $bookregistration)
                                <tbody>
                                    <tr>
                                        <td scope="row">{{ $bookregistration->name }}</td>
                                        <td>{{ $bookregistration->author }}</td>
                                        <td>{{ $bookregistration->quantity }}</td>
                                        <td>
                                            <div class="flex items-center">
                                                <img style="width: 20px; height: 20px" src="https://img.icons8.com/ios-glyphs/30/timer.png" alt="timer"/>
                                                <p class="mb-0 ml-1">{{ $bookregistration->status }}</p>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="mt-8">
                        <span>Đăng ký sách ngay</span>
                        <a href="/account/bookRegistration">Tại đây</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
