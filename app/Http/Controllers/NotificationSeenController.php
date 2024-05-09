<?php

namespace App\Http\Controllers;

use App\Policies\NotificationPolicy;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationSeenController extends Controller
{
    public function __invoke(DatabaseNotification $notification)
    {
        
        Gate::define('update', [NotificationPolicy::class, 'update']);
        $notification->markAsRead();

        return redirect()->back()
            ->with('success', 'Notification marked as read');
    }
}
