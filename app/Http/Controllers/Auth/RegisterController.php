<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationRequest;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegistrationRequest $request)
    {
        try {
            $validated = $request->validated();

            $profileImage = time() . '.' . $request->image->extension();
            // dd($request->image->getMimeType());
           
            $request->image->move(public_path('profile-images'), $profileImage);
            DB::table('users')->insert([
                'fname' => $validated['fname'],
                'lname' => $validated['lname'],
                'image' => $profileImage,
                'email' => $validated['email'],
                'bio' => $validated['bio'],
                'password' => Hash::make($validated['password']),
            ]);

            return redirect()->route('login')->with('success', 'You are successfully registered.');
        } catch (\Exception $e) {
            // Handle the exception, perhaps log it
            return back()->withInput()->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }
}
