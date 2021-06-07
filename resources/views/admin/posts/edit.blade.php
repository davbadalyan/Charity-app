@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Post</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title" value="{{ old('title', $post->title) }}" type="text">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Short Description</label>
                            <input class="form-control" name="short_description" value="{{ old('short_description', $post->short_description) }}" type="text">
                            @error('short_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="short_description" value="{{ old('description', $post->description) }}" type="text">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Event</label>
                            <select name="event_id" class="form-control">
                                <option value=""></option>
                                @foreach ($events as $event)
                                    <option {{ $event->id==old('event_id', $post->event_id) ? "selected" : '' }} value="{{ $event->id }}">{{ $event->title }}</option>
                                @endforeach
                            </select>
                            @error('event_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <div style="width: 300px">
                                <img src="{{ $post->image_url }}" alt="{{ $post->title }}" class="img-fluid">
                            </div>

                            <label>Image</label>
                            <input class="form-control" name="file" type="file">
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
