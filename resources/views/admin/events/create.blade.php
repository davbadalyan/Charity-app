@extends("admin.layout")

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Create Event</h1>
@stop


@section('card-content')

    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input class="form-control" name="{{ $locale }}[title]" value="{{ old($locale . '.title') }}"
                            type="text">
                        @error($locale . '.title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Short_description {{ $locale }}</label>
                        <input class="form-control" name="{{ $locale }}[short_description]"
                            value="{{ old($locale . '.short_description') }}" type="text">
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
            <label>Promo_code</label>
            <input class="form-control" name="promo_code" value="{{ old('promo_code') }}" type="text">
            @error('promo_code')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- <div class="form-group">
            <b><p>Show foundation status</p></b>
            <label>Yes</label>
            <input name="show_foundation_status" value="Yes" type="radio">
            <label>No</label>
            <input name="show_foundation_status" value="No" type="radio">
            @error('show_foundation_status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> --}}

        <div class="form-group">
            <div class="custom-switch">
                <input type="checkbox" name="show_foundation_status" value="1" class="custom-control-input" id="show-foundation-status">
                <label class="custom-control-label" for="show-foundation-status">Show foundation status.</label>
            </div>
            @error('show_foundation_status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Start_date</label>
            <input class="form-control" name="start_date" value="{{ old('start_date') }}" type="date">
            @error('start_date')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Raised_amount</label>
            <input class="form-control" name="raised_amount" value="{{ old('raised_amount') }}" type="number" min="0"
                max="99999">
            @error('raised_amount')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label>Goal_amount</label>
            <input class="form-control" name="goal_amount" value="{{ old('goal_amount') }}" type="number" min="0"
                max="99999">
            @error('goal_amount')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {{-- <div class="form-group">
            <b><p>Show button</p></b>
            <label>Yes</label>
            <input name="show_button" value="Yes" type="radio">
            <label>No</label>
            <input name="show_button" value="No" type="radio">
            @error('show_button')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> --}}

        <div class="form-group">
            <div class="custom-switch">
                <input type="checkbox" name="show_button" value="1" class="custom-control-input" id="show-btn-switch">
                <label class="custom-control-label" for="show-btn-switch">Show 'Donate now' button status.</label>
            </div>
            @error('show_button')
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
