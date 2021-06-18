@extends('admin.layout')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="m-0 text-dark">Volunteers</h1>
        {{-- <a href="{{ route('admin.volunteers.create') }}" class="btn btn-primary">Create</a> --}}
    </div>
@stop

@section('card-content')

    <div class="col-lg-8 m-auto">
        <h3>Send emails to ALL volunteers</h3>
        <form action="{{ route('admin.volunteers-send-email') }}" method="POST">
        
            @csrf
            <div class="form-group">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}">
                @error('subject')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea type="text" name="message" class="form-control @error('message') is-invalid @enderror">{{ old('subject') }}</textarea>
                @error('message')
                    <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        
            <button class="btn btn-primary">Send</button>
        </form>
    </div>

    <hr />

    <table class="table table-stripped dt">
        <thead>
            <tr>
                <th>Full name</th>
                <th>Email address</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($volunteers as $volunteer)
                <tr>
                    <td>{{ $volunteer->full_name }}</td>
                    <td>{{ $volunteer->email }}</td>
                    <td>{{ $volunteer->phone }}</td>
                    <td>{{ $volunteer->message }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('admin.volunteers.edit', ['volunteer' => $volunteer]) }}"
                                class="btn btn-sm btn-info mr-2">Edit</a>
                            <form action="{{ route('admin.volunteers.destroy', ['volunteer' => $volunteer, 'action' => 'delete']) }}"
                                method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-warning">Delete</button>
                            </form>
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
