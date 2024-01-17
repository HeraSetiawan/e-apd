<div class="row align-items-center">
    @if (session('error'))
        <p class="text-danger text-center">
            {{ session('error') }}
        </p>
    @endif
    <div class="col-lg-6">
        <label >Nama Barang</label>
        <select class="form-select" wire:model='nama'>
            <option value="null" selected disabled>--pilih barang--</option>
            @foreach ($stokbarang as $item)
                <option value="{{ $item->id.'|'.$item->nama_barang }}">{{ $item->nama_barang }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-lg-4">
        <div class="mb-3">
            <label for="jumlah_diminta" class="form-label">Jumlah</label>
            <input wire:model='jumlah' placeholder="jumlah diminta" type="number" class="form-control" id="jumlah_diminta">
        </div>
    </div>
    <div class="col-lg-2">
        <button wire:click.prevent='tambahItem' type="button" class="btn btn-dark rounded-pill my-2"><i class="bi-plus"></i> Tambah</button>  
    </div>
    <hr>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $key => $item)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>
                            <input name="id_barang[]" type="hidden" value="{{ $item['id'] }}">
                            {{ $item['nama'] }}</td>
                        <td>
                            <input name="jumlah_permintaan[]" type="number" readonly class="form-control-plaintext" value="{{ $item['jumlah'] }}">
                        </td>
                        <td>
                            <button wire:click.prevent="hapusItem({{ $key }})" class="btn-sm rounded-circle btn btn-outline-danger" type="button">
                                <i class="bi-x"></i>
                            </button>
                        </td>
                    </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
</div>