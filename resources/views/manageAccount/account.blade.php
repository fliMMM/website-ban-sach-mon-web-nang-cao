@extends('layout')
@section('body')
    <div class="">
        <div class="m-4">
            <h3 class="text-center">My Account</h3>
            <div class="flex justify-items-start w-full">
                <div class="mt-10">
                    <ul>
                        <li class="border-r-[1px] w-[240px] h-14 p-3 border-b-[1px] bg-[#f7f3eb] border-gray-400">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs"></i></span>
                                <span class="">My Account</span>
                            </a>
                        </li>
                        <li class="border-r-[1px] p-3 h-14 border-b-[1px] border-gray-400">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color:aqua"></i></span>
                                <span class="">Order History</span>
                            </a>
                        </li>
                        <li class="border-r-[1px] p-3 h-14 border-b-[1px] border-gray-400">
                            <a href="/account/setting" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color:red"></i></span>
                                <span class="">Account Settings</span>
                            </a>
                        </li>
                        <li class="border-r-[1px] p-3 h-14 border-b-[1px] border-gray-400">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color:blue"></i></span>
                                <span class="">ListRegisterBook</span>
                            </a>
                        </li>
                        <li class="border-r-[1px] p-3 h-14 border-b-[1px] border-gray-400">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color: bisque"></i></span>
                                <span class="">Membership</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="flex m-10">
                    <div class="">
                        <div class="border border-black">
                            <p class="pl-4 pt-2 text-3xl font-semibold mb-2">Order History</p>
                            <p class="pl-4">Recent Orders</p>
                            <button class="w-[450px] h-12 bg-red-600 mx-3 mb-3" type="submit">See All Order</button>
                        </div>
                    </div>
                    <div>
                        <div class="ml-10 border border-black">
                            <p class="pl-4 pt-2 text-3xl font-semibold mb-2">Account Settings</p>
                            <p class="pl-4">Full name: leduc</p>
                            <p class="pl-4">Email Address: letoanduc22@gmail.com</p>
                            <p class="pl-4">PhoneNumber</p>
                            <button class="w-[450px] h-12 bg-red-600 mx-3 mb-3">Manage Account Settings</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
