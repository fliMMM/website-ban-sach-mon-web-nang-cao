@extends('layout')

@section('body')

<div class="flex flex-col items-center">
    <x-banner/>
    <x-sectiontitle :$listProducts/>
</div>



@endsection
