<?php
$books = array(
        array('id' => '1', 'img' => 'https://product.hstatic.net/200000343865/product/33_c41b6baaa61d479f9846d9f65d09e717_large.jpg', 'price' => '60000'),
        array('id' => '2','img' => 'https://product.hstatic.net/200000343865/product/33_c41b6baaa61d479f9846d9f65d09e717_large.jpg',  'price' => '60000'),
        array('id' => '3','img' => 'https://product.hstatic.net/200000343865/product/33_c41b6baaa61d479f9846d9f65d09e717_large.jpg',  'price' => '60000'),
        array('id' => '4', 'img' => 'https://product.hstatic.net/200000343865/product/33_c41b6baaa61d479f9846d9f65d09e717_large.jpg',  'price' => '60000'),
        array('id' => '5', 'img' => 'https://product.hstatic.net/200000343865/product/33_c41b6baaa61d479f9846d9f65d09e717_large.jpg',  'price' => '60000'),
    );
?>
<div>
    <div class="flex justify-center">
        <h3 class="mt-16 ">Sách mới</h3>
    </div>
 
    <div class="flex justify-center">
        @foreach ($books as $book)
        <div>
            <img src="{{$book['img']}}" alt="" class="w-48 h-72 ml-4 mt-4 mr-4 "> 
            <p class = " ml-4 " style="color: #d51c24">{{$book['price']}}</p>
        </div>  
        @endforeach    
    </div>
      

    <a href="" class="flex justify-end text-red-600 no-underline">Xem thêm >>></a>
</div>
