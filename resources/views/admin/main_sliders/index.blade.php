@extends('admin.layout')

@section('title', 'Main Slider')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="m-0 text-dark">Main Slider</h1>
    </div>
@stop

@section('card-content')

    <table class="table table-stripped dt">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mainSliders as $slider)
                <tr>
                    <td>{{ $slider->name }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.main_slider.edit', ['main_slider' => $slider]) }}"
                                class="btn btn-sm btn-info mr-2">Edit</a>
                        </div>
                    </td>
                </tr>
            @empty

            @endforelse
        </tbody>
    </table>
@stop

@section('js')

<script>
    $('.dt').DataTable();
</script>

@endsection
