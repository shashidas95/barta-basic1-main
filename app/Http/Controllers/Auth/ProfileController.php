<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProfileFormRequest;

class ProfileController extends Controller
{
    public function profile()
    {
        // $user = Auth::user();
        //$email = $user->email;
        return view("auth.profile");
    }
    public function editProfile(Request $request, $userId)
    {
        // Fetch the user data based on a condition, for example, using the user's email
        $user = DB::table('users')->where('id', '=', $userId)->first();

        // Extract the user ID
        $id = $user->id;

        return view("auth.edit-profile", compact("id"));
    }


    public function updateProfile(UpdateProfileFormRequest $request, $id)
    {
        $validated = $request->validated();

        // Check if the user exists
        $user = DB::table('users')->find($id);

        if (!$user) {
            return redirect()->route('profile')->with('error', 'User not found');
        }

        if (request()->hasFile('image') && request('image') != '') {

            // Delete the existing image if it exists
            $imagePath = public_path('storage/' . $request->image);

            if (File::exists($imagePath)) {
                unlink($imagePath);
            }

            // Move the uploaded image to the storage directory
            $profileImage = time() . '.' . $request->image->extension();
            $image = request()->file('image')->storeAs('uploads', $profileImage, 'public');

            // Update the user's profile information
            DB::table("users")->where('id', $request->id)->update([
                'fname' => $validated['fname'],
                'lname' => $validated['lname'],
                'image' => $profileImage,
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'bio' => $validated['bio'],
            ]);
        } else {
            // Update the user's profile information without changing the image
            DB::table("users")->where('id', $request->id)->update([
                'fname' => $validated['fname'],
                'lname' => $validated['lname'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
                'bio' => $validated['bio'],
            ]);
        }

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }
}
