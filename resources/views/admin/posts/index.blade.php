@extends('admin.layout')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="m-0 text-dark">Posts</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Create</a>
    </div>
@stop

@section('card-content')

    <table class="table table-stripped dt">
        <thead>
            <tr>
                <th>Title</th>
                <th>Short Discription</th>
                <th>Event</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->short_description, 100, '...') }}</td>
                    <td>{{ $post->event->title }}</td>
                    <td>
                        <div class="d-flex">
                            {{-- @if ($event->trashed())
                                                <form class="mr-2" action="{{ route('admin.events.destroy', ['event' => $event, 'action' => 'restore']) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-success">Restore</button>
                                                </form>
                                                <form action="{{ route('admin.events.destroy', ['event' => $event, 'action' => 'forceDelete']) }}"
                                                    method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-sm btn-danger">Delete permanently</button>
                                                </form>
                                            @else --}}
                            <a href="{{ route('admin.posts.edit', ['post' => $post]) }}"
                                class="btn btn-sm btn-info mr-2">Edit</a>
                            <form action="{{ route('admin.posts.destroy', ['post' => $post, 'action' => 'delete']) }}"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-warning">Delete</button>
                            </form>
                            {{-- @endif --}}
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
