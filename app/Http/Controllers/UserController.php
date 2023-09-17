<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  public function showLogin(): View
  {
    return view('auth.login');
  }

  public function showRegister(): View
  {
    return view('auth.register');
  }

  public function createUser(Request $request)
  {
    $formData = $request->validate(
      [
        'email' => ['required', 'email'],
        'password' => ['required']
      ]
    );

    $user = User::create($formData);

    //login

    auth()->login($user);


    return redirect('/')->with('message', "dang ky thanh cong");
  }

  public function login(Request $request)
  {
    $formData = $request->validate(
      [
        'email' => ['required', 'email'],
        'password' => ['required']
      ]
    );

    if (auth()->attempt($formData)) {
      $request->session()->regenerate();

      return redirect('/');
    }

    return back();
  }



  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', "dang xuat thanh cong");
  }
}
