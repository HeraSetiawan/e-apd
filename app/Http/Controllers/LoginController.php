<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username'    => ['required'], // Assuming you use 'login' as the field name for both email and username (NIK)
            'password' => ['required'],
        ]);
        $fieldType = filter_var($credentials['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'nik';
        // dd($fieldType);
        
        if (Auth::attempt([$fieldType => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
        
            return redirect()->intended('dashboard');
        }
        
 
        return back()->withErrors([
            'username' => 'Data yang anda masukan tidak ada pada database kami .',
            'password' => 'password salah.',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
