<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Menampilkan halaman login
    public function index()
    {
        return view('login');
    }

    // Menyimpan data login
    public function store(Request $request)
    {
        // Validasi input email dan password
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Mohon isiskan email dan password yang sesuai',
                'errors' => $validator->errors()
            ], 422);
        }

        $credentials = $request->only('email', 'password');


        // Melakukan proses login
        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect('/dashboard');
        // }
        if (Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Login berhasil',
                'user' => Auth::user()
            ], 200);
        }
        
        // Redirect kembali ke halaman login jika login gagal
        // return redirect()->route('login')->with('login', 'Email atau password salah.');
        return response()->json([
            'message' => 'Email atau password salah'
        ], 401);
    }

    // Proses logout
    public function logout()
    {
        session()->invalidate();
        Auth::logout();
        session()->invalidate();
        return redirect('login');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
