<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){

    return view('login');
    }

    public function login(Request $request)
{
    $request->validate([
        'username' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('username', $request->username)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user); // Gunakan Auth untuk login user

        return redirect('dashboard'); // arahkan ke halaman home
    }

    return redirect()->back()
        ->withErrors(['login' => 'Username atau Password salah.'])
        ->withInput();
}

       public function logout(Request $request)
    {
        Auth::logout();
        return redirect('');
    }

}
