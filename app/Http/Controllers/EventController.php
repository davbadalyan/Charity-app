<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\EventStoreRequest;
use App\Http\Requests\Admin\EventUpdateRequest;
use App\Models\Event;
use App\Models\User;
use App\Services\ImageService;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;
use Symfony\Component\Process\Pipes\WindowsPipes;

class EventController extends Controller
{

    public function __construct()
    {
        $this->imageService = new ImageService('event_images');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::withTrashed()->get();

        return view('admin.events.index')->with(compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventStoreRequest $request)
    {
        try {
            $fileName = $this->imageService->uploadImageGetName($request->file('file'));
        } catch (UploadException $e) {
            return back()->withErrors(['file' => $e->getMessage()]);
        }

        $data = $request->except(['file', '_token']) + ['image' => $fileName];

        Event::create($data);

        return back()->withSuccess('Event created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        // dd($event->id);        
        return $event;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit')->with(['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventUpdateRequest $request, Event $event)
    {
        $fileName = $event->image;

        if ($request->hasFile('file')) {
            try {
                $this->imageService->deleteImage($fileName);

                $fileName = $this->imageService->uploadImageGetName($request->file('file'));
            } catch (UploadException $e) {
                return back()->withErrors(['file' => $e->getMessage()]);
            }
        }

        $data = $request->except(['file', '_token']) + ['image' => $fileName];

        $event->update($data);

        return back()->withSuccess('Event updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $event)
    {
        $event = Event::withTrashed()->findOrFail($event);


        // $event->{$request->action}();

        switch ($request->action) {
            case 'restore':
                $event->restore();
                $message = 'Restored';
                break;
            case 'forceDelete':
                $event->forceDelete();
                $message = 'Deleted Permanently';
                break;
            default:
                $event->delete();
                $message = 'Archived';
        }

        return redirect()->route('admin.events.index')->withSuccess("Event {$message}");
    }
}
