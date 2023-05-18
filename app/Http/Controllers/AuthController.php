<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  public function login()
  {
    return view('auth.login');
  }

  public function check(Request $request)
  {
    $request->validate([
      'login' => 'required',
      'password' => 'required',
    ]);

    $user = User::where('login', '=', $request->login)->first();

    if (!$user) {
      return response(['error' => 'Пользователь не найден'], 400);
    }

    if (Hash::check($request->password, $user->password)) {
      session()->put('user', $user->id);

      return $user;
    } else {
      return response(['error' => 'Неправильный пароль'], 400);
    }
  }

  public function logout()
  {
    if (session()->has('user')) {
      session()->pull('user');
    }

    return redirect(route('auth.login'));
  }
}
