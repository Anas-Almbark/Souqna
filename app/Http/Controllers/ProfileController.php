<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profile.view', compact('user'));
    }
    public function edit(Request $request)
    {
        $user = $request->user();
        return view('profile.edit', compact('user'));
    }
    public function update(Request $request, User $user)
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
        Contact::where('user_id', $user->id)->delete();
        $contact->save();

        if ($request->hasFile('identity')) {
            Storage::disk('public')->delete($user->identity ?? '');
            $user->identity = $validation['identity']->store('identity_user', 'public');
        }
        if ($request->hasFile('photo')) {
            Storage::disk('public')->delete($user->photo ?? '');
            $user->photo = $validation['photo']->store('photo_user', 'public');
        }
        $user->update();
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
    }
}
