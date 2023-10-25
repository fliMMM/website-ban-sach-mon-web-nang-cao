@extends('layout')
@section('title', 'BookAM')
@section('body')
    <div class="flex flex-col items-center">
        <x-banner />
        <div class="w-8/12">
            <?php $list = $newbooks; ?>
            <x-sectiontitle :$list title="SÁCH MỚI" />
        </div>
        <div class="w-8/12">
            <?php $list = $sellingbooks; ?>
            <x-sectiontitle :$list title="SÁCH BÁN CHẠY" />
        </div>
        <div class="w-8/12">
            <?php $list = $sellingbooks; ?>
            <x-sectiontitle :$list title="SÁCH BÁN CHẠY" />
        </div>
        <div class="w-8/12">
            <?php $list = $sellingbooks; ?>
            <x-sectiontitle :$list title="SÁCH BÁN CHẠY" />
        </div>
        <div class="w-8/12">
            <?php $list = $sellingbooks; ?>
            <x-sectiontitle :$list title="SÁCH BÁN CHẠY" />
        </div>
    </div>
    <script type="text/javascript">
        $('.multiple-items').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            arrow: true,
            focusOnSelect: true,
            responsive: [{
                    breakpoint: 1030,
                    settings: {
                        slidesToShow: 4,
                    }
                },
                {
                    breakpoint: 770,
                    settings: {
                        slidesToShow: 3,
                    }
                },
            ]
        });
    </script>
@endsection
