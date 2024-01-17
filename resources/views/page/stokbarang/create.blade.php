<x-template-app>
    <x-card judul='Stok Barang'>
        <form action="{{ url('/stokbarang') }}" method="post">
            @csrf
            <x-input name='nama barang' type='text'>
            @error('nama_barang')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            </x-input>
            <x-input name='qty_barang_masuk' type='number' :value="old('qty_barang_masuk')" />
            <div class="row">
                <div class="col-lg-6">
                    <x-input name='tanggal_masuk' type='date' :value="old('tanggal_masuk')" />
                </div>
                <div class="col-lg-6">
                    <x-input name='nama_penerima' type='text' :value="old('nama_penerima')" />
                </div>
            </div>
            <x-input name='lokasi' type='text' attribute='readonly'/>
            <button
                type="submit"
                class="btn btn-primary float-end"
            >
                <i class="bi-send"></i> Insert
            </button>
            
        </form>
    </x-card>
</x-template-app>