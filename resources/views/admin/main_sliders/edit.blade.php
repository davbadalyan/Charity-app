@extends('admin.layout')

@section('title', 'Edit Main Slider')

@section('content_header')
<h1 class="m-0 text-dark">Edit MainSlider</h1>
@stop

@section('card-content')

<form action="{{ route('admin.main_slider.update', ['main_slider' => $mainSlider]) }}" method="POST">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label>Name</label>
        <input class="form-control" value="{{ old('name', $mainSlider->name) }}" name="name" type="text">
        @error('name')
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
            @forelse ($mainSlider->getMedia() as $media)
                <div class="card col-lg-3 col-sm-6 col-xs-12 my-2">
                    <img class="card-img-top" src="{{ $media->getUrl() }}" alt="" />
                    <div class="card-img-overlay d-flex align-items-start justify-content-end">
                        <a href="{{ route('admin.main_slider.media.main-image', ['main_slider' => $mainSlider, 'media' => $media]) }}"
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
