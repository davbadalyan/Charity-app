<div class="form-group">
    <label>{{ $title }}</label>
    <input {{ $attributes->merge(['class' => 'form-control']) }} name="{{ $name }}"
        value="{{ old($name, $default) }}" type="text">
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>


{{-- <div class="form-group">
    <label>{{ $title }}</label>
    <input {{ $attributes->merge(['class' => 'form-control']) }} name="{{ $name }}" 
        value="{{ $event->name }}" type="text">
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div> --}}

