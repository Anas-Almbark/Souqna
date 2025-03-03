<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follow;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Events\UserNotificationEvent;

class FollowController extends Controller
{
    public function follow($id)
    {
        $user = Auth::user();
        $following = User::find($id);
        Follow::firstOrCreate([
            'follower_id' => $user->id,
            'following_id' => $id,
        ]);
        Notification::create([
            'receiver_id' => $id,
            'sender_id' => $user->id,
            'message' => "$user->name followed you",
        ]);;

        broadcast(new UserNotificationEvent($following, "{$user->name} Followed you!", "follow"))->toOthers();
        return redirect()->back();
    }

    public function unfollow($id)
    {
        $user = Auth::user();
        Follow::where('follower_id', $user->id)->where('following_id', $id)->delete();
        Notification::where('receiver_id', $id)->where('sender_id', $user->id)->delete();
        return redirect()->back();
    }
}
