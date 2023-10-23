<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\View\Components\login;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

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

    $newCart = [
      'userId' => $user['id'],
      'status' => 'test',
      'note' => 'test'
    ];
    DB::table('carts')->insert([$newCart]);

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

    if ($user[0]->isBan == 1) {
      return back()->with('status_error', "Tải khoản đã bị cấm");
    }


    if (count($user) > 0 && Hash::check($formData['password'], $user[0]->password)) {
      auth()->loginUsingId($user[0]->id);
      return redirect('/');
    }

    return back()->with('status_error', "Email hoặc mật khẩu không đúng");
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/')->with('message', "dang xuat thanh cong");
  }


  public function showResetPasswordForm()
  {
    return view(('auth.forgot_password'));
  }

  public function handleForgotPassword(Request $request)
  {
    $request->validate(['email' => 'required|email']);


    $status = Password::sendResetLink(
      $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
      ? back()->with(['status' => __($status)])
      : back()->withErrors(['email' => __($status)]);
  }

  public function handleResetPassword(Request $request)
  {
    $request->validate([
      'token' => 'required',
      'email' => 'required|email',
      'password' => ['required', 'min:8'],
      'confirm_password' => ['required', "min:8", "same:password"],
    ]);

    $status = Password::reset(
      $request->only('email', 'password', 'confirm_password', 'token'),
      function (User $user, string $password) {
        $user->forceFill([
          'password' => Hash::make($password)
        ])->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));
      }
    );

    return $status === Password::PASSWORD_RESET
      ? redirect('/login')->with('status', __($status))
      : back()->withErrors(['email' => [__($status)]]);
  }
}
