<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view(
            'login.index',
            [
                'title' => 'Login',
            ]
        );
    }

    public function authenticate(Request $request)
    {

        // validasi form request login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // lakukan pengecekan dengan Auth
        if (Auth::attempt($credentials)) {
            // generate ulang session nya
            $request->session()->regenerate();

            // intededed, pemindahan halaman dengan bantuan middleware
            return redirect()->intended('/dashboard');
        }

        // jika gagal melalui pengecekan Auth
        // kembalikan ke halaman login, sekalian kirimkan pesan error nya
        return back()->with('loginError', 'Login Failed!');
    }

    public function logout(Request $request)
    {
        // jalankan fungsi logout dari Auth
        Auth::logout();

        // invalid kan session nya 
        $request->session()->invalidate();

        // generate ulang token session nya
        $request->session()->regenerateToken();

        // arahkan ke halaman home
        return redirect('/');
    }
}
