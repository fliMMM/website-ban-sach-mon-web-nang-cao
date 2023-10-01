<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\View\Components\login;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function showLogin()
  {
    if (Auth::check()) return redirect('/');
    return view('auth.login');
  }

  public function showRegister()
  {
    if (Auth::check()) return redirect('/');
    return view('auth.register');
  }

  public function handleRegister(Request $request)
  {
    unset($_SESSION['duplicateEmail']);

    $existUserCout = DB::table('users')
      ->where('email', $request->email)
      ->count();

    if ($existUserCout > 0) {
      return redirect('/register')->with('duplicateEmail', "Email đã tồn tại!");
    }

    $formData = $request->validate(
      [
        'email' => ['required', 'email'],
        'password' => ['required', "min:8"],
        'confirmPassword' => ['required', "min:8", "same:password"],
      ]
    );



    array_pop($formData);

    $formData['password'] = Hash::make($formData['password']);

    $user = User::create($formData);

    //login

    auth()->login($user);


    return redirect('/')->with('message', "dang ky thanh cong");
  }

  public function handleLogin(Request $request)
  {
    $formData = $request->validate(
      [
        'email' => ['required', 'email'],
        'password' => ['required', 'min:8']
      ]
    );

    $user = DB::table('users')->where('email', '=', $formData['email'])->get();

    if (Hash::check($formData['password'], $user[0]->password)) {
      auth()->loginUsingId($user[0]->id);
      return redirect('/');
    }

    return redirect()->back()->with('status', "Email hoặc mật khẩu không đúng");
  }



  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', "dang xuat thanh cong");
  }
}
