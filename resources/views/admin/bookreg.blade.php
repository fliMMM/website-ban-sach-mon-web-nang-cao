@extends('admin.adminLayout')
@section('title', 'Yêu cầu sách đã duyệt')
@section('adminBody')
    <p class="text-center mt-4 text-4xl font-bold">Sách đã duyệt</p>
    <a href="/admin/bookReg/confirm" class="no-underline fixed bottom-0 right-0 text-2xl text-black bg-red-300 p-4">Duyệt
        sách</a>
    <table class="table mt-2 table table-striped" id= "tablebookreg">
        <thead>
            <tr>
                <th>Người dùng</th>
                <th>Tên sách</th>
                <th>Tác giả</th>
                <th>Số lượng</th>
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
                    <td>{{ $email }}</td>
                    <td>{{ $bookReg->name }}</td>
                    <td>{{ $bookReg->author }}</td>
                    <td>{{ $bookReg->quantity }}</td>
                </tr>
            </tbody>
        @endforeach
    </table>
    <script>
        let table = new DataTable('#tablebookreg', {
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
@endsection
