<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin() {

        return view('auth/login');
    }

    public function postLogin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(auth()->attempt($credentials)){

            $request->session()->regenerate();

            return redirect()->route('index');
        }

        return redirect()->route('login');
    }

    public function postLogout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function getRegister() {
        return view('auth/register');
    }

    public function postRegister(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:Users,email',
            'password' => 'required|min:8|confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('index');
    }
}
