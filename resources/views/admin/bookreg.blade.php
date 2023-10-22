@extends('admin.adminLayout')
@section('adminBody')
    <p class="text-center text-2xl font-bold">Sách đã duyệt</p>
    <div class="w-full flex justify-end">
        <a href="/admin/bookReg/confirm" class="no-underline mr-8 text-black bg-red-300 p-2">Duyệt sách</a>
    </div>
        <table class="table mt-2">
            <thead class="thead-dark" style="background-color: red">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Người dùng</th>
                    <th scope="col">Tên sách</th>
                    <th scope="col">Tác giả</th>
                    <th scope="col">Số lượng</th>
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
                    </tr>
                </tbody>
            @endforeach
        </table>
@endsection
