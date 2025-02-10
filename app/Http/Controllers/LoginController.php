<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate input fields
        $request->validate([
            'user_nama' => 'required',
            'user_pass' => 'required',
        ]);

    
        // Get the credentials from the request
        $credentials = [
            'user_nama' => $request->user_nama,
            'user_pass' => $request->user_pass, // password should match the field name used in the database
        ];

        $user = User::where('user_nama', $credentials['user_nama'])->first();

        // dd();

        // dd(Auth::attempt(['user_nama' => $credentials['user_nama'], 'user_pass' => $credentials['user_pass']]));
    
        // Attempt to log the user in
        if ($user && Hash::check($credentials['user_pass'], $user->user_pass)) {
            // dd('test');
            Auth::login($user);

            // return Auth::check();

            // beres ya guis pipupupupupupupupupupupupupupupupupupupupupup
            // Redirect to dashboard if authentication is successful
            return redirect(to: 'home')->with('success', 'Login berhasil!');
            // redirect()->route('pindah');
        }
    
        // If authentication fails, return with an error message
        return back()->withErrors(['user_nama' => 'ID pengguna atau password salah.'])->withInput();
    }

    public function logout(Request $request)
    {
         Auth::logout(); 
         $request->session()->invalidate(); 
         $request->session()->regenerateToken(); 

         return redirect('login'); 
    }

}