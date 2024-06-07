<?php

namespace App\Http\Controllers;

use App\Models\Asdos;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
  public function login()
  {
    return view('pages.auth.login');
  }

  public function cekLogin(Request $request)
  {
    $input = $request->validate([
      'email' => ['required'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($input)) {
        return redirect(route('dashboard.index'))->withInfo('Anda berhasil masuk!');
    } else {
      return back()->withInput()->withWarning('Email atau password salah!');
    }
  }

  public function logout(Request $request)
  {
    Auth::logout();
    return redirect(route('home'));
  }
}
