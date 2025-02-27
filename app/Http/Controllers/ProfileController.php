<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Contact;
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
        $isActive = true;
        if ($user->identity || $user->contacts->first()?->phone_primary || $user->location) {
            $isActive = false;
        }
        return view('profile.view', compact('user', "isActive"));
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
            "photo" => 'sometimes|image|mimes:jpeg,png,jpg',
            "phonePrimary" => "sometimes|string|min:7|max:18",
            "phoneSecondary" => "sometimes|string|min:7|max:18",
            "facebook" => "sometimes|string|min:5|max:255",
            "instagram" => "sometimes|string|min:5|max:255",
            "tiktok" => "sometimes|string|min:5|max:255",
        ]);
        $user->name = $validation['name'] ?? $user->name;
        $user->location = $validation['location'] ?? $user->location;

        $contact = new Contact();
        $contact->user_id = $user->id;
        $contact->phone_primary = $validation['phonePrimary'] ?? $contact->phonePrimary;
        $contact->phone_second = $validation['phoneSecondary'] ?? $contact->phoneSecondary;
        $contact->facebook = $validation['facebook'] ?? $contact->facebook;
        $contact->instagram = $validation['instagram'] ?? $contact->instagram;
        $contact->tiktok = $validation['tiktok'] ?? $contact->tiktok;
        $contact->save();

        if ($request->hasFile('identity')) {
            Storage::disk('public')->delete($user->identity ?? '');
            $user->identity = $request->file('identity')->store('identity_user', 'public');
        }
        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($user->photo ?? '');
            $user->photo = $request->file('photo')->store('photo_user', 'public');
        }
        $user->save();
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
    }
}
