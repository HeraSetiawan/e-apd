<div class="mb-3">
    <label class="form-label text-capitalize">{{ str_replace('_',' ',$name)  }}</label>
    <input {{ $attribute }} value="{{ $value }}" required type="{{ $type }}" class="form-control" name="{{ $name }}" placeholder="masukan {{ str_replace('_',' ',$name)  }}">
    {{ $slot }}
</div>