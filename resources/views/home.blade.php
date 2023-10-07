@extends('layout')

@section('body')

<div class="flex flex-col items-center">
    <x-banner/>
    <p class="mt-20 font-bold text-3xl mb-10">SÁCH MỚI</p>
    <div class="w-8/12">
      <?php $list = $newbooks?>
        <x-sectiontitle :$list />      
    </div>
    <p class="mt-20 font-bold text-3xl mb-10">SÁCH BÁN CHẠY</p>
    <div class="w-8/12">
      <?php $list = $sellingbooks?>
        <x-sectiontitle :$list />      
    </div>
</div>
<script type="text/javascript">
    $('.multiple-items').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        arrow:true,
        focusOnSelect: true
    });
</script>
@endsection
