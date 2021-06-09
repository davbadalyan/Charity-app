@extends('admin.layout')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Event</h1>
@stop

@section('card-content')

    <form action="{{ route('admin.events.update', ['event' => $event]) }}" method="POST" enctype="multipart/form-data">
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
                            value="{{ old($locale . '.title', $event->translate($locale)->title ?? '') }}" type="text">
                        @error($locale . '.title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Short_description {{ $locale }}</label>
                        <input class="form-control" name="{{ $locale }}[short_description]"
                            value="{{ old($locale . '.short_description', $event->translate($locale)->short_description ?? '') }}"
                            type="text">
                        @error($locale . '.short_description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>
        @empty
            <h3 class="text-danger">Locales not found, please check configs</h3>
        @endforelse

        <div class="form-group">
            <label>Promo Code</label>
            <input class="form-control" name="promo_code" value="{{ $event->promo_code }}" type="text">
            @error('promo_code')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Start Date</label>
            <input class="form-control" name="start_date" value="{{ $event->start_date }}" type="date">
            @error('start_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Raised Amount</label>
            <input class="form-control" name="raised_amount" value="{{ $event->raised_amount }}" type="number" min="0"
                max="99999">
            @error('raised_amount')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Goal Amount</label>
            <input class="form-control" name="goal_amount" type="number" value="{{ $event->goal_amount }}" min="0"
                max="99999">
            @error('goal_amount')
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
                @forelse ($event->getMedia() as $media)
                    <div class="card col-lg-3 col-sm-6 col-xs-12 my-2">
                        <img class="card-img-top" src="{{ $media->getUrl() }}" alt="" />
                        <div class="card-img-overlay d-flex align-items-start justify-content-end">
                            <a href="{{ $media->getUrl() }}" target="_blank" class="btn btn-sm btn-success"><i
                                    class="fa fa-eye"></i></a>
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
@stop
