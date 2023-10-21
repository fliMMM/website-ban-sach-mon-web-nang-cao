<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function addAddress(Request $request)
    {
        $id = Auth::id();
        $request->validate(
            [
                'name' => 'required|min:5',
                'phone' => 'required',
                'city' => 'required',
                'district' => 'required',
                'village' => 'required',
                'locationSpecific' => 'required',
            ],
            [
                'username.required' => 'Vui lòng nhập Họ Tên',
                'username.min' => 'Trường Họ tên phải từ :min ký tự trở lên',
                'phone.required' => 'Vui lòng nhập số điện thoại',
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
                'phone' => 'required',
                'city' => 'required',
                'district' => 'required',
                'village' => 'required',
                'locationSpecific' => 'required',
            ],
            [
                'username.required' => 'Vui lòng nhập Họ Tên',
                'username.min' => 'Trường Họ tên phải từ :min ký tự trở lên',
                'phone.required' => 'Vui lòng nhập số điện thoại',
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
        DB::table('address')->where('id','=', $id)->delete();
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
        return view('manageAccount.listBookReg' ,['bookregistrations' => $bookRegistrations]);
    }
}
