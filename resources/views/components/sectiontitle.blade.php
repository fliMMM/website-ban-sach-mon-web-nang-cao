<div class="w-full ">
    <div class="flex justify-between multiple-items w-full mx-auto my-0s">
        @foreach ($listProducts as $listProduct)
            <div class=" w-[120px]">
                <img src="{{ $listProduct->image }}" alt="" class="cursor-pointer w-48 h-72 ml-4 mt-4 mr-4 ">
                <p class="cursor-pointer w-48 ml-4 mr-4 text-sm font-semibold">{{ $listProduct->name }}</p>
                <p class="ml-4" style="color: #d51c24">{{ $listProduct->price }}đ</p>
            </div>
        @endforeach
    </div>
    <a href="" class="flex justify-end text-red-600 no-underline">Xem thêm >>></a>
</div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

