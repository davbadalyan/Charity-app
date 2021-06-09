@extends('adminlte::page')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (Session::has('success'))
                        <p class="alert alert-success">{{ Session::get('success') }}</p>
                    @endif

                    @yield('card-content')

                </div>
            </div>
        </div>
    </div>

@endsection
