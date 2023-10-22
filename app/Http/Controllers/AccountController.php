<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    public function profile()
    {
        $id = Auth::id();
        $user = DB::table('users')
            ->where('id', '=', $id)
            ->get();
        return view('/manageAccount/account', ['user' => $user]);
    }
    public function updateProfile(Request $request)
    {
        $id = Auth::id();
        $request->validate(
            [
                'username' => 'required|min:5',
                'email' => 'required|email',
                'phone' => 'required',
                'gender' => 'required',
            ],
            [
                'username.required' => 'Vui lòng nhập Họ Tên',
                'username.min' => 'Trường Họ tên phải từ :min ký tự trở lên',
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Email không đúng định dạng',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'gender.required' => 'Vui lòng chọn giới tính',
            ],
        );
        $dataUpdate = [
            'name' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $update = DB::table('users')
            ->where('id', '=', $id)
            ->update($dataUpdate);
        // $update = DB::table('users')->where('id','=',$id)->get();
        return back()->with('message', 'Cập nhật thành công');
    }
    public function address()
    {
        $id = Auth::id();
        $address = DB::table('address')
            ->where('userId', '=', $id)
            ->get();
        return view('/manageAccount/address', ['address' => $address]);
    }
    public function checkDefaultAddress($id)
    {
        $idAuth = Auth::id();
        DB::table('address')
            ->where('userId',  $idAuth)
            ->update(['isDefault' => 0]);
        DB::table('address')
            ->where('id', '=', $id)
            ->update(['isDefault' => 1]);
        return back();
    }
    public function addAddress(Request $request)
    {
        $id = Auth::id();
        $request->validate(
            [
                'name' => 'required|min:5',
                'phone' => 'required|numeric',
                'city' => 'required',
                'district' => 'required',
                'village' => 'required',
                'locationSpecific' => 'required',
            ],
            [
                'name.required' => 'Vui lòng nhập Họ Tên',
                'name.min' => 'Trường Họ tên phải từ :min ký tự trở lên',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.numeric' => 'Vui lòng nhập chính xác số điện thoại',
                'city.required' => 'Vui lòng chọn tỉnh thành',
                'district.required' => 'Vui lòng chọn quận huyện',
                'village.required' => 'Vui lòng chọn phường xã',
                'locationSpecific' => 'Vui lòng nhập địa chỉ cụ thể',
            ],
        );
        $dataAdd = [
            'name' => $request->name,
            'phone' => $request->phone,
            'userId' => $id,
            'city' => $request->city,
            'district' => $request->district,
            'village' => $request->village,
            'locationSpecific' => $request->locationSpecific,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('address')->insert($dataAdd);
        return back();
    }
    public function editAddress($id)
    {
        $address = DB::table('address')->find($id);
        return response()->json([
            'status' => 200,
            'address' => $address,
        ]);
    }
    public function updateAddress(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:5',
                'phone' => 'required|numeric',
                'city' => 'required',
                'district' => 'required',
                'village' => 'required',
                'locationSpecific' => 'required',
            ],
            [
                'name.required' => 'Vui lòng nhập Họ Tên',
                'name.min' => 'Trường Họ tên phải từ :min ký tự trở lên',
                'phone.required' => 'Vui lòng nhập số điện thoại',
                'phone.numeric' => 'Vui lòng nhập chính xác số điện thoại',
                'city.required' => 'Vui lòng chọn tỉnh thành',
                'district.required' => 'Vui lòng chọn quận huyện',
                'village.required' => 'Vui lòng chọn phường xã',
                'locationSpecific' => 'Vui lòng nhập địa chỉ cụ thể',
            ],
        );
        $dataUpdate = [
            'name' => $request->name,
            'phone' => $request->phone,
            'city' => $request->city,
            'district' => $request->district,
            'village' => $request->village,
            'locationSpecific' => $request->locationSpecific,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('address')
            ->where('id', '=', $request->idAddress)
            ->update($dataUpdate);
        return back();
    }
    public function deleteAddress($id)
    {
        DB::table('address')->where('id', '=', $id)->delete();
        return back();
    }
    public function registerBook()
    {
        return view('manageAccount.bookRegistration');
    }
    public function addRegistrationBook(Request $request)
    {
        $id = Auth::id();
        $request->validate(
            [
                'name' => 'required',
                'author' => 'required',
                'quantity' => 'required|numeric|max:10',
            ],
            [
                'name.required' => 'Vui lòng nhập Họ Tên',
                'author.required' => 'Vui lòng nhập số điện thoại',
                'quantity.required' => 'Vui lòng nhập số lượng',
                'quantity.numeric' => 'Vui lòng nhập số',
                'quantity.max' => 'Số lượng không hợp lệ',
            ],
        );
        $dataAdd = [
            'userId' => $id,
            'name' => $request->name,
            'author' => $request->author,
            'quantity' => $request->quantity,
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 'Chờ xét duyệt'
        ];
        DB::table('registration_book')->insert($dataAdd);
        return back()->with('message', 'Đăng ký thành công');
    }
    public function listBookReg()
    {
        $id = Auth::id();
        $bookRegistrations = DB::table('registration_book')
            ->where('userId', '=', $id)
            ->get();
        return view('manageAccount.listBookReg', ['bookregistrations' => $bookRegistrations]);
    }

    public function showChangePassword()
    {
        return view('manageAccount.changePassword');
    }

    public function handleChangePassword(Request $request)
    {
        $request->validate([
            'old_password' => ['required', 'min:8'],
            'new_password' => ['required', 'min:8'],
            'confirm_password' => ['required', "min:8", "same:new_password"],
        ]);

        $user = DB::table('users')->where('email', '=', auth()->user()->email)->get();


        if (count($user) > 0 && Hash::check($request->old_password, $user[0]->password)) {
            Auth::logout();

            DB::table('users')->where('id', '=', $user[0]->id)->update(['password' => Hash::make($request->new_password)]);

            auth()->loginUsingId($user[0]->id);
            return back()->with('success', 'Đổi mật khẩu thành công');
        }
        return back()->with('errorrr', "Hãy kiếm tra lại thông tin!!");
    }

    public function showOrder(Request $request)
    {
        $tab = request()->tab;
        $orders = DB::table('orders')
            ->where('userId', '=', auth()->user()->id)
            ->where('status', '=', (int)$tab)
            ->get();



        foreach ($orders as $order) {
            $products = array();
            $productIds = DB::table('cart_items')->where('orderId', '=', $order->id)->select('productId', 'quantity')->get();

            foreach ($productIds as $id) {
                if ($id->productId) {
                    $product =  DB::table('products')->where('id', '=', $id->productId)->select('name', 'image')->get()->first();
                    $product->quantity = $id->quantity;
                    array_push($products, $product);
                }
            }

            if (count($products) > 0) {
                $order->products = $products;
            }
        }

        return view('manageAccount.order', compact('orders', 'tab'));
    }
}
