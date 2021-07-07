<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::relevant();
        $activeEvents = Event::active()->get();

        return view('index')->with(compact('activeEvents', 'posts'));
    }

    public function posts(Request $request)
    {
        $activeEvents = Event::active()->get();
        $event = Event::promo($request->search ?? '')->pluck('id')->toArray();
        // dd($event);
        $posts = Post::query()
            ->when($request->from || $request->to, fn (Builder $q) => $q->whereBetween('created_at', [$request->from ?? '2010-10-10', $request->to ?? now()]))
            ->when(count($event) > 0, fn (Builder $q) => $q->whereIn('event_id', $event))
            ->paginate(9);

        return view('posts')->with(compact('activeEvents', 'posts'));
    }

    public function show(Post $post)
    {
        $posts = Post::relevant();
        $activeEvents = Event::active()->get();

        return view('post_single')->with(compact('activeEvents', 'posts', 'post'));
    }

    public function about()
    {
        return view('about');
    }
}
