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
                            value="{{ old($locale . '.title') }}" type="text">
                        @error($locale . '.title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Short description {{ $locale }}</label>
                        <textarea name="{{ $locale }}[short_description]"
                            class="form-control">{{ old($locale . '.short_description') }}</textarea>
                        @error($locale . '.short_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Description {{ $locale }}</label>
                        <textarea name="{{ $locale }}[description]"
                            class="form-control">{{ old($locale . '.description') }}</textarea>
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
