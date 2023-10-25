<div class="xl:ml-36 lg:ml-10 border-r-[1px] border-gray-300">
    <ul>
        @if ($title == 'Hồ Sơ')
            <li class=" w-[240px] h-14 p-3 border-b-[1px] border-gray-300 bg-[#f7f3eb]">
                <a href="/account" class="text-black no-underline ">
                    <span class=""><i class="fa-regular fa-circle fa-xs"></i></span>
                    <span class="">Hồ Sơ</span>
                </a>
            </li>
        @else
            <li class=" w-[240px] h-14 p-3 border-b-[1px] border-gray-300">
                <a href="/account" class="text-black no-underline ">
                    <span class=""><i class="fa-regular fa-circle fa-xs"></i></span>
                    <span class="">Hồ Sơ</span>
                </a>
            </li>
        @endif
        @if ($title == 'Địa Chỉ')
            <li class="p-3 h-14 border-b-[1px] border-gray-300  bg-[#f7f3eb]">
                <a href="/account/address" class="text-black no-underline ">
                    <span class=""><i class="fa-regular fa-circle fa-xs" style="color:aqua"></i></span>
                    <span class="">Địa Chỉ</span>
                </a>
            </li>
        @else
            <li class="p-3 h-14 border-b-[1px] border-gray-300">
                <a href="/account/address" class="text-black no-underline ">
                    <span class=""><i class="fa-regular fa-circle fa-xs" style="color:aqua"></i></span>
                    <span class="">Địa Chỉ</span>
                </a>
            </li>
        @endif
        @if ($title == 'Đổi mật khẩu')
            <li class="p-3 h-14 border-b-[1px] border-gray-300  bg-[#f7f3eb]">
                <a href="/account/change-password" class="text-black no-underline ">
                    <span class=""><i class="fa-regular fa-circle fa-xs" style="color:red"></i></span>
                    <span class="">Đổi mật khẩu</span>
                </a>
            </li>
        @else
            <li class="p-3 h-14 border-b-[1px] border-gray-300">
                <a href="/account/change-password" class="text-black no-underline ">
                    <span class=""><i class="fa-regular fa-circle fa-xs" style="color:red"></i></span>
                    <span class="">Đổi mật khẩu</span>
                </a>
            </li>
        @endif
        @if ($title == 'Đăng ký sách')
            <li class="p-3 h-14 border-b-[1px] border-gray-300 bg-[#f7f3eb]">
                <a href="/account/bookRegistration" class="text-black no-underline ">
                    <span class=""><i class="fa-regular fa-circle fa-xs" style="color:blue"></i></span>
                    <span class="">Đăng ký sách</span>
                </a>
            </li>
        @else
            <li class="p-3 h-14 border-b-[1px] border-gray-300">
                <a href="/account/bookRegistration" class="text-black no-underline ">
                    <span class=""><i class="fa-regular fa-circle fa-xs" style="color:blue"></i></span>
                    <span class="">Đăng ký sách</span>
                </a>
            </li>
        @endif

        @if ($title == 'Danh sách đăng ký sách')
            <li class="p-3 h-14 border-b-[1px] border-gray-300 bg-[#f7f3eb]">
                <a href="/account/listBookReg" class="text-black no-underline ">
                    <span class=""><i class="fa-regular fa-circle fa-xs" style="color:blue"></i></span>
                    <span class="">Danh sách đăng ký sách</span>
                </a>
            </li>
        @else
            <li class="p-3 h-14 border-b-[1px] border-gray-300">
                <a href="/account/listBookReg" class="text-black no-underline ">
                    <span class=""><i class="fa-regular fa-circle fa-xs" style="color:blue"></i></span>
                    <span class="">Danh sách đăng ký sách</span>
                </a>
            </li>
        @endif

        @if ($title == 'Danh sách đơn hàng')
            <li class="p-3 h-14 border-b-[1px] border-gray-300 bg-[#f7f3eb]">
                <a href="/account/order" class="text-black no-underline ">
                    <span class=""><i class="fa-regular fa-circle fa-xs" style="color:bisque"></i></span>
                    <span class="">Danh sách đơn hàng</span>
                </a>
            </li>
        @else
            <li class="p-3 h-14 border-b-[1px] border-gray-300">
                <a href="/account/order/?tab=0" class="text-black no-underline ">
                    <span class=""><i class="fa-regular fa-circle fa-xs" style="color:bisque"></i></span>
                    <span class="">Danh sách đơn hàng</span>
                </a>
            </li>
        @endif
    </ul>
</div>
