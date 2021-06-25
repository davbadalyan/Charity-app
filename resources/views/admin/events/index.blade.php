@extends('admin.layout')

@section('title', 'AdminLTE')

@section('content_header')
  
    @include("admin.shared.card_header", ['title' => "Events", "createURL" => route('admin.events.create')])

@stop

@section('card-content')

    <table class="table table-stripped dt">
        <thead>
            <tr>
                <th>Title</th>
                <th>Raised</th>
                <th>Goal</th>
                <th>Promo</th>
                <th>Start Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->raised_amount }}</td>
                    <td>{{ $event->goal_amount }}</td>
                    <td>{{ $event->promo_code }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>
                        <div class="d-flex">
                            @if ($event->trashed())
                                <form class="mr-2"
                                    action="{{ route('admin.events.destroy', ['event' => $event, 'action' => 'restore']) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-success">Restore</button>
                                </form>
                                <form
                                    action="{{ route('admin.events.destroy', ['event' => $event, 'action' => 'forceDelete']) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Delete permanently</button>
                                </form>
                            @else
                                <a href="{{ route('admin.posts.create', ['event_id' => $event->id]) }}"
                                    class="btn btn-primary btn-sm mr-2 ">Create Post</a>
                                <a href="{{ route('admin.events.edit', ['event' => $event]) }}"
                                    class="btn btn-sm btn-info mr-2">Edit</a>
                                <form
                                    action="{{ route('admin.events.destroy', ['event' => $event, 'action' => 'delete']) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-warning">Archive</button>
                                </form>
                            @endif
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
