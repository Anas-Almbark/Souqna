<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow($id)
    {
        $user = Auth::user();

        Follow::create([
            'follower_id' => $user->id,
            'following_id' => $id,
        ]);

        $notification = new Notification();
        $notification->receiver_id = $id;
        $notification->sender_id = $user->id;
        $notification->message = "$user->name followed you";
        $notification->save();

        return redirect()->back();
    }

    public function unfollow($id)
    {
        $user = Auth::user();

        Follow::where('follower_id', $user->id)->where('following_id', $id)->delete();

        return redirect()->back();
    }
}
