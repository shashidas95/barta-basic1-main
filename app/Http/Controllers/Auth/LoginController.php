<?php

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Request;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password']
        ];
        // dd($credentials);

        // $credentials = collect($validated)->only('email', 'password')->all();

        // dd($credentials);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('post.show');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
