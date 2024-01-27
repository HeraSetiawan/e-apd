<x-template-app>
  @if (session('pesan'))
        <x-alert :pesan="session('pesan')" :warna="session('warna')" />
    @endif
    <x-card judul="Permintaan Barang">
        <a href="{{ asset('assets/dokumen/pengeluaran_apd.jpeg') }}" download class="btn btn-primary float-end mb-3"><i class="bi-download"></i> file pengiriman barang </a>
      @foreach ($permintaan as $key => $item)
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $key }}" aria-expanded="false" aria-controls="flush-collapseOne">
                  <div class="hstack gap-4 col-10">
                      <b>Nama Area : {{ $item->asal_rig }}</b>
                      <div class="vr"></div>
                      <b>Nomor : {{ $item->nomor }}</b>
                      <div class="vr"></div>
                      <b>Tanggal : {{ $item->format_tanggal }}</b>
                      <div class="vr"></div>
                      <b class="ms-auto">
                        Status : 
                        @switch($item->status)
                            @case(1)
                              <span class="badge bg-primary">Di Proses</span>
                            @break
                            @case(2)
                              <span class="badge bg-primary">Di Kirim</span>
                            @break
                            @case(3)
                              <span class="badge bg-primary">Di Terima</span>
                            @break
                            @case(4)
                              <span class="badge bg-primary">Di Tolak</span>
                            @break
                            @default
                              <span class="badge bg-primary">Aktif</span>
                            @break
                           @endswitch
                      </b>
                  </div>
              </button>
            </h2>
            <div id="flush-collapseOne{{ $key }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">
                  <div class="text-end">
                    @if ($item->status == 0)
                      <a href="{{ route('respon permintaan', $item->id) }}" class="btn btn-primary rounded-pill me-2"> <i class="bi bi-pencil-square"></i> Terima</a>
                      <a href="{{ route('tolak permintaan', $item->id) }}" class=" btn btn-outline-danger rounded-pill"> <i class="bi bi-x"></i> Tolak</a>                        
                    @endif
                  </div>
                  <table class="table table-sm">
                      <tr>
                          <th>No</th>
                          <th>Nama Barang</th>
                          <th>Diminta</th>
                          <th>Dikeluarkan</th>
                      </tr>
                      @foreach ($item->barang_permintaan as $barang)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $barang->stokBarang->nama_barang}}</td>
                            <td>{{ $barang->jumlah_diminta }}</td>
                            <td>{{ $barang->jumlah_dikeluarkan ?? "-" }}</td>
                        </tr>
                      @endforeach
                  </table>
                  @if (Auth::user()->role == "SA" || Auth::user()->role == "SS")
                    @if ($item->file_permintaan != null)
                      <a href="{{ asset($item->file_permintaan) }}" download class="btn btn-outline-info"><i class="bi-download"></i> File Permintaan</a>
                    @endif
                    @if ($item->file_pengiriman != null)
                      <a href="{{ asset($item->file_pengiriman) }}" download class="btn btn-outline-danger"><i class="bi-download"></i> File Pengiriman</a>
                    @endif
                  @endif
              </div>
            </div>
          </div>
          @if (Auth::user()->role == "AS")
            <form action="{{ route('update permintaan asisten', $item->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('patch')
              <div class="mb-3">
                <label for="" class="form-label">File Pengiriman barang</label>
                <input type="file" class="form-control" name="file_pengiriman" />
                <small id="helpId" class="form-text text-muted">silahkan upload kembali file pengiriman yang sudah di isi</small>
              </div>
              <button type="submit" class="btn btn-primary "><i class="bi-send"></i> Kirim</button>
            </form>
          @endif
        </div>
      @endforeach
      <x-slot name='tombolFooter'>
        {{ $permintaan->links() }}
      </x-slot>
    </x-card>
</x-template-app>