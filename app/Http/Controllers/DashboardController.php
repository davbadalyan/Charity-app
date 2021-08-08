<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $unreadNotifications = auth()->user()->unreadNotifications;
        $unreadNotificationCount = $unreadNotifications->count();

        foreach ($unreadNotifications as $not) {
            $not->markAsRead();
        }

        $postsCount = Post::count();

        return view('admin.home')->with(compact('postsCount', 'unreadNotificationCount'));
    }
}
