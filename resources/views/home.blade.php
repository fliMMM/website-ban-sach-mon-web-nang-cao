@extends('layout')

@section('body')
    <div class="flex  items-center mt-10 flex-col space-y-6">
        <form action="/uploadfile" method="POST" enctype="multipart/form-data">
            @csrf

            <input type="file" name="fileInput">
            <button type="submit" class="bg-green-500 rounded p-2 text-white font-bold">upload</button>
        </form>


        @if (count($fileList) == 0)
            <p>Ban chua tai file nao len ca</p>
        @else
            <table class="border-collapse border border-slate-400 w-fit">
                <thead>
                    <tr>
                        <th class="border border-slate-300 p-3">
                            <form action="/" method="get">
                                <button type="submit">Tên tập tin</button>
                            </form>
                        </th>
                        <th class="border border-slate-300 p-3">Loại</th>
                        <th class="border border-slate-300 p-3">Ngày tải lên</th>
                        <th class="border border-slate-300 p-3">Kích thước</th>
                        <th class="border border-slate-300 p-3">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($fileList as $file)
                        <tr>
                            <td class="border border-slate-300 p-3">{{ $file->fileName }}</td>
                            <td class="border border-slate-300 p-3">{{ explode('.', $file->fileName)[1] }}</td>
                            <td class="border border-slate-300 p-3">{{ $file->created_at }}</td>
                            <td class="border border-slate-300 p-3">{{ $file->size }} byte</td>
                            <td class="border border-slate-300 p-3">
                                <form action="/file/edit/{{ $file->id }}" method="post" class="mb-2"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <label for="fileInputUpdate" class="btn">Select file</label>
                                    <input id="fileInputUpdate" type="file" name="fileInputUpdate" class="hidden">
                                    <button class="bg-green-500 rounded p-2 text-white font-bold">update</button>
                                </form>
                                <form action="/file/delete/{{ $file->id }}" method="post">
                                    @csrf
                                    <button class="bg-green-500 rounded p-2 text-white font-bold">delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif
    </div>
@endsection
