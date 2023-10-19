<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AccountController extends Controller
{
    //
    public function profile(){
        $id = Auth::id();
        $user = DB::table('users')->where('id','=',$id)->get();
        return view('/manageAccount/account', ['user' => $user]);
    }
    public function updateProfile(Request $request){
        $id = Auth::id();
        $request ->validate([
            'username' => 'required|min:5',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required'
        ],[
            'username.required' => 'Vui lòng nhập Họ Tên',
            'username.min' => 'Trường Họ tên phải từ :min ký tự trở lên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'gender.required' => 'Vui lòng chọn giới tính'
        ]);
        $dataUpdate = [
           'name' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $update = DB::table('users')->where('id','=',$id)->update($dataUpdate);
        // $update = DB::table('users')->where('id','=',$id)->get();
        return back()->with('message','Cập nhật thành công');
    }
    public function address(){
        // $id = Auth::id();
        // $user = DB::table('users')->where('id','=',$id)->get();
        return view('/manageAccount/address');
    }
    public function addAddress(Request $request){
        // dd($request->all());
        return back();
    }
}
