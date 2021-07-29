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

                </div>
            </div>
        @empty
            <h3 class="text-danger">Locales not found, please check configs</h3>
        @endforelse

        <div class="form-group">
            <label>Promo code</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <button type="button" class="btn btn-sm btn-primary promo-generator"><i class="fa fa-lock"></i></button>
                </div>
                <input class="form-control" id="promo" name="promo_code" value="{{ old('promo_code') }}" type="text">
            </div>
            @error('promo_code')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <x-dg-input-switch label="Show foundation status." name="show_foundation_status" id="show-status"
                checked="{{ old('show_foundation_status') == 'on' }}" />
            @error('show_foundation_status')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <x-input class="form-control" title="Start date" name="start_date" type="date" />
        </div>

        <div class="form-group">
            <x-input class="form-control" title="Raised amount" name="raised_amount" type="number" />
        </div>

        <div class="form-group">
            <x-input class="form-control" title="Goal amount" name="goal_amount" type="number" />
        </div>

        <div class="form-group">
            <x-dg-input-switch label="Donate now' button status." name="show_button" id="show-button"
                checked="{{ old('show_button') == 'on' }}" />
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

@section('js')
<script>
    window.onload = function() {
        document.querySelector("button.promo-generator").addEventListener('click', (e) => {
            document.getElementById("promo").value = "#" + Math.random().toString(36).slice(-8);
        });
    };
</script>
@endsection
