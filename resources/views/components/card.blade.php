<div class="card shadow rounded-4 mb-3">
    <div class="card-header hstack">
        <h4 class="card-title me-auto">{{ $judul }}</h4>
        {{ $tombol }}
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
    <div class="card-footer">
        {{ $tombolFooter }}
    </div>
</div>