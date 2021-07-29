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
                        <label>Short description {{ $locale }}</label>
                        <textarea name="{{ $locale }}[short_description]"
                            class="form-control">{{ old($locale . '.short_description', $event->translate($locale)->short_description ?? '') }}</textarea>
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
            {{-- <div class="custom-switch">
                <input type="checkbox" name="show_foundation_status" value="1" class="custom-control-input"
                    id="show-foundation-status">
                <label class="custom-control-label" for="show-foundation-status">Show foundation status.</label>
            </div> --}}
            <x-dg-input-switch label="Show foundation status." name="show_foundation_status" id="show-status"
                checked="{{ old('show_foundation_status', $event->show_foundation_status) == 'on' }}" />
            @error('show_foundation_status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            {{-- <label>Start Date</label>
            <input class="form-control" name="start_date" value="{{ old('start_date', $event->start_date) }}" type="date">
            @error('start_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror --}}
            <x-input class="form-control" title="Start date" name="start_date" type="date" :default="$event->start_date" />
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
            {{-- <div class="custom-switch">
                <input type="checkbox" name="show_button" value="1" class="custom-control-input" id="show-btn-switch">
                <label class="custom-control-label" for="show-btn-switch">Show 'Donate now' button status.</label>
            </div> --}}
            <x-dg-input-switch label="Donate now' button status." name="show_button" id="show-button"
                checked="{{ old('show_button', $event->show_button) == 'on' }}" />
            @error('show_button')
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
                            <a href="{{ route('admin.events.media.main-image', ['event' => $event, 'media' => $media]) }}"
                                class="btn btn-sm btn-success" title="Set Main Image"><i class="fa fa-image"></i></a>
                            <a href="{{ $media->getUrl() }}" target="_blank" class="ml-2 btn btn-sm btn-success"
                                title="View"><i class="fa fa-eye"></i></a>
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
