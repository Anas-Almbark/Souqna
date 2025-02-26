<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.partials.view', compact('user'));
    }
    public function edit(Request $request): View
    {
        $user = $request->user();
        return view('profile.edit', compact('user'));
    }
    public function update(Request $request)
    {
        $user = User::find(Auth::id());
        $validation = $request->validate([
            'name' => 'sometimes|string|max:255|min:3',
            "location" => 'sometimes|string|max:255|min:5',
            "identity" => 'sometimes|file|mimes:pdf',
            "photo" => 'sometimes|file|mimes:jpg,jpeg,png',
            "phonePrimary" => 'sometimes|numeric|digits_between:8,15',
            "phoneSecondary" => 'sometimes|numeric|digits_between:8,15',
            "facebook" => 'sometimes|string|min:1|max:255|url',
            "instagram" => 'sometimes|string|min:1|max:255|url',
            "tiktok" => 'sometimes|string|min:1|max:255|url',
        ]);

        if (isset($validation['name'])) {
            $user->name = $validation['name'];
        }
        if (isset($validation['location'])) {
            $user->location = $validation['location'];
        }
        // if (isset($validation['phonePrimary'])) {
        //     $user->phonePrimary = $validation['phonePrimary'];
        // }
        // if (isset($validation['phoneSecondary'])) {
        //     $user->phoneSecondary = $validation['phoneSecondary'];
        // }
        // if (isset($validation['facebook'])) {
        //     $user->facebook = $validation['facebook'];
        // }
        // if (isset($validation['instagram'])) {
        //     $user->instagram = $validation['instagram'];
        // }
        // if (isset($validation['tiktok'])) {
        //     $user->tiktok = $validation['tiktok'];
        // }

        if ($request->hasFile('identity')) {
            $user->identity = $request->file('identity')->store('identity_user', 'public');
        }

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }
            $user->photo = $request->file('photo')->store('photo_user', 'public');
        }

        $user->save();
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
    }
}
