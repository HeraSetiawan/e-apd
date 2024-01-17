<div class="mb-3">
    <label for="{{ $name }}" class="form-label text-capitalize">{{ $label }}</label>
    <select class="form-select" name="{{ $name }}" id="{{ $name }}">
        <option selected disabled>--Pilih {{ $label }}--</option>
        {{ $slot }}
    </select>
</div>
