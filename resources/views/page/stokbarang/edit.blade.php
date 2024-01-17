<x-template-app>
    <x-card judul='Stok Barang'>
        <form action='{{ url("/stokbarang/$stokbarang->slug") }}' method="post">
            @method('put')
            @csrf
            <x-input name='nama_barang' type='text' :value="old('nama_barang', $stokbarang->nama_barang)">
                @error('nama_barang')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </x-input>
            
            <x-input name='qty_barang_masuk' type='number' :value="old('qty_barang_masuk', $stokbarang->qty_barang_masuk)" />
            
            <div class="row">
                <div class="col-lg-6">
                    <x-input name='tanggal_masuk' type='date' :value="old('tanggal_masuk', $stokbarang->tanggal_masuk )" />
                </div>
                <div class="col-lg-6">
                    <x-input name='nama_penerima' type='text' :value="old('nama_penerima', $stokbarang->nama_penerima)" />
                </div>
            </div>            
            <x-input name='lokasi' type='text' attribute='readonly' :value="Auth::user()->asal_rig"/>
            <button
                type="submit"
                class="btn btn-primary float-end"
            >
                <i class="bi-send"></i> Update
            </button>
            
        </form>
    </x-card>
</x-template-app>