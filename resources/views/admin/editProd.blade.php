@extends('admin.adminLayout')

@section('adminBody')
    <link rel="stylesheet" href="{{ asset('/css/admin/dashboard.css') }}">

    <form method="POST" action="/admin/handler/editProduct/{{ $product->id }}" class='h-screen mx-4 mt-4'
        enctype="multipart/form-data">
        @csrf
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Tên sách: </label>
        <input name="name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $product->name }}" type="text" id="name"><br>

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Tác giả: </label>
        <input name="author"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $product->author }}" type="text" id="author"><br>


        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mô tả:</label>
        <textarea name="description" style="resize: none;" id="message" rows="5"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Write your thoughts here...">{{ $product->description }}</textarea>


        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-3" for="name">Thể loại: </label>
        <input name="categories"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $product->categories }}" type="text" id="categories"><br>


        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="small_size">Hình ảnh</label>
        <input name="image"
            class="block w-full mb-3 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
            id="image" type="file">



        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Giá: </label>
        <input name="price"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $product->price }}" type="text" id="price"><br>

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Số lượng: </label>
        <input name="inStock"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $product->inStock }}" type="text" id="inStock"><br>

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Đối tượng: </label>
        <input name="target"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $product->target }}" type="text" id="target"><br>

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Kích thước: </label>
        <input name="khuonKho"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $product->khuonKho }}" type="text" id="khuonKho"><br>

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Số trang: </label>
        <input name="soTrang"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $product->soTrang }}" type="text" id="soTrang"><br>

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Trọng lượng: </label>
        <input name="weight"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $product->weight }}" type="text" id="weight"><br>

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Combo: </label>
        <input name="combo"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $product->combo }}" type="text" id="combo"><br>

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="name">Ngày phát hành: </label>
        <input name="ngayPhatHanh"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ $product->ngayPhatHanh }}" type="text" id="ngayPhatHanh"><br>

        <button type="submit"
            class="text-white w-full bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Sửa</button>
    </form>
@endsection
