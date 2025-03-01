<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ActiveAccountController extends Controller
{
    public function index()
    {
        $users = User::where('is_active', false)
            ->whereNotNull('identity')
            ->whereHas('contacts', function ($query) {
                $query->whereNotNull('phone_primary');
            })
            ->whereNotNull('location')
            ->get();
        return view('activeAccount.viewAccounts', compact('users'));
    }
    public function show(User $user)
    {
        return view('activeAccount.active', compact('user'));
    }

    public function rejected(User $user)
    {
        $user->identity = null;
        $user->location = null;
        $user->save();
        $contact = $user->contacts->first();
        $contact->phone_primary = null;
        $contact->save();
        $notification = new Notification();
        $notification->receiver_id = $user->id;
        $notification->sender_id = Auth::id();
        $notification->message = 'Your account has been rejected';
        $notification->save();
        return redirect()->route('active.index');
    }
    public function accepted(User $user)
    {
        $user->is_active = true;
        $user->save();
        $notification = new Notification();
        $notification->receiver_id  = $user->id;
        $notification->sender_id = Auth::id();
        $notification->message = 'Your account has been accepted';
        return redirect()->route('active.index');
    }
}
