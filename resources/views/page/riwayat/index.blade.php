<x-template-app>
    <div class="col-lg-10 mx-auto">
        <div class="card mb-2">
            <div class="card-body">
                <h4 class="card-title my-0"><i class="bi-book"></i> Riwayat Pengeluaran Barang</h4>
                <p class="card-text text-muted">riwayat apd akan tampil disini</p>
                <div>
                    <form action="{{ url('/riwayat') }}" method="get" class="row">
                        <div class="col-lg-5">
                            <x-select name="keyBulan" label="Pilih Bulan">
                                <option @selected(request('keyBulan') == "01") value="01">Januari</option>
                                <option @selected(request('keyBulan') == "02") value="02">Februari</option>
                                <option @selected(request('keyBulan') == "03") value="03">Maret</option>
                                <option @selected(request('keyBulan') == "04") value="04">April</option>
                                <option @selected(request('keyBulan') == "05") value="05">Mei</option>
                                <option @selected(request('keyBulan') == "06") value="06">Juni</option>
                                <option @selected(request('keyBulan') == "07") value="07">Juli</option>
                                <option @selected(request('keyBulan') == "08") value="08">Agustus</option>
                                <option @selected(request('keyBulan') == "09") value="09">September</option>
                                <option @selected(request('keyBulan') == "10") value="10">Oktober</option>
                                <option @selected(request('keyBulan') == "11") value="11">November</option>
                                <option @selected(request('keyBulan') == "12") value="12">Desember</option>
                            </x-select>
                        </div>
                        <div class="col-lg-5">
                            <label for="" class="form-label">Tahun</label>
                            <input type="number" value="{{ request('keyTahun') }}" name="keyTahun" class="form-control" placeholder="masukan tahun">
                        </div>
                        <div class="col-lg-2">
                            <button
                                type="submit"
                                class="btn btn-primary mt-4"
                            >
                                <i class="bi-search"></i> Filter
                            </button>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Nama Area</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Dikeluarkan</th>
                                <th class="d-print-none">Status</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @foreach ($listBarangKeluar as $item)
                                <tr>
                                    <td>{{ date('d M Y', strtotime($item->created_at)) }}</td>
                                    <td>{{ $item->permintaan->asal_rig }}</td>
                                    <td>
                                        {{ $item->stokBarang->nama_barang }}
                                    </td>
                                    <td>
                                        {{ $item->jumlah_dikeluarkan ?? "-"}}
                                    </td>
                                    <td class="d-print-none">
                                        @switch($item->permintaan->status)
                                        @case(1)
                                        <span class="badge bg-success bg-warning">
                                        <i class="bi-boxes"></i> Sedang dikemas
                                        </span>
                                        @break
                                        @case(2)
                                        <span class="badge bg-gradient bg-info">
                                        <i class="bi-truck"></i> Dalam Pengiriman
                                        </span>
                                        @break
                                        @case(3)
                                        <span class="badge bg-success bg-gradient">
                                           <i class="bi-box-seam"></i> Sudah Diterima
                                        </span>
                                        @break
                                        @case(4)
                                        <span class="badge bg-gradient bg-danger">
                                           <i class="bi-x"></i> Di Tolak
                                        </span>
                                        @break
                                        @default
                                        <span class="badge bg-gradient bg-primary">
                                           <i class="bi-pen"></i> Belum Acc
                                        </span>
                                            @endswitch
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</x-template-app>