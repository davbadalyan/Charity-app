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
                            <input class="form-control" name="description" value="{{ old('description', $post->description) }}" type="text">
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

                            <label>Image</label>
                            <input class="form-control" accept="image/*" name="file[]" type="file" multiple maxlength="7">
                            @error('file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @error('file.*')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="btn btn-primary">Save</button>

                    </form>

                    <div class="card card-widget mt-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h3>Images</h3>
                            </div>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-2x fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                @forelse ($post->getMedia() as $media)
                                    <div class="card col-lg-3 col-sm-6 col-xs-12 my-2">
                                        <img class="card-img-top" src="{{ $media->getUrl() }}" alt="" />
                                        <div class="card-img-overlay d-flex align-items-start justify-content-end">
                                            <a href="{{ $media->getUrl() }}" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-eye"></i></a>
                                            <form action="{{ route('admin.media.delete', ['media' => $media]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="ml-1 btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <h4 class="text-danger">No media found</h4>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
