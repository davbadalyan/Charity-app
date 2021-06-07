<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\PostStoreRequest;
use App\Http\Requests\Admin\PostUpdateRequest;
use App\Models\Event;
use App\Models\Post;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;
use Symfony\Component\Process\Pipes\WindowsPipes;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();

        return view('admin.posts.create')->with(compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $data = $request->except(['file', '_token']);

        /** @var  \App\Models\Post $post */
        $post = Post::create($data);

        $post->addAllMediaFromRequest('file')->each(fn ($fileAdder) => $fileAdder->toMediaCollection());

        return back()->withSuccess('Post created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $events = Event::all();

        return view('admin.posts.edit')->with(['post' => $post, 'events' => $events]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, Post $post)
    {
        $fileName = $post->image;

        if ($request->hasFile('file')) {
            try {
                $this->imageService->deleteImage($fileName);

                $fileName = $this->imageService->uploadImageGetName($request->file('file'));
            } catch (UploadException $e) {
                return back()->withErrors(['file' => $e->getMessage()]);
            }
        }

        $data = $request->except(['file', '_token']) + ['image' => $fileName];

        $post->update($data);

        return back()->withSuccess('Post updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->withSuccess("Post deleted");
    }
}
