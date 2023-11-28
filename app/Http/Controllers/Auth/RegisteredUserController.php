<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
public function store(Request $request): RedirectResponse
{
    $request->validate([
        "username" => "required|string|max:50",
        'image' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:1024',
        // 'bio' => 'nullable|string|min:8',
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // $imageName = null;

    // if ($request->hasFile('image')) {
    //     $imageName = time() . '.' . $request->image->getClientOriginalExtension();
    //     $request->image->move(public_path('images'), $imageName);
    // }

    $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        // 'bio' => $request->bio,
        // 'image' => $imageName,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));

    Auth::login($user);

    return redirect(RouteServiceProvider::HOME);
}
}
