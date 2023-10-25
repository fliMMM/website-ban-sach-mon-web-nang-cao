@extends('admin.adminLayout')
@section('title', 'Quản lí người dùng')
@section('adminBody')
    <p class="text-center text-4xl mt-4 font-bold">Quản lí người dùng</p>
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
    <div class="flex justify-center">
        <div class="w-full">
            <form action="{{ url('/admin/userManage/userDelete') }}" name="user" method="post">
                <table id="tableUser" class="table table-striped " style="width:88%;">
                    <thead>
                        <tr>
                            <th scope="col" id="checkbox"></th>
                            <th scope="col">Người dùng</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Loại</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            name ="checkboxConfirm[{{ $user->id }}]" id="checkboxConfirm">
                                    </div>
                                </td>
                                <td scope="row">{{ $user->email }}</td>
                                <td scope="row">{{ $user->created_at }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->status }}</td>
                                @if ($user->isAdmin == 1)
                                    <td>Admin</td>
                                @else
                                    <td>User</td>
                                @endif

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="bg-[#a9171d] w-5/6 p-3 flex items-center justify-between"
                    style="position: fixed; bottom: 0; right: 0">
                    <div class="flex items-center">
                        <div class="form-check ml-3 mt-1">
                            <input class="form-check-input" type="checkbox" value="" id="checkboxall"
                                onchange="checkall(this)">
                        </div>
                        <p class="mb-0 text-xl text-white">Chọn tất cả ({{ $userCount }})</p>
                        <button type="submit" class="ml-2 text-xl text-white" name="action" value="delete">Xoá</button>

                    </div>
                    <div class="flex items-center">
                        <p class="text-white mb-0 text-xl mr-2">Thay đổi quyền:</p>
                        <button type="submit" class="no-underline text-xl bg-red-400 w-[80px] p-2 text-white mr-4"
                            name="action" value="user">User</button>
                        <button type="submit" class="no-underline text-xl bg-red-400 w-[80px] p-2 text-white mr-4"
                            name="action" value="admin">Admin</button>
                    </div>

                    <button type="submit" class="no-underline text-xl bg-red-400 p-2 text-white mr-4" name="action"
                        value="unban">Huỷ Chặn</button>
                    <button type="submit" class="no-underline text-xl bg-red-400 p-2 text-white mr-4" name="action"
                        value="ban" id="confirm">Chặn tài khoản</button>
                    @csrf
                </div>
            </form>
        </div>
    </div>
    <script>
        let table = new DataTable('#tableUser', {
            "language": {
                "search": "Tìm kiếm",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Sau",
                    "previous": "Trước"
                },
            },
            "pageLength": 15
        });
    </script>
    <script>
        var checkboxs = document.querySelectorAll("#checkboxConfirm")
        var checkboxall = document.getElementById("checkboxall")
        var count = 0;

        function checkall(checkboxall) {
            if (checkboxall.checked == true) {
                console.log('hihi')
                checkboxs.forEach(function(checkbox) {
                    checkbox.checked = true;
                    count = checkboxs.length
                })

            } else {
                checkboxs.forEach(function(checkbox) {
                    checkbox.checked = false
                })
            }
        }
        document.addEventListener("DOMContentLoaded", () => {
            checkboxs.forEach(function(check) {
                check.addEventListener('change', (event) => {
                    if (check.checked == false) {
                        count = count - 1;
                        checkboxall.checked = false;
                        console.log(checkboxall.checked)
                        console.log(count)
                    }
                    if (check.checked == true) {
                        count = count + 1;
                    }
                    if (count == checkboxs.length) {
                        checkboxall.checked = true;
                    }
                    console.log(count)
                })
            })
        });
    </script>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
