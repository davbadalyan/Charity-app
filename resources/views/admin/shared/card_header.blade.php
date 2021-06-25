<div class="d-flex justify-content-between">
    <h1 class="m-0 text-dark">{{ $title }}</h1>
    @if(($createURL ?? false))
        <a href="{{ $createURL }}" class="btn btn-primary">Create</a>
    @endif
</div>