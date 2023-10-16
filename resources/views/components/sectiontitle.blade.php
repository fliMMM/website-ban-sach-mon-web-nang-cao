
 <div class="w-full ">
    <div class="flex justify-between multiple-items w-full mx-auto my-0s">
        @foreach ($list as $listProduct)
            <div class="ml-6 mr-6">
             <a href="/productDetail/{{$listProduct->name}}"><img src="{{ $listProduct->image }}" alt="" class="w-48 h-72 "></a> 
             <a href="/productDetail/{{$listProduct->name}} " class="no-underline text-black"><p class="w-48 mr-4 text-sm font-semibold line-clamp-2 mb-1">{{ $listProduct->name }}</p></a>           
             <?php 
             $price = number_format($listProduct->price, 0, '', ',');
             ?>
             <p class=" " style="color: #d51c24">{{ $price }}đ</p>
            </div>
        @endforeach
    </div>
    <a href="/collection" class="flex justify-end text-red-600 no-underline">Xem thêm >>></a>
</div>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> 

