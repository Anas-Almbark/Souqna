<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function update(Request $request, Notification $id)
    {
        $id->update([
            'is_read' => 1
        ]);
        return back();
    }
}
