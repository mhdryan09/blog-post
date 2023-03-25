<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view(
            'register.index',
            [
                'title' => 'Register',
                'active' => 'register'
            ]
        );
    }

    public function store(Request $request)
    {
        // $request adalah variabel yg menerima request data dari form
        // validasi request data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255'
            // 'password' => [ 'required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()]
        ]);

        // enkripsi password
        // cara 1 : method bcyrpt
        // $validatedData['password'] = bcrypt($validatedData['password']);

        // cara 2 : hash
        $validatedData['password'] = Hash::make($validatedData['password']);

        // insert data ke tabel user
        User::create($validatedData);

        // tambahkan flash message ketika form register selesai diisi
        // $request->session()->flash('success', 'Register successfull! Please Login');

        // atau kita bisa kirim flash message sekalian pindah ke halaman login
        return redirect('/login')->with('success', 'Register successfull! Please Login');
    }
}
