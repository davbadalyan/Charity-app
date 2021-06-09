@extends('admin.layout')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Create Post</h1>
@stop

@section('card-content')


    <h3 id="alert" class="text-danger">
        @if ($event)
            This post will be created for {{ $event->title }}
        @endif
    </h3>


    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input class="form-control" name="title" value="{{ old('title') }}" type="text">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Short_description</label>
            <input class="form-control" name="short_description" value="{{ old('short_description') }}" type="text">
            @error('short_description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Description</label>
            <input class="form-control" name="description" value="{{ old('description') }}" type="text">
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Event</label>
            <select name="event_id" class="form-control">
                <option data-title="" value=""></option>
                @foreach ($events as $item)
                    <option data-title="{{ $item->title }}"
                        {{ $item->id == old('event_id', optional($event)->id ?? '') ? 'selected' : '' }}
                        value="{{ $item->id }}">
                        {{ $item->title }}</option>
                @endforeach
            </select>
            @error('event_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Image</label>
            <input class="form-control" accept="image/*" multiple name="file[]" type="file">
            @error('file')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            @error('file.*')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button class="btn btn-primary">Save</button>
    </form>
@stop


@section('js')
    <script>
        $('select').change(function() {
            $('#alert').text('This post will be created for ' + $(this).find("option[value=" + $(this).val() + "]")
                .data('title'));
        });

    </script>
@endsection
