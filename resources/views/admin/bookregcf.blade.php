@extends('admin.adminLayout')
@section('title', 'Yêu cầu sách')
@section('adminBody')
    <p class="text-center mt-4 text-4xl font-bold">Sách đăng ký chờ duyệt</p>
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
    <form action="{{ url('/admin/bookReg/confirm') }}" method="post">
        <table class="table mt-4" id="tablebookregcf">
            <thead class="thead-dark" style="background-color: red">
                <tr>
                    <th></th>
                    <th scope="col">Người dùng</th>
                    <th scope="col">Tên sách</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Trạng thái</th>
                </tr>
            </thead>
            @foreach ($bookRegs as $bookReg)
                @foreach ($users as $user)
                    @if ($user->id == $bookReg->userId)
                        <?php $email = $user->email;
                        ?>
                    @endif
                @endforeach
                <tbody>
                    <tr>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $bookReg->id }}"
                                    name ="checkboxConfirm[{{ $bookReg->id }}]" id="checkboxConfirm">
                            </div>
                        </td>
                        <td scope="row">{{ $email }}</td>
                        <td scope="row">{{ $bookReg->name }}</td>
                        <td>{{ $bookReg->author }}</td>
                        <td>{{ $bookReg->quantity }}</td>
                        <td>
                            <div class="" style="display:flex; align-items: center">
                                <img style="width: 20px; height: 20px" src="https://img.icons8.com/ios-glyphs/30/timer.png"
                                    alt="timer" />
                                <p class="mb-0 ml-1">{{ $bookReg->status }}</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        <div class="bg-[#a9171d] w-5/6 p-3 flex items-center justify-between" style="position: fixed; bottom: 0; right: 0">
            <div class="flex items-center">
                <div class="form-check ml-3 mt-1">
                    <input class="form-check-input" type="checkbox" value="" id="checkboxall"
                        onchange="checkall(this)">
                </div>
                <p class="mb-0 text-xl text-white">Chọn tất cả ({{ $bookRegCount }})</p>
                <button type="submit" class="ml-10 text-xl text-white" name="action" value="delete">Xoá</button>
            </div>
            <button type="submit" class="no-underline text-xl bg-red-400 p-2 text-white mr-4" name="action"
                value="confirm" id="confirm">Duyệt</button>
            @csrf
        </div>
    </form>
    <script>
        let table = new DataTable('#tablebookregcf', {
            "language": {
                "emptyTable": "Không có đơn cần duyệt",
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
