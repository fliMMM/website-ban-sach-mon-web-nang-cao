<div>
    <div class="flex justify-center">
        <h3 class="mt-16 ">Sách mới</h3>
    </div>
 
    <div class="flex justify-center">
        @foreach ($listProducts as $listProduct)
        <div>
            <img src="{{$listProduct->image}}" alt="" class="w-48 h-72 ml-4 mt-4 mr-4 "> 
            <p class="w-48 ml-4 mr-4">{{$listProduct->name}}</p>
            <p class = " ml-4 " style="color: #d51c24">{{$listProduct->price}}</p>
        </div>  
        @endforeach    
    </div>
    <a href="" class="flex justify-end text-red-600 no-underline">Xem thêm >>></a>
</div>
