@extends('admin.layout')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Post</h1>
@stop

@section('card-content')

    <form action="{{ route('admin.posts.update', ['post' => $post]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        @forelse ($locales as $locale)

            <div class="card card-widget mt-4">
                <div class="card-header">
                    <div class="card-title">
                        <h3>{{ $locale }}</h3>
                    </div>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-2x fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>Title {{ $locale }}</label>
                        <input class="form-control" name="{{ $locale }}[title]"
                            value="{{ old($locale . '.title', $post->translate($locale)->title ?? '') }}" type="text">
                        @error($locale . '.title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Short_description {{ $locale }}</label>
                        <input class="form-control" name="{{ $locale }}[short_description]"
                            value="{{ old($locale . '.short_description', $post->translate($locale)->short_description ?? '') }}"
                            type="text">
                        @error($locale . '.short_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Description {{ $locale }}</label>
                        <input class="form-control" name="{{ $locale }}[description]"
                            value="{{ old($locale . '.description', $post->translate($locale)->description ?? '') }}"
                            type="text">
                        @error($locale . '.description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
        @empty
            <h3 class="text-danger">Locales not found, please check configs</h3>
        @endforelse

        <div class="form-group">
            <label>Description</label>
            <input class="form-control" name="description" value="{{ old('description', $post->description) }}"
                type="text">
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Event</label>
            <select name="event_id" class="form-control">
                <option value=""></option>
                @foreach ($events as $event)
                    <option {{ $event->id == old('event_id', $post->event_id) ? 'selected' : '' }}
                        value="{{ $event->id }}">{{ $event->title }}</option>
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
                            <a href="{{ route('admin.posts.media.main-image', ['post' => $post, 'media' => $media]) }}"
                                class="btn btn-sm btn-success"><i class="fa fa-image"></i></a>
                            <a href="{{ $media->getUrl() }}" target="_blank" class="ml-1 btn btn-sm btn-success"><i
                                    class="fa fa-eye"></i></a>
                            <form id="del-form-{{ $media->id }}"
                                action="{{ route('admin.media.delete', ['media' => $media]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button form="del-form-{{ $media->id }}" class="ml-1 btn btn-sm btn-danger"><i
                                        class="fa fa-times"></i></button>
                            </form>
                        </div>
                    </div>
                @empty
                    <h4 class="text-danger">No media found</h4>
                @endforelse
            </div>
        </div>
    </div>
@stop
