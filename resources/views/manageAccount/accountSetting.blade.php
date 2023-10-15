@extends('layout')
@section('body')
    <div class="">
        <div class="m-4">
            <h3 class="text-center">Account Setting</h3>
            <div class="flex mt-10 justify-items-start">
                <div class="ml-36 border-r-[1px] border-gray-300">
                    <ul>
                        <li class=" w-[240px] h-14 p-3 border-b-[1px]  border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs"></i></span>
                                <span class="">My Account</span>
                            </a>
                        </li>
                        <li class="p-3 h-14 border-b-[1px] border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color:aqua"></i></span>
                                <span class="">Order History</span>
                            </a>
                        </li>
                        <li class=" p-3 h-14 border-b-[1px] bg-[#f7f3eb] border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color:red"></i></span>
                                <span class="">Account Settings</span>
                            </a>
                        </li>
                        <li class="p-3 h-14 border-b-[1px] border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color:blue"></i></span>
                                <span class="">ListRegisterBook</span>
                            </a>
                        </li>
                        <li class="p-3 h-14 border-b-[1px] border-gray-300">
                            <a href="" class="text-black no-underline ">
                                <span class=""><i class="fa-regular fa-circle fa-xs" style="color: bisque"></i></span>
                                <span class="">Membership</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="ml-8 w-4/5">
                    <div class="border-b pb-8">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1" style= "font-size: 30px; font-weight: 500;">Update Your Name</label>
                                <input type="first name" class="form-control mb-3 mt-3"
                                    style="width: 320px; height: 48px; border-radius: 0" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter first name">
                                <input type="email" class="form-control"
                                    style="width: 320px; height: 48px; border-radius: 0" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter last name">
                            </div>
                            <div class="flex items-center">
                                <button type="submit" class="btn btn-primary mt-2"
                                    style="border-radius: 0; width: 140px; height:46px">Submit</button>
                                <a href="" class="ml-20 no-underline">Cancel</a>
                            </div>
                        </form>
                    </div>
                    <div class="mt-5 border-b pb-8">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1" style= "font-size: 30px; font-weight: 500;">Update Your Email</label>
                                <p class="text-sm mt-2">Current Email Address: abcd@gmail.com</p>
                                <input type="first name" class="form-control mb-3 mt-3"
                                    style="width: 320px; height: 48px; border-radius: 0" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="New Email Address">
                                <input type="email" class="form-control"
                                    style="width: 320px; height: 48px; border-radius: 0" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Confirm New Email Address">
                            </div>
                            <div class="flex items-center">
                                <button type="submit" class="btn btn-primary mt-2"
                                    style="border-radius: 0; width: 140px; height:46px">Submit</button>
                                <a href="" class="ml-20 no-underline">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
