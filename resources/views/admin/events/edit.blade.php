@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Event</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('admin.events.update', ['event' => $event]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title" value="{{ old('title', $event->title) }}" type="text">
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Short_description</label>
                            <input class="form-control" name="short_description" value="{{old('short_description', $event->short_description) }}" type="text">
                            @error('short_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Promo_code</label>
                            <input class="form-control" name="promo_code" value="{{ $event->promo_code }}" type="text">
                            @error('promo_code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Start_date</label>
                            <input class="form-control" name="start_date" value="{{ $event->start_date }}" type="date">
                            @error('start_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Raised_amount</label>
                            <input class="form-control" name="raised_amount" value="{{ $event->raised_amount }}" type="number" min="0" max="99999">
                            @error('raised_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Goal_amount</label>
                            <input class="form-control" name="goal_amount" type="number" value="{{ $event->goal_amount }}" min="0" max="99999">
                            @error('goal_amount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">

                            <div style="width: 300px">
                                <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="img-fluid">
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
