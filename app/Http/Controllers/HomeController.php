<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $activeEvents = Event::latest()->limit(3)->get();

        return view('index')->with(compact('activeEvents'));
    }

    public function posts()
    {
        return view('posts');
    }

    public function show()
    {
        return view('post_single');
    }

    public function about()
    {
        return view('about');
    }
}
