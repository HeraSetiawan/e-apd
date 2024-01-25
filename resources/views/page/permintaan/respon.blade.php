<x-template-app>
    @if (session('pesan'))
        <x-alert :pesan="session('pesan')" :warna="session('warna')" />
    @endif
    <x-card judul="Form Peneriman Barang">
        <form action="{{ route('kirim barang') }}" method="post">
            @csrf
             <h4 >Dikirim Ke : <u>{{ $permintaan->asal_rig }}</u></h4>
            <input type="hidden" name="permintaan_id" value="{{ $permintaan->id }}">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Permintaan</th>
                        <th>Jumlah Dikirim</th>
                    </tr>
                    @foreach ($barangPermintaan as $barang)
                      <tr>
                          <td class="d-none"><input type="hidden" name="barang_permintaan_id[]" value="{{ $barang->id }}"></td>
                          <td class="d-none"><input type="hidden" name="barang_id[]" value="{{ $barang->stok_barang_id }}"></td>
                          <td>{{ $loop->iteration }}.</td>
                          <td>{{ $barang->stokBarang->nama_barang}}</td>
                          <td>{{ $barang->jumlah_diminta }}</td>
                          <td>
                            <input type="number" name="jumlah_dikirim[]" value="0" required class="form-control" max="{{ $barang->stokBarang->nama_barang}}" placeholder="masukan jumlah yg dikirim">
                          </td>
                      </tr>
                    @endforeach
                </table>
            </div>
            <button type="submit" class="btn btn-success float-end"><i class="bi-send"></i> Kirim</button> 
        </form>
    </x-card> 
</x-template-app>